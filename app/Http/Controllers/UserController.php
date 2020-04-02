<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use User;
use UserRequest;
use SearchRequest;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->withTrashed()->orderByDesc('updated_at')->paginate(5)]);
    }

    /**
     * Display a listing of the users with search keywords
     *
     * @param  \App\Http\Requests\SearchRequest  $request
     * @return \Illuminate\View\View
     */
    public function search(SearchRequest $request, User $model)
    {
        $terms      = $request->get('terms');
        $searchRole = $request->get('searchRole');

        if (isset($searchRole)) {
            $model = User::where('role', $searchRole);
        }

        return view('users.index', [
            'users'      => $model->withTrashed()->whereLike(['username', 'name'], $terms)->orderByDesc('updated_at')->paginate(5),
            'terms'      => $terms,
            'searchRole' => $searchRole,
        ]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $user = $model->create($request->merge(['password' => Hash::make($request->get('password')), 'avatar' => 'img/avatar/default.jpg'])->all());
        if ($request->get('role') == constants('user.role.field_owner')) {
            Stadium::create([
                'name'         => $request->get('stadium_name'),
                'address'      => $request->get('address'),
                'opening_time' => $request->get('opening_time'),
                'closing_time' => $request->get('closing_time'),
                'owned_by'     => $user->id,
                'created_by'   => $user->id,
                'updated_by'   => $user->id,
            ]);
        }
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Soft delete the specified user from storage
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if ($user->role == constants('user.role.admin')) {
            return redirect()->route('user.index')->withErrors(__('user.message.undeletable'));
        } else if ($user->role == constants('user.role.field_owner')) {
            $user->stadium->delete();
        }
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('user.message.success'));
    }

    /**
     * Restore the specified user from storage
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(User $user)
    {
        if ($user->role == constants('user.role.field_owner')) {
            $user->stadium->restore();
        }
        $user->restore();

        return redirect()->route('user.index')->withStatus(__('User successfully restored.'));
    }
}
