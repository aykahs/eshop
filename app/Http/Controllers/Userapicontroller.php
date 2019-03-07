<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\ProductInterface;
use App\Repositories\OrderInterface;
use App\Http\Resources\productResource as ProductResource;
use App\Http\Resources\OrderResource as OrderResource;
use Auth;
use App\Cart;
use Session;
use App\payment;

class Userapicontroller extends Controller
{
    private $model,$order;

    public function __construct(ProductInterface $model, OrderInterface $order)
    {

        $this->model = $model;
        $this->order = $order;

    }
    public function index()
    {
     return ProductResource::collection($this->model->paginate(6));
     }

     public function add_to_cart(Request $request,$id)
    {
        $product = $this->model->find($id);
        $oldcart =Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldcart);
        $cart->add($id, $product);
        $request->session()->put('cart',$cart);

        return response()->json(['message' =>'sucess']);
     }

     public function Productcount()
     {

        return response()->json(['data' =>Session::get('cart')->totalQty ? Session::get('cart')->totalQty:'0']);
      }
      public function getcheckout()
      {
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $total = $cart->totalprice;
         return response()->json(['data' =>$total],200);
       }

       public function payment(Request $request)
       {
        if(!Session::has('cart') || Session::get('cart')->totalprice == 0)
        {
            return redirect()->route('home');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);

        $validatedData = $request->validate([
            'cardno' => 'required|alpha_num|min:3|max:6',
            'expire_date' => 'required',
            'security_code' =>'required|alpha_num|min:3|max:6',
        ]);
        payment::create($validatedData);
        $order=$this->order->create(Auth::user()->id,serialize($cart),99);
        Session::forget('cart');
        return new OrderResource($order);
       }



      //show all data in session cart
      public function cart(Request $request)
      {


        return response()->json(['data'=>Session::get('cart')],200);

      }
      public function incr_product(Request $request,$id)
      {
        $product = $this->model->find($id);
        $oldcart =Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldcart);
        $cart->incr_product($id, $product);
        $request->session()->put('cart',$cart);
        return response()->json(['message' => 'success'],200);
      }
      public function decr_product(Request $request,$id)
      {
        $product = $this->model->find($id);
        $oldcart =Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldcart);
        $cart->decr_product($id, $product);
        $request->session()->put('cart',$cart);
        return response()->json(['message' => 'success'],200);
      }

      public function delete(Request $request,$id)
      {
        $product = $this->model->find($id);
        $oldcart =Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldcart);
        $cart->delete_product($id, $product);
        $request->session()->put('cart',$cart);
        return response()->json(['message' => 'success'],200);
      }


}
