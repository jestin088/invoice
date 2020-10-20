<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class CustomerInvoice extends Model
{
    protected $table = 'customer_invoice';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'remarks'
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
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
