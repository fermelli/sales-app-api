<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nit', 'establishment_name', 'address', 'phone', 'cellphone', 'city', 'footer_of_invoices', 'path_for_backup', 'exchange_rate', 'tax_percentage'
    ];
}
