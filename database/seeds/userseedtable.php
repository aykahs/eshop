<?php

use Illuminate\Database\Seeder;
use App\User;
class userseedtable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::create(
            [
               'name'=>'prajwol',
               'email' =>'pprajwol.shakya@gmail.com',
               'password' => Hash::make('prajwol'),
            ]);

        $faker = Faker\Factory::create();
        foreach (range(0, 25) as $index) {
            User::create(
                [
                   'name'=>$faker->name,
                   'email' =>$faker->companyEmail,
                   'password' => Hash::make('shakya'),

                ]);
                }
    }
}
