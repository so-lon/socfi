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
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Loại khuyến mãi</label>
                                    <div class="form-control-radio">
                                        @foreach(constants('promotion.type') as $type)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input name="type" class="custom-control-input" id="type-{{ $type }}" type="radio" value="{{ $type }}"{{ $type == constants('promotion.type.percent') ? ' checked' : '' }}>
                                                <label class="custom-control-label" for="type-{{ $type }}">{{ __('promotion.types.' . $type) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-usable_from">{{ __('promotion.usable_from') }}</label>
                                            <input class="form-control bg-white" id="input-usable_from" name="usable_from" readonly type="text" value="{{ $promotion->usable_from }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-usable_to">{{ __('promotion.usable_to') }}</label>
                                            <input class="form-control bg-white" id="input-usable_to" name="usable_to" readonly type="text" value="{{ $promotion->usable_to }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Khung giờ áp dụng từ</label>
                                                <select class="form-control" onfocus="if (this.options.length > 8) this.size=5" onblur="this.size=1" onchange="this.size=1; this.blur();" size="1">
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                    <option value="22:30">22:30</option>
                                                    <option value="23:00">23:00</option>
                                                    <option value="23:30">23:30</option>
                                                    <option value="00:00">00:00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Khung giờ áp dụng đến</label>
                                                <select class="form-control" onfocus="if (this.options.length > 8) this.size=5" onblur="this.size=1" onchange="this.size=1; this.blur();" size="1">
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                    <option value="22:30">22:30</option>
                                                    <option value="23:00">23:00</option>
                                                    <option value="23:30">23:30</option>
                                                    <option value="00:00">00:00</option>
                                            </select>
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
