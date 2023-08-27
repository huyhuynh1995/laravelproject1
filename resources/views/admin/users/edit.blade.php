@extends('layouts.admin')
@section('title','Users')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if($errors->any())
        <ul class="alert alert-warning">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    	<div class="card">
    		<div class="card-header">
    			<h3> Sửa thông tin thành viên <a href="{{ url('admin/users') }}" class="btn btn-primary btn-sm text-white float-end">Danh sách thành viên</a></h3>
    		</div>
    		<div class="card-body">
                <form action="{{ url('admin/users/'.$user->id.'/update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Tên</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Select Role</label>
                            <select name="role_as" id="" class="form-control">
                                <option value="">--Chọn--</option>
                                <option value="0" {{ $user->role_as == 0 ? 'selected':'' }}>Khách hàng</option>
                                <option value="1" {{ $user->role_as == 1 ? 'selected':'' }}>Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection