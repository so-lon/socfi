@extends('layouts.app', ['title' => __('field.add')])

@section('css')
    <link href="{{ asset('argon') }}/vendor/quill/dist/quill.snow.css" rel="stylesheet">
@endsection

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
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('field.update', $field) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <div class="pl-lg-4">
                                {{-- Title --}}
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('field.title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('field.title') }}" value="{{ old('field.title', $field->title) }}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- Content --}}
                                <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-content">{{ __('field.content') }}</label>
                                    <div class="bg-white">
                                        {{-- Quill's toolbar --}}
                                        <div id="toolbar"></div>
                                        {{-- Quill's editor --}}
                                        <div id="editor">
                                            {!! $field->content !!}
                                        </div>
                                    </div>
                                </div>
                                {{-- Button --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4 px-4">{{ __('field.edit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
