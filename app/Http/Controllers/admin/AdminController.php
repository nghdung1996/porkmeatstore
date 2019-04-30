<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
  function home(){
    return view('admin.home');
  }

  function login(){
    if(Auth::check()){
      return redirect('admin/home');
    }else{
      return view('admin/login');
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
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 2])) {
      return redirect('admin/home');
    }else{
      return redirect('admin/login')->with('warning','Something went wrong!');
    }
  }

  function logout(){
    Auth::logout();
    return redirect('admin/login');
  }
}
