@extends('sv_layout')
@section('sv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Xem bài kiểm tra
    </div>
    <style type="text/css">
     .text-alert {
            background-color: #86f18c;
    color: #334e0e;
    padding: 10px;
    margin: 2px;
    text-align: center;
      }
      .cover{
        background-color: ghostwhite;
    padding: 3px;
      }
    </style>
   <?php
                            $message = Session::get('success_do_test');
                            if ($message){
                                echo '<div class="text-alert"><div class="cover">' .$message.'</div></div>';
                                Session::put('success_do_test',null);
                            }
                        ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
        
            <th>Tên bài kiểm tra</th>
            <th>Ngày làm </th>
            <th>Số lượng câu hỏi</th>
            <th>Thời gian làm bài</th>
            <th ></th>
          </tr>
        </thead>
        <tbody>
           <?php
        $nowdate = strtotime( $now);
       
         ?>
          <?php 
          foreach( $do_test as $key =>$test)
          {

         
           
          ?>
          <tr>
            
            <td><?php echo $test->tenkt;?></td>
           
            <td><?php  echo $test->ngaylam;?></td>
            <td><?php echo $test->soluongcau;?></td>
            <td><?php echo $test->thoigianlam;?> phút</td>
            <td>
              <?php   
              $flash = false;
              foreach ( $list_makt as $ma){ 
                if($test->makt== $ma->makt){
                  $flash = true;  
                } 
              }
                if($flash){
                  echo '<span>Đã nộp</span>';
                  
                } else {
                  // echo 'Chưa lưu';
                  if($nowdate >= strtotime($test->ngaylam)){//so sánh thời điểm hiện tại với ngày làm
                    if($now->diffInMinutes($test->ngaylam) < $test->thoigianlam)//chênh lệch ngày hiện tại với thời gia đc làm
                    {
                      
            ?>
              <a href="{{URL::to('/detail-question/'.$test->makt)}}" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <?php 
                    }
                    else{
                        echo '<span>Hết hạn</span>';
                    }
                  }else{
                     echo '<span>Chưa được làm.</span>';
                  }
                }
               ?>
            </td>
          </tr>
         <?php } ?>
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