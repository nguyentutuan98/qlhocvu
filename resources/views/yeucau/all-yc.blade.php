@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách yêu cầu
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
           
            
            
            <th>Mã giảng viên</th>
            <th>Nội dung yêu cầu</th>
            <th>Mã sinh viên</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all_yc as $key => $value)
          <tr>
            
            
            <td>{{$value->magv}}</td>
            <td><a href="{{URL::to('/phanhoi/'.$value->mayc)}}">{{$value->noidung}}</a></td>
            <td>{{$value->masv}}</td>
            
            
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