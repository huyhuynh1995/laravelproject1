@extends('layouts.app')

@section('title','Sản phẩm đặc biệt')
@section('content')
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Sản phẩm đặc biệt</h4>
                <div class="underline mb-4"></div>
            </div>

            
            
            @forelse($featuredProducts as $product)
            <div class="col-md-3">
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
            @empty
            <div class="col-md-12 p-2">
                <h4>Không có sản phẩm nào được tìm thấy</h4>
            </div>
            @endforelse
            <div class="text-center">
                <a href="{{ url('collections') }}" class="btn btn-warning px-3">Xem thêm</a>
            </div>
            
            
        </div>
    </div>
</div>

@endsection