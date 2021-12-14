<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isuseradmin');
    }

    public function index() {
        $users = User::all();
        $roles = $users->load('roles');

        return view('admin.index', compact(['users']));
    }

    public function show(User $user) {
        $user->load('roles');

        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user) {
        $user->load('roles');
        $roles = Role::all();
        return view('admin.user.edit', compact(['user', 'roles']));
    }

    public function update(User $user) {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
        ]);

        $user->update(['name' => $data['name'], 'email' => $data['email']]);

        $user->roles()->sync($data['roles']);

        return redirect('/admin/users/'.$user->id)->with('status', 'User Edited')->with('status_type', 'success');
    }

    public function destroy(User $user) {
        $user->update(['deleted_by' => Auth::id()]);
        $user->delete();

        return redirect('/admin/users')->with('status', 'User Deleted')->with('status_type', 'danger');
    }

    public function create() {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->sync($data['roles']);

        return redirect('/admin/users')->with('status', 'User Created')->with('status_type', 'success');
    }
}
