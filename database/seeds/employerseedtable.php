<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Employer;
class employerseedtable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Employer::create(
            [
               'name'=>'prajwol',
               'email' =>'pprajwol.shakya@gmail.com',
               'password' => Hash::make('prajwol'),
               'role' =>'admin'
            ]);
           
            foreach (range(0, 25) as $index) {
                Employer::create(
                    [
                       'name'=>$faker->name,
                       'email' =>$faker->companyEmail,
                       'password' => Hash::make('shakya'),
                       'role' =>$faker->cityPrefix 
                    ]);
        }
            
    }
}
