@extends('layouts.admin')

@section('title','Chi tiết đơn hàng')
@section('content')
<div class="row">
   <div class="col-md-12">
   	@if(session('message'))
   	<div class="alert alert-success mb-3">{{ session('message') }}</div>
   	@endif
     	<div class="card">
     		<div class="card-header">
     			<h3>Đơn hàng</h3>
     		</div>
     		<div class="card-body">
				<div class="shadow bg-white p-3">
					<h4 class="text-primary">
						<i class="fa fa-shopping-cart text-dark"></i>Thông tin đơn hàng
						<a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end mx-1">Tất cả đơn hàng</a>
						<a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">Tải về</a>
						<a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning  float-end mx-1">Xem chi tiết</a>
						<a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" target="_blank" class="btn btn-info  float-end mx-1">Gửi Email</a>
					</h4>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h5>Chi tiết</h5>
							<hr>
							<h6>Id đơn hàng: {{ $order->id }}</h6>
							<h6>Mã đơn hàng: {{ $order->tracking_no }}</h6>
							<h6>Ngày đặt hàng: {{ $order->created_at->format('d:m:Y h:i A') }}</h6>
							<h6>Phương thức thanh toán: {{ $order->payment_mode }}</h6>
							<h6 class="border p-2 text-success">
								Trạng thái: <span class="text-uppercase">{{ $order->status_message }}</span>
							</h6>
						</div>
						<div class="col-md-6">
							<h5>Bên mua: </h5>
							<hr>
							<h6>Tên KH: {{ $order->fullname }}</h6>
							<h6>Email: {{ $order->email }}</h6>
							<h6>SĐT: {{ $order->phone }}</h6>
							<h6>Địa chỉ: {{ $order->address }}</h6>
							<h6>Pin code: {{ $order->pincode }}</h6>
						</div>
					</div>
					<br>
					<h5>Order Items</h5>
					<hr>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<th>ID</th>
								<th>Ảnh SP</th>
								<th>Sản phẩm</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Tổng cộng</th>
								
							</thead>
							<tbody>
								@php
									$totalPrice = 0;
								@endphp
								@foreach($order->orderItems as $orderItem)
								<tr>
									<td width="10%">{{ $orderItem->id }}</td>
									<td width="10%">
										@if($orderItem->product->productImages)
                                        <img src="{{ asset($orderItem->product->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                        @else
                                        <img src="" alt="" style="width: 50px; height: 50px">
                                        @endif
                                        
									</td>
									<td>
										{{ $orderItem->product->name }}
                                        @if($orderItem->productColor)
                                        
                                            @if($orderItem->productColor->color)
                                            <span style="padding-left:50px">
                                               Màu: {{ $orderItem->productColor->color->name }}
                                            </span>
                                            @endif
                                        
                                        @endif
									</td>
									<td width="10%">{{ number_format($orderItem->price) }}</td>
									<td width="10%">{{ $orderItem->quantity }}</td>
									<td class="fw-bold">{{ number_format($orderItem->price * $orderItem->quantity) }} VND</td>
									@php
										$totalPrice += $orderItem->price * $orderItem->quantity;
									@endphp
								</tr>
								@endforeach
								<tr>
									<td colspan="5" class="fw-bold">Tổng cộng: </td>
									<td class="fw-bold">{{ number_format($totalPrice) }} VND</td>
								</tr>
								
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
			<div class="card border mt-3">
				<div class="card-body">
				<h4>Cập nhật đơn hàng</h4>
				<hr>
				<div class="row">
					<div class="col-md-5">
						<form action="{{ url('admin/order/'.$order->id) }}" method="POST">
							@csrf
							@method('PUT')
							<label for="">Cập nhật trạng thái</label>
							<div class="input-group">
								<select name="order_status" class="form-select">
									<option value="">---Chọn trạng thái---</option>
        							<option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }}>Tiếp nhận</option>
        							<option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }}>Hoàn thành</option>
        							<option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Chờ giao hàng</option>
        							<option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }}>Đã hủy</option>
        							<option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Hết hàng</option>
								</select>
								<button type="submit" class="btn btn-primary text-white">Cập nhật</button>
							</div>
						</form>
					</div>
					<div class="col-md-7">
						<br>
						<!-- <h4 class="mt-3">Trạng thái hiện tại: <span class="text-uppercase">{{ $order->status_message }}</span></h4> -->
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection