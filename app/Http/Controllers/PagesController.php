<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
class PagesController extends Controller
{
  function home(){
    $str = "home";
    $lastest_products = Product::where('type',0)->orderBy('id','desc')->take(12)->get();
    return view('pages.home',['home'=>$str, 'lastest_products'=> $lastest_products]);
  }

  function detailproduct(){
    return view('pages.detailproduct');
  }

  function products(){
    return view('pages.products');
  }

  function deliciousdishes(){
    $posts = Post::where('accepted',1)->orderBy('id', 'desc')->paginate(5);
    return view('pages.deliciousdishes', ['posts' => $posts]);
  }

  function aboutus(){
    return view('pages.aboutus');
  }

  function cookeddishes(){
    $cookeddishes = Product::where('type',1)->orderBy('id','desc')->take(12)->get();
    return view('pages.cookeddishes', ['cookeddishes' => $cookeddishes]);
  }
}
