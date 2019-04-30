<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Comment;
use App\Services\PaginateAjax;
use Illuminate\Support\Facades\Auth;
use App\Post;

class ProductsController extends Controller
{
  function show($id){
    $product = Product::find($id);
    $comments = Comment::where('id_product', $id)->orderBy('id','desc')->paginate(5);
    $products = Product::orderByRaw('RAND()')->take(4)->get();

    return view('products/show', ['product' => $product, 'comments' => $comments, 'products'=>$products]);
  }

  function cart(){
    return view('pages.cart');
  }

  function multiple_add_to_cart(Request $request){
    $product = Product::find($request->id);
    $id = $request->id;
    $quantity = $request->quantity;
    if (!$product) {
      abort(404);
    }
    $cart = session()->get('cart');
    // if item not exist in cart
    if (!isset($cart[$id])) {
      $cart[$id] = [
        'name' => $product->name,
        'quantity' => $quantity,
        'price' => $product->price,
        'promotionprice' => $product->price*(1-$product->discount),
        'image' => $product->image
      ];
      session()->put('cart',$cart);
    } else {
      $cart[$id]['quantity'] += $quantity;
      session()->put('cart',$cart);
    }

    return response()->json([
      "html" => view("pages.header_cart")->render()
    ]);

  }

  function update_cart(Request $request){
    if ($request->id && $request->quantity) {
      $cart = session()->get('cart');
      $cart[$request->id]['quantity'] = (float)$request->quantity;
      session()->put('cart',$cart);
      return response()->json([
        "table_cart" => view("pages.table_cart")->render(),
        "header_cart" => view("pages.header_cart")->render()
      ]);
    }
  }

  function remove_from_cart(Request $request){
    if ($request->id) {
      $cart = session()->get('cart');
      if (isset($cart[$request->id])) {
        unset($cart[$request->id]);
        session()->put('cart',$cart);
      }
    }

    return response()->json([
      "table_cart" => view("pages.table_cart")->render(),
      "header_cart" => view("pages.header_cart")->render()
    ]);
  }

  function search(Request $request){
    $name = $request->name;
    if ($request->category == 1) {
      $products = Product::where('name', 'LIKE', '%'.$name.'%')->get();
      return view('products.search_list', ['products'=>$products]);
    }else if ($request->category == 2) {
      $posts = Post::where('title', 'LIKE', '%'.$name.'%')->paginate(10);
      return view('posts.search_list', ['posts' => $posts]);
    }
  }

  function likedProducts(){
    $user = Auth::user();
    $id_products = $user->like->pluck('id_product');
    $products = Product::whereIn('id', $id_products)->get();
    return view('products.liked_products', ['products' => $products]);
  }

  function pickforyou(){
    $products = Product::orderByRaw('RAND()')->take(4)->get();
    return view('products.pickforyou', ['products' => $products]);
  }
}
