@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách môn học
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
           
            
            <th>Tên bài tập</th>
            <th>Số tiết học</th>
            <th>Số tín chỉ</th>
            <th>Học kỳ</th>
            <th>Giảng viên</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all_subject as $key => $exam)
          <tr>
            
            <td>{{$exam->tenmonhoc}}</td>
            <td>{{$exam->sotiet}}</td>
            <td>{{$exam->sotinchi}}</td>
            <td>{{$exam->hocky}}</td>
            <td></td>
           
            <td>
              <a href="{{URL::to('/plus-lecturer/'.$exam->mamh)}}" ui-toggle-class="">
                <i class="fa fa-plus-square text-success text-active"></i></a>
              <a href="{{URL::to('/edit-subject/'.$exam->mamh)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-subject/'.$exam->mamh)}}" ui-toggle-class="">
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