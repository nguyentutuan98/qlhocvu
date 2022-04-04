<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class QuestionController extends Controller
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
   public function add_question()
    {   
        $magv=Session::get('magv'); 
        $detail=DB::table('chitietmon')->join('giangvien','chitietmon.magv','=','giangvien.magv')
                                          ->join('monhoc','chitietmon.mamh','=','monhoc.mamh')->get();
    	return view('test.add-question')->with('detail',$detail);
    }
    public function all_question()
    {

    	$all_question= DB::table('cauhoi')->join('monhoc','monhoc.mamh','=','cauhoi.mamh')->get();
    	$data= view('test.all-question')->with('all_question',$all_question);
    	return view('gv_layout')->with('test.all-question',$data);
    }
    public function save_question(Request $request){
    
        
        $data= array();
        $data['magv']=$request->magv;
        if($request->noidung !=Null && $request->pa1 !=Null && $request->pa2 !=Null&& $request->pa3 !=Null && $request->pa4 !=Null && $request->da !=Null)
        {
        $data['noidung']=$request->noidung;
        $data['luachon1']=$request->pa1;
        $data['luachon2']=$request->pa2;
        $data['luachon3']=$request->pa3;
        $data['luachon4']=$request->pa4;
        $data['dapan']=$request->da;
        $data['mamh']=$request->mon;
        
        DB::table('cauhoi')->insert($data);
        Session::put('message','Thêm thành công');
         return Redirect::to('add-question');
        }
        Session::put('fail','Thêm thất bại');
      return Redirect::to('add-question');
        
    }
    public function edit_question($question_id){
         $magv=Session::get('magv'); 
        $detail=DB::table('chitietmon')->join('giangvien','chitietmon.magv','=','giangvien.magv')
                                          ->join('monhoc','chitietmon.mamh','=','monhoc.mamh')->get();
        $edit_question= DB::table('cauhoi')->where('mach',$question_id)->get();
        $data= view('test.edit-question')->with('edit_question',$edit_question)->with('detail',$detail);
        return view('gv_layout')->with('test.edit-question',$data);
        //return view('test.edit-question');
    }
    public function update_question(Request $request,$question_id){
        $data= array();
        
       
        $data['noidung']=$request->noidung;
        $data['luachon1']=$request->pa1;
        $data['luachon2']=$request->pa2;
        $data['luachon3']=$request->pa3;
        $data['luachon4']=$request->pa4;
        $data['dapan']=$request->da;
        $data['mamh']=$request->mon;
         DB::table('cauhoi')->where('mach',$question_id)->update($data);
        Session::put('message','Cập nhật thành công');
         return Redirect::to('all-question');

    }

  
    public function delete_question($question_id){
        DB::table('chitietbaikiemtra')->where('mach',$question_id)->delete();
        DB::table('cauhoi')->where('mach',$question_id)->delete();
         Session::put('message','Xóa thành công');
         return Redirect::to('all-question');

    }
    public function detail_question($detail_question_id){
       
         $detail_question= DB::table('baikt')
        ->join('chitietbaikiemtra', 'baikt.makt', '=', 'baikt.makt')
        ->join('cauhoi', 'cauhoi.mach', '=', 'chitietbaikiemtra.mach')
        ->where('chitietbaikiemtra.makt',$detail_question_id)
        ->where('baikt.makt',$detail_question_id)
        ->get();
        $data= view('test.detail-question')->with('detail_question',$detail_question);
        return view('sv_layout')->with('test.detail-question',$data);

    }
    public function search_question(Request $request){
        if ($request->ajax()) {
            $output = '';
            $products = DB::table('cauhoi')->where('noidung', 'LIKE', '%' . $request->search . '%')->get();
            if ($products) {
                foreach ($products as $key => $product) {
                $output .= '<tr>
                    <td>' . $product->noidung . '</td>
                    <td>' . $product->luachon1 . '</td>
                   <td>' . $product->luachon2 . '</td>
                   <td>' . $product->luachon3 . '</td>
                   <td>' . $product->luachon4 . '</td>
                    </tr>';
                }
            }

            
            return Response($output);
        }
    }
           
        
    
    
    
         public function save_do_question(Request $request)
    {
        //  $data= array();
        
        // $data['makt'] = $request->makt;
        // $data['masv'] = $request->masv;
        // $data['mach'] = $request->mach;

        // $data['dapanbailam']=$request->pa1;
        // $data['phuongan2']=$request->pa2;
        // $data['phuongan3']=$request->pa3;
        // $data['phuongan4']=$request->pa4;
        
        //  DB::table('cauhoitracnghiem')->where('makt',$detail_question_id)->update($data);
        // Session::put('message','Cập nhật thành công');
        //  return Redirect::to('all-question');

        echo "-----------------------";
        $dapan =  $request->all();
        echo "<pre>";
        print_r($dapan);
        echo "</pre>";
        echo '<br>';
        echo "-----------------------";

      $mach = $request->mach;
/*      echo "<pre>";
      print_r($mach) ;
      echo "</pre>";*/

             // $b = new Book();
          //$getBook = $b-> getDetail($key);
                  foreach ($mach as $k => $r) {
                       // echo $r;
                           /* $gia = $r["gia"] *$value;
                            $this->tong+=$gia;*/
/*
                     $sql = "INSERT INTO  chitiethd (mahd,masp,soluong,gia)
                      VALUES ('$mahd','$key','$value','$gia')";
                        $this->exeNoneQuery($sql);*/

                        $data= array();
                        
                        $data['makt'] = $request->makt;
                        $data['masv'] = $request->masv;
                        $data['mach'] = $r;
                        $data['dapanlambai'] = $request->{'rad'.$r};
                        //echo 'rad'.$r."<br>";

                        DB::table('chitietlamkiemtra')->insert($data);

                  }
                   Session::put('success_do_test','Bài kiểm tra đã được nộp.');
        return Redirect::to('do-test');

    }
}
