@extends('layouts.app', ['title' => __('news.management')])

@section('content')
    @include('layouts.headers.header', ['title' => __('news.management')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                {{-- Search --}}
                                <form action="{{ route('news.search') }}" method="post">
                                    @csrf

                                    <div class="input-group">
                                        <input type="text" name="terms" id="input-search" class="form-control border-primary" placeholder="{{ __('common.search') }} .." value="{{ $terms ?? '' }}" autofocus>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary form-inline">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                          </div>
                          <div class="col-8 text-right">
                                <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                    {{ __('news.create') }}
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
                                    <th scope="col">{{ __('common.created_by') }}</th>
                                    <th scope="col">{{ __('common.updated_by') }}</th>
                                    <th scope="col">{{ __('common.created_at') }}</th>
                                    <th scope="col">{{ __('common.updated_at') }}</th>
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
                                            <form action="{{ route('news.destroy', $new) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a href="{{ route('news.edit', $new) }}" class="btn btn-sm btn-default">
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
                    <div class="card-footer py-4">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
