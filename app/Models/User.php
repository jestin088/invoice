<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Owner;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function customerDetails()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }

    public function ownerDetails()
    {
        return $this->hasOne(Owner::class, 'user_id', 'id');
    }
}
