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
        
            <th>Mã bài kiểm tra</th>
            <th>Mã sinh viên</th>
            <th>Mã câu hỏi </th>
            <th>Đáp án bài làm</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach( $show_test as $key =>$test)
          <tr>
            
            <td>{{$test->makt}}</td>
            <td>{{$test->masv}}</td>
            <td>{{$test->mach}}</td>
            <td>{{$test->dapanlambai}}</td>
            
            
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