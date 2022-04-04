@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tạo nhóm làm đề tài
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
                            	  @foreach($edit_team as $key =>$team)
                                <form role="form" action="{{URL::to('/update-team/'.$team->manhom)}}" method="post">
                                    {{ csrf_field() }}
                                
                              <div class="form-group">
                                    <input type="hidden" name="magv" value="<?php echo Session::get('magv');?>"  class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                
                              
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhóm</label>
                                    <input type="text"  value="{{$team->tennhom}}"name="tennhom" class="form-control" id="exampleInputEmail1" placeholder="Phương án 2">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Đề tài</label>
                                     <select name="doan" class="form-control input-sm m-bot15">
                                       
                                       @foreach($doan as $key => $doan)
                                        <?php $ma = Session::get('magv');?>
                                        @if($doan->magv != $ma ){
                                            return Null;
                                        }
                                        @else {<option value="{{$doan->madoan}}">{{$doan->tendoan}}</option>}
                                         @endif
                                        @endforeach
                                       
                                </select>
                            </div>
                                 
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection