<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    protected $table = 'product_view';
    public $timestamps = false;

    public function scopeWhereCategoryId($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeWhereCategoryName($query, $categoryName)
    {
        return $query->where('category_name', $categoryName);
    }

    public function scopeWhereSubcategoryId($query, $subcategoryId)
    {
        return $query->where('subcategory_id', $subcategoryId);
    }

    public function scopeWhereSubcategoryName($query, $subcategoryName)
    {
        return $query->where('subcategory_name', $subcategoryName);
    }

    public function scopeWhereNameLike($query, $rule)
    {
        return $query->where('name', 'LIKE', $rule);
    }

    public function scopeWhereCodeLike($query, $rule)
    {
        return $query->where('code', 'LIKE', $rule);
    }

    public function scopeWhereNullDeleteAt($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeWhereNotNullDeleteAt($query)
    {
        return $query->whereNotNull('deleted_at');
    }
}
