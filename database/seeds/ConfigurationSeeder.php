<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'nit'                   => '11111111111111',
            'establishment_name'    => 'MAXIMPLE',
            'address'               => 'Jaime Mendoza # 853',
            'phone'                 => '6412345',
            'cellphone'             => '70000000',
            'city'                  => 'Sucre',
            'footer_of_invoices'    => 'Supermercado para todas tus compras',
            'path_for_backup'       => 'data',
            'exchange_rate'         => 6.95,
            'tax_percentage'        => 0.13,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
    }
}
