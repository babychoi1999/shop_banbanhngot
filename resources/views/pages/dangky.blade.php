@extends('layout.index')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="trangchu">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="dangky" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						
						<div class="space20">@if(count($errors)>0)
				  			<div class="alert alert-warning">
				  				@foreach($errors->all() as $err)
				  					{{$err}}<br>
				  				@endforeach
				  			</div>
				  		@endif
				  		@if(session('thongbao'))
				  			<div class="alert alert-success">
				  				{{session('thongbao')}}
				  		@endif&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Họ tên*</label>
							<input type="text" id="your_last_name" name="name" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" placeholder="Số nhà, tên đường,..." name="address" required>
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập mật khẩu*</label>
							<input type="password" id="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu*</label>
							<input type="password" id="phone" name="passwordagain"  required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
