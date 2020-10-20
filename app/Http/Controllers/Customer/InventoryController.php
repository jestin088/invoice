<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $inventories = Inventory::with(['item', 'warehouse'])
            ->selectRaw('*, sum(available_quantity) as available_quantity')
            ->whereHas('item', function ($query) use ($user) {
                $query->where('item.customer_id', $user->customerDetails->id);
            })
            ->groupBy('item_id')
            ->get();
        return view('inventory.list', ['inventories' => $inventories]);
    }

    public function details($id)
    {
        $user = Auth::user();
        $inventory = Inventory::with(['inventoryLogs', 'item', 'warehouse'])
            ->whereHas('item', function ($query) use ($user) {
                $query->where('item.customer_id', $user->customerDetails->id);
            })
            ->find($id);
        return view('inventory.details', ['inventory' => $inventory]);
    }
}
