@extends('admin.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>{{$product->name}}</small>
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
                <form action="admin/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" value="{{$product->name}}" placeholder="Nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="price" value="{{$product->price}}" placeholder="Nhập giá sản phẩm" type="number" step="0.1" min=0 />
                    </div>
                    
                    @if ($product->image)
                      <div>
                        <img src="upload/images/{{$product->image}}" alt="" width="300px" height="300px">
                      </div>
                    @endif
                    <div class="form-group">
                      <label>Thay đổi hình ảnh</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Mô tả</label>
                      <textarea class="form-control" rows="3" name="description">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Giảm giá</label>
                      <input class="form-control" name="discount" placeholder="Nhập giảm giá" type="number" step="0.05" min="0" max="1" value="{{$product->discount}}"/>
                    </div>
                    <div class="form-group">
                      <label>Kiểu sản phẩm</label>
                      <label class="radio-inline">
                        <input name="type" value="1" type="radio"
                          <?php if ($product->type == 1) {
                            echo "checked";
                          } ?>
                        >Đã chế biến
                      </label>
                      <label class="radio-inline">
                        <input name="type" value="0" type="radio"
                          <?php if ($product->type == 0) {
                            echo "checked";
                          } ?>
                        >Thường
                      </label>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Xóa hết</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      $('#change-password').change(function(){
        if ($(this).is(':checked')) {
          $('.password').removeAttr('disabled');
        }else{
          $('.password').attr('disabled','');
        }
      });
    });
  </script>
@endsection