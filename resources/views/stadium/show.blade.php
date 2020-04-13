@extends('layouts.app', ['title' => __('stadium.management')])

@section('content')
    @include('layouts.headers.header', ['title' => __('stadium.management')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('stadium.information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('field.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                    {{ __('field.create') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pl-lg-4">
                                    {{-- Title --}}
                                    <h1 class="display-1">{{ $stadium->name }}</h1>
                                    <p>
                                        <i class="ni ni-square-pin mr-2"></i>
                                        <span>{{ $stadium->address }}</span>
                                    </p>
                                    <p>
                                        <i class="ni ni-mobile-button mr-2"></i>
                                        <span>{{ $stadium->userOwns->phone }}</span>
                                    </p>
                                    <p>
                                        <i class="ni ni-single-02 mr-2"></i>
                                        <span>{{ $stadium->userOwns->name }}</span>
                                    </p>
                                    <p>
                                        <i class="ni ni-shop mr-2"></i>
                                        <span>{{ $stadium->opening_time . ' - ' . $stadium->closing_time }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div id="map-canvas">
                                    {!! $stadium->map !!}
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('field.name') }}</th>
                                        <th scope="col">{{ __('common.opening_time') }}</th>
                                        <th scope="col">{{ __('common.closing_time') }}</th>
                                        <th scope="col">{{ __('field.type') }}</th>
                                        <th scope="col">{{ __('common.condition') }}</th>
                                        <th scope="col">{{ __('common.updated_at') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fields as $field)
                                        <tr>
                                            <td>{{ $field->name }}</td>
                                            <td>{{ $field->opening_time }}</td>
                                            <td>{{ $field->closing_time }}</td>
                                            <td>{{ __('field.types.' . $field->type) }}</td>
                                            <td>{{ __('field.conditions.' . $field->condition) }}</td>
                                            <td>{{ $field->updated_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-right">
                                                <form action="{{ route('field.destroy', $field) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a href="{{ route('field.edit', $field) }}" class="btn btn-sm btn-default">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        {{ __('common.edit') }}
                                                    </a>
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                        {{ __('common.delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
