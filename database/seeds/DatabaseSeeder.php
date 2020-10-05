<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            SubcategorySeeder::class,
            UnitSeeder::class,
            // ProductSeeder::class,
            // AdditionalSeeder::class,
            PersonSeeder::class,
            CompanySeeder::class,
            UserSeeder::class,
            BankSeeder::class,
            ConfigurationSeeder::class,
        ]);
    }
}
