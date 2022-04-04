<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SinhVienController extends Controller
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
    public function show_index(){
        $this->AuthLogin();
    	return view('admin.dashboard');
    }
    public function login(){
        
    	 $masv=Session::get('masv');
        if($masv){
            return Redirect::to('sv');
        }
        else
        {
            return view('sv_login');
        }
        
    }

    public function dashboard(Request $req)

    {
    	$sv_email = $req->sv_email;
    	$sv_pass = $req->sv_pass;
    	$result=DB::table('sinhvien')->where('taikhoan',$sv_email)->where('matkhau',$sv_pass)->first();
        if($result){
            Session::put('tensv',$result->tensv);
            Session::put('masv',$result->masv);
            return Redirect::to('sv');
        }else {
            Session::put('message','Mật khẩu hoặc tài khoảng không đúng');
            return Redirect::to('svlogin');
        }
    	
    }
    public function sv_logout()
    {
        $this->AuthLogin();
        Session::put('tensv',null);
        Session::put('masv',null);
        return Redirect::to('svlogin');
    }
    public function add_student()
    {
        $lop=DB::table('lophoc')->get();
        return view('student.add-student')->with('lop',$lop);
    }

    public function save_student(Request $request)
    {
        $data= array();
       // $data['magv']=$request->magv;
        if($request->tensv !=Null )
        {
        $data['tensv']=$request->tensv;
        $data['taikhoan']=$request->taikhoan;
        $data['matkhau']=$request->matkhau;
        $data['malop']=$request->lop;
        $data['gioitinh']=$request->gioitinh;
        $data['sdt']=$request->dienthoai;
        
        DB::table('sinhvien')->insert($data);
        Session::put('message','Thêm thành công');
         return Redirect::to('add-student');
        }
        Session::put('fail','Thêm thất bại');
      return Redirect::to('add-student');
        
    }
    public function all_student(){
         $all_student= DB::table('sinhvien')->join('lophoc','sinhvien.malop','=','lophoc.malop')->get();
        $data= view('student.all-student')->with('all_student',$all_student);
        return view('gv_layout')->with('student.all-student',$data);
    }
    public function edit_student($student_id){
        $this->AuthLogin();
        $lop=DB::table('lophoc')->get();
        $edit_student= DB::table('sinhvien')->where('masv',$student_id)->get();
        $data= view('student.edit-student')->with('edit_student',$edit_student)->with('lop',$lop);
        return view('gv_layout')->with('student.edit-student',$data);
    }
    public function update_student(Request $request,$student_id){
         $data= array();
        $data['tensv']=$request->tensv;
        $data['taikhoan']=$request->taikhoan;
        $data['matkhau']=$request->matkhau;
        $data['malop']=$request->lop;
        $data['gioitinh']=$request->gioitinh;
        $data['sdt']=$request->dienthoai;
        
        DB::table('sinhvien')->where('masv',$student_id)->update($data);
        Session::put('message','Cập nhật thành công');
         return Redirect::to('all-student');
        
    }
    public function delete_student($student_id)
    {

       
            DB::table('sinhvien')->where('masv',$student_id)->delete();  
            Session::put('message','Xóa thành công');
             return Redirect::to('all-student');
       
    }
     

}