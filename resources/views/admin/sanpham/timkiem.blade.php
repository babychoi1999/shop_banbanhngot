@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 284px;">
 <!-- Main content -->
  @include('admin.layout.content_header',['name'=>'Products','key'=>'Search'])
      <div class="container-fluid">
       <hr class="dashed">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	<div class="col-md-12">
        		<div class="main" style="float: left;">
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
				  <tbody @if($display == "block") class="d-none" @endif><th class="text-center" colspan="10"><small><i class="fa fa-search mr-1"></i></small> Product not found...</th></tbody>
				  <tbody @if($display == "none") class="d-none" @endif>

				  		@foreach($product as $product)
				    <tr>
				      <th scope="row">{{$product->id}}</th>
				      <td>{{$product->name}}</td>
				      <td>{{$product->id_type}}</td>
				      <td>{{$product->description}}</td>
				      <td>{{$product->unit_price}}</td>
				      <td>{{$product->promotion_price}}</td>
				      <td><img src="front/image/product/{{$product->image}}" alt="Not available" width="200px"></td>
				      <td>{{$product->unit}}</td>
				      <td>{{$product->new}}</td>
				      <td>
				      	<a href="admin/sanpham/sua/{{$product->id}}" class="btn btn-default"><i class="fa fa-pen">Edit</i></a>
				      	<a href="admin/sanpham/xoa/{{$product->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash">Delete</i></a>
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
@endsection
