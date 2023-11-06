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
        return view('superadmin.itemsmanagment.index', [
            'items'=> Item::all(),
        ]);
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
    public function edit(Item $item)
    {
        return view('superadmin.itemsmanagment.edit', [
            'item'=> $item,
            'plans' => Plan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
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

            $data = [
                'plan_id' => $plan->id,
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

            $is_registered = $item->update($data);

            if ($is_registered) {
                return back()->with(['success' => 'New customer has been added']);
            } else {
                return back()->with(['failure' => 'Failed to register!']);
            }
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $is_deleted = $item->delete();
        if ($is_deleted) {
            return back()->with(['success' => $item->item_name . ' item of ' . $item->customers->customer_name . ' record has been deleted']);
        } else {
            return back()->with(['failure' => 'Something went wrong']);
        }
    }
}
