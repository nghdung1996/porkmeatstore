<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UsersController extends Controller
{
  function signup(){
    if (Auth::check()) {
      return redirect('home');
    }else{
      return view('pages.signup');
    }
  }

  function login(){
    if (Auth::check()) {
      return redirect('home');
    }else{
      return view('pages.login');
    }
  }
  function postsignup(Request $request){
    $this->validate($request,
      [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|max:32',
        'passwordconfirmation' => 'required|same:password',
      ],
      [
        'name.required' => 'Không được bỏ trống tên',
        'name.min' => 'Tên phải có từ 3 kí tự trở lên',
        'email.required' => 'Không được bỏ trống Email',
        'email.email' => 'Vui lòng nhập đúng Email',
        'email.unique' => 'Email đã tồn tại',
        'password.required' => 'Không được bỏ trống mật khẩu',
        'password.min' => 'Mật khẩu phải có từ 6 đến 32 kí tự',
        'password.max' => 'Mật khẩu phải có từ 6 đến 32 kí tự',
        'passwordconfirmation.required' => 'Không được bỏ trống xác nhận mật khẩu',
        'passwordconfirmation.same' => 'Xác nhận mật khẩu không đúng với mật khẩu',
      ]);
    
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    $user->save();
    return redirect('login')->with('success', 'Đăng kí tài khoản thành công');
  }

  function postlogin(Request $request) {
    $this->validate($request,
      [
        'email' => 'required|email',
        'password' => 'required|min:6|max:32',
      ],
      [
        'email.required' => 'Không được bỏ trống Email',
        'email.email' => 'Vui lòng nhập đúng email',
        'password.required' => 'Không được bỏ trống mật khẩu',
        'password.min' => 'Mật khẩu phải có từ 6 đến 32 kí tự',
        'password.max' => 'Mật khẩu phải có từ 6 đến 32 kí tự',
      ]);
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect('home')->with('success','Đăng nhập thành công');
    }else{
      return redirect('login')->with('danger','Tài khoản hoặc mật khẩu không chính xác');
    }
  }

  function logout(){
    Auth::logout();
    return redirect('home')->with('success', 'Đăng xuất thành công');
  }

  function edit($id){
    $user = User::find($id);
    return view('users.edit',['user' => $user]);
  }

  function update($id, Request $request){
    $user= User::find($id);
    $this->validate($request,
      [
        'name' => 'required|min:3'
      ],
      [
        'name.required' => 'Tên không được bỏ trống',
        'name.min' => 'Tên phải có từ 3 kí tự trở lên',
      ]);
    
    $user->name = $request->name;
    $user->address = $request->address;
    $user->phone = $request->phone;
    if($request->changepassword == "on"){
      $this->validate($request,
        [
          'password' => 'required|min:6|max:32',
          'passwordconfirmation' => 'required|same:password',
        ],
        [
          'password.required' => 'Không được bỏ trống mật khẩu',
          'password.min' => 'Mật khẩu phải có từ 6 đến 32 kí tự',
          'password.max' => 'Mật khẩu phải có từ 6 đến 32 kí tự',
          'passwordconfirmation.required' => 'Không được bỏ trống xác nhận mật khẩu',
          'passwordconfirmation.same' => 'Xác nhận mật khẩu không đúng với mật khẩu',
        ]);
      $user->password = bcrypt($request->password);
    }
    $user->save();
    return redirect('users/edit/'.$user->id)->with('success','Thay đổi thông tin thành công');
  }
}
