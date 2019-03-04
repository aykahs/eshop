<?php

use Illuminate\Database\Seeder;
use App\Categorie;
class categorieseedtable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(0, 50) as $index) {
            Categorie::create(
            [

                'name'=>$faker->name,
            ]
        );
    }
}
}
