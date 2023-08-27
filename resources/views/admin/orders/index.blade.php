@extends('layouts.admin')

@section('title','List Orders')
@section('content')
<div class="row">
      <div class="col-md-12">
        	<div class="card">
        		<div class="card-header">
        			<h3>Danh sách đơn hàng</h3>
        		</div>
        		<div class="card-body">

        			<form action="" method="GET">
        				<div class="row">
        					<div class="col-md-3">
        						<label for="">Chọn ngày</label>
        						<input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
        					</div>
        					<div class="col-md-3">
        						<label for="">Chọn theo trạng thái</label>
        						<select name="status" class="form-select">
        							<option value="">---Chọn trạng thái---</option>
        							<option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }}>Tiếp nhận đơn</option>
        							<option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }}>Hoàn thành</option>
        							<option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Chờ giao hàng</option>
        							<option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }}>Hủy đơn</option>
        							<option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Hết hàng</option>
        						</select>
        					</div>
        					<div class="col-md-6">
        						<br>
        						<button type="submit" class="btn btn-primary">Tìm</button>
        					</div>
        				</div>
        			</form>
        			<br>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<th>ID đơn hàng</th>
								<th>Mã đơn hàng</th>
								<th>Tên KH</th>
								<th>Phương thức thanh toán</th>
								<th>Ngày đặt hàng</th>
								<th>Trạng thái</th>
								<th>Xem</th>
							</thead>
							<tbody>
								@forelse($orders as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>{{ $item->tracking_no }}</td>
									<td>{{ $item->fullname }}</td>
									<td>{{ $item->payment_mode }}</td>
									<td>{{ $item->created_at->format('d-m-Y') }}</td>
									<td>{{ $item->status_message }}</td>
									<td><a href="{{ url('admin/order/'.$item->id) }}" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
								</tr>
								
								@empty
								<tr>
									<td colspan="7">Không có đơn hàng nào được tìm thấy</td>
								</tr>
								@endforelse
							</tbody>
						</table>
						<div>
							{{ $orders->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection