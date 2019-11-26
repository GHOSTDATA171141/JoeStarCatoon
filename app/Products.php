<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Products extends Model
{
    public static function gettype(){
        return DB::table('type')->get();
    }
    public static function add_pro($data){
        //dd('2');
        return DB::table('product')->insert($data);
    }
    public static function getpro(){
        return DB::table('product')->join('type','type.type_id','product.type_id')->get();
    }
    public static function getpro_byid($id){
        return DB::table('product')
        ->join('type','type.type_id','product.type_id')
        ->where('product.pro_id',$id)
        ->first();
    }
    public static function update_pro($data,$pro_id){
        //dd('2');
        return DB::table('product')
        ->where('pro_id',$pro_id)
        ->update($data);
    }
}
