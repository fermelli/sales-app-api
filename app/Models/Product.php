<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\ProductResource;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subcategory_id',
        'unit_id',
        'code',
        'name',
        'stock',
        'sale_price',
        'purchase_price',
        'is_active',
    ];

    /**
     * Get the subcategory that owns the product.
     */
    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }

    /**
     * Get the unit that owns the product.
     */
    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    /**
     * Get the additional information record associated with the product.
     */
    public function additional()
    {
        return $this->hasOne('App\Models\Additional');
    }
}
