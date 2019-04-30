@extends('admin.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản
                    <small>danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if (session('success'))
              {{session('success')}}
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Vai trò</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr class="odd gradeX" align="center">
                      <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>0{{$user->phone}}</td>
                        <td>
                          @if ($user->role == 0)
                            Khách hàng
                          @elseif ($user->role ==1)
                            Quản Lý
                          @else
                            Admin
                          @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                          <a href="admin/user/delete/{{$user->id}}"> Xóa</a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                          <a href="admin/user/edit/{{$user->id}}">Sửa</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection
