@extends('admin.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              @if (count($errors)>0)
                @foreach ($errors->all() as $err)
                  {{$err}}<br>
                @endforeach
              @endif
              @if (session('thongbao'))
                {{session('thongbao')}}
              @endif
                <form action="admin/product/create" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="price" placeholder="Nhập giá sản phẩm" type="number" step="5000" min=0 />
                    </div>
                    
                    <div class="form-group">
                      <label>Hình ảnh</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Mô tả</label>
                      <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Discount</label>
                      <input class="form-control" name="discount" placeholder="Nhập giảm giá" type="number" step="0.05" min="0" max="1"  />
                    </div>
                    <div class="form-group">
                      <label>Kiểu sản phẩm</label>
                      <label class="radio-inline">
                        <input name="type" value="1" type="radio">Đã chế biến
                      </label>
                      <label class="radio-inline">
                        <input name="type" value="0" checked="" type="radio">Thường
                      </label>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-default"> Thêm</button>
                    <button type="reset" class="btn btn-default">Xóa hết</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection