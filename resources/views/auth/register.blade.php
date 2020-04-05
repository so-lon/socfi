@extends('layouts.app-auth', ['title' => "Sign up", 'description' => "Create your account"])

@section('content')

    <div class="col-lg-6 col-md-8">
        <div class="card-transparent shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                <form role="form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="username">{{ __('user.username') }}</label>
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('user.username') }}" type="text" name="username" value="{{ old('username') }}" autofocus>
                        </div>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="username">{{ __('user.name') }}</label>
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('user.name') }}" type="text" name="name" value="{{ old('name') }}">
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="username">{{ __('user.email') }}</label>
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('user.email') }}" type="email" name="email" value="{{ old('email') }}">
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="username">{{ __('user.password') }}</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('user.password') }}" type="password" name="password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="username">{{ __('user.confirm_password') }}</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" placeholder="{{ __('user.confirm_password') }}" type="password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress-label">
                        <span>Password Strength</span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-danger" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12">
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                <label class="custom-control-label" for="customCheckRegister">
                                    <span class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">{{ __('auth.createAccount') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
