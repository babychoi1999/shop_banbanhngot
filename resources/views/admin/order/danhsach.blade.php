@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 284px;">
 <!-- Main content -->
  @include('admin.layout.content_header',['name'=>'Orders','key'=>'List'])
      <div class="container-fluid">
       <hr class="dashed">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	<div class="col-md-12">
        	 <div class="main"  style="float: left; width: 50%">
			  <!-- Another variation with a button -->
			  <div class="input-group">
			  	<form  action="admin/sanpham/timkiem" method="get" class="form-inline">
			  		<input type="text" class="form-control" name="keysearch" placeholder="Search a record">
			    	<div class="input-group-append">
			      	<button class="btn btn-secondary" id="searchbutton" type="submit">
			        <i class="fa fa-search"></i>
			      	</button>
			    </div>
			  	</form>
			  </div>
          <!-- ./col -->
        	</div>
        	<div class="col-md-12 mt-5">
        		<table class="table table-bordered" id="searchtable" style="overflow-x: auto;">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Tên khách hàng</th>
				      <th scope="col">Số điện thoại</th>
				      <th scope="col">Email</th>
				      <th scope="col">Ngày đặt</th>
				      <th scope="col">Thành tiền</th>
				      <th scope="col">Trạng thái</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	
				    <tr>
				      <th scope="row"></th>
				      <td>@</td>
				      <td>
				      	<a href="admin/order/chitiet/" class="btn btn-default"><i class="fa fa-pen"></i></a>
				      	<a href="admin/order/huy/" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
				      </td>
				    </tr>

				  </tbody>
				</table>
        	</div>
        	
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->
@endsection