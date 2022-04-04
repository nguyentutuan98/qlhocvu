@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa  bài tập
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
                            	@foreach($edit_exam as $key =>$edit)
                                <form role="form" action="{{URL::to('/update-exam/'.$edit->mabt)}}" enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                
                             
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài tập</label>
                                    <input type="text" value="{{$edit->tenbt}}" name="tenbt" class="form-control" id="exampleInputEmail1" placeholder="Mã giảng viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea style="resize: none;" rows="5"  type="email" name="noidung" class="form-control" id="exampleInputEmail1" placeholder="Nội dung bài tập">{{$edit->noidung}}</textarea>
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
                                    <input  type="file" value="{{$edit->url}}"name="url" class="form-control" id="exampleInputEmail1" placeholder="Nội dung bài tập">
                                </div>
                                
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

@endsection