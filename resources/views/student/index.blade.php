@extends('layouts.student')
@section('title','Home')
@section('content')
@inject('r','App\General')
 <div class="main" style="min-height: 460px">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
          
            <li class="active">home</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          

          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1> {{auth::guard('std')->user()->name}}</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <p>{{auth::guard('std')->user()->phone}}</p>
                    <p>{{auth::guard('std')->user()->address}}</p>
                    <p><img src="image/students/{{auth::guard('std')->user()->img_url}}"></p>
                    <h4> Registered Subject</h4>
                    <ul>
                    @foreach($sb as $v)
                    <?php $subject =$r->subject($v->subject_id); ?>
                    <li>{{$subject->name}}</li>


                    @endforeach
                </ul>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    @if($s->exam_status == 1)
                <a href="{{url('viewresult')}}" target="_blank" class="btn btn-danger btn-block" style="color: white;"> Check Result</a>
                    @else
                    @if($es == 1)
                    <h2><em>Examination Intruction</em></h2>
                    <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>
                    <a href="{{url('startexams')}}" class="btn btn-danger btn-block"> Start</a>
                    @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection