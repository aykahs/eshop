<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use SoftDeletes;

    protected $fillable =['user_id','cart','payment_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    protected $dates = ['deleted_at'];
}
