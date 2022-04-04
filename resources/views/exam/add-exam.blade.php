@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tạo bài tập
                        </header>
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
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
                                <form role="form" action="{{URL::to('/save-exam')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                
                               <div class="form-group">
                                    <input type="hidden" name="magv" value="<?php echo Session::get('magv');?>"  class="form-control" id="exampleInputEmail1" placeholder="Số lượng câu hỏi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài tập</label>
                                    <input type="text" name="tenbt" class="form-control" id="exampleInputEmail1" placeholder="Tên bài tập">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea name="noidungbt" class="form-control" id="exampleInputEmail1" placeholder="Nội dung bài tập"></textarea>
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
                                
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

@endsection