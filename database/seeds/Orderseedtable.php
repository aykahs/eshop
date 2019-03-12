<?php

use Illuminate\Database\Seeder;
use App\Order;
class Orderseedtable extends Seeder
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
            Order::create(
            [
                'user_id' => App\User::orderByRaw('RAND()')->first()->id,
                'cart' =>'O:8:"App\Cart":3:{s:5:"items";a:2:{i:51;a:3:{s:3:"qty";i:2;s:5:"price";i:14;s:4:"item";O:11:"App\Product":26:{s:11:"*fillable";a:5:{i:0;s:9:"imagepath";i:1;s:5:"title";i:2;s:11:"description";i:3;s:5:"price";i:4;s:10:"categories";}s:13:"*connection";s:5:"mysql";s:8:"*table";s:8:"products";s:13:"*primaryKey";s:2:"id";s:10:"*keyType";s:3:"int";s:12:"incrementing";b:1;s:7:"*with";a:0:{}s:12:"*withCount";a:0:{}s:10:"*perPage";i:15;s:6:"exists";b:1;s:18:"wasRecentlyCreated";b:0;s:13:"*attributes";a:8:{s:2:"id";i:51;s:9:"imagepath";s:42:"https://lorempixel.com/340/380/cats/?11963";s:5:"title";s:15:"Lila Larkin DDS";s:11:"description";s:115:"Recusandae natus eos ut rerum. Aut minima voluptatem eaque. Nam modi placeat rerum consequatur rerum incidunt modi.";s:10:"categories";s:3:"sit";s:5:"price";i:7;s:10:"created_at";s:19:"2019-03-08 11:26:31";s:10:"updated_at";s:19:"2019-03-08 11:26:31";}s:11:"*original";a:8:{s:2:"id";i:51;s:9:"imagepath";s:42:"https://lorempixel.com/340/380/cats/?11963";s:5:"title";s:15:"Lila Larkin DDS";s:11:"description";s:115:"Recusandae natus eos ut rerum. Aut minima voluptatem eaque. Nam modi placeat rerum consequatur rerum incidunt modi.";s:10:"categories";s:3:"sit";s:5:"price";i:7;s:10:"created_at";s:19:"2019-03-08 11:26:31";s:10:"updated_at";s:19:"2019-03-08 11:26:31";}s:10:"*changes";a:0:{}s:8:"*casts";a:0:{}s:8:"*dates";a:0:{}s:13:"*dateFormat";N;s:10:"*appends";a:0:{}s:19:"*dispatchesEvents";a:0:{}s:14:"*observables";a:0:{}s:12:"*relations";a:0:{}s:10:"*touches";a:0:{}s:10:"timestamps";b:1;s:9:"*hidden";a:0:{}s:10:"*visible";a:0:{}s:10:"*guarded";a:1:{i:0;s:1:"*";}}}i:50;a:3:{s:3:"qty";i:1;s:5:"price";i:3;s:4:"item";O:11:"App\Product":26:{s:11:"*fillable";a:5:{i:0;s:9:"imagepath";i:1;s:5:"title";i:2;s:11:"description";i:3;s:5:"price";i:4;s:10:"categories";}s:13:"*connection";s:5:"mysql";s:8:"*table";s:8:"products";s:13:"*primaryKey";s:2:"id";s:10:"*keyType";s:3:"int";s:12:"incrementing";b:1;s:7:"*with";a:0:{}s:12:"*withCount";a:0:{}s:10:"*perPage";i:15;s:6:"exists";b:1;s:18:"wasRecentlyCreated";b:0;s:13:"*attributes";a:8:{s:2:"id";i:50;s:9:"imagepath";s:42:"https://lorempixel.com/340/380/cats/?46925";s:5:"title";s:10:"Ramona Von";s:11:"description";s:110:"Et amet qui non delectus. Quidem nihil minima iusto dolor commodi qui. Beatae sint quia sapiente libero dolor.";s:10:"categories";s:8:"incidunt";s:5:"price";i:3;s:10:"created_at";s:19:"2019-03-08 11:26:31";s:10:"updated_at";s:19:"2019-03-08 11:26:31";}s:11:"*original";a:8:{s:2:"id";i:50;s:9:"imagepath";s:42:"https://lorempixel.com/340/380/cats/?46925";s:5:"title";s:10:"Ramona Von";s:11:"description";s:110:"Et amet qui non delectus. Quidem nihil minima iusto dolor commodi qui. Beatae sint quia sapiente libero dolor.";s:10:"categories";s:8:"incidunt";s:5:"price";i:3;s:10:"created_at";s:19:"2019-03-08 11:26:31";s:10:"updated_at";s:19:"2019-03-08 11:26:31";}s:10:"*changes";a:0:{}s:8:"*casts";a:0:{}s:8:"*dates";a:0:{}s:13:"*dateFormat";N;s:10:"*appends";a:0:{}s:19:"*dispatchesEvents";a:0:{}s:14:"*observables";a:0:{}s:12:"*relations";a:0:{}s:10:"*touches";a:0:{}s:10:"timestamps";b:1;s:9:"*hidden";a:0:{}s:10:"*visible";a:0:{}s:10:"*guarded";a:1:{i:0;s:1:"*";}}}}s:8:"totalQty";i:3;s:10:"totalprice";i:17;}',
                'payment_id' => $faker->swiftBicNumber

            ]
        );
    }

}
}
