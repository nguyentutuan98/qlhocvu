@extends('gv_layout')
@section('gv_content')
<  <div class="panel panel-default">
    <div class="panel-heading">
      Xem nội dung câu hỏi
    </div>
    <div class="row w3-res-tb">
     
      <div class="col-sm-4">
      </div>
      
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
         <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
        <thead>
          <tr>
          
            <th>Mã kiểm tra</th>
            <th>Mã câu hỏi</th>
            <th>Nội dung câu hỏi</th>
            <th>Phương án 1</th>
            <th>Phương án 2</th>
            <th>Phương án 3</th>
            <th>Phương án 4</th>
            <th>Đáp án</th>
            <th style="width:10px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($all_detail_test as $key => $detail)
          <tr>
            
            <td>{{$detail->makt}}</td>
            <td>{{$detail->mach}}</td>
            <td>{{$detail->noidung}}</td>
            <td>{{$detail->phuongan1}}</td>
            <td>{{$detail->phuongan2}}</td>
            <td>{{$detail->phuongan3}}</td>
            <td>{{$detail->phuongan4}}</td>
            <td>{{$detail->dapan}}</td>
            
        
            <td>
              
                 <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-detail-question/'.$detail->mach)}}" ui-toggle-class="">
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