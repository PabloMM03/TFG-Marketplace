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
                return redirect()->back()->with('message', 'El area del comentario es obligatoria.');
            }
            /**
             * If the product exists, the comment is created, and the pertinent checks are made
             */
            $product = Product::where('slug', $request->product_slug)
                                ->where('status', '2')->first();
            if($product)
            {
                Comment::create([
                    'product_id' => $product->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body,
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email
                ]);

                return  redirect()->back()->with('message', 'Comentario creado correctamente.');

            }
            else{
              return  redirect()->back()->with('message', 'No puedes opinar sobre este producto sin haberlo comprado.');
            }              
        }
        else{
           return redirect()->back()->with('message', 'Debes hacer el login primero.');
        }
    }

    /**
     * The likeComment function is the method of the controller that is responsible for handling the action of "Like" a comment.
     */
    public function likeComment(Comment $comment)
    {
        $user = Auth::user();

        $user->likeComments()->toggle($comment);

        return redirect()->back()->with('message', 'Te ha gustado este comentario');
    }

    


}
