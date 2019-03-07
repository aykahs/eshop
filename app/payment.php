<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable =['cardno','expire_date','security_code'];
}
