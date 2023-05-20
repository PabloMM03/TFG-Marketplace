<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /**
      * Create category, which is not already created
      */
    public function store(Request $request)
    {

        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:categories',
            'file' =>'image'
        ]);


      $category = Category::create($request->all());

       /**
        * Store image in storage
        */
        if($request->hasfile('file')){
            $url = $request->file('file');
             $extension = $url->getClientOriginalExtension();
             $filename = time().'.'.$extension;
             $url->move('storage/category/', $filename);
             $category->category_image = $filename;
            }
     
      $category->save();
      return redirect()->route('admin.categories.edit', $category)->with('crear', 'Categoria creada correctamente');
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
      * Actulizar categoria, could not repeat the name
      */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> "required|unique:categories,slug,$category->id",
            'file' =>'image'
        ]);

        $category->update($request->all());

         /**
        * Store image in storage
        */
       if($request->hasfile('file'))
       {
        $destination = 'storage/category/'.$category->category_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $url = $request->file('file');
        $extension = $url->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $url->move('storage/category/', $filename);
        $category->category_image = $filename;
       }

       $category->update();
        return redirect()->route('admin.categories.edit', $category)->with('editar', 'Categoria actualizada correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $destination = 'storage/products/'.$category->category_image;
        if(File::exists($destination)){
           File::delete($destination);
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('eliminar', 'Categoria eliminada correctamente');
        
    }
}
