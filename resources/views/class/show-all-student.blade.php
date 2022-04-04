@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sinh viên lớp 
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-4">
      </div>
     <div class="row w3-res-tb">
      
      <div class="col-sm-2">Tìm kiếm
      </div>
        <div class="col-sm-3">
        <div class="input-group">
          <input type="text" id ="search" class="input-sm form-control" placeholder="Search">
          
            
        </div>
      </div>
      </form>
      </div>
    </div>
   
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                           }
                        ?>
          <tr>
           
            
            
            <th>Tên sinh viên</th>
            <th>Tài khoản</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($show_student as $key => $exam)
        
          <tr>
            
            
            <td>{{$exam->tensv}}</td>
            <td>{{$exam->taikhoan}}</td>
            <td>{{$exam->gioitinh}}</td>
            <td>{{$exam->sdt}}</td>
            
           
         </tr>
        
         @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
      
      </div>
    </footer>
  </div>
</div>
@endsection