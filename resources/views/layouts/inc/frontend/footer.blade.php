<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">HNH Shop</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Cửa hàng chúng tôi kinh doanh các loại đồng hồ treo tương, đồng hồ thông minh.
                        Sản phẩm chính hãng, giá cả phù hợp với thị trương
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Giới thiệu</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trang chủ</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">Giới thiệu</a></div>
                    <div class="mb-2"><a href="{{ url('/contact-us') }}" class="text-white">Liên hệ</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    <!-- <div class="mb-2"><a href="" class="text-white">Sitemaps</a></div> -->
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">MUA SẮM</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="" class="text-white">Danh mục sản phẩm</a></div>
                    <div class="mb-2"><a href="" class="text-white">Sản phẩm Hot</a></div>
                    <div class="mb-2"><a href="" class="text-white">Sản phẩm mới</a></div>
                    <div class="mb-2"><a href="" class="text-white">Sản phẩm đặc biệt</a></div>
                    <div class="mb-2"><a href="" class="text-white">Thanh toán</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Thông tin liên hệ</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{ $appSetting->address ?? 'address' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'Phone number' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> hnhshop@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - Shop Demo. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        {{ $appSetting->phone1 ?? 'phone 1' }}
                        @if($appSetting->facebook)
                        <a href="{{ $appSetting->facebook }}"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($appSetting->twitter)
                        <a href="{{ $appSetting->twitter }}"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($appSetting->instagram)
                        <a href="{{ $appSetting->instagram }}"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($appSetting->youtube)
                        <a href="{{ $appSetting->youtube }}"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>