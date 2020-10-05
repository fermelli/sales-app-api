<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The entities that belong to the bank.
     */
    public function entities()
    {
        return $this->belongsToMany('App\Models\Entity')
            ->withPivot(['account_number'])
            ->withTimestamps();
    }
}
