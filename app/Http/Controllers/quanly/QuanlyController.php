<?php

namespace App\Http\Controllers\quanly;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class QuanlyController extends Controller
{
  function home(){
    return view('quanly.home');
  }

  function login(){
    if(Auth::check()){
      return redirect('quanly/home');
    }else{
      return view('quanly/login');
    }
  }

  function postlogin(Request $request){
    $this->validate($request,
      [
        'email' => 'required',
        'password' => 'required'
      ],
      [
        'email.required' => 'Email cant be blank',
        'password.required' => 'Password cant be blank',
      ]
    );
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
      return redirect('quanly/home');
    }else{
      return redirect('quanly/login')->with('warning','Something went wrong!');
    }
  }

  function logout(){
    Auth::logout();
    return redirect('quanly/login');
  }
}
