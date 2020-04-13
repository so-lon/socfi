@extends('layouts.app', ['title' => __('booking.create')])

@push('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        var field        = "{{ $fields[0]->name }}";
        var field_id     = "{{ $fields[0]->id }}";
        var day          = getDayOfWeek();
        var slot         = "{{ $slots[0] }}";
        var code         = '';
        var duration     = $('#input-duration').val();
        var prices       = JSON.parse("{{ $prices }}".replace(/&quot;/g,'"'));
        var promotions   = JSON.parse("{{ $promotions }}".replace(/&quot;/g,'"'));
        var days_of_week = JSON.parse("{{ json_encode(__('common.days_of_week')) }}".replace(/&quot;/g,'"'));

        renderPrice();

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });

        // Get Day of week
        function getDayOfWeek() {
            let split = $('#input-date').val().split('/');
            let date  = new Date ([split[1], split[0], split[2]].join('/'));
            let day   = date.getDay() - 1;
            if (day < 0) day += 7;
            return day;
        }

        // Get Slot end depends on duration
        function getSlotEnd() {
            let slot_arr = slot.split(':');
            slot_arr[1] = parseInt(slot_arr[1]) +  duration % 60;
            if (slot_arr[1] == 60) {
                slot_arr[0] = parseInt(slot_arr[0]) + Math.floor(duration / 60) + 1;
                slot_arr[1] = 0;
            } else {
                slot_arr[0] = parseInt(slot_arr[0]) + Math.floor(duration / 60);
            }
            let slot_end = ('0' + slot_arr[0]).slice(-2) + ':' + ('0' + slot_arr[1]).slice(-2) ;
            return slot_end;
        }

        // Get price
        function getPrice() {
            let slots = Object.keys(prices[field_id][day]);
            for (let i = 0; i < slots.length; i++) {
                let slot_arr = slots[i].split(' - ');
                if (slot_arr[0] <= slot && slot < slot_arr[1]) {
                    let price_per_hour = prices[field_id][day][slots[i]];
                    return price_per_hour / 60 * duration;
                }
            }
        }

        // Re-render price
        function renderPrice() {
            $('#heading-price').text("{{ __('booking.price_per_hour') }}" + ' (' + field + ' - ' + days_of_week[day] + ')');
            let slots = Object.keys(prices[field_id][day]);
            $('.slots').remove();
            for (let i = slots.length - 1; i >= 0; i--) {
                $('.table-responsive').find('tbody tr:first').after(
                    '<tr class="slots">' +
                        '<td>' + slots[i] + '</td>' +
                        '<td class="text-right">' + prices[field_id][day][slots[i]] + '</td>' +
                    '</tr>'
                );
            }

            $('#field-slot').text(field + ' - ' + days_of_week[getDayOfWeek()] + ' - ' + slot);
            $('#slot').text(slot + ' - ' + getSlotEnd() + ' (' + duration + " {{ __('common.minute') }}" + ')');
            $('#price').text(getPrice());
            promotions[code] ? $('#total').text(getPrice() - promotions[code]) : $('#total').text(getPrice());
        }

        // Select field change
        $('#sel-field').bind('change', function() {
            field = $('#sel-field option:selected').text();
            field_id = $('#sel-field option:selected').val();
            renderPrice();
        });

        // Select slot change
        $('#sel-slot').bind('change', function() {
            slot = $('#sel-slot option:selected').text();
            renderPrice();
        });

        // Datepicker date change
        $('.datepicker').bind('change', function() {
            day = getDayOfWeek();
            renderPrice();
        });

        // Input duration change
        $('#input-duration').bind('change', function() {
            duration = $('#input-duration').val();
            renderPrice();
        });

        // Input duration change
        $('#input-code').bind('change', function() {
            code  = $('#input-code').val();
            let codes = Object.keys(promotions);

            $('#promotion').remove();
            if (codes.indexOf(code) >= 0) {
                $('.table-responsive').find('tbody tr:last').before(
                    '<tr id="promotion">' +
                        '<td>' + code + '</td>' +
                        '<td id="promotion-value" class="text-right"> -' + promotions[code] + '</td>' +
                    '</tr>'
                );
                $('#total').text(getPrice() - promotions[code]);
            } else {
                $('#total').text(getPrice());
            }
        });
    </script>
@endpush

@section('content')
    @include('layouts.headers.header', ['title' => __('booking.create')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('booking.information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('field.index') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-chevron-left"></i>
                                    {{ __('common.back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('booking.store') }}" autocomplete="off">
                            @csrf

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- Name & Phone --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-name">{{ __('user.name') }} <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('user.name') }}" value="{{ old('name') }}" autofocus>

                                                    @if ($errors->has('name'))
                                                    <span class="invalid-feedback" type="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-email">{{ __('user.phone') }} <span class="text-danger">*</span></label>
                                                    <input type="text" name="phone" id="input-phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('user.phone') }}">

                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Field & Promotion --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-sel-field">{{ __('field.name') }} <span class="text-danger">*</span></label>
                                                    <select id="sel-field" name="field_id" class="form-control" onfocus="if (this.options.length > 8) this.size=5" onblur="this.size=1" onchange="this.size=1; this.blur();">
                                                        @foreach($fields as $field)
                                                            <option value="{{ $field->id }}">{{ $field->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-code">{{ __('promotion.code') }} <span class="text-danger">*</span></label>
                                                    <input type="text" name="code" id="input-code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('promotion.code') }}" value="{{ old('promotion.code') }}" onkeyup="this.value = this.value.toUpperCase();">

                                                    @if ($errors->has('code'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('code') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Date & Slot & Duration --}}
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-date">{{ __('common.date') }} <span class="text-danger">*</span></label>
                                                    <input id="input-date" name="date" readonly class="form-control datepicker bg-white" type="text" value="{{ now()->format('d/m/Y') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-sel-slot">{{ __('field.slot') }} <span class="text-danger">*</span></label>
                                                    <select id="sel-slot" name="slot" class="form-control" onfocus="if (this.options.length > 8) this.size=5" onblur="this.size=1" onchange="this.size=1; this.blur();">
                                                        @foreach($slots as $slot)
                                                            <option value="{{ $slot }}">{{ $slot }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-duration">{{ __('booking.duration') }} <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="input-duration" type="number" name="duration" step="30" min="30" value="30" onkeydown="return false">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="card bg-white">
                                            <div class="table-responsive p-4">
                                                <table class="table align-items-center table-flush">
                                                    <tbody>
                                                        <tr class="font-weight-bold text-uppercase">
                                                            <th id="heading-price" colspan="2">{{ __('booking.price_per_hour') }}</th>
                                                        </tr>
                                                        <tr class="font-weight-bold text-uppercase">
                                                            <th colspan="2" class="pt-4 border-top-0">{{ __('booking.price_total') }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td id="slot"></td>
                                                            <td id="price" class="text-right"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-top-0 w-75"></td>
                                                            <td class="text-right font-weight-bold text-uppercase">{{ __('booking.total') }}:<span id="total" class="ml-4"></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Price --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4 px-4">{{ __('common.create') }}</button>
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
