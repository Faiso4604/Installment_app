<?php

namespace App\Http\Controllers\superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('superadmin.adminlist.index', [
            'users' => User::where('type', '!=', 'superadmin')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { {
            return view('superadmin.adminlist.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'admin'
        ];

        $is_registered = User::create($data);

        if ($is_registered) {
            return back()->with(['success' => 'Successfully registered!']);
        } else {
            return back()->with(['failure' => 'Failed to register!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('superadmin.adminlist.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $user->id . 'id'],
            'new_password' => ['required'],
            'superadmin_password' => ['required'],
        ]);

        if (auth()->user()->type !== 'superadmin') {
            return back()->with(['failure' => 'You are not authorized to perform this action.']);
        }

        // Check if the superadmin_password matches the super admin's password
        if (!Hash::check($request->superadmin_password, auth()->user()->password)) {
            return back()->with(['failure' => 'Super admin password does not match.']);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->new_password,
        ];

        $is_updated = $user->update($data);

        if ($is_updated) {
            return back()->with(['success' => 'Admin has been updated']);
        } else {
            return back()->with(['failure' => 'Admin has been not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $is_deleted = $user->delete();
        if ($is_deleted) {
            return back()->with(['success' => 'Admin has been removed']);
        } else {
            return back()->with(['failure' => 'Something went wrong']);
        }
    }
}
