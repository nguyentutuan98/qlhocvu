@extends('sv_layout')
@section('sv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Làm bài tập
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
                               @foreach($detail_exam as $key => $do_exam)
                                <form role="form" action="{{URL::to('/save-do-exam/'.$do_exam->mabt)}}" method="post">
                                    {{ csrf_field() }}
                               <!-- <div class="form-group">
                                
                                    <input type="hidden" value="{{$do_exam->mabt}}"name="mabt" class="form-control" id="exampleInputEmail1" placeholder="Mã bài tập">
                                </div>   -->
                              
                                <div class="form-group">

                                    <input type="hidden" name="masv" value="<?php echo Session::get('masv') ;?>" class="form-control" id="exampleInputEmail1" >
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Câu hỏi:</label><br>
                                    <label for="exampleInputEmail1">{{$do_exam->noidung}}</label>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Đáp án: </label>
                                    <textarea style="resize: none;" rows="5" type="email" name="dapan" class="form-control" id="exampleInputEmail1" placeholder="Nội dung bài làm "></textarea>
                                </div>

                                <button type="submit" name="add_category_product" class="btn btn-info">Lưu</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
@endsection