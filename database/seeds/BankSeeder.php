<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entities = App\Entity::all();
        $banks = factory(App\Bank::class, 2)->create();
        $banks->each(function ($bank) use ($entities) {
            $randomEntities = $entities->random(rand(2, 4));
            foreach ($randomEntities as $entity) {                
                $bank->entities()->attach($entity->id, [
                    'account_number' => '1000000' . rand(1, 200),
                ]);
            }
        });
    }
}
