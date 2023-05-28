<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

  // Apply middleware for authorization based on user roles and permissions
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
  
     /**
      * Get all products created by each seller
      */
    public function index()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $products = $user->products;
    
        return view('admin.products.index', compact('user', 'products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
      * Create a product by getting all labels and categories
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
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */

     /**
      * Function which allows us to add the images to the database and save them on the server
      */
    public function store(ProductRequest $request)
{
    $product = Product::create($request->all());

    // Check if the request contains a file
    //if the selected image is the first it is added to the first image space if not the second and saved in the specified folder
    if ($request->hasfile('file1')) {
        $file1 = $request->file('file1');
        $extension1 = $file1->getClientOriginalExtension();
        $filename1 = time() . '_1.' . $extension1;
        $file1->move('storage/products/', $filename1);
        $product->product_image = $filename1;
    }

    if ($request->hasfile('file2')) {
        $file2 = $request->file('file2');
        $extension2 = $file2->getClientOriginalExtension();
        $filename2 = time() . '_2.' . $extension2;
        $file2->move('storage/products/', $filename2);
        $product->product_image2 = $filename2;
    }

    if ($request->tags) {
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
     * Edit Product
     */
    public function edit(Product $product)
    {
        //Only users to whom the product belongs can edit them

        $this->authorize('author', $product);
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
      * Update product and check if it has an image assigned to it
      */
      public function update(ProductRequest $request, Product $product)
      {
          // Only users to whom the product belongs can update it
          $this->authorize('author', $product); 
          
          // Update other product fields
          $product->update($request->all());
      
          /**
           * Update images in storage
           */
          //Images are replaced if the product already contains one and it is saved in the specified folder
          //First one image is checked and then the other
          if ($request->hasfile('file1')) {
              $destination = 'storage/products/' . $product->product_image;
              if (File::exists($destination)) {
                unlink($destination);
              }
      
              $file1 = $request->file('file1');
              $extension1 = $file1->getClientOriginalExtension();
              $filename1 = time() . '_1.' . $extension1;
              $file1->move('storage/products/', $filename1);
              $product->product_image = $filename1;
          }
      
          if ($request->hasfile('file2')) {
              $destination2 = 'storage/products/' . $product->product_image2;
              if (File::exists($destination2)) {
                unlink($destination2);
              }
      
              $file2 = $request->file('file2');
              $extension2 = $file2->getClientOriginalExtension();
              $filename2 = time() . '_2.' . $extension2;
              $file2->move('storage/products/', $filename2);
              $product->product_image2 = $filename2;
          }
      
          if ($request->tags) {
              $product->tags()->sync($request->tags);
          }
      
          $product->save();
      
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
        //Only users to whom the product belongs can delete them
        
        $this->authorize('author', $product);  
        $destination = 'storage/products/'.$product->product_image;
        $destination2 = 'storage/products/'.$product->product_image2;
        if(File::exists($destination)){
         unlink($destination);
        }
        if(File::exists($destination2)){
            unlink($destination2);
           }
        $product->delete();
        return redirect()->route('admin.products.index')->with('eliminar', 'Producto eliminado correctamente');
    }
}
