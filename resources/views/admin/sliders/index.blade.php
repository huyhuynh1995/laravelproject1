@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3> Danh sách Slide <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white float-end">Thêm Slide</a></h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-border">
                    <thead>
                        <tr>
                            
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Ảnh Slide</th>
                            <th>Trạng thái</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td>
                                <img src="{{ asset($slider->image) }}" style="width:70px;height:70px;" alt="">
                            </td>
                            <td>{{ $slider->status == '0' ? 'kích hoạt':'tạm dừng' }}</td>
                            <td>
                                <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-success">Sửa</a>
                                <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" onclick="return confirm('Bạn có muốn xóa Slide này ?')" class="btn btn-danger">Xóa</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                

            </div>
        </div>
    </div>
</div>
@endsection