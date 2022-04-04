<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class GiaoVienController extends Controller
{
    public function AuthLogin(){
        $magv=Session::get('magv');
        if($magv){
            return Redirect::to('gv');
        }
        else
        {
            return Redirect::to('gvlogin')->send();
        }
    }
    public function show_index(){
        $this->AuthLogin();
    	return view('admin.dashboardgv');
    }
    public function login(){
        
    	 $masv=Session::get('magv');
        if($masv){
            return Redirect::to('gv');
        }
        else
        {
            return view('gv_login');
        }
        
    }
     public function dashboard(Request $req)

    {
        $gv_email = $req->gv_email;
        $gv_pass = $req->gv_pass;
        $result=DB::table('giangvien')->where('taikhoan',$gv_email)->where('matkhau',$gv_pass)->first();
        if($result){
            Session::put('tengv',$result->tengv);
            Session::put('magv',$result->magv);
            return Redirect::to('gv');
        }else {
            Session::put('message','Mật khẩu hoặc tài khoảng không đúng');
            return Redirect::to('gvlogin');
        }
        
    }
    public function gv_logout()
    {
        Session::put('tengv',null);
        Session::put('magv',null);
        return Redirect::to('gvlogin');
    }
    
}
