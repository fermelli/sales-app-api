<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the person that owns the user.
     */
    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }

    /**
     * Get the annuled sales for the user.
     */
    public function annuledSales()
    {
        return $this->hasMany('App\Models\Sale', 'nullifier_id');
    }

    /**
     * Get the sales for the user.
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'seller_id');
    }

    /**
     * Get the annuled purchases for the user.
     */
    public function annuledPurchases()
    {
        return $this->hasMany('App\Models\Purchase', 'nullifier_id');
    }

    /**
     * Get the purchases for the user.
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase', 'purchaser_id');
    }
}
