<?php

namespace App\Models;

use App\Models\InventoryLog;
use App\Models\Item;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'initial_quantity',
        'available_quantity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class, 'inventory_id', 'id');
    }
}
