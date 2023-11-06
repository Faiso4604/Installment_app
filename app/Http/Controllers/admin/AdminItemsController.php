<?php

namespace App\Http\Controllers\admin;

use App\Models\Item;
use App\Models\Plan;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        return view('admin.itemsmanagment.create', [
            'customer' => $customer,
            'plans' => Plan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        $request->validate([
            'product_name' => ['required'],
            'actual_price' => ['required', 'numeric'],
            'down_payment' => ['required', 'numeric'],
            'plan_id' => ['required'],
        ]);

        $actual_price = $request->actual_price;
        $down_payment = $request->down_payment;
        $plan = Plan::find($request->plan_id);
        $months = $plan->months;
        $interest_rate = $plan->interest_rate / 100;

        $balance = $actual_price - $down_payment;
        $profit = $balance * $interest_rate;
        $total_due_amount = $balance + $profit;
        $per_month = $total_due_amount / $months;
        $total_amount = $total_due_amount + $down_payment;

        $data = [
            'plan_id' => $plan->id,
            'customer_id' => $customer->id,
            'item_name' => $request->product_name,
            'item_price' => $actual_price,
            'down_payment' => $down_payment,
            'balance' => $balance,
            'profit' => $profit,
            'total_due_amount' => $total_due_amount,
            'per_month' => $per_month,
            'total_amount' => $total_amount,
            'remaining_amount' => $total_due_amount,
        ];

        $is_registered = Item::create($data);

        if ($is_registered) {
            return back()->with(['success' => 'New customer has been added']);
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
