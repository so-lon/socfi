@extends('layouts.app', ['title' => __('user.management')])

@section('js')
    <script>
        var form = $('form')[1];
        function submitForm(role) {
            // Create hidden input and append to form
            $('<input>').attr({
                type: 'hidden',
                name: 'searchRole',
                value: role
            }).appendTo(form);
            form.submit();
        };
    </script>
@endsection

@section('content')
    @include('layouts.headers.header', ['title' => __('user.management')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-12 mb-2 mb-lg-0">
                                {{-- Search --}}
                                <form action="{{ route('user.search') }}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-xl-9 col-lg-7 col-6 input-group">
                                            <input type="text" name="terms" id="input-search" class="form-control border-primary" placeholder="{{ __('common.search') }} .." value="{{ $terms ?? '' }}" autofocus>
                                            <div class="input-group-append">
                                                <button type="button" onclick='submitForm("{{ $searchRole ?? "" }}")' class="btn btn-outline-primary form-inline">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-5 col-6 text-lg-left text-right dropdown" id="ddSearch">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSearch" data-toggle="dropdown">{{ isset($searchRole) ? __('user.roles.' . $searchRole) : __('user.role') }}</button>
                                            <div class="dropdown-menu">
                                            @foreach(constants('user.role') as $role)
                                                <button class="dropdown-item" type="button" onclick='submitForm("{{ $role }}")'>{{ __('user.roles.' . $role) }}</button>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-12 text-lg-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                    {{ __('user.create') }}
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
                                    <th scope="col">{{ __('common.updated_at') }}</th>
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
                                            <form action="{{ $user->trashed() ? route('user.restore', $user->username) : route('user.destroy', $user->username) }}" method="post">
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
                                            <a href="{{ $user->trashed() ? '#' : ($user->id != auth()->id() ? route('user.edit', $user->username) : route('profile.edit')) }}" class="btn btn-sm btn-default{{ $user->trashed() ? ' disabled' :'' }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                {{ __('common.edit') }}
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
