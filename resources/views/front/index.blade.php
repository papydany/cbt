
<!DOCTYPE html>
<html lang="en">
<head>
<title>PentaEdge Educational Tests Services</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="ingenious a Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--/metatags-->
<link href="frontend/css/bootstrap.css" rel="stylesheet" /> <!--bootstrap-css-->
<link href="frontend/css/style.css" rel="stylesheet"/> <!--style-css-->
<link rel="stylesheet" href="frontend/css/lightbox.min.css"><!--lightbox-->
<link href="frontend/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="frontend/css/font-awesome.min.css" rel="stylesheet" /><!--fontawesome-css-->
<link href="frontend///fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
<link href="frontend///fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="frontend///fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	@inject('r','App\General')
                   <?php $c= $r->getbasicinfo() ?>
<section class="agile-navigation">
	<div class="container">
	<nav class="navbar navbar-default">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <h1>
				  <a class="navbar-brand" href="{{url('/')}}"><img src="image/{{isset($c->logo) ? $c->logo : ''}}" height="80"></a>
				  </h1>
			</div><!--/navbar-->		
		<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="{{url('/')}}" class="scroll">home</a></li>
					<li><a href="#about" class="scroll">about</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More menu <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li> <a  href="{{url('findteacher')}}">Find Teacher </a></li>
						
						<li><a href="{{url('teacher')}}">Tutor Register Here</a></li> 

						  <li><a href="{{url('login')}}">Tutor Login</a></li>
						<li class="divider"></li>
						<li><a href="{{url('student')}}">Students Register</a></li>
						<li><a href="{{url('student_home')}}">Students Login</a></li>
						<li class="divider"></li>


					 <li><a href="{{url('sc_simulation')}}">Simulation</a></li>
					 	<li class="divider"></li>
					 </ul>
					</li>
					<li><a href="{{url('service')}}">services</a></li>
					<li><a href="{{url('getpost')}}">Post</a></li>
					<li><a href="#contact" class="scroll">contact us</a></li>
				</ul>
		 </div><!--/nav-collpase-->
	</nav><!--/nav-->
	<!-- banner-text -->
	    
		<div class="agile-text"> 
			<div class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<div class="slider-info">
							<h3>Education with technologies</h3>
							<h4> Successful career starts with good education</h4>
						
						</div>
					</li>
					<li>
					
						<div class="slider-info">
							 <h3>Place to achieve good results</h3>
							<h4> Make the best choice for your education</h4>
							
						   
						</div>
					</li>
					<li>
						
						<div class="slider-info">
							 <h3>Turning goals into reality</h3>
							<h4> Successful career starts with good education</h4>
							
						   
						</div>
					</li>
					<li>
						
						<div class="slider-info">
							 <h3>Preparing for successful future</h3>
							<h4> Make the best choice for your education</h4>
						   
						</div>
					</li>

				</ul>
				
			</div>
			<div class="clearfix"></div>	
		</div>
	</div>
<!-- //banner -->
</section>

<!-- banner bottom -->
		<section class="banner-btm">
			<div class="container">
				<div class="row banner-bottom-main bg-white">
						<div class="col-md-4 banner-grid2">
							<div class="banner-subg1">
								<h3 class="mt-3"><span class="fa fa-clock pr-3" aria-hidden="true"></span> OPENING HOURS</h3>
								<p class="mt-3 pl-5">Monday - Friday 09.00 - 18.00</p>
								<p class="pl-5">Saturday 09.00 - 14.00</p>
							</div>
						</div>
						<div class="col-md-4 banner-grid2">
							<div class="banner-subg1">
								<h3 class="mt-3"><span class="fa fa-phone pr-3" aria-hidden="true"></span> CALL US ANYTIME</h3>
								<p class="mt-3 pl-5">{{isset($c->phone) ? $c->phone : ''}}</p>
								<p class="pl-5">{{isset($c->phone1) ? $c->phone1 : ''}}</p>
							</div>
						</div>
						<div class="col-md-4 banner-grid2">
							<div class="banner-subg1">
								<h3 class="mt-3"><span class="fa fa-envelope pr-3" aria-hidden="true"></span> EMAIL US</h3>
								<p class="mt-3 pl-5">Email :<a href="mailto:example@email.com">{{isset($c->email1) ? $c->email1: '' }}</a></p>
								<p class="pl-5">Email :<a href="mailto:example@email.com">{{isset($c->email2) ? $c->email2: '' }}</a></p>
							</div>
						</div>
				</div>
			</div>
		</section>
		<!-- //banner bottom -->
