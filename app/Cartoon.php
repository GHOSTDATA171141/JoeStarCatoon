<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Cartoon extends Model
{
    public static function add_cartoon($data){
        //dd('2');
        return DB::table('cartoon')->insert($data);
    }
    public static function add_chapter($data){
        //dd('2');
        return DB::table('cartoon_link')->insert($data);
    }
    public static function getlist($id){
        //dd($id);
        if($id!="0" && Auth::user()->status != 'user'){
            return DB::table('cartoon')
                ->where('id',$id)
                ->get();
        }else{
            return DB::table('cartoon')
                ->get();
        }
        
    }
    public static function getuser($id){
        //dd('2');
        return DB::table('users')
        ->where('id', '!=', $id)
        ->orderBy('status','ASC')
        ->get();
    }
    public static function getcartoon_byid($id){
        //dd('2');
        return DB::table('cartoon')
        ->where('cartoon_id',$id)
        ->first();
    }
    public static function getlink_byid($id){
        //dd('2');
        return DB::table('cartoon_link')
        ->where('cartoon_id',$id)
        ->orderBy('chapter','ASC')
        ->get();
    }
    public static function getchapter($id){
        //dd('2');
        return DB::table('cartoon_link')
        ->join('cartoon','cartoon.cartoon_id','cartoon_link.cartoon_id')
        ->where('link_id',$id)
        ->orderBy('chapter','ASC')
        ->get();
    }
    public static function update_chapter($data,$link_id){
        //dd('2');
        return DB::table('cartoon_link')
        ->where('link_id',$link_id)
        ->update($data);
    }
    public static function update_cartoon($data,$cartoon_id){
        //dd('2');
        return DB::table('cartoon')
        ->where('cartoon_id',$cartoon_id)
        ->update($data);
    }
    public static function update_status($status,$id){
        //dd('2');
        return DB::table('users')
        ->where('id',$id)
        ->update($status);
    }
    public static function delete_chap($link_id){
        //dd('2');
        return DB::table('cartoon_link')
        ->where('link_id',$link_id)
        ->delete();
    }
    public static function del_user($id){
        //dd('2');
        DB::table('cartoon')
        ->where('id',$id)
        ->delete();
        return DB::table('users')
        ->where('id',$id)
        ->delete();
    }
    public static function del_link($cartoon_id){
        //dd('2');
        return DB::table('cartoon_link')
        ->where('cartoon_id',$cartoon_id)
        ->delete();
    }
    public static function delete_cartoon($cartoon_id){
        //dd('2');
        return DB::table('cartoon')
        ->where('cartoon_id',$cartoon_id)
        ->delete();
        return DB::table('cartoon_link')
        ->where('cartoon_id',$cartoon_id)
        ->delete();
    }
}
