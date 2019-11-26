<?php

namespace App\Http\Controllers;
use App\Cartoon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\File;

class CartoonController extends Controller
{
    public function getcartoon($id){
        //dd($id);
        $cartoon = Cartoon::getlist($id);
        //dd($cartoon);
        $data=array('cartoon'=>$cartoon,'id'=>$id);
        return view('/main_admin',$data);
    }
    public function post_cartoon(Request $datain){
        $cartoon_name = $datain->input('cartoon_name');
        $detail = $datain->input('detail');
        $cartoon_img = $datain->file('cartoon_img');
        $dataout = array('cartoon_name'=>$cartoon_name,'detail'=>$detail,'cartoon_img'=>$cartoon_img);
        //dd($dataout);
        //return DB::table('product')->insert($data);
        $add = Cartoon::add_cartoon($dataout);
        
        return redirect('/cartoon');
    }
    public function store(Request $datain){
        //dd($datain);
        $file = Input::file('cartoon_img');
        $file->move(public_path().'/',$file->getClientOriginalName());
        $cartoon_name = $datain->input('cartoon_name');
        $detail = $datain->input('detail');
        $cartoon_img = $file->getClientOriginalName();
        $id=$datain->input('id');
        $dataout = array('cartoon_name'=>$cartoon_name,'detail'=>$detail,'cartoon_img'=>$cartoon_img,'id'=>$id);
        //dd($dataout);
        $add = Cartoon::add_cartoon($dataout);
        if($add>0){
            return back()->with('status', trans("1"));
        }else{
            return back()->with('status', trans("2"));
        }
        //dd($add);
        // $Cartoon->save();
        //return redirect('/cartoon'.$datain->input('id'));
        //return redirect()->route('cartoon');

    }
    public function addchapter($id){
        $cartoon = Cartoon::getcartoon_byid($id);
        //dd($cartoon);
        $link = Cartoon::getlink_byid($id);
        $data=array('cartoon'=>$cartoon,'link'=>$link);
        //dd($data);
        return view('chapter',$data);

    }
    public function addchap_save(Request $datain){
        $chapter_name = $datain->input('chapter_name');
        $link = $datain->input('link');
        $cartoon_id=$datain->input('cartoon_id');
        $dataout=array('chapter'=>$chapter_name,'link'=>$link,'cartoon_id'=>$cartoon_id);
        $add = Cartoon::add_chapter($dataout);
        if($add>0){
            return back()->with('status', trans("1"));
        }else{
            return back()->with('status', trans("2"));
        }
        //dd($data);
        //return redirect('/chapter'.$cartoon_id);

    }
    public function editcartoon_save(Request $datain){
        $cartoon_id=$datain->input('cartoon_id');
        $cartoon_name = $datain->input('cartoon_name');
        $detail = $datain->input('detail');
        $file = Input::file('cartoon_img');
        if($file!=null){
            File::delete($datain->input('cartoon_img'));
            $file->move(public_path().'/',$file->getClientOriginalName());
            $cartoon_img = $file->getClientOriginalName();
            $dataout=array('cartoon_name'=>$cartoon_name,'detail'=>$detail,'cartoon_img'=>$cartoon_img);
            $add = Cartoon::update_cartoon($dataout,$cartoon_id);
        }else{
            $dataout=array('cartoon_name'=>$cartoon_name,'detail'=>$detail);
            $add = Cartoon::update_cartoon($dataout,$cartoon_id);
        }
        //dd($add);
        if($add>0){
            return back()->with('status', trans("1"));
        }else{
            return back()->with('status', trans("2"));
        }
        //dd($data);
        //return redirect('/edit_toon'.$cartoon_id);

    }
    public function editchap_save(Request $datain){
        $chapter_name = $datain->input('chapter_name');
        $link = $datain->input('link');
        $link_id=$datain->input('link_id');
        $dataout=array('chapter'=>$chapter_name,'link'=>$link);
        $add = Cartoon::update_chapter($dataout,$link_id);
        //dd($data);
        if($add>0){
            return back()->with('status', trans("1"));
        }else{
            return back()->with('status', trans("2"));
        }
        //return redirect('/editchap'.$link_id);

    }
    public function status_save(Request $datain){
        //dd($datain);
        $admin_id=$datain->input('admin_id');
        $id=$datain->input('id');
        $status=$datain->input('status');
        $dataout=array('status'=>$status);
        $add = Cartoon::update_status($dataout,$id);
        //dd($data);
        if($add>0){
            return back()->with('status', trans("1"));
        }else{
            return back()->with('status', trans("2"));
        }
        //return redirect('/adduser/admin/'.$admin_id);
    }
    public function playcartoon($id){
        $link = Cartoon::getchapter($id);
        $data=array('link'=>$link);
        //dd($data);
        return view('player',$data);
    }
    public function editchap($id){
        $link = Cartoon::getchapter($id);
        $data=array('link'=>$link);
        //dd($data);
        return view('editchap',$data);
    }
    public function edit_toon($id){
        //dd($id);
        $cartoon = Cartoon::getcartoon_byid($id);
        $data=array('cartoon'=>$cartoon);
        //dd($data);
        return view('editcartoon',$data);
    }
    public function deletechap($id,$cartoon_id){
        //dd($id,$cartoon_id);
        $delete = Cartoon::delete_chap($id);
        //dd($data);
        if($delete>0){
            return back()->with('status', trans("3"));
        }else{
            return back()->with('status', trans("2"));
        }
        //return redirect('/chapter'.$cartoon_id);
    }
    public function delete_user($id){
        //dd($id,$cartoon_id);
        //dd($id);
        $cartoon = Cartoon::getlist($id);
        foreach ($cartoon as $cartoon) {
            File::delete($cartoon->cartoon_img);
            Cartoon::del_link($cartoon->cartoon_id);
        }
        //dd($cartoon_id->catoon_img);
        $delete = Cartoon::del_user($id);
        //dd($data);
        if($delete>0){
            return back()->with('status', trans("3"));
        }else{
            return back()->with('status', trans("2"));
        }
        //return redirect('/adduser/admin/'.$admin_id);
    }
    public function delete_toon($id,$cartoon_img){
        //dd($id);
        File::delete($cartoon_img);
        $delete = Cartoon::delete_cartoon($id);
        
        //dd($delete);
        if($delete>0){
            return back()->with('status', trans("3"));
        }else{
            return back()->with('status', trans("2"));
        }
        //return redirect('/cartoon');
    }
    public function adduser($status,$id){
        $user = Cartoon::getuser($id);
        //dd($user);
        $data=array('user'=>$user,'status'=>$status,'admin_id'=>$id);
        return view('user',$data);
    }
}
