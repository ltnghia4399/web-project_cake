<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    public function BillDetail(){
        return $this->hasMany('App\BillDetail','id_bill','id');
    }
    
    public function Bill(){
        return $this->belongsTo('App\Customer','id_customer','id');
    }
}
