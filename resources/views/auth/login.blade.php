@extends('layouts.app-auth', ['title' => 'Sign in', 'description' => 'Đăng nhập vào Socfi'])

@section('content')

    <div class="col-lg-5 col-md-7">
        <div class="card-transparent shadow border-0">
            <div class="card-header bg-transparent pb-5">
                <div class="text-body text-center mt-2 mb-3"><small>{{ __('Đăng nhập bằng') }}</small></div>
                <div class="btn-wrapper text-center">
                    <!-- test email: itxisvoeqa_1582360847@tfbnw.net
                    test password: test123456 -->
                    <a href="{{ url('login/facebook') }}" class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/facebook.svg"></span>
                        <span class="btn-inner--text">{{ __('Facebook') }}</span>
                    </a>
                    <a href="{{ url('login/google') }}" class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                        <span class="btn-inner--text">{{ __('Google') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body px-lg-5">
                <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }} mb-3">
                        <label class="form-control-label" for="username">Tên tài khoản</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" name="username" placeholder="{{ __('Nhập tên tài khoản') }}" autofocus>
                        </div>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="password">Mật khẩu</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" placeholder="{{ __('Nhập mật khẩu') }}">
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheckLogin">
                            <span class="text-body">{{ __('Lưu tài khoản này') }}</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">{{ __('Đăng nhập') }}</button>
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-dark">
                                <small>{{ __('Quên mật khẩu?') }}</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('register') }}" class="text-dark">
                            <small>{{ __('Tạo tài khoản mới') }}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
