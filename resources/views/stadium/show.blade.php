@extends('layouts.app', ['title' => __('stadium.add')])

@section('content')
    @include('stadium.partials.header', ['title' => __('stadium.add')])

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
                                    <i class="fas fa-plus"></i>
                                    {{ __('Tao san mini') }}
                                </a>
                                <a href="{{ route('stadium.edit', $stadium) }}" class="btn btn-sm btn-default">
                                    <i class="fas fa-pencil-alt"></i>
                                    {{ __('stadium.edit') }}
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
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d489.90680909149!2d106.64407560631025!3d10.791811710328254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eb32bc04e9f%3A0xf9e738d586abab67!2sThe%20Pizza%20Company%20B%C3%A0u%20C%C3%A1t!5e0!3m2!1sen!2s!4v1585650204532!5m2!1sen!2s" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('field.name') }}</th>
                                        <th scope="col">{{ __('field.openingTime') }}</th>
                                        <th scope="col">{{ __('field.closingTime') }}</th>
                                        <th scope="col">{{ __('field.type') }}</th>
                                        <th scope="col">{{ __('field.condition') }}</th>
                                        <th scope="col">{{ __('field.updatedAt') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fields as $field)
                                        <tr>
                                            <td>
                                                <a href="{{ route('field.edit', $field) }}">
                                                    {{ $field->name }}
                                                </a>
                                            </td>
                                            <td>{{ $field->opening_time }}</td>
                                            <td>{{ $field->closing_time }}</td>
                                            <td>{{ $field->type }}</td>
                                            <td>{{ $field->condition }}</td>
                                            <td>{{ $field->updated_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-right">
                                                <form action="{{ route('field.destroy', $field) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                        {{ __('field.destroy') }}
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
