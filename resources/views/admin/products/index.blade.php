@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    	<div class="card">
    		<div class="card-header">
    			<h3> Sản phẩm <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">Thêm sản phẩm</a></h3>
    		</div>
    		<div class="card-body">
                <table class="table table-bordered-table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Danh mục</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->category)
                                {{ $product->category->name }}
                                @else
                                    Không thuộc danh mục nào cả
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->selling_price) }} VND</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status == '1' ? 'tạm dừng bán':'Đã kích hoạt' }}</td>
                            <td>
                                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success btn-sm">Sửa</a>
                                <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Bạn có muốn xóa sản phẩm này ?')" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Không có sản phẩm nào được tìm thấy</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {!! $products->links() !!}
                </div>
    		</div>
    	</div>
    </div>
</div>
@endsection