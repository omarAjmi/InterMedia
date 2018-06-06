<!DOCTYPE html>
<html>
<head>

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width" />
 <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

        <!-- font-awesome icons -->
      <link href="/css/font-awesome.css" rel="stylesheet">
      <!-- //font-awesome icons -->
      <link href="/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
      <!-- easy-responsive-tabs -->
      <link href="/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
      <!--stylesheets-->
      <link href="/css/style.css" rel='stylesheet' type='text/css' media="all">
       <link href="/css/msg.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <script src="/js/jquery-1.11.1.min.js"></script>
      
  <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
        {{--  --}}
     
      
</head>
<body style="background: #F7F7F7">
	  <div class="header-outs_page">
         <div class="w3-agile-logo">
            <div class=" head-wl">
               <div class="col-md-4 col-sm-4 col-xs-4 buttom-social-grids">
                  <ul>
                     <li><a href="https://www.facebook.com/InterMediaInformatique"><span class="fa fa-facebook"></span></a></li>
                     <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                     <li><a href="#"><span class="fa fa-rss"></span></a></li>
                     <li><a href="#"><span class="fa fa-vk"></span></a></li>
                  </ul>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-4 headder-w3">
                  <h1><a href="{{ url('/') }}"><span class="first-clr">I</span>nter <span class="first-clr">M</span>edia</a></h1>
                  <h2><a href="{{ url('/') }}"><span class="first-clr">M</span>onastir</a></h2>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-4 w3-header-top-right-text">
                  <div class="dropdown pull-right" >
                    <button class="dropdown-toggle " style="color: white" type="button" data-toggle="dropdown" style="">
                        <img style="border-radius: 50%; height: 40px;width: 40px;" src="/storage/uploads/users/{{ Auth::user()->image }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}@if (!is_null($msgsCount))<span class="badge"> {{ $msgsCount }}</span>@endif
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" style="">
                        <li><a href="{{ route('user.profile', Auth::id()) }}" class="dropdown-item" >
                        Profil
                        </a></li>
                        <li><a  href="{{ route('order.new') }}" class="dropdown-item" >
                        Nouveau Commandes
                        </a></li>
                        <li><a class="dropdown-item" href="{{ route('user.orders', Auth::id()) }}">
                        Mes commandes:@if (!is_null($msgsCount))<span class="badge"> {{ $msgsCount }}</span>@endif
                        </a></li>
                        <li> <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                        </li>
                    </ul>
                </div>
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
         <div class="top-nav">
            <nav class="navbar navbar-default navbar-fixed-top">
               <div class="container">
                  <!-- //header -->
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                        aria-controls="navbar">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav ">
                        <li><a href="{{ url('/') }}" class="scroll">Acceuil</a></li>
                        <li><a href="{{ url('/') }}#about " class="scroll">À propos</a></li>
                        <li><a href="{{ url('/') }}#services" class="scroll">Services</a></li>
                         <li><a href="{{ url('/') }}" ><img src="/images/log2.png" style="width: 50%;height: 50%;margin-top:-10%"></a></li>
                        <li><a href="{{ url('/') }}#gallery" class="scroll">Promotions</a></li>
                        <li><a href="{{ url('/') }}#testimonials" class="scroll">Témoignages</a></li>
                        <li><a href="{{ url('/') }}#contact" class="scroll">Contactez nous</a></li>
                        <!-- <li>
                            <a href="#" class="log" data-toggle="modal" data-target="#myModal">Login</a>
                        </li>
 -->                     </ul>
                  </div>
               </div>
            </nav>
         </div>  
      </div>


	<div class="container">
	<div class="row">
	<!-- Contenedor Principal -->
    <div class="comments-container">
	
		<ul id="comments-list" class="comments-list ScrollStyle">
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name by-author">Agustin Ortiz</h6>
							<span>hace 20 minutos</span>
							
						</div>
						<div class="comment-content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
						</div>
					</div>
				</div>
				</li>
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name">	Lorena Rojero</h6>
							<span>hace 10 minutos</span>
							
						</div>
						<div class="comment-content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name">	Lorena Rojero</h6>
							<span>hace 10 minutos</span>
							
						</div>
						<div class="comment-content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
						</div>
					</div>
				</div>
			</li>
		</ul>
		 <div class="row">
    
    <div class="col-md-12">
    						<div class="widget-area no-padding blank">
								<div class="status-upload">
									<form>
										<textarea placeholder="What are you doing right now?" ></textarea>
									
										<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
									</form>
								</div><!-- Status Upload  -->
							</div><!-- Widget Area -->
						</div>
        
    </div>
</div>
	</div>
	</div>
	

</body>
</html>