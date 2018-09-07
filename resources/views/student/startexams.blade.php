@extends('layouts.student')
@section('title','CBT')
@section('content')
@inject('r','App\General')
<script type="text/javascript">
 /*  var c = 60;
    var t;
    timedCount();
    function timedCount() {
      var hours = parseInt( c / 3600 ) % 24;
      var minutes = parseInt( c / 60 ) % 60;
      var seconds = c % 60;
      var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
      $('#timer').html(result);
        if(c == 0 ){
          setConfirmUnload(false);
            $("#quiz_form").submit();
        }
        c = c - 1;
        t = setTimeout(function(){ timedCount() }, 1000);
    }*/
var sub= 0,pos= 0, test, questn,questn_id,subject_id,choice,cha,chb,chc,chd,chosonn_answer;
  var subject = <?php echo json_encode($sm); ?>;
  var question = <?php echo json_encode($qm); ?>;
  var option = <?php echo json_encode($om); ?>;


function renderQuestin()
{
  test =document.getElementById("test");

subject_id =subject[pos][0];

questn =question[subject_id][sub][1];
questn_id=question[subject_id][sub][0];

cha =option[questn_id][0][0];
chb =option[questn_id][1][0];
chc=option[questn_id][2][0];
chd=option[questn_id][3][0];

asa =option[questn_id][0][1];
asb =option[questn_id][1][1];
asc=option[questn_id][2][1];
asd=option[questn_id][3][1];

  test.innerHTML ="<h3>"+questn+"</h3>";
   test.innerHTML +="<input type='radio' name='choice' value='" +asa+ "'>" + cha + "<br/>";
   test.innerHTML +="<input type='radio' name='choice' value='" +asb+ "'>" +chb+ "<br/>";
    test.innerHTML +="<input type='radio' name='choice' value='" +asc+ "''>" +chc+"<br/>";
   test.innerHTML +="<input type='radio' name='choice' value='" +asd+ "'>" +chd+ "<br/>";
   if(sub >= 1)
   {
    test.innerHTML +="<button class='btn btn-xs' onclick ='showprevious()'>Previous</button>";
   }
 for (i = 1; i < question.length; i++) { 
   
     test.innerHTML +="<button class='btn btn-xs' onclick ='shownumber()'>"+i+"</button>";
}
    test.innerHTML +="<button class='btn btn-xs' onclick ='shownext()'>Next</button>";

}

function renderQuestin2($id)
{
  test =document.getElementById("test");

//subject_id =subject[sub][0];
    
subject_id = $id,

  questn =question[subject_id][sub][1];
  questn_id=question[subject_id][sub][0];

cha =option[questn_id][0][0];
chb =option[questn_id][1][0];
chc=option[questn_id][2][0];
chd=option[questn_id][3][0];

asa =option[questn_id][0][1];
asb =option[questn_id][1][1];
asc=option[questn_id][2][1];
asd=option[questn_id][3][1];

  test.innerHTML ="<h3>"+questn+"</h3>";
   test.innerHTML +="<input type='radio'  name='choice' value='" +asa+ "'>" + cha + "<br/>";
   test.innerHTML +="<input type='radio'  name='choice' value='" +asb+ "'>" +chb+ "<br/>";
    test.innerHTML +="<input type='radio'  name='choice' value='" +asc+ "'>" +chc+"<br/>";
   test.innerHTML +="<input type='radio' name='choice' value='" +asd+ "'>" +chd+ "<br/>";
   if(sub >= 1)
   {
    test.innerHTML +="<button class='btn btn-xs' onclick ='showprevious2(subject_id)'>Previous2</button>";
   }
 for (i = 1; i < question.length; i++) { 
   
     test.innerHTML +="<button class='btn btn-xs' onclick ='shownumber2(subject_id)'>"+i+"</button>";
}
    test.innerHTML +="<button class='btn btn-xs' onclick ='shownext2(subject_id)'>Next2</button>";

}
function shownumber()
{

  renderQuestin();
}
function showprevious()
{
  sub--;

  renderQuestin();

}
function shownext()
{
  sub++;
renderQuestin();

}
function showprevious2($id)
{
  sub--;

  renderQuestin2($id);
}
function shownext2($id)
{
  sub++;

  renderQuestin2($id);
}
function getsubjectid($id)
{
  sub =0;
renderQuestin2($id);
}
window.addEventListener("load",renderQuestin);
</script>
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
                <div class="col-md-7 col-sm-7">
                	  <div class="blog-talks margin-bottom-30">
               
                    <div class="tab-style-1">
                      <ul class="nav nav-tabs">
                      	@foreach($sub as $key => $v_sub)
                      	<?php $subject =$r->subject($v_sub->subject_id); ?>
                      	@if($key == 0)
                      <li class="active"><a data-toggle="tab" href="#tab-{{$v_sub->subject_id}}" onclick="getsubjectid({{$v_sub->subject_id}})">
                      	@else
<li><a data-toggle="tab" href="{{$v_sub->subject_id}}" onclick="getsubjectid({{$v_sub->subject_id}})">
                      	@endif
                      	{{$subject->name}}</a></li>
                         @endforeach
                    </ul>

                     
<div id="test"></div>
                        
                        
                        </div>
                
                        
                      </div>
                        
                    </div>
                  </div>  
                 
                   
                    
                    
                   
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection