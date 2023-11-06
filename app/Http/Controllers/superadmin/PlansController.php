<?php

namespace App\Http\Controllers\superadmin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('superadmin.planslist.index', [
            'plans' => Plan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.planslist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => ['required'],
            'months' => ['required', 'numeric'],
            'interest_rate' => ['required', 'numeric'],

        ]);

        $data = [
            'plan_name' => $request->plan_name,
            'months' => $request->months,
            'interest_rate' => $request->interest_rate,

        ];

        $is_registered = Plan::create($data);

        if ($is_registered) {
            return back()->with(['success' => 'New plan has been added']);
        } else {
            return back()->with(['failure' => 'Failed to add!']);
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
    public function edit(Plan $plan)
    {
        return view('superadmin.planslist.edit', [
            'plan' => $plan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)

    {
        $request->validate([
            'plan_name' => ['required'],
            'months' => ['required', 'numeric'],
            'interest_rate' => ['required', 'numeric'],
        ]);

        $data = [
            'plan_name' => $request->plan_name,
            'months' => $request->months,
            'interest_rate' => $request->interest_rate,
        ];

        $is_updated = $plan->update($data);

        if ($is_updated) {
            return back()->with(['success' => 'Data has been successfuly updated!']);
        } else {
            return back()->with(['failure' => 'Failed to register!']);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Plan $plan)
    // {
    //     $is_deleted = $plan->delete();
    //     if ($is_deleted) {
    //         return back()->with(['success' => $plan->plan_name . ' plan has been deleted']);
    //     } else {
    //         return back()->with(['failure' => 'Something went wrong']);
    //     }
    // }
}
