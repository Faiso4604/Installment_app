<?php

namespace App\Http\Controllers\admin;

use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCustomerListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customerlist.index', [
            'customers' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customerlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name' => ['required'],
            'customer_phone' => ['required'],
            'customer_address' => ['required'],
            'customer_placeofwork' => ['required'],
            'guarantor_name' => ['required'],
            'guarantor_phone' => ['required'],
            'guarantor_address' => ['required'],
            'guarantor_placeofwork' => ['required'],
        ]);

        $data = [
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'customer_placeofwork' => $request->customer_placeofwork,
            'guarantor_name' => $request->guarantor_name,
            'guarantor_phone' => $request->guarantor_phone,
            'guarantor_address' => $request->guarantor_address,
            'guarantor_placeofwork' => $request->guarantor_placeofwork,
        ];

        $is_registered = Customer::create($data);

        if ($is_registered) {
            return back()->with(['success' => 'New customer has been added']);
        } else {
            return back()->with(['failure' => 'Failed to register!']);
        }
    }



    public function details(Customer $customer)
    {
        return view('admin.customerlist.details', [
            'customer' => $customer,
            'items' => Item::where('customer_id', '=', $customer->id)->paginate(1),
        ]);
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
    public function edit(string $id)
    {
        //
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
