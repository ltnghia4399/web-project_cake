<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function ProductType(){
        return $this->belongsTo('App\ProductType','id_type','id');
    }

    public function BillDetail(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }
}
