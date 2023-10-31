<?php

namespace App\Http\Controllers\admin;

use App\Models\Item;
use App\Models\Installment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminInstallmentController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Item $item)
    {
        $request->validate([
            'add_installment' => ['required'],
            'remark' => ['required'],
        ]);

        $total_due_amount = $item->remaining_amount;
        $add_installment = $request->add_installment;
        // dd($item->total_due_amount);

        $total_remaining_amount = $total_due_amount - $add_installment;
        //    dump($remaining);

        $data = [
            'item_id' => $item->id,
            'total_remaining_amount' => $total_remaining_amount,
            'add_installment' => $add_installment,
            'remark' => $request->remark,

        ];

        $is_paid = Installment::create($data);

        if ($is_paid) {
            // Update the 'remaining_amount' in the 'items' table
            $item->update(['remaining_amount' => $total_remaining_amount]);
            return back()->with(['success' => 'Installment added']);
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
