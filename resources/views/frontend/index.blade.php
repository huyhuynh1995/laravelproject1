@extends('layouts.app')

@section('title','Trang chủ HNH Shop')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  
  <div class="carousel-inner">
  	@foreach($sliders as $key => $slider)
	    <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
	    	@if($slider->image)
	    	<img src="{{ asset($slider->image) }}" class="d-block w-100" alt="slide">
	    	@endif
	     	{{--<div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {!! $slider->title !!}
                    </h1>
                    <p>
                        {!! $slider->description !!}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Mua ngay
                        </a>
                    </div>
                </div>
            </div>--}}
        </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="py-1 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>HNH SHOP</h2>
                <!-- <div class="underline"></div>
                <p>Cửa hàng HNH SHOP là một cửa hàng cung cấp các loại đồng hồ thông minh (smartwatch).<br>
                Sản phẩm được nhập chính hãng từ các thương hiệu lớn như Apple, Oppo...</p> -->
            </div>
        </div>
    </div>
</div>

<div class="py-1 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="underline"></div>
                <h4>Sản phẩm Hot
                    <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">Xem thêm >></a>
                </h4>
                <br>
                
            </div>
            
            <div class="col-md-12">
                @if($trendingProducts)
                <div class="owl-carousel owl-theme">
                    @foreach($trendingProducts as $product)
                        <div class="item">
                            <div class="product-card">

                                <div class="product-card-img">
                                    
                                    <label class="stock bg-danger">Mới</label>
                                    

                                    @if($product->productImages->count() >0)
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        <img class="imageProduct" src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
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
                                        <span class="original-price">{{ number_format($product->original_price) }} </span>
                                    </div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Thêm giỏ hàng</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        <a href="" class="btn btn1"> Xem chi tiết </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                  
                    @endforeach
                </div>
            
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không có sản phẩm nào được tìm thấy</h4>

                    </div>
                </div>
                @endif
            </div>
            
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="underline"></div>

                <h4>Sản phẩm mới
                    <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">Xem thêm >></a>
                </h4>
                <br>
            </div>

            
            <div class="col-md-12">
                @if($newArrivalsProducts)
                <div class="owl-carousel owl-theme">
                    @foreach($newArrivalsProducts as $product)
                        <div class="item">
                            <div class="product-card">

                                <div class="product-card-img">
                                    
                                    <label class="stock bg-danger">Mới</label>
                                    

                                    @if($product->productImages->count() >0)
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        <img class="imageProduct" src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
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
                                        <span class="original-price">{{ number_format($product->original_price) }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Thêm giỏ hàng</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        <a href="" class="btn btn1"> Xem chi tiết </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                  
                    @endforeach
                </div>
            
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không có sản phẩm nào được tìm thấy</h4>
                    </div>
                </div>
                @endif
            </div>
            
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="underline"></div>
                
                <h4>Sản phẩm đặc biệt
                    <a href="{{ url('featured-products') }}" class="btn btn-warning float-end">Xem thêm >></a>
                </h4>
                <br>
            </div>

            
            <div class="col-md-12">
                @if($newArrivalsProducts)
                <div class="owl-carousel owl-theme">
                    @foreach($newArrivalsProducts as $product)
                        <div class="item">
                            <div class="product-card">

                                <div class="product-card-img">
                                    
                                    <label class="stock bg-danger">New</label>
                                    

                                    @if($product->productImages->count() >0)
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        <img class="imageProduct" src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
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
                                        <span class="original-price">{{ number_format($product->original_price) }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Thêm giỏ hàng</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        <a href="" class="btn btn1"> Xem chi tiết </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                  
                    @endforeach
                </div>
            
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không có sản phẩm nào được tìm thấy</h4>
                    </div>
                </div>
                @endif
            </div>
            
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayTimeout:4000,
        autoplaySpeed:1500,
        dotsSpeed:1500,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>
@endsection