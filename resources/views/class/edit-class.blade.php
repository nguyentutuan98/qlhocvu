@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sửa lớp học
                        </header>
                        <?php
                           $message = Session::get('message');
                           $fail=Session::get('fail');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                               Session::put('message',null);
                            }else if($fail){
                                echo '<span class="text-alert">' .$fail.'</span>';
                               Session::put('fail',null);
                            }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($edit_class as $key =>$edit)
                                <form role="form" action="{{URL::to('/update-class/'.$edit->malop)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên lớp</label>
                                    <input type="text"  value="{{$edit->tenlop}}" name="tenmh" class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chủ nhiệm</label>
                                     <select name="chunhiem" class="form-control input-sm m-bot15">
                                       @foreach($gv as $key => $value)
                                        <option value="{{$value->tengv}}">{{$value->tengv}}</option>
                                        @endforeach
                                </select>
                            </div>
                                
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

@endsection
