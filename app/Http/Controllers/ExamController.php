<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class ExamController extends Controller
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
    public function add_exam()
    {
        //$id_gv=DB::table('giangvien')->orderby('magv','desc')->get();
        $magv=Session::get('magv'); 
        $detail=DB::table('chitietmon')->join('giangvien','chitietmon.magv','=','giangvien.magv')
                                          ->join('monhoc','chitietmon.mamh','=','monhoc.mamh')->get();
        
    	return view('exam.add-exam')->with('detail',$detail);
    }
    public function all_exam()
    {
        
    	$all_exam= DB::table('baitap')->join('monhoc','monhoc.mamh','=','baitap.mamh')->get();
    	$data= view('exam.all-exam')->with('all_exam',$all_exam);
    	return view('gv_layout')->with('exam.all-exam',$data);
    }
    public function save_exam(Request $request)
    {
        $data=$request->validate(
         [   

            'tenbt'=>'required',

            
        ],
        [
             'tenbt.required' => 'Không được để trống',


        ]);
        $magv=Session::get('magv');
        if(  $request->noidungbt !=Null || $request->url !=Null)
        {
    	$data= array();
    	$data['magv']=$request->magv;
        $data['tenbt']=$request->tenbt;
        $data['mamh']=$request->mon;
        $data['noidung']=$request->noidungbt;

    	$get_file=$request->file('url');
    	if($get_file)
        {
            $get_name_file=$get_file->getClientOriginalName();
            $name_file=current(explode('.', $get_name_file));
            $new_file= $name_file.'.'.rand(0,99).'.'.$get_file->getClientOriginalExtension();
            $get_file->move('public/uploads/exam',$new_file);
            $data['url']=$new_file;
             }
                DB::table('baitap')->insert($data);
           
            Session::put('message','Thêm thành công');
             return Redirect::to('add-exam');
        } else {
            
       
        Session::put('message','Thêm thất bại');
         return Redirect::to('add-exam');
        }
        
        
    }
    public function do_exam(){
        $masv=Session::get('masv');
        if($masv){
            $do_exam= DB::table('baitap')->get();
            $list_mabt = DB::table('lambaitap')->get();
            $data= view('exam.do-exam')->with('do_exam',$do_exam)->with('list_mabt',$list_mabt);
            return view('sv_layout')->with('exam.do-exam',$data);
        }
        else
        {
            return view('sv_login');
        }
        
        
    }
    public function detail_exam($exam_id){

        $masv=Session::get('masv');
        if($masv){
            $detail_exam= DB::table('baitap')->where('mabt',$exam_id)->get();
            $mon=DB::table('monhoc')->get();
            $data= view('exam.detail-exam')->with('detail_exam',$detail_exam)->with('mon',$mon);
            return view('sv_layout')->with('exam.detail-exam',$data);
        }
        else
        {
            return view('sv_login');
        }



     
        
    }
    public function edit_exam($exam_id){
        $magv=Session::get('magv');
        if($magv){
            $detail=DB::table('chitietmon')->join('giangvien','chitietmon.magv','=','giangvien.magv')
                                          ->join('monhoc','chitietmon.mamh','=','monhoc.mamh')->get();
            $edit_exam= DB::table('baitap')->where('mabt',$exam_id)->get();
            $data= view('exam.edit-exam')->with('edit_exam',$edit_exam)->with('detail',$detail);
            return view('gv_layout')->with('exam.edit-exam',$data);
        }
        else
        {
            return view('gv_login');
        }
       

    }
    public function update_exam(Request $request,$exam_id){
        $magv=Session::get('magv');
        if($magv){
            $data= array();
        $data['tenbt']=$request->tenbt;
        $data['noidung']=$request->noidung;
        $data['mamh']=$request->mon;
        $get_file=$request->file('url');
        if($get_file)
        {
            $get_name_file=$get_file->getClientOriginalName();
            $name_file=current(explode('.', $get_name_file));
            $new_file= $name_file.'.'.rand(0,99).'.'.$get_file->getClientOriginalExtension();
            $get_file->move('public/uploads/exam',$new_file);
            $data['url']=$new_file;
             DB::table('baitap')->where('mabt',$exam_id)->update($data);
       
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-exam');
        } else {
            DB::table('baitap')->update($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('all-exam');
        }
        
        
        DB::table('baitap')->where('mabt',$exam_id)->update($data);  
        Session::put('message','Cập nhật thành công');
         return Redirect::to('all-exam');

        
       
    }}
    public function delete_exam($exam_id){

        $magv=Session::get('magv');
        if($magv){
            DB::table('baitap')->where('mabt',$exam_id)->delete();  
            Session::put('message','Xóa thành công');
             return Redirect::to('all-exam');
        }
        else
        {
            return view('gv_login');
        }
       
    }
   public function save_do_exam(Request $request,$exam_id){
        
        $masv=Session::get('masv');
        if($masv){
            $exam= array();
            // $exam['mabt']=$request->mabt;
            $exam['masv']=$request->masv;
            $exam['mabt']=$exam_id;
            $exam['noidungbailam']=$request->dapan;
    
            DB::table('chitietlambaitap')
            //->where('mabt',$exam_id)
            ->insert($exam);


            Session::put('success','Lưu thành công bài tập '.$exam_id);
            Session::put('mabt',$exam_id);
            return Redirect::to('do-exam');
        }
        else
        {
            return view('sv_login');
        }
      
    }
    public function show_exam(){
        $show_exam=DB::table('lambaitap')->get();
        $data= view('exam.show-exam')->with('show_exam',$show_exam);
        return view('gv_layout')->with('exam.show-exam',$data);
    }
    public function upload_exam($exam_id){

        $detail_exam= DB::table('baitap')->where('mabt',$exam_id)->get();  
        $data= view('exam.upload_exam')->with('detail_exam',$detail_exam);

          return view('sv_layout')->with('exam.upload_exam',$data);
    }
     public function do_upload_exam(Request $request,$exam_id){
        if($request->hasFile('file_exam')){
            $file = $request->file_exam;
            $fileName = $file->getClientOriginalName();
            $extend = $file->getClientOriginalExtension();
             //echo $extend;
           
                if($extend == "doc" || $extend == "docx" ){
                    
                    $file->move('public/uploads/do-exam', $fileName);
                    $exam= array();
            // $exam['mabt']=$request->mabt;
            $exam['masv']=$request->masv;
            $exam['mabt']=$exam_id;
            $exam['noidungbailam']=$fileName;
    
            DB::table('chitietlambaitap')
            //->where('mabt',$exam_id)
            ->insert($exam);







                    Session::put('success','Nộp bài thành công');
                    return Redirect::to('do-exam');
                }else{
                    Session::put('message','Chỉ được nộp file world.');
                    return Redirect::to('do-exam');
                    echo "Not ok";
                }
            
          

          
        
        }else{
            Session::put('message','Chưa có file, Nộp bài thất bại!!!');
            return Redirect::to('do-exam');
        }

       
    }
    public function download_exam($mabt){
        $baitap =  DB::table('baitap')->where('mabt',$mabt)->get();
        print_r($baitap);
        foreach ($baitap as $key => $value) {
           $fileName = $value->url;
        }
         echo $fileName;
          $file = 'public/uploads/exam/'.$fileName;
         $name = basename($file);
         return response()->download($file, $name);
    }
    public function search_exam(Request $request){
         if ($request->ajax()) {
            $output = '';
            $products = DB::table('baitap')->where('tenbt', 'LIKE', '%' . $request->search . '%')->get();
            if ($products) {
                foreach ($products as $key => $product) {
                $output .= '<tr>
                    <td>' . $product->tenbt . '</td>
                    <td>' . $product->noidungbt . '</td>
                   <td>' . $product->noidungbt . '</td>
                    </tr>';
                }
            }

            
            return Response($output);
        }
           
        
    }

}
