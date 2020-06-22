<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "product";

	protected $fillable = ['name','price','cashier_id','category_id'];


    public function cashier(){
    	return $this->belongsTo('App\Cashier');
    }
    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
