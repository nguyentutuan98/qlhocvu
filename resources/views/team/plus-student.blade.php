@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sinh viên vào nhóm
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
                              @foreach($plus_team as $key=> $team)
                                <form role="form" action="{{URL::to('/save-plus-student/'.$team->manhom)}}" method="post">
                                    {{ csrf_field() }}
                          
                                
                             
                                
                              
                                <div class="form-group">
                                   
                                    <label for="exampleInputPassword1">Sinh viên</label>
                                     <select name="sv" class="form-control input-sm m-bot15">
                                     
                                       @foreach($plus_student as $key => $student)
                    
                                      <option value="{{$student->masv}}">{{$student->tensv}} , {{$student->tenlop}}</option>
                                         
                                       @endforeach
                                </select>
                            </div>
                                 
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>
                    @endforeach

            </div>
@endsection