@extends('sv_layout')
@section('sv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Nộp bài tập file world
                        </header>
                        {{-- <?php
                           $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                               Session::put('message',null);
                            }
                        ?> --}}
                        <div class="panel-body">
                            <div class="position-center">
                               @foreach($detail_exam as $key => $do_exam)
                                <form role="form" action="{{URL::to('upload-exam/'.$do_exam->mabt)}}" enctype="multipart/form-data" method="POST">
                                   {{ csrf_field() }}
                               
                              
                                <div class="form-group">

                                <input type="file" name="file_exam" required="true" class="form-control" >
                                <input type="submit"  value="Nộp bài" class="form-control" >
                                </div>
                                 <div class="form-group">

                                    <input type="hidden" name="masv" value="<?php echo Session::get('masv') ;?>" class="form-control" id="exampleInputEmail1" >
                                </div>
                                 

                              
                            </form>
                            @endforeach
                            </div>
                           
                        </div>
                    </section>
@endsection