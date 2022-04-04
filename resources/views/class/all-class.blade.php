@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách lớp học
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
           
            
            <th>Tên lớp</th>
            <th>Số lượng</th>
            <th>Chủ nhiệm</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all_class as $key => $exam)
          <tr>
            
            <td>{{$exam->tenlop}}</td>
            <td>{{$exam->soluongsv}}</td>
            <td>{{$exam->chunhiem}}</td>
            
            <td>
              <a href="{{URL::to('/plus-subject/'.$exam->malop)}}" ui-toggle-class="">
                <i class="fa fa-plus-square text-success text-active"></i></a>
              <a href="{{URL::to('/show-all-subject/'.$exam->malop)}}" ui-toggle-class="">
              <i class="fa fa-eye text-success text-active"></i></a>
              <a href="{{URL::to('/edit-class/'.$exam->malop)}}" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-class/'.$exam->malop)}}" ui-toggle-class="">
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