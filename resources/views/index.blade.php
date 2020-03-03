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
            <div class="col-lg-9">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control form-control-lg mt-4" placeholder="Tên sân bóng">
                </div>
            </div>
            <div class="col-lg-1">
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <div class="dropdown mt-4" id="ddSearch">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSearch" data-toggle="dropdown">
                        Sắp xếp theo
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" type="button" value="1">Đánh giá từ thấp đến cao</button>
                            <button class="dropdown-item" type="button" value="2">Đánh giá từ cao đến thấp</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="container">
        <div class="row ml-1 mr-1 mb-1 stadium">
            <div class="col-lg-3 m-auto">
                <img class="card-custom-img" src="./argon/img/bgs/bg-1.jpg">
            </div>
            <div class="col-lg-6 m-auto">
                <div class="pt-4 pb-4">
                    <div class="row m-auto">
                        <div class="font-weight-bold display-4">
                            Sân SCSC Chảo Lửa
                        </div>
                    </div>
                    <div class="row m-auto">
                        <div class="font-weight-bold display-5">
                            Địa chỉ: In elit labore consectetur.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 m-auto">
                <div class="rating">
                    Đánh giá: 
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                </div>
                <div class="like">
                    Đã được đặt: 2 lần
                </div>
            </div>
        </div>
        <div class="row ml-1 mr-1 mb-1 stadium">
            <div class="col-lg-3 m-auto">
                <img class="card-custom-img" src="./argon/img/bgs/bg-1.jpg">
            </div>
            <div class="col-lg-6 m-auto">
                <div class="pt-4 pb-4">
                    <div class="row m-auto">
                        <div class="font-weight-bold display-4">
                            Sân SCSC Chảo Lửa
                        </div>
                    </div>
                    <div class="row m-auto">
                        <div class="font-weight-bold display-5">
                            Địa chỉ: In elit labore consectetur.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 m-auto">
                <div class="rating">
                    Đánh giá: 
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                </div>
                <div class="like">
                    Đã được đặt: 2 lần
                </div>
            </div>
        </div>
        <div class="row ml-1 mr-1 mb-1 stadium">
            <div class="col-lg-3 m-auto">
                <img class="card-custom-img" src="./argon/img/bgs/bg-1.jpg">
            </div>
            <div class="col-lg-6 m-auto">
                <div class="pt-4 pb-4">
                    <div class="row m-auto">
                        <div class="font-weight-bold display-4">
                            Sân SCSC Chảo Lửa
                        </div>
                    </div>
                    <div class="row m-auto">
                        <div class="font-weight-bold display-5">
                            Địa chỉ: In elit labore consectetur.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 m-auto">
                <div class="rating">
                    Đánh giá: 
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                    <i class="fas fa-star rating-star"></i>
                </div>
                <div class="like">
                    Đã được đặt: 2 lần
                </div>
            </div>
        </div>
    </div>
@endsection
