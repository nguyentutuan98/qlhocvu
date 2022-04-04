@extends('sv_layout')
@section('sv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Xem nội dung bài tập
    </div>
     <div class="row w3-res-tb">
      
      <div class="col-sm-2">Tìm kiếm
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" id ="search" class="input-sm form-control" placeholder="Search">
          
            
        </div>
      </div>
    </div>
    <?php $mess = Session::get('message');
          if($mess){
             
            echo  ' <div style="text-align: center;color: red;">'.$mess.'</div>';
            Session::put('message',null);
          } 
          $success = Session::get('success');
           if($success){
             
            echo  ' <div style="text-align: center;color: green;">'.$success.'</div>';
            Session::put('success',null);
          }
          ?>
  
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
           
            <th>Tên bài tập</th>
            <th>Nội dung</th>
            
            <th >File đính kèm</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php 
        
         if($do_exam)
        foreach ( $do_exam as $value){
        ?>
          <tr>
            
            <td><?php echo $value ->tenbt; ?></td>
            <td><?php echo $value ->noidung; ?></td>
            <td><?php echo $value ->url; ?></td>
            <?php if($value->url!=Null){ ?>

            
            <!-- kiểm tra nếu đã nộp bài thì ẩn nút làm bài -->
             
            <?php   
              $flash = false;
              foreach ( $list_mabt as $ma){ 
                if($value->mabt == $ma->mabt){
                  $flash = true;  
                } 
              }
                if($flash){
                  echo '<td>Đã nộp</td><td></td></td>';
                  
                } else { 
                  // echo 'Chưa lưu';



            ?>

            <td>
                           <a href="{{URL::to('/detail-exam/'.$value->mabt)}}" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
            </td>
            <td title="nộp file"> <a href="{{URL::to('/upload-exam/'.$value->mabt)}}" ui-toggle-class=""> <i  class="fa fa-upload" aria-hidden="true"></i></a></td>
                          <?php
                  }
              
                 ?>
           
                
              
              <td title="Tải bài tập"> <a href="{{URL::to('/download-exam/'.$value->mabt)}}" ui-toggle-class=""> <i  class="fa fa-download" aria-hidden="true"></i></a></td>
              <?php 
                  }?>
         
            
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> --}}
<script type="text/javascript">
   $('#search').on('keyup',function(){
                $value = $(this).val();

                $.ajax({
                    type: 'get',
                    url: '{{URL::to('search-exam')}}',
                    data: {
                        'search': $value
                    },
                    success:function(data){

                     // alert(data);
                        $('tbody').html(data);
                    }
                });
                //alert("hi");
            })
</script>
@endsection