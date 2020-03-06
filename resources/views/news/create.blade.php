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
                        <form method="post" action="{{ route('news.store') }}" autocomplete="off">
                            @csrf
                            <input type="hidden" id="ckdata" name="content">
                            <div class="pl-lg-4">
                                {{-- Title --}}
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('news.title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('news.title') }}" value="{{ old('news.title') }}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- Content --}}
                                <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-content">{{ __('news.content') }}</label>
                                    {{-- <input type="text" name="content" id="input-content" class="form-control form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="{{ __('news.content') }}" value="{{ old('news.content') }}" autofocus> --}}
                                    <textarea id="ckeditor" cols="30" rows="10"></textarea>
                                    <script>
                                        CKEDITOR.replace( 'ckeditor' );
                                        function parseCK() {
                                            var data = CKEDITOR.instances.ckeditor.getData();
                                            $('#ckdata').val(data);
                                            return true;
                                        }
                                        
                                    </script>
                                </div>
                                {{-- Button --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4 px-4" onclick="parseCK()">{{ __('news.create') }}</button>
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
