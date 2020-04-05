@extends('layouts.app')

@push('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>
@endpush

@section('content')
    @include('layouts.headers.header', ['title' => __('booking.management')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <h1 class="display-4 col-md-5 mb-0">{{ __('common.sidebar.schedule') }}</h1>
                            <div class="col-md-2">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker bg-white" readonly type="text" name="date" value="{{ now()->format('d/m/Y') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-12 text-lg-right">
                                <a href="{{ route('booking.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                    {{ __('booking.create') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th scope="col" style="width: 10%"><strong>{{ __('common.time') }}</strong></th>
                                    @foreach ($fields as $field)
                                    <th scope="col"><strong>{{ $field->name }}</strong></th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach ($slots as $slot)
                                <tr style="{{ $loop->last ? : 'height: 50px'}}">
                                    <td class="align-top border-0 pt-0">{{ $slot }}</td>
                                    @foreach ($fields as $field)
                                    <td></td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
