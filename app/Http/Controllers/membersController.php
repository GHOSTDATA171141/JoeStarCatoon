<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members as member;

class membersController extends Controller
{
    public function getList(){
        $member = member::getlist();
        dd($member);
    }
    public function getWomen(){
        $member = member::WhWomen();
        dd($member);
    }
    public function getmember(){
        $member = member::getall();
        //dd($member);
        $data = array('member' => $member);
        return view('member',$data);
    }
    public function postGen(Request $datain){
        $year = $datain->input('year');
        $count = $datain->input('count');
        $dataout = array('year'=>$year,'count'=>$count);
        $add = member::addGen($dataout);
        return redirect('/showgen');
    }
    public function showgen(){
        $member = member::getgen();
        //dd($member);
        $data = array('member' => $member);
        return view('show',$data);
    }
}
