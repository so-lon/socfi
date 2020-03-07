@extends('layouts.app', ['title' => __('user.add')])

@section('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>
@endsection

@section('content')
    @include('users.partials.header', ['title' => __('user.add')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('user.information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('user.backToList') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                            @csrf

                            <div class="pl-lg-4">
                                {{-- Role --}}
                                <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('user.role') }}</label>
                                    <div class="form-control-radio">
                                        @foreach(constants('user.role') as $role)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input name="role" class="custom-control-input" id="role{{ __('user.roles.' . $role) }}" type="radio" value="{{ $role }}"{{ $role == constants('user.role.admin') ? ' checked' : '' }}>
                                                <label class="custom-control-label" for="role{{ __('user.roles.' . $role) }}">{{ __('user.roles.' . $role) }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- Username & Name & Gender & Birthday --}}
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-username">{{ __('user.username') }}</label>
                                            <input type="text" name="username" id="input-username" class="form-control form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('user.username') }}" value="{{ old('user.username') }}" autofocus>

                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('user.name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('user.name') }}" value="{{ old('name') }}">

                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">{{ __('user.gender') }}</label>
                                            <select name="gender" class="form-control" id="input-gender">
                                                @foreach(constants('user.gender') as $gender)
                                                    <option value="{{ $gender }}">{{ __('user.genders.' . $gender) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-birthday">{{ __('user.birthday') }}</label>
                                            <input id="input-birthday" name="birthday" readonly class="form-control datepicker bg-white" type="text" value="{{ now()->format('d/m/Y') }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Email & Phone --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('user.email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('user.email') }}" value="{{ old('email') }}">

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('user.phone') }}</label>
                                            <input type="text" name="phone" id="input-phone" class="form-control form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('user.phone') }}" value="{{ old('phone') }}">

                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- Password & Confirm Password --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-password">{{ __('user.password') }}</label>
                                            <input type="password" name="password" id="input-password" class="form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('user.password') }}">

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-password-confirmation">{{ __('user.confirmPassword') }}</label>
                                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control" placeholder="{{ __('user.confirmPassword') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4 px-4">{{ __('user.create') }}</button>
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
