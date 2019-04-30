<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Product;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
	public function create(Request $request){
		$product_id = $request->id;
		$lastest_products = Product::where('type',0)->orderBy('id','desc')->take(12)->get();
		if(Auth::user()){
			$like = new Like;
			$like->id_product = $product_id;
			$like->id_user = Auth::user()->id;

			$like->save();
			return response()->json([
					'html' => view('pages.lastestproducts')->with('lastest_products', $lastest_products)->render()
			]);
		}else{
			return redirect('login');
		}
	}

	public function destroy(Request $request){
		$id_user = Auth::user()->id;
		$product_id = $request->id;
		$lastest_products = Product::where('type',0)->orderBy('id','desc')->take(12)->get();
		$like = Like::where('id_user',$id_user)->where('id_product', $product_id)->value('id');
		if ($like) {
			Like::destroy($like);
			return response()->json([
					'html' => view('pages.lastestproducts')->with('lastest_products', $lastest_products)->render()
			]);
		} else {
			return redirect('login');
		}	
			
	}
}
