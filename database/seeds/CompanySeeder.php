<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $people = App\Person::all();
        $positions = ['Vendedor', 'Encargado', 'Repositor', 'Empleado'];
        $companies = factory(App\Company::class, 5)->create();
        $companies->each(function ($company) use ($people, $positions) {
            $entity = factory(App\Entity::class)->states('company')->make();
            $company->entity()->save($entity);
            $num = rand(1, 10);
            if ($num === 1) {
                $persons = $people->random(rand(1, 2));
                foreach ($persons as $person) {
                    $company->people()->attach($person->id, [
                        'position' => $positions[rand(0, count($positions) - 1)],
                    ]);
                }
            }
        });
    }
}
