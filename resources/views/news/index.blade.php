@extends('layouts.app', ['title' => __('news.management')])

@section('content')
    @include('users.partials.header', ['title' => __('news.management')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('news.list') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                    <span class="btn-inner--text">{{ __('news.add') }}</span>
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
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('news.title') }}</th>
                                    <th scope="col">{{ __('news.createdBy') }}</th>
                                    <th scope="col">{{ __('news.updatedBy') }}</th>
                                    <th scope="col">{{ __('news.createdAt') }}</th>
                                    <th scope="col">{{ __('news.updatedAt') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $new)
                                    <tr>
                                        <td>
                                            <a href="{{ route('news.show', $new) }}">
                                                {{ $new->title }}
                                            </a>
                                        </td>
                                        <td>{{ $new->userCreated->username }}</td>
                                        <td>{{ $new->userUpdated->username }}</td>
                                        <td>{{ $new->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $new->updated_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('news.edit', $new) }}" class="btn btn-sm btn-default">
                                                <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
                                                <span class="btn-inner--text">{{ __('news.edit') }}</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
