<!DOCTYPE html>
	<html lang="{{ env('APP_LOCALE') }}">
		<head>
			<title>Inter-Media Informatique</title>
			<!--meta tags -->
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="keywords" content="vente, maintenance, vente et maintenance, matériel informatique, composants, accessoires, ordinateurs Gaming, Stations, CAD, PAO, 3D, Multi-monitoring, Vente en gros et en détails, produits informatique, smartphone, réparation smartphone, accessoires informatique, monastir" />
			<link rel="stylesheet" type="text/css" href="/fonts/iconic/css/material-design-iconic-font.min.css">
			<script src="/js/jquery-1.11.1.min.js" type="text/javascript"></script>
			<script src="/js/bootstrap.min.js"></script>
			<meta name="viewport" content="width=device-width" />
			<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
			<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
			<link rel="stylesheet" type="text/css" href="/css/util.css">
			<link rel="stylesheet" type="text/css" href="/css/main.css">
			<link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
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
									<img style="border-radius: 50%; height: 40px;width: 40px;" src="/storage/uploads/users/{{ Auth::user()->image }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
									<span class="caret"></span></button>
								<ul class="dropdown-menu" style="">
									<li><a href="{{ route('user.profile', Auth::id()) }}" class="dropdown-item" >
									Profil
									</a></li>
									<li><a  href="{{ route('order.new') }}" class="dropdown-item" >
									Nouveau Commandes
									</a></li>
									<li><a class="dropdown-item" href="{{ route('user.orders', Auth::id()) }}">
									Mes commandes
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
						<div>
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


			<div class="container-contact100">
				<div class="contact100-map" > </div>

				<div class="wrap-contact100">
					<form class="contact100-form validate-form" action="{{ route('order.create') }}" method="POST">
						@csrf
						<span class="contact100-form-title">
						Nouvelle Commande
						</span>
						<table style="width: 100%">
							<tbody>
								<tr>
									<td>
										<label style="font-family: SourceSansPro-Bold;padding: 5%">Panne :</label>
									</td>
									<td><div class="wrap-input100 validate-input" data-validate="champ requis">

										<input class="input100" type="text" name="title" placeholder="">
											<span class="focus-input100"></span>
										</div>
										</td></tr>
										</tbody>
										</table>

										<table style="width: 100%">
										<tbody>
										<tr>
										<td>
										<label style="font-family: SourceSansPro-Bold;padding: 1%">Marque :</label>
										</td>
										<td>
										<div class="wrap-input100 validate-input" data-validate = "champ requis">
										<input class="input100" type="text" name="device_brand" placeholder="">
										<span class="focus-input100"></span>
										</div>
										</td></tr>
										</tbody>
										</table>
										<table style="width: 100%">
										<tbody>
										<tr>
										<td>
										<label style="font-family: SourceSansPro-Bold;padding: 5%">model :</label>
										</td>
										<td><div class="wrap-input100 validate-input" data-validate="champ requis">

										<input class="input100" type="text" name="device_model" placeholder="">
										<span class="focus-input100"></span>
										</div>
										</td></tr>
										</tbody>
										</table>

										<table style="width:100%;position: relative;margin-bottom: 10%">
										<tbody >
										<tr style="margin-bottom: 50px">
										<td style="width: 15%;">



										<label style="font-family: SourceSansPro-Bold;position: relatives;padding-top: 50%">Couleur :</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#ededc0">
										<span class="checkmark" style=" background-color: #ededc0;
										"></span>

										</label>
										</td>	
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#000000">
										<span class="checkmark" style=" background-color: #000000;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#0000FF">
										<span class="checkmark" style=" background-color: #0000FF;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#A52A2A">
										<span class="checkmark" style=" background-color: #A52A2A;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#FFD700">
										<span class="checkmark" style=" background-color: #FFD700;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#008000">
										<span class="checkmark" style=" background-color: #008000;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#DAA520">
										<span class="checkmark" style=" background-color: #DAA520;
										"></span>

										</label>
										</td


										</tr>

										<tr>
										<td style="width: 15%;">



										<label style="font-family: SourceSansPro-Bold;position: relatives;">&nbsp;</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#FFC0CB">
										<span class="checkmark" style=" background-color: #FFC0CB;
										"></span>
										</label>
										</td>

										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#800080">
										<span class="checkmark" style=" background-color: #800080;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#FF0000">
										<span class="checkmark" style=" background-color: #FF0000;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#FFA500">
										<span class="checkmark" style=" background-color: #FFA500;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#C0C0C0">
										<span class="checkmark" style=" background-color: #C0C0C0;
										"></span>

										</label>
										</td>
										<td >

										<label class="container">
										<input type="radio" name="device_color" value="#FFFFFF">
										<span class="checkmark " style=" background-color: #FFFFFF;border: 0.5px solid black;border-radius: 50%
										"></span>

										</label>
										</td>

										</tr>
										</tbody>
										</table>
										<table style="width: 100%;">
										<tbody>
										<tr>
										<td style="width: 20%">
										<label style="font-family: SourceSansPro-Bold;">Accessoire :</label>
										</td>
										<td><div class="wrap-input100 validate-input" data-validate="">

										<input type="text" name="device_accessories" value="chargeur" class="input100" data-role="tagsinput" >
										<span class="focus-input100"></span>
										</div>
										</td></tr>
										</tbody>
										</table>

										<div style="display:inline;">
										<div class="container-contact100-form-btn">
										<input type="submit" value="valider" class=" contact100-form-btn" style="background: #5BC0DE" />
										</div>	

										<div class="container-contact100-form-btn">
										<input type="reset" value="reset"  class="contact100-form-btn" style="background:#c00c0d" />

										</div>
										</div>


										</form>


										</div>
										</div>

										<script src="/js/jquery.min.js"></script> 
										<script src="/js/bootstrap-tagsinput.min.js"></script>
										<script src="/js/main.js"></script>


										</body>
										</html>