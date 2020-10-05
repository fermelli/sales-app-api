<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'area', 'fax_number',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the company's entity.
     */
    public function entity()
    {
        return $this->morphOne('App\Models\Entity', 'entityable');
    }

    /**
     * The people that belong to the company.
     */
    public function people()
    {
        return $this->belongsToMany('App\Models\Person')
            ->withPivot(['position'])
            ->withTimestamps();
    }
}
