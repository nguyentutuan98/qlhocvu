@extends('gv_layout')
@section('gv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm môn học
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
                                <form role="form" action="{{URL::to('/save-subject')}}" method="post">
                                    {{ csrf_field() }}
                                
                              
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên môn học</label>
                                    <input type="text" name="tenmonhoc" class="form-control" id="exampleInputEmail1" placeholder="Phương án 1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số tiết</label>
                                    <input type="number" min="1" name="sotiet" class="form-control" id="exampleInputEmail1" placeholder="Phương án 2">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số tín chỉ</label>
                                    <input type="number" min="1"name="sotinchi" class="form-control" id="exampleInputEmail1" placeholder="Phương án 3">
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputPassword1">Học kỳ</label>
                                     <select name="hocky" class="form-control input-sm m-bot15">
                                        <option value="1">Học kỳ 1</option>
                                        <option value="2">Học kỳ 2</option>
                                        <option value="3">Học kỳ hè</option>
                                        
                                    </select>
                                </div>
                                 
                                
                                    
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection