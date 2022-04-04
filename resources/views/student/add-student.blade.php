@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tạo sinh viên
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
                                <form role="form" action="{{URL::to('/save-student')}}" method="post">
                                    {{ csrf_field() }}
                                
                              <div class="form-group">
                                    <input type="hidden" name="magv" value="<?php echo Session::get('magv');?>"  class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sinh viên</label>
                                    <input type="text" name="tensv" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Tài khoản</label>
                                    <input type="text" name="taikhoan" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password" name="matkhau" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Lớp</label>
                                     <select name="lop" class="form-control input-sm m-bot15">
                                       @foreach($lop as $key => $value)
                                        <option value="{{$value->malop}}">{{$value->tenlop}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputPassword1">Giới tính</label>
                                     <select name="gioitinh" class="form-control input-sm m-bot15">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        
                                    </select>
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="dienthoai" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection