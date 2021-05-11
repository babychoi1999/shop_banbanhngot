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
            <div class="col-12">
                <a href="admin/loaisanpham/them" class="btn btn-success float-right m-3">Add</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Loại sản phẩm </h3>
                    </div>
                    <div class="card-body">
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
                                    <td><img class="rounded" src="front/image/product/{{$p->image}}" alt="Not available" width="200px"></td>
                                    <td style="white-space: nowrap;">
                                        <a href="admin/loaisanpham/sua/{{$p->id}}" class="btn btn-default"><i class="fa fa-pen"></i></a>
                                        <a href="admin/loaisanpham/xoa/{{$p->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
