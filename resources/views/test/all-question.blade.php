@extends('gv_layout')
@section('gv_content')
  <div class="panel panel-default">
    <div class="panel-heading">
      Xem nội dung câu hỏi
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
          
            
            <th>Môn học</th>
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
        @foreach( $all_question as $key => $question)
        <?php $ma = Session::get('magv');?>
          @if($question->magv == $ma )
          
            <tr>
            
            
            <td>{{$question->tenmonhoc}}</td>
            <td>{{$question->noidung}}</td>
            <td>{{$question->luachon1}}</td>
            <td>{{$question->luachon2}}</td>
            <td>{{$question->luachon3}}</td>
            <td>{{$question->luachon4}}</td>
            <td>{{$question->dapan}}</td>
            
        
            <td>
              <a href="{{URL::to('/edit-question/'.$question->mach)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                 <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-question/'.$question->mach)}}" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
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