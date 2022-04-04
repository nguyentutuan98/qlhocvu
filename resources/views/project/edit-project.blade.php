@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thay đổi đề tài
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
                                @foreach($edit_project as $key =>$edit)
                                <form role="form" action="{{URL::to('/update-project/'.$edit->madoan)}}" enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                
                              <div class="form-group">
                                    <input type="hidden" name="magv" value="<?php echo Session::get('magv');?>"  class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên đề tài</label>
                                    <input type="text" name="tendoan" value="{{$edit->tendoan}}"class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Miêu tả</label>
                                    <input type="text" name="mieuta"value="{{$edit->mieuta}}" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
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
                                    <label for="exampleInputEmail1">File đính kèm</label>
                                    <input  type="file" name="url" class="form-control" id="exampleInputEmail1" placeholder="Nội dung bài tập">
                                </div>
                                
                                
                                @endforeach
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection