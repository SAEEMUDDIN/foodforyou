<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_detail extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    function relation_with_user_table()
    {
      return $this->hasOne('App\User', 'id', 'user_id');
    }
    function product(){
      return $this->belongsTo('App\Product');
    }
}
