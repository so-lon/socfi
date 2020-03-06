@extends('layouts.app', ['title' => __('news.add')])

@section('content')
    @include('news.partials.header', ['title' => __('news.add')])

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
                                <a href="{{ route('news.index') }}" class="btn btn-sm btn-primary">{{ __('common.backToList') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="pl-lg-4">
                            {{-- Title --}}
                            <h1>{{ $news->title }}</h1>
                            {{-- Content --}}
                            <div>{!! $news->content !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
