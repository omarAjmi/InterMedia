<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Inter-Media Informatique</title>
	<!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="vente, maintenance, vente et maintenance, matériel informatique, composants, accessoires, ordinateurs Gaming, Stations, CAD, PAO, 3D, Multi-monitoring, Vente en gros et en détails, produits informatique, smartphone, réparation smartphone, accessoires informatique, monastir" />
         <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
	<link href="/css/style.css" rel='stylesheet' type='text/css' media="all">
 
<body style="background: #F7F7F7">
	<div class="header-outs_page">
		<div class="w3-agile-logo">
			<div class=" head-wl">
				<div class="col-md-4 col-sm-4 col-xs-4 buttom-social-grids">
					<ul>
						<li>
							<a href="https://www.facebook.com/InterMediaInformatique">
								<span class="fa fa-facebook"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-twitter"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-rss"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-vk"></span>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 headder-w3">
					<h1>
						<a href="{{route('welcome')}}">
							<span class="first-clr">I</span>nter
							<span class="first-clr">M</span>edia</a>
					</h1>
					<h2>
						<a href="{{route('welcome')}}">
							<span class="first-clr">M</span>onastir</a>
					</h2>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 w3-header-top-right-text">
					<p>
						@if(Auth::guest())
							<a id="login" href="#" class="log" data-toggle="modal" data-target="#myModal">Se connecter</a>
						@else
							<form class="form-inline" action="{{ route('logout') }}" method="post">
								@csrf
								<input type="submit" value="Se deconnecter">
							</form>
						@endif
						<span class="fa fa-phone" aria-hidden="true"></span> (+216)73 448 601</p>
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
								<li><a href="{{url('/')}}" ><img src="/images/log2.png" style="width: 50%;height: 50%;margin-top:-10%"></a></li>
							<li><a href="{{ url('/') }}#gallery" class="scroll">Promotions</a></li>
							<li><a href="{{ url('/') }}#testimonials" class="scroll">Témoignages</a></li>
							<li><a href="{{ url('/') }}#contact" class="scroll">Contactez nous</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>

	<div class="container-contact100">
		<div class="contact100-map" ></div>
        @yield('content')
    </div>
	<!--footer-->
      <footer>
         <div class="container">
            <div class="col-md-7 header-side">
               <p>© 
                  2018 . All Rights Reserved <a href="{{ route('welcome') }}" target="_blank">Inter Media</a> Monastir
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
    <script src="/js/jquery.min.js"></script>
    
	<script src="/js/main.js"></script>
</body>
</html>
