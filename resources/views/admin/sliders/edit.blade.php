@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    	<div class="card">
    		<div class="card-header">
    			<h3> Sửa Slide <a href="{{ url('admin/sliders/') }}" class="btn btn-danger btn-sm text-white float-end">Danh sách Slider</a></h3>
    		</div>
    		<div class="card-body">
                <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Tiêu đề: </label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Mô tả: </label>
                        <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Ảnh Slide: </label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset($slider->image) }}" alt="" width="50px" height="50px">
                    </div>
                    <div class="mb-3">
                        <label for="">Trạng thái: </label><br>
                        <input type="checkbox" name="status" style="width: 10px; height:30px;" {{ $slider->status == '1' ? 'checked':'' }} >: (Checked = "tạm dừng", UnChecked = "Kích hoạt")
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection