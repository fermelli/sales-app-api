<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'with_invoice', 'is_in_cash', 'is_national_currency', 'exchange_rate', 'observations', 'is_quotation', 'is_active', 'annulation_timestamp',
    ];

    /**
     * Get the seller that owns the sale.
     */
    public function seller()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the nullifier that owns the sale.
     */
    public function nullifier()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the customer that owns the sale.
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Entity', 'entity_id');
    }
}
