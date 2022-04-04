@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm câu hỏi kiểm tra
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
                                @foreach($edit_question as $key =>$edit)
                                <form role="form" action="{{URL::to('/update-question/'.$edit->mach)}}" method="post">
                                    {{ csrf_field() }}
                                
                             
                              
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung câu hỏi</label>
                                    <textarea type="text"  name="noidung" class="form-control" id="exampleInputEmail1" placeholder="Nội dung câu hỏi">{{$edit->noidung}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phương án 1</label>
                                    <input type="text" value="{{$edit->luachon1}}" name="pa1" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phương án 2</label>
                                    <input type="text"value="{{$edit->luachon2}}" name="pa2" class="form-control" id="exampleInputEmail1" placeholder="Phương án 2">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phương án 3</label>
                                    <input type="text" value="{{$edit->luachon3}}"name="pa3" class="form-control" id="exampleInputEmail1" placeholder="Phương án 3">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phương án 4</label>
                                    <input type="text" value="{{$edit->luachon4}}"name="pa4" class="form-control" id="exampleInputEmail1" placeholder="Phương án 4">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đáp án</label>
                                    <input type="text" value="{{$edit->dapan}}"name="da" class="form-control" id="exampleInputEmail1" placeholder="Đáp án">
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
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach

                        </div>
                    </section>

            </div>
@endsection