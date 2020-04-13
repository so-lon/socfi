@extends('layouts.app', ['title' => 'Home'])

@section('css')
    <link type="text/css" href="{{ asset('argon') }}/css/home.css" rel="stylesheet">
@endsection

@section('content')

<main style="padding-top: 80px;">
    <!-- Render search form -->
    <section class="hero-home">
        <!-- BEGIN Slider -->
        <div class="swiper-container hero-slider swiper-container-fade swiper-container-horizontal">
            <div class="swiper-wrapper">
                <div style="background-image:url(https://www.sporta.vn/assets/homepage-ab89703beff84161067b3bcce48d7be39f31b067e5f7219f98e631596ca8b83c.jpg)"
                    class="swiper-slide w-100"></div>
            </div>
        </div>
        <!-- END Slider -->
    </section>

    <!-- Render introdution -->
    <section class="py-6 bg-gray-100">
        <div class="container">
            <div class="text-center pb-lg-4">
                <h2>Tại sao lại cần Socfi</h2>
                <p class="subtitle text-secondary">Nền tảng đặt sân - tìm đối đầu tiên tại Việt Nam</p>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3 mb-lg-0 text-center">
                    <div class="px-0 px-lg-3">
                        <div class="icon-rounded bg-primary-light mb-3">
                            <img class="icon-image"
                                src="https://www.sporta.vn/assets/info-b35871504f4af944c9e1f28c2419d2df5ee8fa2dcab47d650aa94d4c054eaa9a.svg"
                                alt="Info" />
                        </div>
                        <h3 class="h5">Tìm kiếm và đặt sân bóng online</h3>
                        <p class="text-muted">Địa điểm, giá sân, giờ mở cửa,... các sân bóng trong khu vực gần nơi bạn
                            ở.
                            Lựa chọn sân gần vị trí của bạn nhất, đặt sân online, tiện lợi, dễ dàng</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0 text-center">
                    <div class="px-0 px-lg-3">
                        <div class="icon-rounded bg-primary-light mb-3">
                            <img class="icon-image"
                                src="https://www.sporta.vn/assets/book-d9bc1eefa8ffc1c1a130292a3714a9565f07b44eda536fe02456b2a55ba5af1b.svg"
                                alt="Book" />
                        </div>
                        <h3 class="h5">Công cụ quản lý sân bóng online</h3>
                        <p class="text-muted">Quản lý lịch đặt đơn giản, tiếp nhận đặt sân online dễ dàng, lấp đầy sân
                            trống</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0 text-center">
                    <div class="px-0 px-lg-3">
                        <div class="icon-rounded bg-primary-light mb-3">
                            <img class="icon-image"
                                src="https://www.sporta.vn/assets/pr-5099167e7f25e00100225c9db1dbd0fb96c51c1dd95fd7e2e9f90d5a3186c985.svg"
                                alt="Pr" />
                        </div>
                        <h3 class="h5">Tạo đội, tìm đối dễ với mobile app</h3>
                        <p class="text-muted">
                            <div>
                                <a href="https://apple.co/2TaO0x3"><img style="width: 150px"
                                        src="https://www.sporta.vn/assets/icon-appstore-0ac658e90248e413db2bdc584e50b25b06a8229f6a74efb816b93194d0491829.svg"
                                        alt="Icon appstore" /></a>
                                <a href="https://bit.ly/sporta-capkeo-android"><img style="width: 150px"
                                        src="https://www.sporta.vn/assets/icon-googleplaystore-87014b724e646f2c8dce71506e67424975dd3f81a59b3e8f356ce501a0c6e458.svg"
                                        alt="Icon googleplaystore" /></a>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Render featured venues -->
    <section class="py-6 bg-white">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8">
                    <p class="subtitle text-primary">Địa điểm hàng đầu</p>
                    <h2>Hơn 500 sân bóng trên toàn quốc</h2>
                </div>
                <div class="col-md-4 d-lg-flex align-items-center justify-content-end"><a
                        href="/dat-san-online?begin_time=19%3A00&amp;city_id=50&amp;date=Th%E1%BB%A9+Ba%2C+14%2F04%2F2020&amp;input_type=string&amp;search_string="
                        class="text-muted text-sm">
                        Xem tất cả sân bóng<i class="fas fa-angle-double-right ml-2"></i></a></div>
            </div>
            <div class="row">
                <div class="swiper-container guides-slider">
                    <!-- Additional required wrapper-->
                    <div class="swiper-wrapper pb-5">
                        <!-- Slides-->
                        <div class="swiper-slide h-auto px-2">
                            <div class="card card-poster gradient-overlay mb-4 mb-lg-0">
                                <a href="/dat-san-online?begin_time=19%3A00&amp;city_id=50&amp;date=14%2F04%2F2020&amp;district_ids%5B%5D=561&amp;input_type=string&amp;search_string="
                                    class="tile-link"></a>
                                <img src="https://www.sporta.vn/assets/default_venue_0_thumb-995c078310396509033b1fef37b5125bfd385539ec1038a4f1b1b087c02585d2.jpg"
                                    alt="Card image" class="bg-image" />
                                <div class="card-body overlay-content">
                                    <h6 class="card-title text-white text-uppercase">Quận 2</h6>
                                    <p class="card-text text-sm">Các sân bóng tại Quận 2</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto px-2">
                            <div class="card card-poster gradient-overlay mb-4 mb-lg-0">
                                <a href="/dat-san-online?begin_time=19%3A00&amp;city_id=50&amp;date=14%2F04%2F2020&amp;district_ids%5B%5D=552&amp;input_type=string&amp;search_string="
                                    class="tile-link"></a>
                                <img src="https://www.sporta.vn/assets/default_venue_0_thumb-995c078310396509033b1fef37b5125bfd385539ec1038a4f1b1b087c02585d2.jpg"
                                    alt="Card image" class="bg-image" />
                                <div class="card-body overlay-content">
                                    <h6 class="card-title text-white text-uppercase">Quận 1</h6>
                                    <p class="card-text text-sm">Các sân bóng tại Quận 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto px-2">
                            <div class="card card-poster gradient-overlay mb-4 mb-lg-0">
                                <a href="/dat-san-online?begin_time=19%3A00&amp;city_id=50&amp;date=14%2F04%2F2020&amp;district_ids%5B%5D=553&amp;input_type=string&amp;search_string="
                                    class="tile-link"></a>
                                <img src="https://www.sporta.vn/assets/default_venue_1_thumb-a447956d615cc7958aad7fdf48447dc77cafa2caccbf8fb7ad1099d6b8f8cd4f.jpg"
                                    alt="Card image" class="bg-image" />
                                <div class="card-body overlay-content">
                                    <h6 class="card-title text-white text-uppercase">Quận 12</h6>
                                    <p class="card-text text-sm">Các sân bóng tại Quận 12</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto px-2">
                            <div class="card card-poster gradient-overlay mb-4 mb-lg-0">
                                <a href="/dat-san-online?begin_time=19%3A00&amp;city_id=50&amp;date=14%2F04%2F2020&amp;district_ids%5B%5D=554&amp;input_type=string&amp;search_string="
                                    class="tile-link"></a>
                                <img src="https://www.sporta.vn/assets/default_venue_2_thumb-d99ddb967aa09cfaa59665023ac2df740f69adf72552fbfe3e529f010ec106b5.jpg"
                                    alt="Card image" class="bg-image" />
                                <div class="card-body overlay-content">
                                    <h6 class="card-title text-white text-uppercase">Quận Thủ Đức</h6>
                                    <p class="card-text text-sm">Các sân bóng tại Quận Thủ Đức</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto px-2">
                            <div class="card card-poster gradient-overlay mb-4 mb-lg-0">
                                <a href="/dat-san-online?begin_time=19%3A00&amp;city_id=50&amp;date=14%2F04%2F2020&amp;district_ids%5B%5D=555&amp;input_type=string&amp;search_string="
                                    class="tile-link"></a>
                                <img src="https://www.sporta.vn/assets/default_venue_0_thumb-995c078310396509033b1fef37b5125bfd385539ec1038a4f1b1b087c02585d2.jpg"
                                    alt="Card image" class="bg-image" />
                                <div class="card-body overlay-content">
                                    <h6 class="card-title text-white text-uppercase">Quận 9</h6>
                                    <p class="card-text text-sm">Các sân bóng tại Quận 9</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination d-md-none"> </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Render Business Promotion -->
    <section class="py-6 position-relative dark-overlay">
        <img alt="" class="bg-image"
            src="https://www.sporta.vn/assets/handshake-ab7c15c813a3b0c5d04bce44da3f7601ea9a7fbdbdd54496b3fb0c6088539d53.jpg" />
        <div class="container">
            <div class="overlay-content text-white py-lg-5">
                <h3 class="display-3 font-weight-bold text-serif text-white mb-4 text-primary">Hợp tác với Socfi</h3>
                <h4 class="text-white">Bạn là chủ sân? Bạn lo lắng khi sân còn trống? Sporta hỗ trợ bạn lấp đầy lịch đặt sân với chi phí
                    thấp nhất!</h4>
                <a href="/quan-ly-san-bong" class="btn btn-light">Tìm hiểu ngay</a>
            </div>
        </div>
    </section>

    <!-- Render Customer Feedback -->
    <section class="py-7">
        <div class="container">
            <div class="text-center">
                <p class="subtitle text-primary">KHÁCH HÀNG CỦA SOCFI
                </p>
                <h2 class="mb-5">Tham gia cộng đồng người yêu thích thể thao lớn nhất Việt Nam
                </h2>
            </div>
            <!-- Slider main container-->
            <div class="swiper-container testimonials-slider testimonials">
                <!-- Additional required wrapper-->
                <div class="swiper-wrapper pt-2 pb-5">
                    <!-- Slides-->
                    <div class="swiper-slide px-3">
                        <div class="testimonial card rounded-lg shadow border-0 max-height-300">
                            <div class="testimonial-avatar"><img class="img-fluid"
                                    src="https://www.sporta.vn/assets/long-review-d030c9c641f6a894b76ea47ad281250d964a165b958783f4905ebf425a6bb0b6.jpg"
                                    alt="Long review" /></div>
                            <div class="text">
                                <div class="testimonial-quote"><i class="fas fa-quote-right"></i></div>
                                <p class="testimonial-text">Tính năng hữu ích, hỗ trợ tôi quản lý sân hiệu quả hơn.
                                    Doanh thu cũng tăng lên rõ rệt. Không còn tình trạng trống sân.</p>
                                <strong>Anh Trịnh Đình Long</strong><br>
                                -<i> Chủ sân bóng đá ĐH Nông Lâm </i>-
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide px-3">
                        <div class="testimonial card rounded-lg shadow border-0 max-height-300">
                            <div class="testimonial-avatar"><img class="img-fluid"
                                    src="https://www.sporta.vn/assets/vuong-review-aa4f551f8f5ea328445905580645813f36e0e28745c97360531392f1aa17d1c2.jpg"
                                    alt="Vuong review" /></div>
                            <div class="text">
                                <div class="testimonial-quote"><i class="fas fa-quote-right"></i></div>
                                <p class="testimonial-text">Ứng dụng hữu ích thích hợp với anh em mê bóng đá. Giá cả và
                                    điều kiện sân bãi rõ ràng.</p>
                                <strong>Nguyễn Minh Vương</strong><br>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide px-3">
                        <div class="testimonial card rounded-lg shadow border-0 max-height-300">
                            <div class="testimonial-avatar"><img class="img-fluid"
                                    src="https://www.sporta.vn/assets/cuong-review-612aefdf1e6c64211a1e800cd35e2e129e2a4489a94770fd87e297924c2ae117.jpg"
                                    alt="Cuong review" /></div>
                            <div class="text">
                                <div class="testimonial-quote"><i class="fas fa-quote-right"></i></div>
                                <p class="testimonial-text">Hữu ích, tiện lợi cho mọi người!!!</p>
                                <strong>Trần Thế Cường</strong><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"> </div>
            </div>
        </div>
    </section>

    <!-- Render Partner Infomation -->
    <section class="py-5 bg-gray-100">
        <div class="container">
            <div class="text-center pb-lg-4">
                <p class="subtitle text-secondary">Đối tác của Sporta</p>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 mb-3 mb-lg-0 text-center">
                    <img style="height: 80px;"
                        src="https://www.sporta.vn/assets/aws_logo_smile-c908fff7ab650682956b6d2f3f0b6826bb6858a2f5284d40f3096b0989bd819b.png"
                        alt="Aws logo smile" />
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0 text-center">
                    <p class="text-center"><a target="_blank" href="http://foba.vn?ref=sporta.vn"><img
                                style="height: 80px;"
                                src="https://www.sporta.vn/assets/partner-foba-28c304bfc78cb9e6db30325a928c9fe63e6b5bec2c120bb4a80be0cf7984ff37.jpg"
                                alt="Partner foba" /></a></p>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0 text-center">
                    <img style="height: 80px;"
                        src="https://www.sporta.vn/assets/linode-logo-b4012044bb9fc4f2215ba974e0ea576605a05db4634560d72c15629ccffde651.svg"
                        alt="Linode logo" />
                </div>
            </div>
        </div>
    </section>


    <!--Modal Structure-->
    <div class="modal fade" id="mobile-app-intro-popup">
        <div class="modal-content apps-intro modal-dialog modal-lg">
            <div><button aria-label="Close" class="close" data-dismiss="modal" style="padding: 10px" type="button"><span
                        aria-hidden="true"> &times;</span></button></div>
            <div class="apps-intro-header">
                <h4 class="apps-intro-header__logo">Sporta</h4>
                <h5 class="apps-intro-header__desc">Kết nối cộng đồng những người chơi đá bóng khắp thế giới</h5>
                <div class="apps-intro-header__apps">
                    <div class="apps-btn"><a class="apps-btn__icon" href="https://apple.co/2TaO0x3"><img
                                alt="icon-appstore.svg"
                                src="https://www.sporta.vn/assets/icon-appstore-0ac658e90248e413db2bdc584e50b25b06a8229f6a74efb816b93194d0491829.svg" /></a><a
                            class="apps-btn__icon apps-btn__icon--right"
                            href="https://bit.ly/sporta-capkeo-android"><img alt="icon-appstore.svg"
                                src="https://www.sporta.vn/assets/icon-googleplaystore-87014b724e646f2c8dce71506e67424975dd3f81a59b3e8f356ce501a0c6e458.svg" /></a>
                    </div>
                </div>
            </div>
            <div class="spacing">
                <p class="spacing__arrow-down"><i aria-hidden="true" class="fa fa-chevron-down"></i></p>
            </div>
            <div class="apps-intro-body">
                <div class="apps-intro-body__slide-wrapper">
                    <div class="apps-intro-body__slide">
                        <div class="item app-items">
                            <div class="img img-1 app-items__img"><img alt="popup1.png"
                                    src="https://www.sporta.vn/assets/popup1-ca68022116eb5f627d5d0c1b533b28571e676c5e61be96766dd8b1fe021b2726.png" />
                            </div>
                        </div>
                        <div class="item app-items">
                            <div class="img img-2 app-items__img"><img alt="popup2.png"
                                    src="https://www.sporta.vn/assets/popup2-f96c2c9eda9a5fc80897c6c8b7863a16ea8a39a1813d237cf7035b58aef460e9.png" />
                            </div>
                        </div>
                        <div class="item app-items">
                            <div class="img img-3 app-items__img"><img alt="popup3.png"
                                    src="https://www.sporta.vn/assets/popup3-21bccd9aaf0925459f7c4788281370b409b9ca871600ebb64cffb9ce77160ecf.png" />
                            </div>
                        </div>
                        <div class="item app-items">
                            <div class="img img-4 app-items__img"><img alt="popup4.png"
                                    src="https://www.sporta.vn/assets/popup4-b5a16898bb239e28f39c5cbbc9347abbf254aac6b057354f2a337a785eefb68c.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
