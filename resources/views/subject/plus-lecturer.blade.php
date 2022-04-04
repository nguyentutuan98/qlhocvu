@extends('gv_layout')
@section('gv_content')
  <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách giảng viên
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
           
            
            <th>Mã giảng viên</th>
            <th>Tên giảng viên</th>
           
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($plus_sub as $key => $sub)
          @foreach($plus_lec as $key=>$lec)

          <tr>
            
            <td>{{$lec->idgv}}</td>
            <td>{{$lec->tengv}}</td>
            
            <td><?php  $flash= false; ?>
              @foreach($all_detail_sub as $key=>$detail)
              @if($detail->magv == $lec->magv)
               <?php $flash=true;?>
               @endif
                @endforeach
               @if($flash)
               <td>Đã có</td>

             @else <a href="{{URL::to('/plus-save-lecturer/'.$sub->mamh.'/'.$lec->magv)}}" class="active" ui-toggle-class="">
                <i class="fa fa-check-square-o text-success text-active"></i></a>
            
            @endif
                 
            </td>
            

         </tr>
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

<br><br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách giảng viên đã thêm
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
            <th>Tên giảng viên</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all_detail_sub as $key => $lec)
        
          
          <tr>
            
            <td>{{$lec->idgv}}</td>
            <td>{{$lec->tengv}}</td>

            <td></td>
           
            <td>
             
              <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-plus-lecturer/'.$sub->mamh.'/'.$lec->magv)}}" ui-toggle-class="">
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