@extends('layouts.app', ['title' => __('stadium.management')])

@section('content')
    @include('stadium.partials.header', ['title' => __('stadium.management')])

    <div class="container-fluid mt--7">
        <div class="row mt-8 mb-4">
            <div class="col-xl-12 order-xl-1">
                <form action="{{ route('stadium.search') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="terms" id="input-search" class="form-control border-primary" placeholder="{{ __('common.search') }} .." value="{{ $terms ?? '' }}" autofocus>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-primary form-inline">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
        @foreach ($stadiums as $stadium)
            <div class="col-xl-4 col-lg-6 mb-4">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ $stadium->avatar }}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">{{ $stadium->name }}</h1>
                        <p class="card-text">{{ $stadium->userOwns->name }}</p>
                        <p class="card-text">{{ $stadium->userOwns->phone }}</p>
                        <p class="card-text">{{ $stadium->opening_time }} - {{ $stadium->closing_time }}</p>
                        @if ($stadium->trashed())
                        <span class="badge badge-pill badge-danger">{{ __('stadium.status.deleted') }}</span>
                        @elseif ($stadium->status == constants('stadium.status.opened'))
                        <span class="badge badge-pill badge-success">{{ __('stadium.status.opened') }}</span>
                        @elseif ($stadium->status == constants('stadium.status.closed'))
                        <span class="badge badge-pill badge-warning">{{ __('stadium.status.closed') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{ $stadiums->links() }}

        @include('layouts.footers.auth')
    </div>
@endsection
