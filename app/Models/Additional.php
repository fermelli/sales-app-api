<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'observations', 'wholesale_price', 'dozen_price', 'special_price', 'product_image_path', 'product_image_path_1',
    ];

    /**
     * Get the product that owns the additional Information.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
