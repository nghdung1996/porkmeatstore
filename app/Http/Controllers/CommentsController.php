<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use App\User;
use Mail;

class CommentsController extends Controller
{
    public function create(Request $request){
        $comment = new Comment;
        $this->validate($request,
            [
                'content' => 'required'
            ],
            [
                'content.required' => "Content not be blank"
            ]
        );

        $comment->id_user = $request->id_user;
        $comment->id_product = $request->id_product;
        $comment->content = $request->content;

        $comment->save();
        $user = User::find($comment->id_user);
        $product = Product::find($comment->id_product);


        $data = array('user'=>$user->name, 'product'=>$comment->id_product, 'content'=>$comment->content);
        // Mail::send('emails.feedback', $data, function($message){
	    //     $message->to('huydung17101996@gmail.com', 'Admin')->subject('Thông báo Feedback');
	    // });
        return redirect('products/'.$request->id_product.'/show');
    }

    public function destroy($id){
        $comment = Comment::find($id);
        $product = Product::find($comment->id_product);
        $comment->delete();
        return redirect('products/'.$product->id.'/show');
    }

    public function fetch_data(Request $request){
        if ($request->ajax()) {
            $comments = Comment::where('id_product', $request->id_product)->orderBy('id', 'desc')->paginate(5);
            return view('products.pagination_comment',compact('comments'));
        }
    }
}
