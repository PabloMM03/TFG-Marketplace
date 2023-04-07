<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Darryldecode\Cart\Validators\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * You create a comment system, which if the user is identified can give an opinion about that product
     */
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);

            if($validator->fails())
            {
                return redirect()->back()->with('message', 'El area del comentario es mandatoria.');
            }
            $product = Product::where('slug', $request->product_slug)
                                ->where('status', '2')->first();
            if($product)
            {
                Comment::create([
                    'product_id' => $product->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body

                ]);

                return  redirect()->back()->with('message', 'Comentario creado correctamente.');

            }
            else{
              return  redirect()->back()->with('message', 'No se a encotrado el producto.');
            }              
        }
        else{
           return redirect('login')->with('message', 'Debes hacer el login primero.');
        }
    }

}
