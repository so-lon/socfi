@extends('layouts.app', ['title' => __('field.add')])

@section('content')
    @include('field.partials.header', ['title' => __('field.add')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('field.information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('field.index') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-chevron-left"></i>
                                    {{ __('common.backToList') }}
                                </a>
                                <a href="{{ route('field.edit', $field) }}" class="btn btn-sm btn-default">
                                    <i class="fas fa-pencil-alt"></i>
                                    {{ __('field.edit') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="pl-lg-4">
                            {{-- Title --}}
                            <h1 class="display-1">{{ $field->title }}</h1>
                            {{-- Created by & Time --}}
                            <dt class="text-uppercase">
                                {{ $field->userCreated->username }}
                                <i class="ml-lg-4 mr-2 far fa-clock"></i>{{ $field->updated_at->format('d/m/Y H:i') }}
                            </dt>
                            <hr>
                            {{-- Content --}}
                            {!! $field->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
