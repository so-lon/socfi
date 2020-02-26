@extends('layouts.app-auth', ['title' => 'Forgot Password', 'description' => 'Reset your password'])

@section('content')

    <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5">
                <div class="text-center text-muted mb-4">
                    <small>{{ __("Enter your user account's verified email address and we will send you a password reset link.") }}</small>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form role="form" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">{{ __('Send Password Reset Link') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
