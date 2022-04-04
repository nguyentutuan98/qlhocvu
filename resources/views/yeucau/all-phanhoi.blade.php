@extends('sv_layout')
@section('sv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách phản hồi
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
           
            <th>Mã yêu cầu</th>
            <th>Nội dung</th>
            <th>Mã giảng viên</th>
            <th>Nội dung phản hồi</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all_phanhoi as $key => $value)
        
          <tr>
            
            <td>{{$value->mayc}}</td>
            <td>{{$value->noidung}}</td>
            <td>{{$value->magv}}</td>
            <td>{{$value->phanhoi}}</td>
            
            
           
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