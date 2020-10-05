<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ci_nit', 'address', 'phone', 'cellphone', 'email', 'type',
    ];

    /**
     * Get the owning entityable model.
     */
    public function entityable()
    {
        return $this->morphTo();
    }

    /**
     * The banks that belong to the entity.
     */
    public function banks()
    {
        return $this->belongsToMany('App\Models\Bank')
            ->withPivot(['account_number'])
            ->withTimestamps();
    }

    /**
     * Get the purchases for the entity.
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Sale', 'entity_id');
    }

    /**
     * Get the sales for the entity.
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Purchase', 'entity_id');
    }
}
