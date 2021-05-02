@extends('admin.layout.index')
@section('content') 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.layout.content_header',['name'=>'Categories','key'=>'add'])
    <!-- Main content -->
      <div class="container-fluid">
        <hr class="dashed">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6"> 
              <form action="" method="post" style="margin-left: 8px">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category name</label>
                    <input type="text" class="form-control" placeholder="Nhập tên loại">
        </div>
      <button type="submit" class="btn btn-primary">Add</button>
          </div>
              
    </form>
        </div>
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection