@extends('layouts.app')

@section('title','Thông tin Khách Hàng')
@section('content')
<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>
                    Thông tin Khách hàng
                    <a href="{{ 'change-password' }}" class="btn btn-warning float-end">Đổi mật khẩu</a>
                    <br>
                    <br>
                </h4>
                <div class="underline mb-4"></div>
            </div>
            <div class="col-md-10">
                @if(session('message'))
                <p class="alert alert-success">{{ session('message') }}</p>
                @endif
                @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Thông tin Khách hàng</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Tên KH</label>
                                        <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Zip/Pin Code</label>
                                        <input type="text" name="pin_code" value="{{ Auth::user()->userDetail->pin_code ?? ''}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Địa chỉ</label>
                                        <textarea name="address" rows="3">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end" type="submit">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection