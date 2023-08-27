<div>
    <div class="py-3 py-md-5 ">
        <div class="container">
            {{--@if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif --}}
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if($product->productImages)
                        {{--<img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">--}}
                        <div class="exzoom" id="exzoom">
                          <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach($product->productImages as $itemImg)
                                <li><img src="{{ asset($itemImg->image) }}"/></li>
                                @endforeach
                            </ul>
                          </div>
                          
                          <div class="exzoom_nav"></div>
                          <!-- Nav Buttons -->
                          <p class="exzoom_btn">
                              <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                              <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                          </p>
                        </div>
                        @else
                            No Image
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                            
                        </h4>
                        <hr>
                        <p class="product-path">
                            Trang chủ / {{ $product->category->name }} / {{ $product->name }} 
                        </p>
                        <div>
                            <span class="selling-price">{{ number_format($product->selling_price) }} VND</span>
                            <span class="original-price">{{ number_format($product->original_price) }} VND</span>
                        </div>
                        <div>
                            @if($product->productColors->count() > 0)
                                @if($product->productColors)
                                    @foreach($product->productColors as $colorItem)
                                    {{--<input type="radio" name="colorSelection" value="{{ $colorItem->id }}">{{ $colorItem->color->name }} --}}
                                    <label class="colorSelectionLabel" style="width:50px;border:solid 1px black;border-radius:5px ;cursor: pointer;text-align: center;background-color: {{ $colorItem->color->code }}" wire:click="colorSelected({{ $colorItem->id }})">
                                        {{ $colorItem->color->name }}
                                    </label>
                                    @endforeach
                                @endif
                                <div>
                                    @if($this->prodColorSelectedQuantity == 'outofStock')
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">{{ $this->prodColorSelected }} : Hết hàng</label>
                                    @elseif($this->prodColorSelectedQuantity > 0)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">{{ $this->prodColorSelected }} : Còn hàng</label>
                                    @endif
                                </div>
                            @else
                                @if($product->quantity)
                                <label class="btn-sm py-1 mt-2 text-white bg-success">Còn hàng</label>
                                @else
                                <label class="btn-sm py-1 mt-2 text-white bg-danger">Hết hàng</label>
                                @endif
                            @endif

                            
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button>
                            <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn1">
                                 <span wire:loading.remove>  
                                    <i class="fa fa-heart"></i> Thêm vào danh sách yêu thích 
                                 </span> 
                                 <span wire:loading wire:target="addToWishList">Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Mô tả ngắn: </h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Mô tả: </h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>Sản phẩm cùng danh mục</h3>
                    <div class="underline"></div>

                </div>
                @forelse($category->relatedProducts as $product)
                <div class="col-md-3 mb-3">
                    <div class="product-card">

                        <div class="product-card-img">
                            
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
                                <a href="" class="btn btn1"> Xem chi tiết </a>
                            </div>
                        </div>
                    </div>
                </div>  
                @empty
                <div class="col-md-12 p-2">
                    <h4>Không có sản phẩm nào được tìm thấy</h4>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function(){

      $("#exzoom").exzoom({

        // thumbnail nav options
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,

        // autoplay
        "autoPlay": false,

        // autoplay interval in milliseconds
        "autoPlayTimeout": 2000
        
      });

    });
</script>
@endpush
