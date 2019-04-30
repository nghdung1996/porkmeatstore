<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    function index(){
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    function new(){
        return view('admin.posts.new');
    }

    function create(Request $request){
        $post = new Post;
        $this->validate($request,
            [
                'title' => 'required',
                'content' => 'required',
                'thumbnail' => 'required',
                'description' => 'required'
            ],
            [
                'title.required' => "Vui lòng nhập tiêu đề bài đăng",
                'content.required' => "Vui lòng nhập nội dung bài đăng",
                'thumbnail.required' => "Vui lòng nhập hình ảnh hiện thị bài đăng",
                'description.required' => "Vui lòng nhập tóm tắt bài đăng"
            ]
        );

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->description = $request->description;
        $post->accepted = 1;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension_file = $file->getClientOriginalExtension();
            if ($extension_file != 'jpg' && $extension_file != 'jpeg' && $extension_file != 'png' ) {
              return redirect('admin/posts/new'); 
            }
            $name = $file->getClientOriginalName();
            $filename = str_random(5)."_".$name;
            while(file_exists('upload/thumbnails/'.$filename)){
              $filename = str_random(5)."_".$name;
            }
            $file->move('upload/thumbnails',$filename);
            $post->thumbnail = $filename;
          }

        $post->save();
        return redirect('admin/posts/index');
    }

    function edit($id){
        $post = Post::find($id);
        return view('admin/posts/edit', ['post' => $post]);
    }

    function update(Request $request, $id){
        $post = Post::find($id);
        $this->validate($request,
            [
                'title' => 'required',
                'content' => 'required',
                'description' => 'required'
            ],
            [
                'title.required' => "Vui lòng nhập tiêu đề bài đăng",
                'content.required' => "Vui lòng nhập nội dung bài đăng",
                'description.required' => "Vui lòng nhập tóm tắt bài đăng"
            ]
        );

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->description = $request->description;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension_file = $file->getClientOriginalExtension();
            if ($extension_file != 'jpg' && $extension_file != 'jpeg' && $extension_file != 'png' ) {
              return redirect('admin/posts/new'); 
            }
            $name = $file->getClientOriginalName();
            $filename = str_random(5)."_".$name;
            while(file_exists('upload/thumbnails/'.$filename)){
              $filename = str_random(5)."_".$name;
            }
            $file->move('upload/thumbnails',$filename);
            $post->thumbnail = $filename;
          }

        $post->save();
        return redirect('admin/posts/index');
    }

    function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/posts/index')->with('success','Xóa bài đăng thành công');
    }

    function editstatus($id){
      $post = Post::find($id);
      return view('admin/posts/editstatus',['post'=>$post]);
    }

    function updatestatus(Request $request){
      $post= Post::find($request->id);
      $post->accepted = $request->accepted;
      $post->save();
      return redirect('admin/posts/index')->with('success', 'Cập nhật trạng thái thành công');
    }
}
