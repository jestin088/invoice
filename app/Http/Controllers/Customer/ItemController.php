<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $items = Item::withCount('inventories')
            ->where('customer_id', $user->customerDetails->id)
            ->get();
        return view('item.list', ['items' => $items]);
    }

    public function form($id) {
        $user = Auth::user();
        $item = new Item();
        if (!empty($id)) $item = Item::where('customer_id', $user->customerDetails->id)->find($id);
        return view ('item.form', ['item' => $item]);
    }

    // TO-DO
    // Validation for input
    public function create(Request $request)
    {
        $user = Auth::user();
        $item = new Item();
        $item->customer_id = $user->customerDetails->id;
        $item->fill($request->input());
        $item->save();
        return redirect()->route('customer.items.list');
    }

    public function details($id)
    {
        $user = Auth::user();
        $item = Item::where('customer_id', $user->customerDetails->id)->find($id);
        return view('item.details', ['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $item = Item::where('customer_id', $user->customerDetails->id)->find($id);
        $item->fill($request->input());
        $item->save();
        return redirect()->route('customer.items.list');
    }
}
