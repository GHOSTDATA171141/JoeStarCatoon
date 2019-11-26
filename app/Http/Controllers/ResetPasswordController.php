<?php

namespace App\Http\Controllers;
use App\RePass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class ResetPasswordController extends Controller
{
    public function resetpass(Request $datain){
        $add=0;
        $password = $datain->input('password');
        $password_confirm = $datain->input('password_confirm');
        if($password == $password_confirm){
            $email = $datain->input('email');
            $secret_pass = $datain->input('secret_pass');
            $dataout = array('password'=>Hash::make($password));
            $add = RePass::update_pass($dataout,$email,$secret_pass);
            //dd($add);
        }
        return redirect('/password/reset');
    }
    
}
