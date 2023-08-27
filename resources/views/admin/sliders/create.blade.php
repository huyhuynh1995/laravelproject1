@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    	<div class="card">
    		<div class="card-header">
    			<h3> Thêm Slide <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm text-white float-end">Danh sách Slider</a></h3>
    		</div>
    		<div class="card-body">
                <form action="{{ url('admin/sliders') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Tiêu đề: </label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Mô tả: </label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Ảnh Slide: </label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Status: </label><br>
                        <input type="checkbox" name="status" style="width: 10px; height:30px;">: (Checked = "tạm dừng", UnChecked = "Kích hoạt")
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