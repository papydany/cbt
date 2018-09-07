@extends('layouts.student')
@section('title','CBT')
@section('content')
@inject('r','App\General')

 <div class="main" style="min-height: 460px">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
          
            <li class="active">CBT</li>
            <li> {{auth::guard('std')->user()->name}}</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">

        	     <div class="col-md-12 col-sm-12">
          
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-8 col-sm-8">
                	  <div class="blog-talks margin-bottom-30">
               
                    <div class="tab-style-1">
                     
        <form id="quiz_form" class="form-horizontal" role="form" method="POST" action="{{ url('student_result') }}" data-parsley-validate>
     {{ csrf_field() }}	            	
                      <ul class="nav nav-tabs">
                      	@foreach($sub as $key => $v_sub)
                      	<?php $subject =$r->subject($v_sub->subject_id); ?>
                      	@if($key == 0)
                <li class="active"><a data-toggle="tab" href="#{{$v_sub->subject_id}}" class="qtn">

                      	@else
<li><a data-toggle="tab" href="#{{$v_sub->subject_id}}" class="qtn">
                      	@endif
                      	{{$subject->name}}</a></li>
                         @endforeach
                    </ul>


 <div class="tab-content thumbnail" style="margin-top: 20px; border-radius: 25px;">
 
<input type="hidden" name="number_question" value="{{$nq->number}}">
 	@foreach($sub as $key => $v_sub)
 	<?php $i=1; ?>
   <div id="{{$v_sub->subject_id}}" class="tab-pane row-fluid fade in active">
   <?php $question =$r->question($v_sub->subject_id,$nq->number);?>
   @foreach($question as $key => $vq)
                      @if($i==1) 
                  	<div id='question{{$v_sub->subject_id.$i}}' class='cont'>
                          <p class="margin-bottom-10">{!!'('.$i.')&nbsp;'.$vq->body!!}</p>
                          <?php  $option =$r->option($vq->id); ?>
                        @foreach($option as $key => $vo)
                        <br/> 
                        @switch($key)
    @case(0)
        A
        @break

    @case(1)
       B
        @break
 @case(2)
       C
        @break
   @case(3)
       D
        @break      
    @default
     
@endswitch 
                        
                     )&nbsp; <input type="radio" value="{{$vo->id}}" id='radio1_{{$vo->id}}' name='{{$vq->id}}'/>&nbsp;&nbsp;&nbsp;{!!$vo->option!!}
                   
                     <br/>
                     @endforeach

                     <p><br/>
                     <button id='{{$v_sub->subject_id."#".$i}}' class='next btn btn-success btn-xs' type='button'>Next</button></p>
                </div>
                 
                @elseif($i < 1 || $i< $question->count())
	<div id='question{{$v_sub->subject_id.$i}}' class='cont'>
                          <p class="margin-bottom-10">{!!'('.$i.')&nbsp;'.$vq->body!!}</p>
                          <?php $option =$r->option($vq->id);?>
                        @foreach($option as $key => $vo) 
                        <br/>
                         @switch($key)
    @case(0)
        A
        @break

    @case(1)
       B
        @break
 @case(2)
       C
        @break
   @case(3)
       D
        @break      
    @default
     
@endswitch  
                    )&nbsp; <input type="radio" value="{{$vo->id}}" id='radio1_{{$vo->id}}' name='{{$vq->id}}'/>
                     &nbsp;&nbsp;&nbsp;{!!$vo->option!!}
                    <br/>

                    @endforeach
                  
                    <p><br/>
                    <button id='{{$v_sub->subject_id."#".$i}}' class='previous btn btn-primary btn-xs' type='button'>Previous</button>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button id='{{$v_sub->subject_id."#".$i}}' class='next btn btn-success btn-xs' type='button'>Next</button></p>
                      
                </div>
                
                @elseif($i == $question->count())
<div id='question{{$v_sub->subject_id.$i}}' class='cont'>
                          <p class="margin-bottom-10">{!!'('.$i.')&nbsp;'.$vq->body!!}</p>
                          <?php  $option =$r->option($vq->id);
                          ?>
                        @foreach($option as $key => $vo) 
                        <br/> 
                         @switch($key)
    @case(0)
        A
        @break

    @case(1)
       B
        @break
 @case(2)
       C
        @break
   @case(3)
       D
        @break      
    @default
     
@endswitch 
                     )&nbsp; <input type="radio" value="{{$vo->id}}" id='radio1_{{$vo->id}}' name='{{$vq->id}}'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!$vo->option!!}
                    <br/>
                    @endforeach 
                   
                    <p>
                    	<br/>
                    <button id='{{$v_sub->subject_id."#".$i}}' class='previous btn btn-primary btn-xs' type='button'>Previous</button></p>
                    
                </div>
                
                @endif
                      <?php $i++; ?>   
                        @endforeach       
                       
                        </div>
                       
                   @endforeach
                   
                  
                      </div>
                  
                        <p>   
                  
                   <input class=' btn btn-danger btn-xs' type="submit" name="someothername" value="click to submit">
                   </p>  
                      </form> 

                        </div>
                
                        
                      </div>
                        
                    </div>
                 
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                   <div id="timer" style="font-size: 50px; color: red;"></div>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
 </div>
          </div>
        </div>
@endsection
@section('script')
<script>
  
$(document).ready(function() {


    $('.cont').addClass('hide');
  
    count=$('.questions').length;
    
     $('#question'+1).removeClass('hide');
$(document).on('click','.qtn',function(){
  element=$(this).attr('href');
  element = element.replace('#','');
 element = element+1;


  $('#question'+element).removeClass('hide');
});
     $(document).on('click','.next',function(){

         element=$(this).attr('id');
         
         elememt =element.split("#");

var index = element.indexOf("#"); 
var subject_id = element.substr(0, index); 
var question_id = element.substr(index + 1);
       
         last =parseInt(question_id);
        // alert(last);
        
         nex=last+1;
        // alert(nex);
         $('#question'+subject_id+last).addClass('hide');

         $('#question'+subject_id+nex).removeClass('hide');
    
     });

     $(document).on('click','.previous',function(){

             element=$(this).attr('id');
            
            // last = parseInt(element.substr(element.length - 1));
          
var index = element.indexOf("#"); 
var subject_id = element.substr(0, index); 
var question_id = element.substr(index + 1);
            last =parseInt(question_id);
             pre=last-1;
             $('#question'+subject_id+last).addClass('hide');

             $('#question'+subject_id+pre).removeClass('hide');
       
         });

  
  
   var c = <?php echo json_encode($t); ?>;
   // var c =660;
    timedCount();
    function timedCount() {
      var hours = parseInt( c / 3600 ) % 24;
      var minutes = parseInt( c / 60 ) % 60;
      var seconds = c % 60;
      var result = (hours < 10 ? "0" + hours : hours) +  ":"+ (minutes < 10 ? "0" + minutes : minutes)  +  ":"+ (seconds < 10 ? "0" + seconds : seconds);
      $('#timer').html(result);
      
        if(c == 0 ){
         // setConfirmUnload(false);
            $("#quiz_form").submit();
        }
        c = c - 1;
        t = setTimeout(function(){ timedCount() }, 1000);
    }
   
 });
  </script>


@endsection