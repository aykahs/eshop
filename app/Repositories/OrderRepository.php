<?php
 namespace App\Repositories;
use Illuminate\Http\Request;
use App\Order;
class OrderRepository implements OrderInterface
{


      public function create($user_id,$cart,$payment_id)
      {
        return Order::create([
            'user_id' => $user_id,
            'cart' => $cart,
            'payment_id' =>$payment_id
        ]);
      }



}

