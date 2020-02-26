@extends('layouts.app', ['title' => 'Home'])

@section('content')

    <div class="section-xl section-hero section-shaped">
        <div class="shape shape-primary">
        </div>
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
                                sumting
                                </div>
                                <div class="card-body mt--6">
                                <div class="lead font-weight-bold">Culpa adipisicing eiusmod reprehenderit incididunt in ut adipisicing in velit exercitation aute.</div>
                                <div class="lead font-weight-bold">Esse non culpa aliquip dolor ut ad minim exercitation amet qui excepteur officia duis.</div>
                                <div class="lead font-weight-bold">Cillum in incididunt id dolore sed voluptate deserunt exercitation et do aute ad.</div>
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
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 condition-control">

            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>

@endsection
