<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
        	'name' => "Ayam geprek",
        	'price' => "2000000",
        	'cashier_id' => 1,
        	'category_id' => 1
        ]);
    }
}