<!--about-->
<section class="agile-about" id="about">
	<h4 class="header tittle-w3l">Welcome Our Site</h4>
	<div class="line"></div>
	<div class="container">
		<div class="col-md-4 agile-aboutleft">
			<h3>About</h3>
			<p> 
				PentaEdge Educational Tests Services (PETS) is a body of professionally acclaimed trainers, educationists and experienced education system managers. Ours is a world where we encourage, evaluate and measure test-takers knowledge, skills, and aptitude thereby bringing to fore and documenting the academic readiness, learning progress, skill acquisition and educational needs of test-takers.

			</p>
			<div class="agile-modal">
				<!-- Button trigger modal -->
				<a class="btn btn-primary" href="{{url('aboutus')}}"> read more</a>
				
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">offering the best education</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<img src="images/banner.jpg" alt="image">
						<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>
					  </div>
					</div>
				  </div>
				</div>	
			</div>
		</div>
		<div class="col-md-4 agile-aboutright">
		
		</div>
		<div class="col-md-4 agile-aboutform">
			<h5>make Enquiry</h5>
			<form class="form-horizontal" role="form" method="POST" action="{{ url('contact') }}" data-parsley-validate>
                        {{ csrf_field() }}
				<input type="text" name="name" placeholder="name"  required>
				<input type="email" name="email" placeholder="email"  required>
				<textarea rows="4" placeholder="enter your Enquiry" name="message"></textarea>
				<input type="submit" value="Submit">
			</form>
			
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!--/about-->
<!-- categories -->
	<section class="categories_agile py-5">
		<div class="container py-md-4 mt-md-3">
		<h5 class="header">WE OFFER</h5>
<h4 class="header">What are you looking for?</h4>
	<div class="line"></div>
			<div class="row categories-top mt-md-5 pt-5">
				<div class="col-md-4 categories-left1">
				</div>
				<div class="col-md-8 categories-left">
					<div class="row">
						<div class="col-md-6 col-sm-6 categories_sub cats">
							<div class="categories_sub1">
								<h3 class="mt-3">#Are you a good Tutor?</h3>
								<p class="mt-3 mb-3">We offer a free platform for every tutor to upload their resume</p>
                                <a href="{{url('teacher')}}" >Click To Register<span class="fa fa-arrow-right" aria-hidden="true"></span></a>
							</div>
							<div class="categories_sub1">
								<h3 class="mt-3"> Find a Tutor</h3>
								<p class="mt-3 mb-3">Contact a grade A tutor who is ready and qualified help you attain your academic goals. </p><a href="{{url('findteacher')}}" >More details<span class="fa fa-arrow-right" aria-hidden="true"></span></a>
							</div>
							<div class="categories_sub1">
								<h3 class="mt-3">Virtual classroom </h3>
								<p class="mt-3 mb-3">Learn difficult phenomenon and concepts here in a fun like and intuitive ways!</p><a href="#" >More details<span class="fa fa-arrow-right" aria-hidden="true"></span></a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 categories_sub cats1">
							<div class="categories_sub2">
								<h3 class="mt-3">Are you a Student?</h3>
							<a href="{{url('student')}}" >Click To register<span class="fa fa-arrow-right" aria-hidden="true"></span></a>
							<br/>
							<a href="{{url('student_home')}}" >Login<span class="fa fa-arrow-right" aria-hidden="true"></span></a>
							</div>
							<div class="categories_sub2">
								<h3 class="mt-3">Consultancy Services</h3>
								<p class="mt-3 mb-3">We offer one- to- one educational consultancy for free. Meet our qualified professionals ...</p><a href="{{url('service')}}" >More details<span class="fa fa-arrow-right" aria-hidden="true"></span></a>
							</div>
							<div class="categories_sub2">
								<h3 class="mt-3">Science Simulations</h3>
								<p class="mt-3 mb-3">We offer a platform for a wide range of laboratory and science simulations. </p><a href="{{url('sc_simulation')}}" >More details<span class="fa fa-arrow-right" aria-hidden="true"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //categories -->


<!--contact-->
<section class="agile-contact" id="contact">
	<h4 class="header">our contact</h4>
	<div class="line"></div>
<div class="agile-contactus">
<div class="container">
		<div class="col-md-6 agile-contact1">
					
					<div class="contact-form">
					
					</div>
					
		</div>
		<div class="col-md-6 agile-contact2">
				<p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class="agile-fields">
				<ul class="navigation">
					<li>
						<div class="icon-left">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>address</h5>
							<span>{{isset($c->address) ? $c->address: '' }}</span>
						</div>
					</li>
				</ul>
				
				<div class="clearfix"></div>
		  </div>
	</div>
	</div>
	</div>
</section>
<!--/contact-->
<!--footer-->
<section class="agile-footer">
	<footer>Powered by: PentaEdge Educational Tests Services </footer>
</section>
<!--/footer-->

<script src="frontend/js/lightbox-plus-jquery.min.js"></script>
<script src="frontend/js/bootstrap.js"></script>
<script src="frontend/js/jquery-2.1.4.min.js"></script>
<script src="frontend/js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							 
							 
							 <script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider1").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	


<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
<!-- js for smooth scrollings -->
	<script src="js/SmoothScroll.min.js"></script>
<!-- js for smooth scrollings -->
<!-- //smooth-scrolling-of-move-up -->
<script src="js/jquery.magnific-popup.js"></script>
<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			easing: 'ease-in-out', 
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
</script>

</body>
</html>