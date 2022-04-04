<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class ClassController extends Controller
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
    public function add_class()
    {

        $gv=DB::table('giangvien')->get();
        return view('class.add-class')->with('gv',$gv);
    }
    public function all_class()
    {
        
        $all_class= DB::table('lophoc')->get();
        $data= view('class.all-class')->with('all_class',$all_class);
        return view('gv_layout')->with('class.all-class',$data);
    }
    public function save_class(Request $request){
    
        
        $data= array();
       // $data['magv']=$request->magv;
        if($request->tenlop !=Null )
        {
        $data['tenlop']=$request->tenlop;
        $data['chunhiem']=$request->chunhiem;
        DB::table('lophoc')->insert($data);
        Session::put('message','Thêm thành công');
         return Redirect::to('add-class');
        }
        Session::put('fail','Thêm thất bại');
      return Redirect::to('add-class');
        
    }
    public function edit_class($class_id){
        $this->AuthLogin();
        $gv=DB::table('giangvien')->get();
        $edit_test= DB::table('lophoc')->where('malop',$class_id)->get();
        $data= view('class.edit-class')->with('edit_class',$edit_test)->with('gv',$gv);
        return view('gv_layout')->with('class.edit-class',$data);
    }
    public function update_class(Request $request,$class_id){
        
            $data= array();
        
        $data['tenlop']=$request->tenmh;
        $data['chunhiem']=$request->chunhiem;
        
        DB::table('lophoc')->where('malop',$class_id)->update($data);  
        Session::put('message','Cập nhật thành công');
         return Redirect::to('all-class');

       
    }
    public function delete_class($class_id)
    {

            DB::table('sinhvien')->where('malop',$class_id)->delete();    
            DB::table('lophoc')->where('malop',$class_id)->delete();  
            Session::put('message','Xóa thành công');
             return Redirect::to('all-class');
       
    }
    public function update_number_class($class_id){
        $data= array();
        $lop=DB::table('lophoc')->get();
        $chitiet=DB::table('sinhvien')->get();
        $dem=0;
        foreach ($lop as $key => $kt) {
            foreach ($chitiet as $key => $ct) {
                if($kt->malop==$ct->malop){
                    $dem++;
                }
            }
            $data['soluongsv']=$dem;
            DB::table('lophoc')->where('malop',$class_id)->update($data);
        }
         return Redirect::to('all-class');
     }
      public function show_all_student(){
        
        $data=array();
       
        $show_student= DB::table('sinhvien')->join('lophoc','lophoc.malop','=','sinhvien.malop')->get();
        $data= view('class.show-all-student')->with('show_student',$show_student);
        return view('sv_layout')->with('class.show-all-student',$data);
    }
    public function plus_subject($class_id){
        
        $plus_sub= DB::table('monhoc')->get();
         
         $plus_class=DB::table('lophoc')->where('malop',$class_id)->get();
        
        $all_detail_class=DB::table('chitietlophoc')->join('lophoc','lophoc.malop','=','chitietlophoc.malop')
                                               ->join('monhoc','monhoc.mamh','=','chitietlophoc.mamh')
        ->where('lophoc.malop',$class_id)
        ->get();
       
        $data1= view('class.plus-subject')->with('plus_sub',$plus_sub)->with('plus_class',$plus_class)
                                             ->with('all_detail_class',$all_detail_class);
        return view('gv_layout')->with('class.plus-subject',$data1);

    }
    public function save_plus_subject(Request $request,$class_id){
         $all_detail_class=DB::table('chitietlophoc')->join('lophoc','lophoc.malop','=','chitietlophoc.malop')
                                               ->join('monhoc','monhoc.mamh','=','chitietlophoc.mamh')
        ->where('lophoc.malop',$class_id)
        ->get();
         
          $plus_sub= DB::table('monhoc')->get();
          foreach ($all_detail_class as $key => $kt) {
            foreach ($plus_sub as $key => $ct) {
         if ($kt->mamh == $ct->mamh) {
             Session::put('message','Lớp đã thêm');
         return Redirect::to('plus-subject/'.$class_id);
         }
         else{
        $data= array();
        $data['malop']=$class_id;
        $data['mamh']=$request->mon;
        $data['ngaybd']=$request->ngaybd;
        $data['ngaykt']=$request->ngaykt;
        DB::table('chitietlophoc')->insert($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('plus-subject/'.$class_id);}
            }
        }

    }
    public function show_all_subject($class_id){
         $show_subject=DB::table('chitietlophoc')->join('lophoc','lophoc.malop','=','chitietlophoc.malop')
                                               ->join('monhoc','monhoc.mamh','=','chitietlophoc.mamh')->where('lophoc.malop',$class_id)
       
        ->get();
            
        $data= view('class.show-all-subject')->with('show_subject',$show_subject);
        return view('gv_layout')->with('class.show-all-subject',$data);
    }
    public function delete_plus_student($class_id,$student_id){
        
        DB::table('lop')
        ->where('malop',$student_id)->delete();
        Session::put('message','Xóa thành công');
         return Redirect::to('plus-class/'.$class_id);
    }
    //sv 
   
public function all_subject_class()

    {
        
        $student=DB::table('sinhvien')->join('lophoc','lophoc.malop','=','sinhvien.malop')->get();
        $show_subject=DB::table('chitietlophoc')->join('lophoc','lophoc.malop','=','chitietlophoc.malop')
                                               ->join('monhoc','monhoc.mamh','=','chitietlophoc.mamh')
       
        ->get();
            
        $data= view('class.all-subject-class')->with('show_subject',$show_subject)->with('student',$student);
        return view('sv_layout')->with('class.all-subject-class',$data);
    }

}
