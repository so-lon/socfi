@extends('layouts.app', ['title' => __('field.management')])

@section('content')
    @include('field.partials.header', ['title' => __('field.management')])

    <div class="container-fluid mt--7">
        <div class="row mt-8 mb-4">
            <div class="col-xl-12 order-xl-1">
                <form action="{{ route('field.search') }}" method="post">
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
        @foreach ($fields as $field)
            <div class="col-xl-4 col-lg-6 mb-4">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ $field->avatar }}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">{{ $field->name }}</h1>
                        <p class="card-text">{{ $field->userOwns->name }}</p>
                        <p class="card-text">{{ $field->userOwns->phone }}</p>
                        <p class="card-text">{{ $field->opening_time }} - {{ $field->closing_time }}</p>
                        @if ($field->trashed())
                        <span class="badge badge-pill badge-danger">{{ __('field.status.deleted') }}</span>
                        @elseif ($field->status == constants('field.status.opened'))
                        <span class="badge badge-pill badge-success">{{ __('field.status.opened') }}</span>
                        @elseif ($field->status == constants('field.status.closed'))
                        <span class="badge badge-pill badge-warning">{{ __('field.status.closed') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{ $fields->links() }}

        @include('layouts.footers.auth')
    </div>
@endsection
