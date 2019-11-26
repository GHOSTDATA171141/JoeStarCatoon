<?php

namespace App\Http\Controllers;
use App\Products as product;
use Illuminate\Http\Request;
use DB;

class ProductsController extends Controller
{
    public function getform(){
        $type = product::gettype();
        $data=array('type'=>$type);
        return view('form_add',$data);
    }
    public function postform(Request $datain){
        $pro_name = $datain->input('pro_name');
        $price = $datain->input('price');
        $type_id = $datain->input('type');
        $dataout = array('pro_name'=>$pro_name,'price'=>$price,'type_id'=>$type_id);
        //dd($dataout);
        //return DB::table('product')->insert($data);
        $add = product::add_pro($dataout);
        return redirect('/prolist');
    }
    public function showpro(){
        $product = product::getpro();
        $data=array('product'=>$product);
        dd($data);
    }
    public function prolist(){
        $product = product::getpro();
        $data=array('product'=>$product);
        return view('prolist',$data);
    }
    public function getedit($id){
        $product = product::getpro_byid($id);
        $type = product::gettype();
        $data=array('product'=>$product,'type'=>$type);
        return view('edit_pro',$data);
    }
    public function updateform(Request $datain){
        $pro_id = $datain->input('pro_id');
        $pro_name = $datain->input('pro_name');
        $price = $datain->input('price');
        $type_id = $datain->input('type');
        $dataout = array('pro_name'=>$pro_name,'price'=>$price,'type_id'=>$type_id);
        //dd($dataout);
        //return DB::table('product')->insert($data);
        $add = product::update_pro($dataout,$pro_id);
        return redirect('/prolist');
    }
}
