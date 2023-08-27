@extends('layouts.admin')
@section('content')
	<div class="row">
        <div class="col-md-12 grid-margin">
          
              @if(session('message'))
                <h3>{{ session('message') }}</h3>
              @endif
              <div class="mb-md-3 me-xl-5">
                <h2>Chào HuyHuynh trở lại,</h2>
                <p class="mb-md-0">Trang Admin</p>
                <hr>
              </div>
              <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Bảng thống kê&nbsp;/&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">Bảng thống kê</p>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                  <label for="">Số thành viên</label>
                  <!-- <h1>{{ $totalUser }}</h1> -->
                  <h1>10</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">Xem thêm</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                  <label for="">Số sản phẩm</label>
                  <!-- <h1>{{ $totalProducts }}</h1> -->
                  <h1>17</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">Xem thêm</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                  <label for="">Số đơn hàng tháng này</label>
                  <!-- <h1>{{ $thisMonthOrder }}</h1> -->
                  <h1>45</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">Xem thêm</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                  <label for="">Số đơn hàng hôm nay</label>
                  <!-- <h1>{{ $todayOrder }}</h1> -->
                  <h1>2</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">Xem thêm</a>
                </div>
              </div>
            </div>
          
        </div>
    </div>

@endsection