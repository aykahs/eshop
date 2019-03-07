<?php

namespace App;
use Session;
class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalprice = 0;


    public function __construct($oldcart)
    {

        if($oldcart)
        {
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalprice = $oldcart->totalprice;
        }
    }

  public function add($id,$item)
  {

      $store = ['qty'=> 0, 'price' => $item->price,'item'=> $item];
      if($this->items)
      {
          if(array_key_exists($id,$this->items))
          {
              $store = $this->items[$id];
          }
      }
      $store['qty']++;
      $store['price'] = $item->price*$store['qty'];
      $this->items[$id] = $store;
      $this->totalQty++;
      $this->totalprice +=$item->price;

  }
//increment product by 1
  public function incr_product($id,$item)
  {


        if(array_key_exists($id,$this->items))
        {
            $x = $this->items[$id];
        }

    $x['qty']++;
    $x['price'] =$item->price*$x['qty'];
    $this->items[$id] = $x;
    $this->totalQty++;
    $this->totalprice +=$item->price;
  }
  //decrement product by 1
  public function decr_product($id,$item)
  {


        if(array_key_exists($id,$this->items))
        {
            $x = $this->items[$id];

        }

    $x['qty']--;
    $x['price'] =$item->price*$x['qty'];
    $this->items[$id] = $x;
    $this->totalQty--;
    $this->totalprice -=$item->price;
    if($x['qty']==0){
        echo'ok';
                unset($this->items[$id]);


            }

  }
  public function delete_product($id,$item)
  {
    if(array_key_exists($id,$this->items))
    {
        $x = $this->items[$id];


    }
    $this->totalQty-=$x['qty'];
    $this->totalprice -=$item->price*$x['qty'];
    unset($this->items[$id]);
  }

}
