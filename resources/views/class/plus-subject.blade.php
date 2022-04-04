@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm môn học
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
                                  @foreach($plus_class as $key=> $class)
                                <form role="form" action="{{URL::to('/save-plus-subject/'.$class->malop)}}" method="post">
                                    {{ csrf_field() }}
                                
                             
                                
                                
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Tên môn học</label>
                                     <select name="mon" class="form-control input-sm m-bot15">
                                       @foreach($plus_sub as $key => $value)
                                        <option value="{{$value->mamh}}">{{$value->tenmonhoc}}</option>
                                        @endforeach
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="datetime-local" name="ngaybd" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="datetime-local" name="ngaykt" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                
                                
                                    
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection