<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
           <div class="card">
               <div class="card-header">
                   <h4>Brand</h4>
               </div>
               <div class="card-body">
                @foreach($category->brands as $brand)
                   <label for="" class="d-block">
                       <input type="checkbox" wire:model="brandInputs" value="{{ $brand->name }}"> {{ $brand->name }}
                   </label>
               </div>
               @endforeach
           </div>
           @endif 

           <div class="card mt-3">
               <div class="card-header">
                   <h4>Giá</h4>
               </div>
               <div class="card-body">
                @foreach($category->brands as $brand)
                   <label for="" class="d-block">
                       <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low"> Cao đến thấp
                   </label>
                   <label for="" class="d-block">
                       <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high"> Thấp đến cao
                   </label>
               </div>
               @endforeach
           </div>
        </div>
        <div class="col-md-9">
            <div class="row">
             @forelse($products as $product)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($product->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">Out of Stock</label>
                            @endif

                            @if($product->productImages->count() >0)
                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                            </a>
                            @endif
                            
                            
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $product->brand }}</p>
                            <h5 class="product-name">
                               <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    {{ $product->name}} 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ number_format($product->selling_price) }} VND</span>
                                <span class="original-price">{{ number_format($product->original_price) }} VND</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Thêm giỏ hàng</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> xem chi tiết </a>
                            </div>
                        </div>
                    </div>
                </div>
             @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không có sản phẩm nào trong danh mục {{ $category->name }}</h4>
                    </div>
                </div>
            @endforelse 
            </div>
        </div>
    </div>
    
</div>
