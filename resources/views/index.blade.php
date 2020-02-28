@extends('layouts.app', ['title' => 'Home'])

@section('content')

    <div class="section-xl section-hero section-shaped">
        <div class="shape shape-primary"></div>
        <div class="page-header">
            <div class="container">
                <div class="align-items-center py-lg">
                    <div class="row">
                        <div class="col-lg-7">
                        <!-- Image -->
                        </div>
                        <div class="col-lg-5 mb-5 mt--5">
                            <div class="card mr-4 ml-4">
                                <div class="card-title text-center font-weight-bold display-4 pt-4 pb-4 text-uppercase">
                                    Thông báo
                                </div>
                                <div class="card-body mt--6">
                                <div class="lead font-weight-bold"><a href="#">Trận đấu của bạn vào lúc 18h thứ 7 ngày 29 tháng 2 sắp diễn ra!</a></div>
                                <div class="lead font-weight-bold"><a href="#">Sân SCSC Chảo Lửa đang có khuyến mãi cực hot, xem ngay!</a></div>
                                <div class="lead font-weight-bold"><a href="#">Cần cáp kèo đá bóng? Tạo một đội mới ngay bây giờ</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control form-control-lg mt-4" placeholder="Search">
                </div>
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <div class="dropdown mt-4" id="ddSearch">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSearch" data-toggle="dropdown">
                        Sort by
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" type="button" value="1">Rating low to high</button>
                            <button class="dropdown-item" type="button" value="2">Rating high to low</button>
                            <button class="dropdown-item" type="button" value="3">Price low to high</button>
                            <button class="dropdown-item" type="button" value="4">Price high to low</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="container">
        <div class="row ml-1 mr-1">
            <div class="card col-custom-4 mr-2 mb-2 stadium">
                <div class="card-title pt-4 pb-4 stadium-name">
                    <div class="row ml-4 info-box">
                        <div class="font-weight-bold display-4">
                            Sân A
                        </div>
                        <div class="position-relative ml-5">
                            <div class="rating">
                                Đánh giá: 
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="like">
                                Đã được đặt: 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt--5">
                    <img class="card-custom-img" src="./argon/img/bgs/bg-1.jpg">
                </div>
            </div>
            <div class="card col-custom-4 mr-2 mb-2 stadium">
                <div class="card-title pt-4 pb-4 stadium-name">
                    <div class="row ml-4">
                        <div class="font-weight-bold display-4">
                            Sân A
                        </div>
                    </div>
                </div>
                <div class="card-body mt--5">
                    <img class="card-custom-img" src="./argon/img/bgs/bg-1.jpg">
                </div>
            </div>
            <div class="card col-custom-4 mr-2 mb-2 stadium">
                <div class="card-title pt-4 pb-4 stadium-name">
                    <div class="row ml-4">
                        <div class="font-weight-bold display-4">
                            Sân A
                        </div>
                    </div>
                </div>
                <div class="card-body mt--5">
                    <img class="card-custom-img" src="./argon/img/bgs/bg-1.jpg">
                </div>
            </div>
        </div>
    </div>
@endsection
