<?php

use Illuminate\Database\Seeder;
use App\product;
class productseedtable extends Seeder
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
            product::create(
            [
                'imagepath'=>$faker->imageUrl($width = 340, $height = 380, 'cats') ,
                'title'=>$faker->title,
                'description'=> $faker->paragraph(2),
                'categories'=> $faker->title,
                'price'=> $faker->randomDigitNotNull
            ]
        );
    }
}
}

