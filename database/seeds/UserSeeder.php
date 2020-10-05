<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $person = App\Person::find(1);
        $user->username = 'fermelli';
        $user->password = bcrypt('mellizo55');
        $user->person()->associate($person);
        $user->save();
    }
}
