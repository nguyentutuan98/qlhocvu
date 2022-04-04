@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sửa môn học
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
                         @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                              @endif
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($edit_subject as $key =>$edit)
                                <form role="form" action="{{URL::to('/update-subject/'.$edit->mamh)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài kiểm tra</label>
                                    <input type="text"  value="{{$edit->tenmonhoc}}" name="tenmh" class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số tiết</label>
                                    <input type="number"min="1" value="{{$edit->sotiet}}"name="sotiet" class="form-control" id="exampleInputEmail1" placeholder="Ngày làm bài">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Số tín chỉ</label>
                                    <input type="number" min="1" value="{{$edit->sotinchi}}"name="sotinchi" class="form-control" id="exampleInputEmail1" placeholder="Thời gian làm bài">
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputPassword1">Học kỳ</label>
                                     <select name="gioitinh" class="form-control input-sm m-bot15">
                                        <option value="1">Học kỳ 1</option>
                                        <option value="2">Học kỳ 2</option>
                                        <option value="3">Học kỳ hè</option>
                                        
                                    </select>
                                </div>
                               
                                
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

@endsection
