@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tạo đề tài
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
                                <form role="form" action="{{URL::to('/save-project')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                
                              <div class="form-group">
                                    <input type="hidden" name="magv" value="<?php echo Session::get('magv');?>"  class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên đề tài</label>
                                    <input type="text" name="tendoan" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
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
                                    <label for="exampleInputEmail1">Miêu tả</label>
                                    <textarea type="text" name="mieuta" class="form-control" id="exampleInputEmail1" placeholder="Nội dung câu hỏi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">File đính kèm</label>
                                    <input  type="file" name="url" class="form-control" id="exampleInputEmail1" placeholder="Nội dung bài tập">
                                </div>
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection