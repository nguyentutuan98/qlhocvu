@extends('gv_layout')
@section('gv_content')
<div class="table-agile-info">
  <div class="panel panel-default">
  <div class="panel-heading">
      Xem bài kiểm tra
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
        
            <th>Tên bài kiểm tra</th>
            <th>Tên môn học</th>
            <th>Ngày làm </th>
            <th>Số lượng câu hỏi</th>
            <th>Thời gian làm bài</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach( $all_test as $key =>$test)
          <?php $ma = Session::get('magv');?>
          @if($test->magv == $ma )
          <tr>
            
            <td>{{$test->tenkt}}</td>
            <td>{{$test->tenmonhoc}}</td>
            <td>{{$test->ngaylam}}</td>
            <td>{{$test->soluongcau}}</td>
            <td>{{$test->thoigianlam}}</td>
            <td>
              <a href="{{URL::to('/plus-question/'.$test->makt)}}" ui-toggle-class="">
              <i class="fa fa-plus-square-o text-success text-active"></i></a>
              <a href="{{URL::to('/edit-test/'.$test->makt)}}" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          
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
                    url: '{{URL::to('search-test')}}',
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