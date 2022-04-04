@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Xem bài kiểm tra
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
        
            <th>Mã bài tập</th>
            
            <th>Mã sinh viên</th>
            
            <th>Đáp án</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach( $show_exam as $key =>$exam)
          <tr>
            
            <td>{{$exam->mabt}}</td>
            
            <td>{{$exam->masv}}</td>
            
            <td>{{$exam->noidungbailam}}</td>
            
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
     
    </footer>
  </div>
</div>
@endsection