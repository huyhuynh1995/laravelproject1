@extends('layouts.app')

@section('title','Đặt hàng thành công')
@section('content')
	<div class="py-3 pyt-md-4">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					@if(session('message'))
					<h5 class="alert alert-success">{{ session('message') }}</h5>
					@endif
					<div class="p-4 shadow bg-white">

						<h2>Cảm ơn bạn đã đặt hàng</h2>
						<h4>Thông tin đơn hàng đã được gửi vào Email của bạn</h4>
						<a href="{{ url('/') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
@endsection