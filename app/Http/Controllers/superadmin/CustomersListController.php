<?php

namespace App\Http\Controllers\superadmin;

use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Installment;
use Illuminate\Support\Facades\Hash;

class CustomersListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('superadmin.customerlist.index', [
            'customers' => Customer::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.customerlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name' => ['required'],
            'customer_phone' => ['required'],
            'customer_cnic' => ['required'],
            'customer_address' => ['required'],
            'customer_placeofwork' => ['required'],
            'guarantor_name' => ['required'],
            'guarantor_phone' => ['required'],
            'guarantor_cnic' => ['required'],
            'guarantor_address' => ['required'],
            'guarantor_placeofwork' => ['required'],
        ]);

        $data = [
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_cnic' => $request->customer_cnic,
            'customer_address' => $request->customer_address,
            'customer_placeofwork' => $request->customer_placeofwork,
            'guarantor_name' => $request->guarantor_name,
            'guarantor_phone' => $request->guarantor_phone,
            'guarantor_cnic' => $request->customer_cnic,
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

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function details(Customer $customer)
    {
        return view('superadmin.customerlist.details', [
            'customer' => $customer,
            'items' => Item::where('customer_id', '=', $customer->id)->paginate(1),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('superadmin.customerlist.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
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

        $is_updated = $customer->update($data);

        if ($is_updated) {
            return back()->with(['success' => 'Data has been successfuly updated!']);
        } else {
            return back()->with(['failure' => 'Failed to register!']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $is_deleted = $customer->delete();
        if ($is_deleted) {
            return back()->with(['success' => $customer->customer_name . ' record has been deleted']);
        } else {
            return back()->with(['failure' => 'Something went wrong']);
        }
    }
}
