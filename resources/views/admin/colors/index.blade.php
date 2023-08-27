@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    	<div class="card">
    		<div class="card-header">
    			<h3> Bảng Màu <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm text-white float-end">Thêm màu</a></h3>
    		</div>
    		<div class="card-body">
                <table class="table table-striped table-border">
                    <thead>
                        <tr>
                            <th>Màu</th>
                            <th>Code</th>
                            <th>Trạng thái</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($colors as $color)
                        <tr>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <td>{{ $color->status == '1' ? 'Tạm ngưng':'Đã kích hoạt' }}</td>
                            <td>
                                <a href="{{ url('admin/colors/'.$color->id.'/delete') }}">Xóa</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Không có màu nào để hiển thị</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                

            </div>
        </div>
    </div>
</div>
@endsection