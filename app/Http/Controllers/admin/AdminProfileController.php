<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        return view('admin.profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update_picture(Request $request)
    {
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if (!empty(Auth::user()->picture)) {
            unlink('template/img/photos/' . Auth::user()->picture);
        }

        $file_name = "ACI-" . microtime(true) . "." . $request->picture->extension();

        if ($request->picture->move(public_path('template/img/photos'), $file_name)) {
            $data = [
                'picture' => $file_name,
            ];
            $is_updated = User::find(Auth::id())->update($data);

            if ($is_updated) {
                return back()->with(['success' => 'Profile picture has been successfully updated!']);
            } else {
                return back()->with(['failure' => 'Profile picture has failed to update!']);
            }
        } else {
            return back()->with(['failure' => 'Profile picture has failed to upload!']);
        }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
