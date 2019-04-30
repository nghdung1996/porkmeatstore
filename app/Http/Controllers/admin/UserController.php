<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
  function index(){
    $users = User::all();
    return view('admin.user.index',['users' => $users]);
  }
  function newuser(){
    return view('admin.user.new');
  }
  function create(Request $request){
    $this->validate($request,
      [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|max:32',
        'repassword' => 'required|same:password',
        'phone' => 'required'
      ],
      [
        'phone.required' => 'Không được bỏ trống số điện thoại',
        'name.required' => 'Không được bỏ trống tên',
        'name.min' => 'Tên phải có từ 3 kí tự trở lên',
        'email.required' => 'Không được bỏ trống Email',
        'email.email' => 'Vui lòng nhập đúng Email',
        'email.unique' => 'Email đã tồn tại',
        'password.required' => 'Không được bỏ trống mật khẩu',
        'password.min' => 'Mật khẩu phải có từ 6 đến 32 kí tự',
        'password.max' => 'Mật khẩu phải có từ 6 đến 32 kí tự',
        'repassword.required' => 'Không được bỏ trống xác nhận mật khẩu',
        'repassword.same' => 'Xác nhận mật khẩu không đúng với mật khẩu',
      ]
    );

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->role = $request->role;
    $user->save();
    return redirect('admin/user/index')->with('success','Tạo tài khoản thành công');
  }
  function edit($id){
    $user = User::find($id);
    return view('admin/user/edit', ['user' => $user]);
  }
  function update($id, Request $request){
    $this->validate($request,
      [
        'name' => 'required', 
        'phone' => 'required'
      ],
      [
        'name.required' => 'Không được bỏ trống tên',
        'phone.required' => 'Không được bỏ trống số điện thoại',
      ]
    );

    $user = User::find($id);
    if ($request->changePassword == "on") {
      $this->validate($request,
        [
          'password' => 'required', 
          'repassword' => 'required|same:password', 
        ],
        [
          'password.required' => 'Password cant be blank',
          'repassword.same' => 'RePassword is not same password',
          'repassword.required' => 'RePassword cant be blank'
        ]
      );
      $user->password = bcrypt($request->password);
    }
    $user->name = $request->name;
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->role = $request->role;
    $user->save();
    return redirect('admin/user/edit/'.$id)->with('success','Edit successfully');
  }
  function delete($id){
    $user = User::find($id);
    $user->delete();
    return redirect('admin/user/index')->with('success','Delete successfully');
  }
}
