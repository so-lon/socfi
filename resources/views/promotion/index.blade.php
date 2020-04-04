@extends('layouts.app', ['title' => __('promotion.management')])

@section('content')
    @include('promotion.partials.header', ['title' => __('promotion.management')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-12 mb-2 mb-lg-0">
                                <form action="{{ route('promotion.search') }}" method="post">
                                    @csrf
                                    {{-- Search --}}
                                    <div class="row">
                                        <div class="col-xl-8 input-group">
                                            <input type="text" name="terms" id="input-search" class="form-control border-primary" placeholder="{{ __('common.search') }} .." value="{{ $terms ?? '' }}" autofocus>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-outline-primary form-inline">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-12 text-lg-right">
                                <a href="{{ route('promotion.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                    {{ __('promotion.add') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('errors'))
                            <div class="alert alert-danger alert-dismisible fade show" role="alert">
                                {{ session('errors')->first() }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('promotion.code') }}</th>
                                    <th scope="col">{{ __('promotion.usableFrom') }}</th>
                                    <th scope="col">{{ __('promotion.usableTo') }}</th>
                                    <th scope="col">{{ __('promotion.daysOfWeek') }}</th>
                                    <th scope="col">{{ __('promotion.value') }}</th>
                                    <th scope="col">{{ __('promotion.updatedAt') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promotion)
                                <tr>
                                    <td>{{ $promotion->code }}</td>
                                    <td>{{ date('d/m/Y', strtotime($promotion->usable_from)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($promotion->usable_to)) }}</td>
                                    @if ($promotion->days_of_week == constants('days_of_week.everyday'))
                                        <td>{{ __('common.daysOfWeek.' . $promotion->days_of_week) }}</td>
                                    @else
                                        <td>
                                        @foreach (explode(':', $promotion->days_of_week) as $dow)
                                            @if ($loop->index == 0)
                                            {{ __('common.daysOfWeek.' . $dow) }}
                                            @else
                                            & {{ __('common.daysOfWeek.' . $dow) }}
                                            @endif
                                        @endforeach
                                        </td>
                                    @endif
                                    <td>{{ $promotion->value }}</td>
                                    <td>{{ $promotion->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        {{ $promotions->links() }}
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
