@extends('layouts.app', ['title' => __('promotion.edit')])

@section('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>
@endsection

@section('content')
    @include('layouts.headers.header', ['title' => __('promotion.edit')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('promotion.information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('promotion.index') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-chevron-left"></i>
                                    {{ __('common.back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('promotion.update', $promotion) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <div class="pl-lg-4">
                                {{-- Code & Value & Days of Week--}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-code">{{ __('promotion.code') }}</label>
                                            <input type="text" name="code" id="input-code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('promotion.code') }}" value="{{ $promotion->code }}" autofocus>

                                            @if ($errors->has('code'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('code') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-value">{{ __('promotion.value') }}</label>
                                            <input type="number" name="value" id="input-value" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" placeholder="{{ __('promotion.value') }}" value="{{ $promotion->value }}">

                                            @if ($errors->has('value'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('value') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('days_of_week') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('promotion.days_of_week') }}</label>
                                            <div class="form-control-radio">
                                                @foreach(constants('days_of_week') as $days_of_week)
                                                    @if ($loop->index != 0)
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input name="days_of_week[]" class="custom-control-input" id="days_of_week-{{ $days_of_week }}" type="checkbox" value="{{ $days_of_week }}"{{ in_array($days_of_week, $promotion->days_of_week) ? ' checked': '' }}>
                                                            <label class="custom-control-label" for="days_of_week-{{ $days_of_week }}">{{ __('common.days_of_week.' . $days_of_week) }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                            @if ($errors->has('days_of_week'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('days_of_week') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                {{-- Usable From & Usable To --}}
                                <div class="input-daterange datepicker row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-usable_from">{{ __('promotion.usable_from') }}</label>
                                            <input class="form-control bg-white" id="input-usable_from" name="usable_from" readonly type="text" value="{{ $promotion->usable_from }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-usable_to">{{ __('promotion.usable_to') }}</label>
                                            <input class="form-control bg-white" id="input-usable_to" name="usable_to" readonly type="text" value="{{ $promotion->usable_to }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4 px-4">{{ __('common.update') }}</button>
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
