@extends('gv_layout')
@section('gv_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    @foreach($phanhoi as $v)
    <div class="panel-heading">
      
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
          <th>
           Mã yêu cầu
           </th>
             <th>Yêu cầu phản hồi</th>
            <th>Phần hồi</th>
            <th>Hành động</th>
            <th></th>
          </tr> 
        </thead>
        <tbody>
          <tr>
            <form role="form" action="{{URL::to('/save-phanhoi/'.$v->mayc)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
            <td>{{$v->mayc}}</td>
            <td>{{$v->noidung}}</td>
            <td><textarea name="phanhoi" cols="40" rows="5"></textarea></td>
            <td><button type="submit" class="btn btn-primary">Gửi</button></td>
            </form>
         </tr>
         
        </tbody>
      </table>
    </div>
    @endforeach
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