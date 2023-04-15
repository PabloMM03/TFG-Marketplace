<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\File;

use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.destroy')->only('destroy');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all(); 
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
      * Crear un nuevo producto
      */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');
        return view('admin.products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductRequest $request)
    {
        // return Storage::put('products',$request->file('file'));

       $product = Product::create($request->all());

       /**
        * Almacenar imagen en storage
        */
       if($request->hasfile('file')){
       $url = $request->file('file');
        $extension = $url->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $url->move('storage/products/', $filename);
        $product->product_image = $filename;
       }

       if($request->tags){
            $product->tags()->attach($request->tags);
            
       }

       $product->save();
       return redirect()->route('admin.products.edit', $product)->with('crear', 'Producto creado correctamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * AEditar producto
     */
    public function edit(Product $product)
    {

        $this->authorize('author', $product);// Solo los usuarios  a los que pertenezca el producto podra editarlos
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');
        return view('admin.products.edit', compact('product','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
      * Actualizar producto y comprobar si tiene una imagen asignada 
      */
    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('author', $product); // Solo los usuarios  a los que pertenezca el producto podra actualizarlos
        $product->update($request->all());


        /**
        * Almacenar imagen en storage
        */
       if($request->hasfile('file'))
       {
        $destination = 'storage/products/'.$product->product_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $url = $request->file('file');
        $extension = $url->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $url->move('storage/products/', $filename);
        $product->product_image = $filename;
       }

       if($request->tags){
            $product->tags()->attach($request->tags);
            
       }
    

        $product->update();
        return redirect()->route('admin.products.edit', $product)->with('info', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
      * Delete product
      */
    public function destroy(Product $product)
    {
        $this->authorize('author', $product);  // Solo los usuarios  a los que pertenezca el producto podra eliminarlos
        $destination = 'storage/products/'.$product->product_image;
        if(File::exists($destination)){
           File::delete($destination);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('eliminar', 'Producto eliminado correctamente');
    }
}
