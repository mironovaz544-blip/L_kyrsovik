<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }


    public function create(): View
    {
        $roles = UserRoleEnum::options();

        return view('users.create', compact('roles'));
    }


    public function store(CreateUserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('users.index');
    }


    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user): View
    {
        $roles = UserRoleEnum::options();

        return view('users.edit', compact('user', 'roles'));
    }


    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->route('users.index');
    }


    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
