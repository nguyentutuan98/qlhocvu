@extends('gv_layout')
@section('gv_content')
<  <div class="panel panel-default">
    <div class="panel-heading">
      Xem nội dung tìm kiếm 
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{URL::to('/search-question')}}" method="post">
        <div class="input-group">
          <input type="text" name="key" class="input-sm form-control" placeholder="Tìm kiếm">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" name="timkiem" type="submit">Tìm kiếm </button>
          </span>
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
       
          <tr>
            
            
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        
            <td>
              <a href="{{URL::to('/edit-question')}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                 <a onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{URL::to('/delete-question')}}" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          
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