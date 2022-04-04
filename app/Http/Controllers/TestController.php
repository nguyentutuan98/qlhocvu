<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();

class TestController extends Controller
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
	public function add_test()
	{
        $this->AuthLogin();
		$magv=Session::get('magv'); 
        $detail=DB::table('chitietmon')->join('giangvien','chitietmon.magv','=','giangvien.magv')
                                          ->join('monhoc','chitietmon.mamh','=','monhoc.mamh')->get();
        
        return view('test.add-test')->with('detail',$detail);
	}
    public function all_test()
    {
        $this->AuthLogin();

    	$all_test= DB::table('baikiemtra')->join('monhoc','monhoc.mamh','=','baikiemtra.mamh')->get();
        $data= view('test.all-test')->with('all_test',$all_test);
        return view('gv_layout')->with('test.all-test',$data);
    }
    public function save_test(Request $request){
    	$this->validate($request,[

            'tenkt'=>'required',
            'ngaylam'=>'required',
            'thoigian'=>'required|integer',
            
        ],[
             'required' => ':attribute Không được để trống',
             'integer' => ':attribute Chỉ được nhập số'

        ]);
        $magv=Session::get('magv');
        if($magv){
    	$data= array();
    	$data['magv']=$request->magv;
    	$data['tenkt']=$request->tenkt;
        $data['mamh']=$request->mon;
    	$now = Carbon::now('Asia/Ho_Chi_Minh');
        $data['thoigianlam']=$request->thoigian;
            if($request->ngaylam>= $now){
            $data['ngaylam']=$request->ngaylam;
        DB::table('baikiemtra')->insert($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('add-test');}
            }
        Session::put('fail','Thất bại');
        return Redirect::to('add-test');
       
    }
    public function edit_test($test_id){
        $this->AuthLogin();
        $magv=Session::get('magv'); 
        $detail=DB::table('chitietmon')->join('giangvien','chitietmon.magv','=','giangvien.magv')
                                          ->join('monhoc','chitietmon.mamh','=','monhoc.mamh')->get();
        $edit_test= DB::table('baikiemtra')->where('makt',$test_id)->get();
        $data= view('test.edit-test')->with('edit_test',$edit_test)->with('detail',$detail);
        return view('gv_layout')->with('test.edit-test',$data);
    }
    public function update_test (Request $request,$test_id){
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $data= array();

        
        $data['tenkt']=$request->tenkt;
        $data['mamh']=$request->mon;
        $data['thoigianlam']=$request->thoigian;
        
        if($request->ngaylam>= $now){
            $data['ngaylam']=$request->ngaylam;
        DB::table('baikt')->where('makt',$test_id)->update($data);
       
        Session::put('message','Cập nhật thành công');
         return Redirect::to('all-test');
            }
        Session::put('fail','Thất bại');
        return Redirect::to('all-test');

    }
    public function delete_test($test_id){
         DB::table('baikiemtra')->where('makt',$test_id)->delete();
        Session::put('message','Xóa thành công');
         return Redirect::to('all-test');
    }
    public function plus_question($test_id){
        
        $plus_test= DB::table('baikiemtra')->where('makt',$test_id) ->get();
        $plus_question= DB::table('cauhoi')->join('monhoc','monhoc.mamh','=','cauhoi.mamh')->get();
        //$data= view('test.plus-question')->with('plus_test',$plus_test);
        //return view('gv_layout')->with('test.plus-question',$data);
        
        $all_detail_test=DB::table('chitietbaikiemtra')->join('baikiemtra','baikiemtra.makt','=','chitietbaikiemtra.makt')->join('cauhoi','cauhoi.mach','=','chitietbaikiemtra.mach')->where('baikiemtra.makt',$test_id)
        ->get();
       
        $data1= view('test.plus-question')->with('plus_question',$plus_question)->with('plus_test',$plus_test)->with('all_detail_test',$all_detail_test);
        return view('gv_layout')->with('test.plus-question',$data1);
    }
    public function save_plus_question(Request $request,$test_id,$question_id){
        $data= array();
        $data['makt']=$test_id;
        $data['mach']=$question_id;
        DB::table('chitietbaikiemtra')->insert($data);
       
        Session::put('message','Thêm thành công');
         return Redirect::to('plus-question/'.$test_id);

    }
    public function all_detail_test(){
        $all_detail_test=DB::table('chitietbaikiemtra')->join('baikiemtra','baikiemtra.makt','=','chitietbaikiemtra.makt')->join('cauhoi','cauhoi.mach','=','chitietbaikiemtra.mach')
        ->get();
        $data= view('test.plus-question')->with('all_detail_test',$all_detail_test);
        return view('gv_layout')->with('test.plus-question',$data);
    }
    public function delete_plus_question($test_id,$question_id){
        DB::table('chitietbaikiemtra')
        ->where('mach',$question_id)->delete();
        Session::put('message','Xóa thành công');
         return Redirect::to('plus-question/'.$test_id);
    }
    //sinhvien
    public function do_test()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
       
        $do_test= DB::table('baikiemtra')->get();
        
        
        $list_makt = DB::table('lamkiemtra')->get();
        $data= view('test.do-test')->with('do_test',$do_test)->with('list_makt',$list_makt)->with('now',$now);
        return view('sv_layout')->with('test.do-test',$data);

    }
    public function show_test(){
        $show_test=DB::table('lamkiemtra')->get();
        $data= view('test.show-test')->with('show_test',$show_test);
        return view('gv_layout')->with('test.show-test',$data);
    }
    public function update_number_test($test_id){
        $data= array();
        $baikt=DB::table('baikiemtra')->get();
        $chitiet=DB::table('chitietbaikiemtra')->get();
        $dem=0;
        foreach ($baikt as $key => $kt) {
            foreach ($chitiet as $key => $ct) {
                if($kt->makt==$ct->makt){
                    $dem++;
                }
            }
            $data['soluongcau']=$dem;
            DB::table('baikiemtra')->where('makt',$test_id)->update($data);
        }
         return Redirect::to('all-test');
    }
    public  function search_test(Request $request){
        if ($request->ajax()) {
            $output = '';
            $products = DB::table('baikiemtra')->where('tenkt', 'LIKE', '%' . $request->search . '%')->get();
            if ($products) {
                foreach ($products as $key => $product) {
                $output .= '<tr>
                    <td>' . $product->tenkt . '</td>
                    <td>' . $product->ngaylam . '</td>
                   <td>' . $product->soluong . '</td>
                   <td>' . $product->thoigian . '</td>
                   
                    </tr>';
                }
            }

            
            return Response($output);
        }
    }
}
