@extends('layouts.admin')
@section('title','Users')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    	<div class="card">
    		<div class="card-header">
    			<h3> Thành viên <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm text-white float-end">Thêm thành viên</a></h3>
    		</div>
    		<div class="card-body">
                <table class="table table-bordered-table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role_as == 0)
                                <label for="" class="badge btn-primary">khách hàng</label>
                                @else
                                <label for="" class="badge btn-danger">admin</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-success btn-sm">Sửa</a>
                                <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Bạn có muốn xóa thành viên này ?')" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Không có thành viên nào được tìm thấy</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {!! $users->links() !!}
                </div>
    		</div>
    	</div>
    </div>
</div>
@endsection