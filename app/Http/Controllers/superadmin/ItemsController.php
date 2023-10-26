<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Plan;
use Illuminate\Http\Request;

class ItemsController extends Controller
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
    public function create(Customer $customer)
    {
        return view('superadmin.itemsmanagment.create', [
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
            'actual_price' => ['required'],
            'down_payment' => ['required'],
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

        // dump($request->all());
        // dump($actual_price);
        // dump($down_payment);
        // dump($months);
        // dump($interest_rate);

        // dump($balance);
        // dump($profit);
        // dump($total_due_amount);
        // dump($per_month);
        // dump($balance);
        // die();

        $data = [
            'customer_id' => $customer->id,
            'item_name' => $request->product_name,
            'item_price' => $actual_price,
            'down_payment' => $down_payment,
            'balance' => $balance,
            'profit' => $profit,
            'total_due_amount' => $total_due_amount,
            'per_month' => $per_month,
            'total_amount' => $total_amount,
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
