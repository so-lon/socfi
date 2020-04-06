@extends('layouts.app', ['title' => __('booking.management')])

@push('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });

        // Datepicker date change
        $('.datepicker').bind('change', function() {
            window.location = "{{ route('schedule') }}" + "?date=" + $('.datepicker').val();
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
                            <h1 class="display-4 col-md-2 mb-0">{{ __('common.sidebar.schedule') }}</h1>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-info btn-sm p-2 mr-2"></button>{{ __('booking.state.pending_approval') }} <br>
                                <button type="button" class="btn btn-success btn-sm p-2 mr-2"></button>{{ __('booking.state.ready') }} <br>
                                <button type="button" class="btn btn-secondary btn-sm p-2 mr-2"></button>{{ __('booking.state.finished') }}
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker bg-white" readonly type="text" name="date" value="{{ $now }}">
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
                                        @if (count($bookings[$field->id]))
                                            @foreach ($bookings[$field->id] as $booking)
                                                @if (date('H:i', strtotime($booking->start_datetime)) <= $slot && $slot < date('H:i', strtotime($booking->start_datetime) + $booking->duration * 60))
                                                    @if (date('H:i', strtotime($booking->start_datetime)) == $slot)
                                                        @switch($booking->state)
                                                            @case(constants('booking.state.pending_approval'))
                                                                <td rowspan="{{ $booking->duration / 30 }}" class="bg-info border-0 text-white" style="border-radius: .375rem">
                                                                @break
                                                            @case(constants('booking.state.ready'))
                                                                <td rowspan="{{ $booking->duration / 30 }}" class="bg-success border-0 text-white" style="border-radius: .375rem">
                                                                @break
                                                            @case(constants('booking.state.finished'))
                                                                <td rowspan="{{ $booking->duration / 30 }}" class="bg-secondary border-0 text-gray" style="border-radius: .375rem">
                                                                @break
                                                        @endswitch
                                                            <div class="row align-items-center">
                                                                <div class="col-6">
                                                                    <span class="display-3">{{ $booking->name }}</span> <br>
                                                                    <span class="text-lg">{{ $booking->phone }}</span>

                                                                </div>
                                                                <div class="col-6 text-right text-lg">
                                                                    @switch($booking->state)
                                                                        @case(constants('booking.state.pending_approval'))
                                                                            <span class="badge badge-md badge-pill badge-info text-white text-lg">{{ $booking->price }}</span><br>
                                                                            <form action="{{ route('booking.approve', $booking) }}" method="post">
                                                                                @csrf
                                                                                @method('patch')

                                                                                <button type="submit" class="btn btn-sm btn-secondary mt-2">
                                                                                    <i class="fas fa-check"></i>
                                                                                    {{ __('booking.state.approve') }}
                                                                                </button>
                                                                            </form>
                                                                            @break
                                                                        @case(constants('booking.state.ready'))
                                                                            <span class="badge badge-md badge-pill badge-success text-white text-lg">{{ $booking->price }}</span>
                                                                            <form action="{{ route('booking.destroy', $booking) }}" method="post">
                                                                                @csrf
                                                                                @method('delete')

                                                                                <button type="submit" class="btn btn-sm btn-danger mt-2">
                                                                                    <i class="fas fa-trash-alt"></i>
                                                                                    {{ __('common.delete') }}
                                                                                </button>
                                                                            </form>
                                                                            @break
                                                                        @case(constants('booking.state.finished'))
                                                                            <span class="badge badge-md badge-pill badge-secondary text-gray text-lg">{{ $booking->price }}</span>
                                                                            @break
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td></td>
                                                @endif
                                            @endforeach
                                        @else
                                            <td></td>
                                        @endif
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
