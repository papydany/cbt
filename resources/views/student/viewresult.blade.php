<!DOCTYPE html>
<html>
<head>
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"> </head>
<body class="corporate">
@inject('r','App\General')
<?php $user =$r->GetUser(auth::guard('std')->user()->user_id); ?>
 <div class="main" style="min-height: 460px">
      <div class="container">
       
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-top-40">
 <div class="col-md-12 col-sm-12" style="padding-top: 40px; border:solid 2px #000; margin-top: 12px;margin-bottom: 5px;">
  <div class="col-sm-4">
    <img src="image/school/{{$user->img_url}}" alt="{{$user->img_url}}" width="118" height="32">
  </div>
  <div class="col-sm-6">
   <p> {{isset($user->name) ?$user->name:''}}</p>
   <p>{{isset($user->address) ?$user->address:''}}</p>
   <p>{{isset($user->phone) ?$user->phone:''}} &nbsp;&nbsp;&nbsp;
    
  {{isset($user->email) ?$user->email:''}}</p>
  
  </div>
  
  
 </div>

        	     <div class="col-md-12 col-sm-12" style="border:solid 1px #000; border-radius: 10px; padding-top: 15px;">
                <div class="col-sm-4">
                   <h1> {{auth::guard('std')->user()->name}}</h1>
                <p>{{auth::guard('std')->user()->phone}}</p>
                    <p>{{auth::guard('std')->user()->address}}</p>
                    <p><img src="image/students/{{auth::guard('std')->user()->img_url}}"></p>
                </div>
          <div class="col-md-8 col-sm-8">
            <h1>EXAMINATION SCORES</h1>
                <table class="table table-striped table-bordered">
                  <tr>
                    <th>Subject</th>
                    <th>Score</th>
                  </tr>
                  @foreach($sc as $v)
                  <?php $subject =$r->subject($v->subject_id) ?>
                  <tr>
                    <td>{{$subject->name}}</td>
                    <td>{{$v->score}}</td>
                  </tr>

                  @endforeach
                  <tr>
                    <th>Total</th>
                     <th>{{$sc->sum('score')}}</th>
                  </tr>
                </table>
              </div>
            </div>
            </div>
          </div>

        </div>
</body>
</html>

