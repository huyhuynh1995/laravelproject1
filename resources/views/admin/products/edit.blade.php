@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
    	<div class="card">
    		<div class="card-header">
    			<h3> Sửa Sản phẩm <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Tất cả sản phẩm</a></h3>
    		</div>
    		<div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Thông tin</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">SEO Tags</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Giá</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false" >Ảnh sản phẩm</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" >Color</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="mb-3">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Tên Sản Phẩm</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Thương hiệu</label>
                            <select name="brand" class="form-control">
                                @foreach($brands as $brand)
                                <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':'' }}>
                                    {{ $brand->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Mô tả ngắn</label>
                            <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Mô tả</label>
                            <textarea name="description" class="form-control" rows="8">{{ $product->description }}</textarea>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                        <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                          <div class="row">
                               <div class="col-md-4">
                                   <div class="mb-3">
                                       <label for="">Giá gốc</label>
                                       <input type="text"  name="original_price" class="form-control" value="{{ $product->original_price }}">
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="mb-3">
                                       <label for="">Giá bán</label>
                                       <input type="text"  name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="mb-3">
                                       <label for="">Số lượng</label>
                                       <input type="number"  name="quantity" class="form-control" value="{{ $product->quantity }}">
                                   </div>
                               </div> 
                               <div class="col-md-4">
                                   <div class="mb-3">
                                       <label for="">Trending</label>
                                       <input type="checkbox"  name="trending"  {{ $product->trending == '1' ? 'checked':'' }}>: (Checked = "sản phẩm trend", Không Check = "sp bình thường")
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="mb-3">
                                       <label for="">Featured</label>
                                       <input type="checkbox"  name="featured"  {{ $product->featured == '1' ? 'checked':'' }}>: (Checked = "sản phẩm đặc biệt", Không Check = "sp bình thường")
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="mb-3">
                                       <label for="">Trạng thái</label>
                                       <input type="checkbox"  name="status"  {{ $product->status == '1' ? 'checked':'' }}>: (Checked = "tạm dừng bán", Không Check = "Kích hoạt")
                                   </div>
                               </div>  
                           </div>
                      </div>
                      <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                        <div class="mb-3">
                            <label for="">Upload Ảnh</label>
                            <input type="file" name="image[]" multiple class="form-control">
                        </div>
                        <div>
                            @if($product->productImages)
                            <div class="row">
                                @foreach($product->productImages as $image)
                                <div class="col-md-2">
                                    <img src="{{ asset($image->image) }}" alt="" width="80px" height="80px" class="me-4 border">
                                    <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Xóa</a>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <h5>Không có hình ảnh để hiển thị</h5>
                            @endif
                        </div>
                        
                      </div>
                      <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" tabindex="0">
                        <div class="mb-3">
                            <h4>Thêm Số Lượng + Màu</h4>
                            <label for="">Màu: </label>
                            <div class="row">
                                @forelse($colors as $color)
                                <div class="col-md-3">
                                    <div class="p-2 border mb-2">
                                        Màu : <input type="checkbox" name="colors[{{ $color->id }}]" value="{{ $color->id }}"> {{ $color->name }}
                                        <br>
                                        Số lượng : <input type="number" name="colorquantity[{{ $color->id }}]" style="border: 1px solid; width: 70px; ">
                                    </div>
                                    
                                </div>
                                @empty
                                <div class="col-12">Không thể chọn màu</div>
                                @endforelse
                                
                                
                            </div>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-border">
                               <thead>
                                   <tr>
                                       <th>Màu</th>
                                       <th>Số lượng</th>
                                       <th>Xóa</th>
                                   </tr>
                               </thead> 
                               <tbody>
                                @foreach($product->productColors as $prodColor)
                                <tr class="prod-color-tr">
                                    @if($prodColor->color)
                                   <td>{{ $prodColor->color->name }}</td>
                                   @else
                                   <td>Sản phẩm này không được chọn màu</td>
                                   @endif
                                   <td>
                                       <div class="input-group mb-3" style="width: 150px;">
                                           <input type="text" class="form-control-sm productColorQuantity" value="{{ $prodColor->quantity }}" style="width: 50px;margin-right:10px">
                                           <button type="button" class="btn btn-primary btn-sm text-white updateProductColorBtn" value=" {{ $prodColor->id }}">
                                               Cập nhật
                                           </button>
                                       </div>
                                   </td>
                                   <td>
                                       <button type="button" class="btn btn-danger btn-sm text-white deleteProductColorBtn" value=" {{ $prodColor->id }}">
                                               Xóa
                                           </button>
                                   </td>
                               </tr>
                                @endforeach
                                   
                               </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-end">Cập nhật</button>
                    </div>  
                </form>
                 
                  
    		</div>
    	</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $(document).on('click','.updateProductColorBtn', function(){
            var product_id = "{{ $product->id }}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            // alert(prod_color_id);

            if(qty <= 0){
                alert('Số lượng nhập phải lớn hơn 0');
                return false;
            }

            var data = {
                'product_id' : product_id,
                'prod_color_id' : prod_color_id,
                'qty' : qty
            };

            $.ajax({
                type: "POST",
                url: "/admin/product-color/"+prod_color_id,
                data: data,
                success: function(response){
                    alert(response.message)
                }
            });
            
        });

        $(document).on('click','.deleteProductColorBtn', function(){
            var prod_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                url: '/admin/product-color/'+prod_color_id+'/delete',
                type: 'GET',
                success: function(response){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message);
                }
            });
            
    });
});
</script>
@endsection