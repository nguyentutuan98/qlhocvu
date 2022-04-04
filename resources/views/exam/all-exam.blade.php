@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Xem danh sách bài tập
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
            

            <th>Nội dung</th>
            <th>Tên môn học</th>
             <th>File đính kèm</th>
           
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all_exam as $key => $exam)
          <tr>
            
            <td>{{$exam->tenbt}}</td>
            
             
            <td>{{$exam->noidung}}</td>
            <td>{{$exam->tenmonhoc}}</td>
            <td>{{$exam->url}}</td>
            <td>
              <a href="{{URL::to('/edit-exam/'.$exam->mabt)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-exam/'.$exam->mabt)}}" ui-toggle-class="">
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