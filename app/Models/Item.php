<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Inventory;
use App\Models\WarehouseRequestItem;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'notes',
        'user_sku',
        'admin_sku',
        'system_sku'
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

    public function owner()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'warehouse_id', 'id');
    }

    public function warehouseRequestItems()
    {
        return $this->hasMany(WarehouseRequestItem::class, 'warehouse_request_id', 'id');
    }
}
