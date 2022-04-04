@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sinh viên
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
            <th>Tên lớp</th>
            <th>Giới Tính</th>
            <th>Số điện thoại</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all_student as $key => $exam)
          <tr>
            
            <td>{{$exam->tensv}}</td>
            <td>{{$exam->taikhoan}}</td>
            <td>{{$exam->tenlop}}</td>
            <td>{{$exam->gioitinh}}</td>
            <td>{{$exam->sdt}}</td>
            
            <td>
              
              <a href="{{URL::to('/edit-student/'.$exam->masv)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-student/'.$exam->masv)}}" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
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