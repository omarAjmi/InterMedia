<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE') }}">
   <head>
      <title>Inter-Media Informatique</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="vente, maintenance, vente et maintenance, matériel informatique, composants, accessoires, ordinateurs Gaming, Stations, CAD, PAO, 3D, Multi-monitoring, Vente en gros et en détails, produits informatique, smartphone, réparation smartphone, accessoires informatique, monastir" />
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
      <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="/css/font-awesome.css" rel="stylesheet">
      <!-- //font-awesome icons -->
      <link href="/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
      <!-- easy-responsive-tabs -->
      <link href="/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
      <!--stylesheets-->
      <link href="/css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
      
      <script src="/js/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" ref="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
								<button class="dropdown-toggle " style="color: white" type="button" data-toggle="dropdown">
									<img style="border-radius: 50%; height: 40px;width: 40px;" src="/storage/uploads/users/{{ Auth::user()->image }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} @if (!is_null($msgsCount))<span class="badge"> {{ $msgsCount }}</span>@endif
									<span class="caret"></span></button>
								<ul class="dropdown-menu" >
									<li><a href="{{ route('user.profile', Auth::id()) }}" class="dropdown-item" >
									Profil
									</a></li>
									<li><a  href="{{ route('order.new') }}" class="dropdown-item" >
									Nouveau Commandes
									</a></li>
									<li><a class="dropdown-item" href="{{ route('user.orders', Auth::id()) }}">
									Mes commandes @if (!is_null($msgsCount))<span class="badge"> {{ $msgsCount }}</span>@endif
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
         <!-- Slideshow 4 -->
         
          
      </div>
      <!-- This is here just to demonstrate the callbacks -->
      <!-- <ul class="events">
         <li>Example 4 callback events</li>
         </ul>-->
      <!-- //banner -->
      
      <!--service -->
      <div class="services" id="services">
         <div class="container">
            <h3 class="title clr">Mes<span class="sub-text"> Commandes</span></h3>
@if($orders->isEmpty())
    <h2>Aucune commande pour le moment</h2>
@else
    <div class="top_tabs_agile">
        <div id="verticalTab" class="top_tabs_agile">
            <ul class="resp-tabs-list">
                @foreach ($orders as $key => $order)
                    <li class="resp-tab-item resp-tab-active">
                        <span class="fa fa-desktop" aria-hidden="true"></span>commande {{ $x = $key+1 }}:
                        @if ($order['count'] > 0)
                            <span class="badge">{{ $order['count'] }}</span>
                        @endif
                    </li>
                @endforeach
            </ul>
            @foreach ($orders as $key => $order)
                <div class="resp-tabs-container">
                    <div class="tab{{ $key+1 }}">
                        <div class="services-right-agileits">
                            <div class="col-md-5 col-sm-5 col-xs-5 img-left">
                                <img src="/storage/uploads/users/{{ $order['data']->client->details->image }}" alt="" class="img-r">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 ser-img-wthree">
                                <h4>Commande {{ $key+1 }}:</h4>
                                <p>  Date : {{ $order['data']->created_at }}<br>
                                    Panne: {{ $order['data']->breakdown->title }}<br>
                                    Marque: {{ $order['data']->breakdown->device->brand }}<br>
                                    Model: {{ $order['data']->breakdown->device->model }}<br>
                                    Couleur: <img src="/images/colors/{{ str_replace('#','',$order['data']->breakdown->device->color) }}.png" alt="couleur" style="border-radius: 50%"> <br>
                                    Accessoires : {{ $order['data']->breakdown->device->accessories }}<br>
                                </p>
                                <a href="{{ route('order.preview', $order['data']->id) }}" id="addClass"><button class="btn btn-primary" style="border-radius: 25px;border-color: transparent;"><span class="fa fa-comments"></span> Voir discussion</button></a>

                                <a href="{{ route('order.edit', $order['data']->id) }}" >
                                    <button class="btn btn-primary" style="border-radius: 25px;border-color: transparent;">
                                        <span class="fa fa-pencil"></span>Modifier</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="clearfix"> </div>
    </div>
@endif
<!--//messages-->

<!--fin messages-->
<script>
    $('.toggle').click(function () {
        // Switches the Icon
        $(this).children('i').toggleClass('fa-pencil');
        // Switches the forms  
        $('.form').animate({
            height: "toggle",
            'padding-top': 'toggle',
            'padding-bottom': 'toggle',
            opacity: "toggle"
        }, "slow");
    });
    $(function(){
        $("#addClass").click(function () {
            $('#qnimate').addClass('popup-box-on');
            });

        $("#removeClass").click(function () {
            $('#qnimate').removeClass('popup-box-on');
            });
    });
</script>
<!-- //contact-->   
         </div>
      </div>
      <!-- //service -->
     
      <!--footer-->
      <footer>
         <div class="container">
            <div class="col-md-7 header-side">
               <p>© 
                  2018 . All Rights Reserved <a href="{{ route('welcome') }}" target="_blank">Inter Media</a> Monastir</a>
               </p>
            </div>
            <div class="col-md-5 header-side">
               <div class="buttom-social-grd text-center">
                  <ul>
                     <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                     <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                     <li><a href="#"><span class="fa fa-rss"></span></a></li>
                     <li><a href="#"><span class="fa fa-vk"></span></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
      <!-- //footer-->
      <!--js working-->
      <script src="/js/jquery-2.2.3.min.js"></script>
      <!-- //js  working-->
      <script src="/js/responsiveslides.min.js"></script>
      <script>
         // You can also use "$(window).load(function() {"
         $(function () {
         	// Slideshow 4
         	$("#slider4").responsiveSlides({
         		auto: true,
         		pager: true,
         		nav: false,
         		speed: 900,
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
      <!--// banner-->
      <!-- service for responsive tabs -->
      <script src="/js/easy-responsive-tabs.js"></script>
      <script>
         $(document).ready(function () {
         $('#verticalTab').easyResponsiveTabs({
         type: 'vertical',
         width: 'auto',
         fit: true
         });
         });
      </script>
      <!-- service for responsive tabs -->
      <!-- OnScroll-Number-Increase-JavaScript -->
      <script src="/js/jquery.waypoints.min.js"></script>
      <script>
         $('.counter').countUp();
      </script>
      <!-- //OnScroll-Number-Increase-JavaScript -->
      <!-- Slide-To-Top JavaScript (No-Need-To-Change) -->
      <script >
         $(document).ready(function () {
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 100,
         		easingType: 'linear'
         	};
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         });
      </script>
      <a href="#" id="toTop" class="stuoyal3w stieliga" style="display: block;">
      <span id="toTopHover" style="opacity: 0;"> </span>
      </a>
      <!-- //Slide-To-Top JavaScript -->
      <!-- Smooth-Scrolling-JavaScript -->
      <script src="/js/move-top.js"></script>
      <script src="/js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll, .navbar li a, .footer li a").click(function (event) {
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 1000);
         	});
         });
      </script>
      <!-- //Smooth-Scrolling-JavaScript -->
      <!--bootstrap-->
      <script src="/js/bootstrap.js"></script>
      <!--// bootstrap-->
      <!-- jQuery-Photo-filter-lightbox-Gallery-plugin -->
      <script src="/js/jquery-1.7.2.js"></script>
      <script src="/js/jquery.quicksand.js"></script>
      <script src="/js/script.js"></script>
      <script src="/js/jquery.prettyPhoto.js" ></script>
      <!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->
   </body>
</html>