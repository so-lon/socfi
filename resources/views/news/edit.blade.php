@extends('layouts.app', ['title' => __('user.edit')])

@section('content')
    @include('users.partials.header', ['title' => __('user.edit')])

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
                        <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <div class="pl-lg-4">
                                {{-- Role --}}
                                <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('user.role') }}</label>
                                    <div class="form-control-radio">
                                        @foreach(constants('user.role') as $role)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input name="role" class="custom-control-input" id="role{{ __('user.roles.' . $role) }}" type="radio" value="{{ $role }}"{{ $role == $user->role ? ' checked' : '' }}>
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
                                            <input type="text" name="username" id="input-username" class="form-control form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('user.username') }}" value="{{ old('user.username', $user->username) }}" autofocus>

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
                                            <input type="text" name="name" id="input-name" class="form-control form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('user.name') }}" value="{{ old('name', $user->name) }}">

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
                                                    <option value="{{ $gender }}"{{ $gender == $user->gender ? ' checked' : ''}}>{{ __('user.genders.' . $gender) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-birthday">{{ __('user.birthday') }}</label>
                                            <input id="input-birthday" name="birthday" readonly class="form-control datepicker bg-white" type="text" value="{{ $user->birthday }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Email & Phone --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('user.email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('user.email') }}" value="{{ old('email', $user->email) }}">

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
                                            <input type="text" name="phone" id="input-phone" class="form-control form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('user.phone') }}" value="{{ old('phone', $user->phone) }}">

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
                                    <button type="submit" class="btn btn-success mt-4 px-4">{{ __('user.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    <script>
        angular.module('editUser', []).controller('mainController', function($scope) {

            // prepare data for update ajax call
            $scope.getUserData = function() {
                return {
                    _token: "{{ csrf_token() }}",
                    name: $("#input-name").val(),
                    email: $("#input-email").val()
                };
            };

            // Call Ajax to push edited User data to controller
            // Receive responded json
            $scope.save = function() {
                console.log($scope.getUserData());
                $.ajax({
                    url: '{{ route('user.update', $user) }}',
                    type: 'PUT',
                    // dataType : 'json',
					// contentType : 'application/json',
                    data: $scope.getUserData(),
                    async: false, // Indicates that Ajax call must be completed before executing any statements below Ajax
                    success: function(returnedJsonData) {
                        returnedJsonData = JSON.parse(returnedJsonData);
                        if (returnedJsonData.success) {
                            // inform success message with popup and do whatever u want here
                            console.log(returnedJsonData.result);
                            window.alert(returnedJsonData.result); // using alert for the sake of convenience here
                        } else {
                            // inform fail message with popup and handle whatever u want here
                            console.log(returnedJsonData.error);
                            window.alert(returnedJsonData.error); // using alert for the sake of convenience here
                        }
                    },
                    error : function(e) {
                        // inform fail message and handle error here
						console.log(e);
						window.alert(e);
					}
                });
            };
        });
    </script>

@endsection