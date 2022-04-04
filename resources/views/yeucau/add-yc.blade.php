@extends('sv_layout')
@section('sv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Gửi yêu cầu
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
                                <form role="form" action="{{URL::to('/save-yc')}}" method="post">
                                    {{ csrf_field() }}
                                
                              <div class="form-group">
                                    <input type="hidden" name="magv" value="<?php echo Session::get('magv');?>"  class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung yêu cầu</label>
                                    <input type="text" name="noidung" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giảng viên</label>
                                     <select name="giangvien" class="form-control input-sm m-bot15">
                                     	
                                       @foreach($gv as $key => $value)
                                        <option value="{{$value->magv}}">{{$value->tengv}}</option>
                                        @endforeach
                                        
                                		</select>
                            </div>
                                
                                    
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Gửi</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection