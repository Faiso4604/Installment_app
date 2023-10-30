<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Installment;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Installment $installment)
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
    public function show(Installment $installment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installment $installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Installment $installment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installment $installment)
{
    // Retrieve the add_installment and item_id from the Installment record
    $add_installment = $installment->add_installment;
    $item_id = $installment->item_id;

    // Delete the Installment record
    $is_deleted = $installment->delete();

    if ($is_deleted) {
        // Update the remaining_amount in the items table
        $item = Item::find($item_id);
        $current_remaining_amount = $item->remaining_amount;
        $new_remaining_amount = $current_remaining_amount + $add_installment;

        // Update the remaining_amount in the items table
        $item->update(['remaining_amount' => $new_remaining_amount]);

        return back()->with(['success' => 'Installment record has been deleted']);
    } else {
        return back()->with(['failure' => 'Something went wrong']);
    }
}

}
