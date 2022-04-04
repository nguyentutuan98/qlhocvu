<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class SubjectsController extends Controller
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
    public function add_subject()
    {
        
       
        return view('subject.add-subject');
    }
    public function all_subject()
    {
        $all_subject= DB::table('monhoc')->get();
        $data= view('subject.all-subject')->with('all_subject',$all_subject);
        return view('gv_layout')->with('subject.all-subject',$data);
    }
    public function save_subject(Request $request){
    
        $data=$request->validate(
         [   

            'tenmonhoc'=>'required',
            'sotiet'=>'required|min:1',
            'sotinchi'=>'required|min:1',

            
        ],
        [
             'tenmonhoc.required' => 'Tên môn học không được để trống',
             'sotiet.required'=>'Số tiết nhập số lớn hơn 1',
             'sotinchi.required'=>'Số tín chỉ nhập số lớn hơn 1',


        ]);
        $data= array();
        
       // $data['magv']=$request->magv;
        
        $data['tenmonhoc']=$request->tenmonhoc;
        $data['sotiet']=$request->sotiet;
        $data['sotinchi']=$request->sotinchi;
        $data['hocky']=$request->hocky;
        DB::table('monhoc')->insert($data);
        

        Session::put('message','Thêm thành công');
         return Redirect::to('add-subject');
       
        
    }
    public function edit_subject($subject_id){
        $this->AuthLogin();
        $edit_test= DB::table('monhoc')->where('mamh',$subject_id)->get();
        $data= view('subject.edit-subject')->with('edit_subject',$edit_test);
        return view('gv_layout')->with('subject.edit-subject',$data);
    }
    public function update_subject(Request $request,$subject_id){
        
            $data= array();
            $data=$request->validate(
         [   

            'tenmonhoc'=>'required',
            'sotiet'=>'required|min:1',
            'sotinchi'=>'required|min:1',

            
        ],
        [
             'tenmonhoc.required' => 'Tên môn học không được để trống',
             'sotiet.required'=>'Số tiết nhập số lớn hơn 1',
             'sotinchi.required'=>'Số tín chỉ nhập số lớn hơn 1',


        ]);
        if($request->tenmh !=Null && $request->sotiet !=Null && $request->sotinchi !=Null)
        {
        $data['tenmonhoc']=$request->tenmh;
        $data['sotiet']=$request->sotiet;
        $data['sotinchi']=$request->sotinchi;
        $data['hocky']=$request->hocky; 
        DB::table('monhoc')->where('mamh',$subject_id)->update($data);  
        Session::put('message','Cập nhật thành công');
         return Redirect::to('all-subject');}

         Session::put('fail','Cập nhật thất bại');
              return Redirect::to('edit-subject');
       
       
    }
    public function delete_subject($subject_id){

            DB::table('chitietmon')->where('mamh',$subject_id)->delete();
            DB::table('monhoc')->where('mamh',$subject_id)->delete();

            Session::put('message','Xóa thành công');
             return Redirect::to('all-subject');
    
                   
    }

    public function plus_lecturer($subject_id)
    {
         $plus_sub= DB::table('monhoc')->where('mamh',$subject_id)->get();
         $plus_lec= DB::table('giangvien')->get();
        
        $all_detail_sub=DB::table('chitietmon')->join('giangvien','giangvien.magv','=','chitietmon.magv')
                                               ->join('monhoc','monhoc.mamh','=','chitietmon.mamh')
        
        ->get();
       
        $data1= view('subject.plus-lecturer')->with('plus_sub',$plus_sub)->with('plus_lec',$plus_lec)
                                             ->with('all_detail_sub',$all_detail_sub);
        return view('gv_layout')->with('subject.plus-lecturer',$data1);

    }
    public function plus_save_lecturer(Request $request,$subject_id,$lecturer_id)
    {
        $data= array();
        $data['mamh']=$subject_id;
        $data['magv']=$lecturer_id;
        DB::table('chitietmon')->insert($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('plus-lecturer/'.$subject_id);
    }
    public function all_detail_lecturer($subject_id){
        

        $all_detail_lec=DB::table('chitietmon')->join('giangvien','giangvien.magv','=','chitietmon.magv')
                                               ->join('monhoc','monhoc.mamh','=','chitietmon.mamh')
        ->where('monhoc.mamh',$subject_id)
        ->get();
        
        $data= view('subject.plus-lecturer')->with('all_detail_lec',$all_detail_lec);
        return view('gv_layout')->with('subject.plus-lecturer',$data);
    }
    public function delete_plus_lecturer($subject_id,$lecturer_id){
        DB::table('chitietmon')
        ->where('magv',$lecturer_id)->delete();
        Session::put('message','Xóa thành công');
         return Redirect::to('plus-lecturer/'.$subject_id);
    }
     public  function search_lecturer(Request $request){
        
        
    }
    //sinh viên
   
}
