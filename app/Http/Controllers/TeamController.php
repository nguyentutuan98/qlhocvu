<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class TeamController extends Controller
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
    public function add_team()
    {
        $doan=DB::table('doan')->get();
        return view('team.add-team')->with('doan',$doan);
    }
    public function all_team()
    {
        $all_team= DB::table('doan')->join('nhom','nhom.madoan','=','doan.madoan')->get();
        $data= view('team.all-team')->with('all_team',$all_team);
        return view('gv_layout')->with('team.all-team',$data);
    }
    public function save_team(Request $request){
    
        
        $data= array();
        
        //$data['magv']=$request->magv;
        
        $data['tennhom']=$request->tennhom;
        $data['madoan']=$request->doan;
        
        DB::table('nhom')->insert($data);
        Session::put('message','Thêm thành công');
         return Redirect::to('add-team');
        
        
        
    }
    public function edit_team($team_id){
        $this->AuthLogin();
        $doan=DB::table('doan')->get();
        $edit_team= DB::table('nhom')->join('doan','doan.madoan','=','nhom.madoan')->where('manhom',$team_id)->get();
        $data= view('team.edit-team')->with('edit_team',$edit_team)->with('doan',$doan);
        return view('gv_layout')->with('team.edit-team',$data);
    }
    public function update_team(Request $request,$team_id){
        
            $data= array();
        
        $data['tennhom']=$request->tennhom;
        $data['madoan']=$request->doan;
        
        DB::table('nhom')->where('manhom',$team_id)->update($data);  
        Session::put('message','Cập nhật thành công');
         return Redirect::to('all-team');

       
       
    }
    public function delete_team($team_id){

       
            DB::table('nhom')->where('manhom',$team_id)->delete();  
            Session::put('message','Xóa thành công');
             return Redirect::to('all-team');
    }
    public function plus_student($team_id){
        $plus_team=DB::table('nhom')->join('doan','doan.madoan','=','nhom.madoan')->where('manhom',$team_id)->get();
        $plus_student=DB::table('sinhvien')->join('lophoc','sinhvien.malop','=','lophoc.malop')->get();
        $detail_sub=DB::table('chitietlophoc')->join('lophoc','lophoc.malop','=','chitietlophoc.malop')
                                            ->join('monhoc','monhoc.mamh','=','chitietlophoc.mamh')->get();
        $detail_lec=DB::table('chitietmon')->join('giangvien','giangvien.magv','=','chitietmon.magv')->get();
        
         $data1= view('team.plus-student')->with('plus_team',$plus_team)->with('plus_student',$plus_student)->with('detail_sub',$detail_sub)
                                             ->with('detai_lec',$detail_lec);
        return view('gv_layout')->with('team.plus-student',$data1);
    }
    public function save_plus_student($team_id,Request $request,$student_id){
         $data= array();
        $data['manhom']=$team_id;
        $data['masv']=$student_id;
        DB::table('thanhviennhom')->insert($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('plus-student/'.$team_id);
    }
    //sv
    public function download_project($madoan){
        $baitap =  DB::table('doan')->where('madoan',$madoan)->get();
        print_r($baitap);
        foreach ($baitap as $key => $value) {
           $fileName = $value->url;
        }
         echo $fileName;
          $file = 'public/uploads/project/'.$fileName;
         $name = basename($file);
         return response()->download($file, $name);
    }
    public function show_all_team(){
        $student=DB::table('sinhvien')->get();
        $show_team=DB::table('nhom')->join('thanhviennhom','thanhviennhom.manhom','=','nhom.manhom')
                                    ->join('doan','doan.madoan','=','nhom.madoan')->get();
         $data= view('team.show-all-team')->with('show_team',$show_team)->with('student',$student);
        return view('sv_layout')->with('team.show-all-team',$data);
    }
}
