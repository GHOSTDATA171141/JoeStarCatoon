<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class RePass extends Model
{
    public static function update_pass($pass,$email,$secret_pass){
            $count = DB::table('users')
            ->where('email',$email)
            ->where('spass',$secret_pass)
            ->update($pass);
            if($count>0){
                return back()->with('status', trans("1"));
            }else{
                return back()->with('status', trans("2"));
            }
    }
}
