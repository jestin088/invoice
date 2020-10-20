<?php

namespace App\Models;

use App\Models\Inventory;
use App\Models\Owner;
use App\Models\WarehouseRequest;
use App\Models\WarehouseImage;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouse';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'contact_person',
        'contact_number',
        'country',
        'province',
        'city',
        'address',
        'postcode',
        'measurement_unit',
        'width',
        'height',
        'length',
        'area',
        'volume'
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
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'warehouse_id', 'id');
    }

    public function warehouseImage()
    {
        return $this->hasMany(WarehouseImage::class, 'warehouse_image_id', 'id');
    }

    public function warehouseRequests()
    {
        return $this->hasMany(WarehouseRequest::class, 'warehouse_id', 'id');
    }
}
