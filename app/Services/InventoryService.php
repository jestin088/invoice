<?php

namespace App\Services;

use App\Models\Inventory;
use App\Models\InventoryLog;
use Illuminate\Support\Facades\Auth;

class InventoryService
{
    public static function addInventory($warehouseId, $itemId, $quantity)
    {
        $inventory = new Inventory();
        $inventory->warehouse_id = $warehouseId;
        $inventory->item_id = $itemId;
        $inventory->initial_quantity = $quantity;
        $inventory->available_quantity = $quantity;
        $inventory->save();

        $inventoryLog = new InventoryLog();
        $inventoryLog->user_id = Auth::user()->id;
        $inventoryLog->quantity_before = 0;
        $inventoryLog->quantity_change = $quantity;
        $inventoryLog->quantity_after = $quantity;
        $inventoryLog->description = 'Initial stock';
        $inventory->inventoryLogs()->save($inventoryLog);

        return $inventory;
    }
}
