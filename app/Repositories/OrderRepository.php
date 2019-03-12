<?php
 namespace App\Repositories;
use Illuminate\Http\Request;
use App\Order;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderRepository implements OrderInterface
{
    use SoftDeletes;

      public function create($user_id,$cart,$payment_id)
      {
        return Order::create([
            'user_id' => $user_id,
            'cart' => $cart,
            'payment_id' =>$payment_id
        ]);
      }

      public function destroy($id)
      {
            $order=Order::find($id);
            return $order::destroy($id);

      }
      public function recover()
      {
         $order=Auth::user()->orders;
        return $order->withTrashed()->restore();
      }

}

