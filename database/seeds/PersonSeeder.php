<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('people')->insert([
            'names'             => 'Luis Fernando',
            'paternal_surname'  => 'Salgado',
            'maternal_surname'  => 'Miguez',
        ]);
        DB::table('entities')->insert([
            'entityable_id'     => 1,
            'entityable_type'   => 'App\Person',
            'ci_nit'            => '8510425',
            'address'           => 'Nataniel Aguirre # 501',
            'phone'             => null,
            'cellphone'         => '78663650',
            'email'             => 'luisfernandosalgadomiguez@gmail.com',
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        $persons = factory(App\Person::class, 4)->create();
        $persons->each(function ($person) {
            $entity = factory(App\Entity::class)->make();
            $person->entity()->save($entity);
        });
    }
}
