@extends('sv_layout')
@section('sv_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel" style="position: relative;">
                        <header class="panel-heading">
                            Làm bài kiểm tra
                        </header>
                      
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo '<span class="text-alert">' .$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body" >
                              {{-- /////////////bat dau dem nguoc//////////////// --}}
            <style type="text/css">
#clockdiv h2{font-family:'Roboto';font-weight:100;color:#034688;text-align:center;font-size:40px;margin:0 0 16px}
#clockdiv{font-family:sans-serif;color:#fff;background:rgba(255,255,255,0.63);display:inline-block;font-weight:100;text-align:center;font-size:30px;padding:20px;width:100%}
#clockdiv > div{padding:5px 18px;border-radius:3px;background:#8b5c7e;display:inline-block}
#clockdiv div > span{padding:0;border-radius:3px;display:inline-block}
#clockdiv .smalltext{font-size:16px}

.clock.fix {
  background:rgba(255,255,255,0.63);display:inline-block;
  position: fixed !important;
  right: 2px;
}
</style>
<div class="clock fix">
    <div id="clockdiv">
    {{--   <h2>Countdown Clock</h2> --}}
     {{--  <div>
        <span class="days"></span>
        <div class="smalltext">Days</div>
      </div> --}}
      <div>
        <span class="hours"></span>
        <div class="smalltext">Hours</div>
      </div>
      <div>
        <span class="minutes"></span>
        <div class="smalltext">Minutes</div>
      </div>
      <div>
        <span class="seconds"></span>
        <div class="smalltext">Seconds</div>
      </div>
    </div>
 </div>
 
<script type="text/javascript">
   
        jQuery(document).ready(function($) {
            var $filter = $('.clock');
            var $filterSpacer = $('<div />', {
                "class": "vnkings-spacer",
                "height": $filter.outerHeight()
            });
            if ($filter.size())
            {
                $(window).scroll(function ()
                {
                    if (!$filter.hasClass('fix') && $(window).scrollTop() > $filter.offset().top)
                    {
                        $filter.before($filterSpacer);
                        $filter.addClass("fix");
                    }
                    else if ($filter.hasClass('fix')  && $(window).scrollTop() < $filterSpacer.offset().top)
                    {
                        $filter.removeClass("fix");
                        $filterSpacer.remove();
                    }
                });
            }
 

        });

    </script>
           {{--  //////////////////ket thuc dem nguoc//////////// --}}
                            <div class="position-center">
                             
                            <form id="form_test" role="form" action="{{URL::to('save-do-question')}}" method="post">
                                    {{ csrf_field() }}
                                    <!-- <input type="radio" id='1'  name="testRad" vaulue="xyz" > <label for="1">Test radio</label><br> -->
                                <input type="hidden" name="masv" value="<?php echo Session::get('masv') ;?>" class="form-control" id="exampleInputEmail1" > 
                        <?php
                         $count = 1;
                        $stack = array();
                        
                        
                        foreach($detail_question as $value){
                            
                            array_push($stack, $value->mach);
                           //$stack += [ $value->mach => $value->dapan ];
                          ?>
                                <input type="hidden" id="time" value="<?php echo $value->thoigian; ?>" >
                                
                                <input type="hidden" name="makt" value="<?php echo  $value->makt;?>" class="form-control" id="exampleInputEmail1" > 
                                <input type="hidden" name="ngaylam" value="<?php echo  $value->ngaylam;?>" class="form-control" id="ngaylam" > 
                               
                                <div class="form-group">
                                <label for="exampleInputEmail1">Câu <?php echo $count;?> : </label>
                                    <label for="exampleInputEmail1"><?php echo $value->noidung; ?></label>
                                    <!-- <textarea type="text" name="noidung" class="form-control" id="exampleInputEmail1" placeholder="Nội dung câu hỏi"></textarea> -->
                                </div>
                                
                                <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Phương án trả lời</label><br> -->
                               
                                <input type="hidden" name="mach[]" value="<?php echo $value->mach;?>" class="form-control" id="exampleInputEmail1" >
                                <input type="radio" id='<?php echo $value->mach; ?>1'  name="rad<?php echo $value->mach;?>" value="1" > <label for="<?php echo $value->mach; ?>1"> <?php echo $value->phuongan1; ?></label><br>
                                <input type="radio" id='<?php echo $value->mach; ?>2'  name="rad<?php echo $value->mach;?>" value="2" >  <label for="<?php echo $value->mach; ?>2"> <?php echo $value->phuongan2; ?></label><br>
                                <input type="radio"  id='<?php echo $value->mach; ?>3' name="rad<?php echo $value->mach;?>" value="3" >  <label for="<?php echo $value->mach; ?>3"> <?php echo $value->phuongan3; ?></label><br>
                                <input type="radio" id='<?php echo $value->mach; ?>4' name="rad<?php echo $value->mach;?>" value="4" >  <label for="<?php echo $value->mach; ?>4"> <?php echo $value->phuongan4; ?></label><br>

                                </div>
                              
                            <?php 
                            $count++;
                        } 
                        ?>
                                <button type="submit" name="add_category_product" class="btn btn-info">Lưu</button>
                            </form>
                            </div>
                            
                        </div>
                            <?php
                            // echo "<pre>";
                            // print_r($stack);
                            // echo "</pre>";
                            // $a = http_build_query(array('a' => $stack));
                             ?>
                    </section>

            </div>
<script type="text/javascript">


//<![CDATA[
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);

  return {
    'total': t,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
      alert('Hết giờ làm bài');
   
        var data = $('form#form_test').serialize();
    $.ajax({
            type : 'POST', //kiểu post
            url  : '{{URL::to('/save-do-question')}}', //gửi dữ liệu sang trang submit.php
            data : data,
            success :  function(data)
                   {                       
                        if(data == 'false')
                        {
                            alert('Sai tên hoặc mật khẩu');
                        }else{
                            alert('Nộp thành công.');
                             window.location="{{URL::to('do-test')}}";
                        }
                   }
            });
            //return false;


        

    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
var today = new Date();
var date = today.getDate();
//alert(today);

var ngaylam = document.getElementById("ngaylam").value;
var ngaylam_date = new Date(ngaylam);
//alert(typeof today);
var offset = today.getTime() - ngaylam_date.getTime();


 var time_dead = Math.round(offset / 1000 / 60)
 //alert( time_dead);
 var s = document.getElementById("time").value;
//alert(s);
  var time_main = s - time_dead;
  //alert(time_main);
var deadline = new Date(Date.parse(new Date()) + time_main * 60 * 1000);
initializeClock('clockdiv', deadline);
//]]>

</script>
@endsection