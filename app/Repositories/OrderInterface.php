<?php
namespace App\Repositories;

interface OrderInterface
{
    public function create($user_id,$cart,$payment_id);
    public function destroy($id);
    public function recover();


}
