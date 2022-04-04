@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách nhóm
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
           
            
            <th>Tên nhóm</th>
            <th>Đề tài</th>
            <th>Số lượng</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all_team as $key => $team)
          <tr>
            
            <td>{{$team->tennhom}}</td>
            <td>{{$team->tendoan}}</td>
            <td>{{$team->soluong}}</td>
            
            <td></td>
           
            <td>
              <a href="{{URL::to('/plus-student/'.$team->manhom)}}" ui-toggle-class="">
              <i class="fa fa-plus-square-o text-success text-active"></i></a>
              <a href="{{URL::to('/edit-team/'.$team->manhom)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-team/'.$team->manhom)}}" ui-toggle-class="">
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