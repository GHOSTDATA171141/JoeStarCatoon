<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Members extends Model
{
    public static function getlist(){
        //dd('2');
        return DB::table('members_tables')->get()->where('year','0');
    }
    public static function WhWomen(){
        //dd('2');
        return DB::table('members_tables')->get()->where('gender','หญิง');
    }
    public static function getall(){
        //dd('2');
        return DB::table('members_tables')->get();
    }
    public static function addGen($data){
        //dd('2');
        return DB::table('gen')->insert($data);
    }
    public static function getgen(){
        //dd('2');
        return DB::table('gen')->get();
    }
}
