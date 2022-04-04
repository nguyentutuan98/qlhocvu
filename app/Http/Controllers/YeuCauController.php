<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();
class YeuCauController extends Controller
{
     public function AuthLogin(){
        $masv=Session::get('masv');
        if($masv){
            return Redirect::to('sv');
        }
        else
        {
            return Redirect::to('svlogin')->send();
        }
    }
    public function add_yc()
    {
        $gv=DB::table('giangvien')->get();
        return view('yeucau.add-yc')->with('gv',$gv);
    }
    public function all_yc()
    {
        
        $all_yc= DB::table('yeucau')->get();
        $data= view('yeucau.all-yc')->with('all_yc',$all_yc);
        return view('gv_layout')->with('yeucau.all-yc',$data);
    }
    public function save_yc(Request $request){
    
        
        $data= array();
        //$data['magv']=$request->magv;
        if($request->noidung !=Null && $request->magv !=Null)
        {
        $masv = Session::get('masv');
      
        $data['noidung']=$request->noidung;
        $data['magv']=$request->giangvien;
      
        $data['masv']=$masv;
        DB::table('yeucau')->insert($data);
        Session::put('message','Gửi thành công');
         return Redirect::to('add-yc');
        }
        Session::put('fail','Gửi thất bại');
      return Redirect::to('add-yc');
        
    }
    public function phanhoi($yeucau_id){
        $magv=Session::get('magv');
        if($magv){
            $phanhoi= DB::table('yeucau')->where('mayc',$yeucau_id)->get();

            $data= view('yeucau.phanhoi')->with('phanhoi',$phanhoi);
         
            return view('gv_layout')->with('yeucau.phanhoi',$data)->with('phanhoi',$phanhoi);
        }
        else
        {
            return view('gv_login');
        }
    }
    public function all_phanhoi()
    {
        $all_phanhoi=DB::table('yeucau')->get();
        $data= view('yeucau.all-phanhoi')->with('all_phanhoi',$all_phanhoi);
        return view('sv_layout')->with('yeucau.all-phanhoi',$data);
    }
    public function ds_phanhoi()
    {
        $ds_phanhoi=DB::table('yeucau')->get();
        $data= view('yeucau.ds-phanhoi')->with('ds_phanhoi',$ds_phanhoi);

        return view('gv_layout')->with('yeucau.ds-phanhoi',$data);
    }
    public function save_phanhoi($yeucau_id,Request $request)
    {
        $data= array();
        
        DB::table('yeucau')->where('mayc',$yeucau_id)->update(['phanhoi'=>$request->phanhoi]);     
        
         return Redirect::to('ds-phanhoi');
    }
}
