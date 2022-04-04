@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sinh viên
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                           }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                            	@foreach($edit_student as $key =>$edit)
                                <form role="form" action="{{URL::to('/update-student/'.$edit->masv)}}"  method="post">
                                    {{ csrf_field() }}
                
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sinh viên</label>
                                    <input type="text" value="{{$edit->tensv}}" name="tensv" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Tài khoản</label>
                                    <input type="text"value="{{$edit->taikhoan}}"name="taikhoan" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password" value="{{$edit->matkhau}}"name="matkhau" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
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
                                    <input type="text" value="{{$edit->sdt}}" name="dienthoai" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                               
                                <button type="submit" name="" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

@endsection