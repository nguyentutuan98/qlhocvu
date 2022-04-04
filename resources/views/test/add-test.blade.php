@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tạo bài kiểm tra
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
                                <form role="form" action="{{URL::to('/save-test')}}" method="post">
                                    {{ csrf_field() }}
                                 <div class="form-group">
                                    <input type="hidden" name="magv" value="<?php echo Session::get('magv');?>"  class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                             
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài kiểm tra</label>
                                    <input type="text" name="tenkt" class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Môn học</label>
                                     <select name="mon" class="form-control input-sm m-bot15">
                                         @foreach($detail as $key => $value)
                                        <?php $ma = Session::get('magv');?>
                                        @if($value->magv != $ma ){
                                            return Null;
                                        }
                                        @else {<option value="{{$value->mamh}}">{{$value->tenmonhoc}}</option>}
                                         @endif
                                        @endforeach
                                </select>
                            </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày làm</label>
                                    <input type="datetime-local" name="ngaylam" class="form-control" id="exampleInputEmail1" placeholder="Ngày làm bài">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Thời gian</label>
                                    <input type="number"min="1" name="thoigian" class="form-control" id="exampleInputEmail1" placeholder="Thời gian làm bài">
                                </div>
                                
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

@endsection
