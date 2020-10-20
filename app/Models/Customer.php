<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use App\Models\WarehouseRequest;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

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

    public function items() {
        return $this->hasMany(Item::class, 'customer_id', 'id');
    }

    public function warehouseRequests() {
        return $this->hasMany(WarehouseRequest::class, 'customer_id', 'id');
    }
}
