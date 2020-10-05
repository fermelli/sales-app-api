<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'invoice_number', 'invoice_date', 'is_in_cash', 'is_national_currency', 'exchange_rate', 'observations', 'is_active', 'annulation_timestamp',
    ];

    /**
     * Get the purchaser that owns the sale.
     */
    public function purchaser()
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
     * Get the supplier that owns the sale.
     */
    public function supplier()
    {
        return $this->belongsTo('App\Models\Entity', 'entity_id');
    }
}
