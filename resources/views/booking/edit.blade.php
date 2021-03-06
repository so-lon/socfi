@extends('layouts.app', ['title' => __('field.add')])

@section('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        var row = {{ count($prices) }};
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
        $('#add-row').bind('click', function() {
            $('.table-responsive').find('tbody tr:last').before(
                '<tr id="row-' + row + '">' +
                    '<td class="row">' +
                        '<div class="col-6">' +
                            '<input type="time" step="1800" id="slot_start[' + row + ']" name="slot_start[' + row + ']" class="form-control">' +
                        '</div>' +
                        '<div class="col-6">' +
                            '<input type="time" step="1800" id="slot_end[' + row + ']" name="slot_end[' + row + ']" class="form-control">' +
                        '</div>' +
                    '</td>' +
                    '<td style="width: 10%"><input type="number" class="form-control" name="price[0][' + row + ']"></td>' +
                    '<td style="width: 10%"><input type="number" class="form-control" name="price[1][' + row + ']"></td>' +
                    '<td style="width: 10%"><input type="number" class="form-control" name="price[2][' + row + ']"></td>' +
                    '<td style="width: 10%"><input type="number" class="form-control" name="price[3][' + row + ']"></td>' +
                    '<td style="width: 10%"><input type="number" class="form-control" name="price[4][' + row + ']"></td>' +
                    '<td style="width: 10%"><input type="number" class="form-control" name="price[5][' + row + ']"></td>' +
                    '<td style="width: 10%"><input type="number" class="form-control" name="price[6][' + row + ']"></td>' +
                    '<td style="width: 5%"><button type="button" class="btn btn-danger" onclick="deleteRow(' + row + ')"><i class="fas fa-times"></i></button></td>' +
                '</tr>'
            );
            row++;
        });
        function deleteRow(index) {
            $('#row-' + index).remove();
            row--;
        }
    </script>
@endsection

@section('content')
    @include('layouts.headers.header', ['title' => __('field.add')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('field.information') }}</h3>
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
                        <form method="post" action="{{ route('field.update', $field) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <div class="pl-lg-4">
                                {{-- Type --}}
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('field.type') }}</label>
                                    <div class="form-control-radio">
                                        @foreach(constants('field.type') as $type)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input name="type" class="custom-control-input" id="type-{{ $type }}" type="radio" value="{{ $type }}"{{ $type == $field->type ? ' checked' : '' }}>
                                                <label class="custom-control-label" for="type-{{ $type }}">{{ __('field.types.' . $type) }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" type="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- Name & Opening Time & Closing Time --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('field.name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('field.name') }}" value="{{ $field->name }}">

                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" type="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-opening-time">{{ __('field.openingTime') }}</label>
                                            <input type="time" step="1800" id="opening-time" name="opening_time" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value={{ $field->opening_time }}>

                                            @if ($errors->has('opening_time'))
                                            <span class="invalid-feedback" type="alert">
                                                <strong>{{ $errors->first('opening_time') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-closing-time">{{ __('field.closingTime') }}</label>
                                            <input type="time" step="1800" id="closing-time" name="closing_time" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value={{ $field->closing_time }}>

                                            @if ($errors->has('closing_time'))
                                            <span class="invalid-feedback" type="alert">
                                                <strong>{{ $errors->first('closing_time') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- Price --}}
                                <div class="table-responsive mt-4 bg-white">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">{{ __('slot') }}</th>
                                                <th scope="col">{{ __('monday') }}</th>
                                                <th scope="col">{{ __('tuesday') }}</th>
                                                <th scope="col">{{ __('wednesday') }}</th>
                                                <th scope="col">{{ __('thursday') }}</th>
                                                <th scope="col">{{ __('friday') }}</th>
                                                <th scope="col">{{ __('saturday') }}</th>
                                                <th scope="col">{{ __('sunday') }}</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prices as $price)
                                            <tr id="row-{{ $loop->index }}">
                                                <td class="row">
                                                    <div class="col-6">
                                                        <input type="time" step="1800" id="slot_start[{{ $loop->index }}]" name="slot_start[{{ $loop->index }}]" class="form-control" value={{ $price[0]->slot_start }}>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="time" step="1800" id="slot_end[{{ $loop->index }}]" name="slot_end[{{ $loop->index }}]" class="form-control" value={{ $price[0]->slot_end }}>
                                                    </div>
                                                </td>
                                                <td style="width: 10%"><input type="number" class="form-control" name="price[0][{{ $loop->index }}]" value="{{ $price[0]->price_per_hour }}"></td>
                                                <td style="width: 10%"><input type="number" class="form-control" name="price[1][{{ $loop->index }}]" value="{{ $price[1]->price_per_hour }}"></td>
                                                <td style="width: 10%"><input type="number" class="form-control" name="price[2][{{ $loop->index }}]" value="{{ $price[2]->price_per_hour }}"></td>
                                                <td style="width: 10%"><input type="number" class="form-control" name="price[3][{{ $loop->index }}]" value="{{ $price[3]->price_per_hour }}"></td>
                                                <td style="width: 10%"><input type="number" class="form-control" name="price[4][{{ $loop->index }}]" value="{{ $price[4]->price_per_hour }}"></td>
                                                <td style="width: 10%"><input type="number" class="form-control" name="price[5][{{ $loop->index }}]" value="{{ $price[5]->price_per_hour }}"></td>
                                                <td style="width: 10%"><input type="number" class="form-control" name="price[6][{{ $loop->index }}]" value="{{ $price[6]->price_per_hour }}"></td>
                                                <td style="width: 5%"><button type="button" class="btn btn-danger" onclick="deleteRow({{ $loop->index }})"><i class="fas fa-times"></i></button></td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="9" class="text-center">
                                                    <button id="add-row" type="button" class="btn btn-default"><i class="fas fa-plus"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
