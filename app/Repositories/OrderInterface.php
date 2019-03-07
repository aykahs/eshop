<?php
namespace App\Repositories;

interface OrderInterface
{
    public function create($user_id,$cart,$payment_id);
}
