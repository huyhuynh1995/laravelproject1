@extends('layouts.app')

@section('title','Tìm Sản Phẩm')
@section('content')
<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4>Kết quả tìm kiếm</h4>
                <div class="underline mb-4"></div>
            </div>

            
            
            @forelse($searchProducts as $product)
            <div class="col-md-10">
                <div class="product-card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-card-img">
                            
                                <label class="stock bg-danger">Mới</label>
                                

                                @if($product->productImages->count() >0)
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    <img class="imageProduct" src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                                </a>
                                @endif
                                
                                
                            </div>
                        </div>
                        <div class="col-md-9">
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
                                <p style="height:45px; overflow:hidden">
                                    <b>Mô tả: </b> {!! $product->small_description!!}
                                </p>
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="btn btn-outline-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @empty
            <div class="col-md-12 p-2">
                <h4>Không có sản phẩm nào được tìm thấy</h4>
            </div>
            @endforelse
            <div class="col-md-10">
                {!! $searchProducts->appends(request()->input())->links() !!}
            </div>
            
            
        </div>
    </div>
</div>

@endsection