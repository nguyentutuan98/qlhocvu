@extends('sv_layout')
@section('sv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Nhóm đồ án
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
           
            
            <th>Tên nhóm</th>
            <th>Tên đồ án</th>
            <th>Miêu tả</th>
            <th>File dính kèm</th>
            
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
           @foreach($student as $key=>$stu)
               @foreach ($show_team as $key => $exam)
         
            @if($stu->masv == $exam->masv)
          

          
          <tr>
            
            <td>{{$exam->tennhom}}</td>
            <td>{{$exam->tendoan}}</td>
            <td>{{$exam->mieuta}}</td>
            <td>{{$exam->url}}</td>
              @if($exam->url !=null)
            
             <td title="Tải bài tập"> <a href="{{URL::to('/download-project/'.$exam->madoan)}}" ui-toggle-class=""> <i  class="fa fa-download" aria-hidden="true"></i></a></td>
              @endif
            
         </tr>
          @endif
          @endforeach
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