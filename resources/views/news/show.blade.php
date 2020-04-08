@extends('layouts.app', ['title' => __('news.create')])

@section('content')
    @include('layouts.headers.header', ['title' => __('news.create')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('news.information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('news.index') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-chevron-left"></i>
                                    {{ __('common.back') }}
                                </a>
                                <a href="{{ route('news.edit', $news) }}" class="btn btn-sm btn-default">
                                    <i class="fas fa-pencil-alt"></i>
                                    {{ __('common.edit') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="pl-lg-4">
                            {{-- Title --}}
                            <h1 class="display-1">{{ $news->title }}</h1>
                            {{-- Created by & Time --}}
                            <dt class="text-uppercase">
                                {{ $news->userCreated->username }}
                                <i class="ml-lg-4 mr-2 far fa-clock"></i>{{ $news->updated_at->format('d/m/Y H:i') }}
                            </dt>
                            <hr>
                            {{-- Content --}}
                            {!! $news->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
