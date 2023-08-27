@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    	<div class="card">
    		<div class="card-header">
    			<h3> Thêm Màu <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm text-white float-end">Bảng màu</a></h3>
    		</div>
    		<div class="card-body">
                <form action="{{ url('admin/colors') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Màu: </label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Code: </label>
                        <input type="text" name="code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Trạng thái: </label><br>
                        <input type="checkbox" name="status" style="width: 10px; height:30px;"> : (Checked = "Tạm ngưng", Không Check = "Kích hoạt")
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection