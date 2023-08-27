@extends('layouts.admin')
@section('content')
	<div class="row">
        <div class="col-md-12">
        	<div class="card">
        		<div class="card-header">
        			<h4> Sửa danh mục <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Tất cả danh mục</a></h4>
        		</div>
        		<div class="card-body">
                    <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Danh mục</label>
                                <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                @error('name') <small class="text-danger">{{ $message }}</small>  @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Mô tả</label>
                                <textarea name="description" class="form-control"  rows="3" >{{$category->description}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Ảnh đại diện</label>
                                <input type="file" class="form-control" name="image">
                                <img src="{{ asset('/uploads/category/'.$category->image) }}" alt="" width="60px" height="60px">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Trạng thái</label>
                                <input type="checkbox"  name="status" {{ $category->status == '1' ? 'checked':'' }}> : (Checked = "Tạm ngưng", Không Check = "Kích hoạt")
                            </div>
                            <div class="col-md-6 mb-3">
                                <h4>SEO Tags</h4>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="3" >{{$category->meta_keyword}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" >{{$category->meta_description}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary float-end">UPDATE</button>
                            </div>
                        </div>
                        
                    </form>      
                </div>
        	</div>
        </div>
    </div>
@endsection