<?php

namespace App\Http\Controllers\customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function customer_login(Request $request)
    {
        $customer = Customer::where('customer_phone', $request->input('customer_phone'))
            ->where('customer_cnic', $request->input('customer_cnic'))
            ->first();

        if ($customer) {
            return redirect()->route('customer.show');
        } else {
            // Handle case when no matching customer is found
            return redirect()->route('customer.login')->with('error', 'Customer not found.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show()
    {
        return view('customer.show');
    }

    public function create()
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with(['success'=> 'Succesfully logout']);
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
