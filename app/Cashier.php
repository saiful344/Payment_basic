<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
	protected $table = "cashier";

    public function product(){
    	return $this->hasMany('App/Product');
    }
}
