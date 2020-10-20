<?php

namespace App\Models;

use App\Models\Warehouse;
use App\Models\User;
use App\Models\inventoryRequest;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'contact_number',
        'country',
        'province',
        'city',
        'address',
        'postcode'
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function warehouses() {
        return $this->hasMany(Warehouse::class, 'owner_id', 'id');
    }

    public function inventoryRequests() {
        return $this->hasMany(InventoryRequest::class, 'owner_id', 'id');
    }
}
