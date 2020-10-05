<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'names', 'paternal_surname', 'maternal_surname',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the person's entity.
     */
    public function entity()
    {
        return $this->morphOne('App\Models\Entity', 'entityable');
    }

    /**
     * The companies that belong to the person.
     */
    public function companies()
    {
        return $this->belongsToMany('App\Models\Company')
            ->withPivot(['position'])
            ->withTimestamps();
    }

    /**
     * Get the user record associated with the person.
     */
    public function user()
    {
        return $this->hasOne('App\Models\Person');
    }
}
