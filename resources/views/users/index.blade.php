@extends('layouts.app', ['title' => __('user.management')])

@section('content')
    @include('users.partials.header', ['title' => __('user.management')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            {{-- Search --}}
                            <div class="col-4">
                                <form action="{{ route('user.search') }}" method="post">
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
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                    {{ __('user.add') }}
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
                                    <th scope="col"></th>
                                    <th scope="col">{{ __('user.username') }}</th>
                                    <th scope="col">{{ __('user.name') }}</th>
                                    <th scope="col">{{ __('user.role') }}</th>
                                    <th scope="col">{{ __('user.active') }}</th>
                                    <th scope="col">{{ __('user.updatedAt') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <span class="avatar avatar-sm rounded-circle">
                                                <img src="{{ asset($user->avatar) }}">
                                            </span>
                                        </td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ __('user.roles.' . $user->role) }}</td>
                                        <td>
                                            <form action="{{ $user->trashed() ? route('user.restore', $user->id) : route('user.destroy', $user) }}" method="post">
                                                @csrf
                                                @method($user->trashed() ? 'put' : 'delete')

                                                <label class="custom-toggle mb-0">
                                                    <input type="checkbox" {{ $user->trashed() ? '' : ' checked' }}{{ $user->role == constants('user.role.admin') ? ' disabled' : '' }} onclick="this.parentElement.parentElement.submit()">
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </form>
                                        </td>
                                        <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <a href="{{ $user->trashed() ? '#' : ($user->id != auth()->id() ? route('user.edit', $user) : route('profile.edit')) }}" class="btn btn-sm btn-default{{ $user->trashed() ? ' disabled' :'' }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                {{ __('user.edit') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
