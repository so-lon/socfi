@extends('layouts.app', ['title' => __('news.create')])

@section('css')
    <link href="{{ asset('argon') }}/vendor/quill/dist/quill.snow.css" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.js"></script>
    <script>
        var form = $('form')[1];
        form.onsubmit = function() {
            // Create hidden input and append to form
            $('<input>').attr({
                type: 'hidden',
                name: 'content',
                value: quill.root.innerHTML
            }).appendTo(form);
            return true;
        };
    </script>
@endsection

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
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('news.store') }}" autocomplete="off">
                            @csrf
                            <input type="hidden" id="ckdata" name="content">
                            <div class="pl-lg-4">
                                {{-- Title --}}
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('news.title') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('news.title') }}" value="{{ old('news.title') }}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- Content --}}
                                <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-content">{{ __('news.content') }} <span class="text-danger">*</span></label>
                                    <div class="bg-white">
                                        {{-- Quill's toolbar --}}
                                        <div id="toolbar"></div>
                                        {{-- Quill's editor --}}
                                        <div id="editor"></div>
                                    </div>
                                </div>
                                {{-- Button --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4 px-4" onclick="parseCK()">{{ __('common.create') }}</button>
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
