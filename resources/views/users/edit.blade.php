@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit User')])   

    <div class="container-fluid mt--7" ng-app="editUser" ng-controller="mainController">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    <button type="button" ng-click="save()" class="btn btn-success mt-4">{{ __('Test') }}</button>
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
        var app = angular.module('editUser', []);
        app.controller('mainController', function($scope) {

            // prepare data for update ajax call
            $scope.getUserData = function() {
                return {
                    _token: "{{ csrf_token() }}",
                    name: $("#input-name").val(),
                    email: $("#input-email").val()
                };
            };

            $scope.save = function() {
                var uri = "{{ route('user.update', $user) }}";
                console.log($scope.getUserData());
                $.ajax({
                    url: uri,
                    type: 'PUT',
                    dataType : "json",
					contentType : 'application/json',
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