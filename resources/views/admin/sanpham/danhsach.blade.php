@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 284px;">
 <!-- Main content -->
  @include('admin.layout.content_header',['name'=>'Products','key'=>'List'])
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
				</div>
        			<a href="admin/sanpham/them" class="btn btn-success float-right m-3">Add</a>
          	</div>
          	
          	<div class="col-md-12">
				<table class="table table-bordered" id="searchtable" style="overflow-x: auto;">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">id_type</th>
				      <th scope="col">Description</th>
				      <th scope="col">Unit_price</th>
				      <th scope="col">Promotion_price</th>
				      <th scope="col">Image</th>
				      <th scope="col">Unit</th>
				      <th scope="col">New</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($sanpham as $sp)
				    <tr>
				      <th scope="row">{{$sp->id}}</th>
				      <td>{{$sp->name}}</td>
				      <td>{{$sp->id_type}}</td>
				      <td>{{$sp->description}}</td>
				      <td>{{$sp->unit_price}}</td>
				      <td>{{$sp->promotion_price}}</td>
				      <td><img src="front/image/product/{{$sp->image}}" alt="Not available" width="150px"></td>
				      <td>{{$sp->unit}}</td>
				      <td>{{$sp->new}}</td>
				      <td>
				      	<a href="admin/sanpham/sua/{{$sp->id}}" class="btn btn-default"><i class="fa fa-pen"></i></a>
				      	<a href="admin/sanpham/xoa/{{$sp->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
          	</div>
				
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->
	</div>
@endsection