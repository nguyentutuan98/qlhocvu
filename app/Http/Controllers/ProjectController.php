<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProjectController extends Controller
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
    public function add_project()
    {
        $magv=Session::get('magv'); 
        $detail=DB::table('chitietmon')->join('giangvien','chitietmon.magv','=','giangvien.magv')
                                          ->join('monhoc','chitietmon.mamh','=','monhoc.mamh')->get();
        
        return view('project.add-project')->with('detail',$detail);
    }
    public function all_project()
    {
        $all_project= DB::table('doan')->join('monhoc','monhoc.mamh','=','doan.mamh')->get();
        $data= view('project.all-project')->with('all_project',$all_project);
        return view('gv_layout')->with('subject.all-project',$data);
    }
    public function save_project(Request $request){
    
        
       $this->validate($request,[

            'tendoan'=>'required',
            
        ],[
             'required' => ':attribute Không được để trống'

        ]);
        $magv=Session::get('magv');
        if($magv){
        $data= array();
        $data['tendoan']=$request->tendoan;
        $data['mieuta']=$request->mieuta;
        $data['mamh']=$request->mon;
        $get_file=$request->file('url');
        if($get_file)
        {
            $get_name_file=$get_file->getClientOriginalName();
            $name_file=current(explode('.', $get_name_file));
            $new_file= $name_file.'.'.rand(0,99).'.'.$get_file->getClientOriginalExtension();
            $get_file->move('public/uploads/project',$new_file);
            $data['url']=$new_file;
             DB::table('doan')->insert($data);
       
            Session::put('message','Thêm thành công');
            return Redirect::to('add-project');}
        } else {
            DB::table('doan')->insert($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('add-project');
        }
        
        DB::table('doan')->insert($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('add-project');
        
    }
    public function edit_project($project_id){
        $magv=Session::get('magv');
        if($magv){
            $magv=Session::get('magv'); 
        $detail=DB::table('chitietmon')->join('giangvien','chitietmon.magv','=','giangvien.magv')
                                          ->join('monhoc','chitietmon.mamh','=','monhoc.mamh')->get();
            $edit_project= DB::table('doan')->where('madoan',$project_id)->get();
            $data= view('project.edit-project')->with('edit_project',$edit_project)->with('detail',$detail);
            return view('gv_layout')->with('project.edit-project',$data);
        }
        else
        {
            return view('gv_login');
        }
    }
    public function update_project(Request $request,$project_id){
        
         $data= array();
        $data['tendoan']=$request->tendoan;
        $data['mieuta']=$request->mieuta;
        $data['mamh']=$request->mon;
        $get_file=$request->file('url');
        if($get_file)
        {
            $get_name_file=$get_file->getClientOriginalName();
            $name_file=current(explode('.', $get_name_file));
            $new_file= $name_file.'.'.rand(0,99).'.'.$get_file->getClientOriginalExtension();
            $get_file->move('public/uploads/project',$new_file);
            $data['url']=$new_file;
             DB::table('doan')->where('madoan',$project_id)->update($data);
       
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-project');
        } else {
            DB::table('doan')->insert($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('add-project');
        }
        
        DB::table('doan')->where('madoan',$project_id)->update($data);  
        Session::put('message','Cập nhật thành công');
         return Redirect::to('all-project');

       
       
    }
    public function delete_project($project_id){

       
            DB::table('doan')->where('madoan',$project_id)->delete();  
            Session::put('message','Xóa thành công');
             return Redirect::to('all-project');
}
        public function show_project(){
                $show_exam=DB::table('doan')->get();
                $data= view('project.show-project')->with('show_project',$show_project);
                return view('sv_layout')->with('project.show-project',$data);
            }
}
