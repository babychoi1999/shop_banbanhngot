@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 284px;">
 <!-- Main content -->
  @include('admin.layout.content_header',['name'=>'Categories','key'=>'List'])
      <div class="container-fluid">
       <hr class="dashed">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	<div class="col-md-12">
          		<a href="admin/loaisanpham/them" class="btn btn-success float-right m-3">Add</a>
          	</div>
          	<div class="col-md-12">
				<table class="table table-bordered">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Description</th>
				      <th scope="col">Image</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($pType as $p)
				    <tr>
				      <th scope="row">{{$p->id}}</th>
				      <td>{{$p->name}}</td>
				      <td>{{$p->description}}</td>
				      <td><img src="front/image/product/{{$p->image}}" alt="Not available" width="200px"></td>
				      <td>
				      	<a href="admin/loaisanpham/sua/{{$p->id}}" class="btn btn-default"><i class="fa fa-pen">Edit</i></a>
				      	<a href="admin/loaisanpham/xoa/{{$p->id}}" class="btn btn-danger"><i class="fa fa-trash">Delete</i></a>
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