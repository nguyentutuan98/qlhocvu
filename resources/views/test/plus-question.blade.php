@extends('gv_layout')
@section('gv_content')
  <div class="panel panel-default">
    <div class="panel-heading">
      Chọn câu hỏi
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
         <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
        <thead>
          <tr>
          
            
            
            <th>Tên môn học</th>
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
         

                @foreach($plus_test as $key => $test)
                  

                 @foreach($plus_question as $key=>$plus)
                 @if($test->mamh == $plus->mamh)
                  
              

  
           
        <?php $ma = Session::get('magv');?>
            @if($plus->magv == $ma )
            
            <tr>
            
            
            <td>{{$plus->tenmonhoc}}</td>
            <td>{{$plus->noidung}}</td>
            <td>{{$plus->luachon1}}</td>
            <td>{{$plus->luachon2}}</td>
            <td>{{$plus->luachon3}}</td>
            <td>{{$plus->luachon4}}</td>
            <td>{{$plus->dapan}}</td>
            <td>
              <?php  $flash= false; ?>
              @foreach($all_detail_test as $key=>$detail)
              @if($detail->mach == $plus->mach)
               <?php $flash=true;?>
               @endif
                @endforeach
               @if($flash)
               <td>Đã có</td>

             @else <a href="{{URL::to('/save-plus-question/'.$test->makt.'/'.$plus->mach)}}" class="active" ui-toggle-class="">
                <i class="fa fa-check-square-o text-success text-active"></i></a>
            
            @endif
                 
            </td>
            
           
          </tr>
        
            @endif
            @endif
           @endforeach
            
           @endforeach

        </tbody>
      </table>
    </div>

    </footer>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
     Câu hỏi đã chọn
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-4">
      </div>
     <div class="row w3-res-tb">
      
      <div class="col-sm-2">
      </div>
        <div class="col-sm-3">
        
      </div>
      </form>
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
          
            
            
            <th>Tên môn học</th>
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
             @foreach($plus_question as $key=>$plus)
            @foreach($all_detail_test as $key=>$detail)

        
            
          
            <tr>
            
            <td>{{$plus->tenmonhoc}}</td>
            <td>{{$detail->noidung}}</td>
            <td>{{$detail->luachon1}}</td>
            <td>{{$detail->luachon2}}</td>
            <td>{{$detail->luachon3}}</td>
            <td>{{$detail->luachon4}}</td>
            <td>{{$detail->dapan}}</td>
            <td>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-plus-question/'.$test->makt.'/'.$detail->mach)}}" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
                 
            </td>
            
            

          </tr>
        
         
          
          @endforeach
          @endforeach
        
        @foreach($plus_test as $key => $test)
                <form role="form" action="{{URL::to('/update-number-test/'.$test->makt)}}" method="post">
                                    {{ csrf_field() }}
                                
                              <div class="form-group">
                                    <input type="hidden" name="soluong" value=""  class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>

                         <button type="submit" name="add_category_product" class="btn btn-info">Lưu</button>
             </form>
             @endforeach

        </tbody>
      </table>
    </div>
</div>
</footer>
  </div>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> --}}
<script type="text/javascript">
   $('#search').on('keyup',function(){
                $value = $(this).val();

                $.ajax({
                    type: 'get',
                    url: '{{URL::to('search-question')}}',
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