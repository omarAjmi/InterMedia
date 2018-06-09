<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE') }}">
   <head>
      <title>Inter-Media Informatique</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="vente, maintenance, vente et maintenance, matériel informatique, composants, accessoires, ordinateurs Gaming, Stations, CAD, PAO, 3D, Multi-monitoring, Vente en gros et en détails, produits informatique, smartphone, réparation smartphone, accessoires informatique, monastir" />
         <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
   <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/font-awesome.css" rel="stylesheet">
      <!-- //font-awesome icons -->
      <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
      <!-- easy-responsive-tabs -->
      <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <link href="css/changes.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
   </head>
   <body style="background: #F7F7F7">
      <div class="header-outs">
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
                  <h1><a href="{{url('/')}}"><span class="first-clr">I</span>nter <span class="first-clr">M</span>edia</a></h1>
                  <h2><a href="{{url('/')}}"><span class="first-clr">M</span>onastir</a></h2>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-4 w3-header-top-right-text">
                 
                @guest
                  <p> <a id="login" href="#" class="log" data-toggle="modal" data-target="#myModal">Se connecter</a></p>
                @elseif(!is_null(Auth::user()->technician) and  Auth::user()->technician->admin)
                    <div class="dropdown pull-right" >
                        <button class="dropdown-toggle but" style="overflow:hidden" type="button" data-toggle="dropdown" style="">
                            <img style="border-radius: 50%; height: 40px;width: 40px;" src="/storage/uploads/users/{{ Auth::user()->image }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="">
                           <li><a class="dropdown-item" href="{{ route('welcome') }}">
                                            Acceuil
                                        </a></li>
                            <li><a class="dropdown-item" href="{{ route('admin') }}">
                                            Site Admin
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
               @else
               <div class="dropdown pull-right" >
                        <button class="dropdown-toggle but" style="overflow:hidden" type="button" data-toggle="dropdown" style="">
                            <img style="border-radius: 50%; height: 40px;width: 40px;" src="/storage/uploads/users/{{ Auth::user()->image }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}@if (!is_null($msgsCount))<span class="badge"> {{ $msgsCount }}</span>@endif
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="">
                            <li><a href="{{ route('user.profile', Auth::id()) }}" class="dropdown-item" >
                                           Profil
                                        </a></li>
                              <li><a class="dropdown-item"  href="{{ route('order.new') }}" >
                                           Nouveau Commande
                                        </a></li>
                              <li><a href="{{ route('user.orders', Auth::id()) }}" class="dropdown-item" >
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
                @endif                 
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
         <div class="top-nav" >
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
                        <li><a href="#about " class="scroll">À propos</a></li>
                        <li><a href="#services" class="scroll">Services</a></li>
                            <li><a href="{{url('/')}}" ><img src="images/log2.png" style="width: 50%;height: 50%;margin-top:-10%"></a></li>
                        <li><a href="#gallery" class="scroll">Promotions</a></li>
                        <li><a href="#testimonials" class="scroll">Témoignages</a></li>
                        <li><a href="#contact" class="scroll">Contactez nous</a></li>
                    </ul>
                  </div>
               </div>
            </nav>
         </div>
         <!-- Slideshow 4 -->
         <div class="slider">
            <div class="callbacks_container">
               <ul class="rslides" id="slider4">
                  <li>
                     <div class="slider-img">
                        <div class="container">
                           <div class="slider-info">
                              <h4><span class="first-clr">N</span>ous <span class="first-clr">V</span>endons <span class="first-clr">L</span>e <span class="first-clr">M</span>eilleurs</h4>
                              <p>Chez Inter Media, nous nous assurons que vous obtenez les trois meilleurs (qualité, prix et service).</p>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img ">
                        <div class="container">
                           <div class="slider-info">
                              <h4><span class="first-clr">N</span>otre <span class="first-clr">O</span>bjectif<span class="first-clr"><span class="first-clr">:</span>V</span>otre <span class="first-clr">S</span>atisfaction</h4>
                              <p>Chez Inter Media, nous nous assurons que votre satisfaction est notre seul objectif. </p>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img">
                        <div class="container">
                           <div class="slider-info">
                              <h4><span class="first-clr">H</span>igh <span class="first-clr">T</span>ech <span class="first-clr">A</span> votre <span class="first-clr">D</span>isposition</h4>
                              <p>Chez Inter Media, nous nous assurons que vous trouverez la dernière tendance des technologies. </p>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="clearfix"> </div>
         </div>
      </div>
      <!-- This is here just to demonstrate the callbacks -->
      <!-- <ul class="events">
         <li>Example 4 callback events</li>
         </ul>-->
      <!-- //banner -->
      <!--about -->
      <div class="about" id="about">
         <div class="container">
            <h3 class="title">Inter Media<span class="sub-text"> A propos</span></h3>
            <div class="col-md-5 col-sm-5 outs-grid">
               <img src="images/store.png">
               <div class="clearfix"> </div>
            </div>
            <div class="col-md-7 col-sm-7 abut-grid-w3ls">
               <br><br>
               <div class="agile-info-text">
                  <h4>votre portail vers les nouvelles technologies numerique.
                     Vent et Maintenance Materiel Informatique .<br>
                     GSM : (+216) 27 400 850/ (+216) 27 400 852<br>
                     tél: (+216) 73 448 601
                  </h4>
               </div>
               <h3> Description de l’entreprise</h3>
               <div class="agile-info-text">
                  <h4>Vente et maintenance de matériel informatique, composants, accessoires, ordinateurs Gaming & Stations pour les Pro (CAD, PAO, 3D, Multi-monitoring...Etc)
                  Vente en gros et en détails
                  Prix attractifs et produits de qualité.

                  </h4>
               </div>
             
            </div>
            <div class="clearfix"> </div>
     
         </div>
      </div>
      <!-- //about -->
      <!--service -->
      <div class="services" id="services">
         <div class="container">
            <h3 class="title clr">Inter Media<span class="sub-text"> Services</span></h3>
            <div class="top_tabs_agile">
               <div id="verticalTab" class="top_tabs_agile">
                  <ul class="resp-tabs-list">
                     <li class="resp-tab-item resp-tab-active">
                        <span class="fa fa-desktop" aria-hidden="true"></span>Vente
                     </li>
                     <li class="resp-tab-item" >
                        <span class="fa fa-desktop" aria-hidden="true"></span>Maintenance
                     </li>
                     <li class="resp-tab-item" >
                        <span class="fa fa-desktop" aria-hidden="true"></span> Classic Series
                     </li>
                     <li class="resp-tab-item">
                        <span class="fa fa-desktop" aria-hidden="true"></span>Comfortable Chairs
                     </li>
                  </ul>
                  <div class="resp-tabs-container">
                     <div class="tab1">
                        <div class="services-right-agileits">
                           <div class="col-md-5 col-sm-5 col-xs-5 img-left">
                              <img src="images/b3.jpg" alt="" class="img-r" style="">
                           </div>
                           <div class="col-md-7 col-sm-7 col-xs-7 ser-img-wthree">
                              <h4>Soft Furniture</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                 ut labore et dolore magna aliqua sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                 minim veniam, quis. Lorem ipsum dolor .
                              </p>
                           </div>
                           <div class="clearfix"> </div>
                        </div>
                     </div>
                     <div class="tab2" >
                        <div class="services-right-agileits">
                           <div class="col-md-5 col-sm-5 col-xs-5 img-left">
                              <img src="images/fix.gif?5" alt="" class="img-r" >
                           </div>
                           <div class="col-md-7 col-sm-7 col-xs-7 ser-img-wthree">
                              <h4>Réparation et Maintenance</h4>
                              <p>la réparation immédiate de téléphones mobiles, Smartphones et Tablettes des marques SAMSUNG, APPLE, SONY, NOKIA, LG, BLACKBERRY, HTC, HUAWEI, EVERTEK, ALCATEL...<br>
                              Nous effectuons tous types de réparations – panne, casse, mise à jour logiciel, réparation mécanique ou désoxydation sur place.
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="tab3" >
                        <div class="services-right-agileits">
                           <div class="col-md-5 col-sm-5 col-xs-5 img-left">
                              <img src="images/b4.jpg" alt="" class="img-r" style="width: 100%;height:200%">
                           </div>
                           <div class="col-md-7 col-sm-7 col-xs-7 ser-img-wthree">
                              <h4>Classic Series</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                 ut labore et dolore magna aliqua sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                 minim veniam, quis. Lorem ipsum dolor .
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="tab4">
                        <div class="services-right-agileits">
                           <div class="col-md-5 col-sm-5 col-xs-5 img-left">
                              <img src="images/1.jpg" alt="" class="img-r" style="width: 100%;height:200%">
                           </div>
                           <div class="col-md-7 col-sm-7 col-xs-7 ser-img-wthree">
                              <h4>Comfortable Chairs</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                 ut labore et dolore magna aliqua sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                 minim veniam, quis. Lorem ipsum dolor .
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
      </div>
      <!-- //service -->
      <!--portfolio -->
      <div class="gallery" id="gallery">
         <div class="container">
            <h3 class="title">Inter Media<span class="sub-text"> promotions</span></h3>
            <div class="galler-imgs">
               <ul class="portfolio-categ filter">
                  <li class="port-filter all active">
                     <a href="#">All</a>
                  </li>
                  <li class="smartphone">
                     <a href="#" title="Category 1">Smartphones</a>
                  </li>
                  <li class="laptop">
                     <a href="#" title="Category 2">PCs</a>
                  </li>
                  <li class="accessorie">
                     <a href="#" title="Category 3">Accessoires</a>
                  </li>
               </ul>
               <ul class="portfolio-area">
                    @if ($promotions->isEmpty())
                        Pas des promotions
                    @else
                        @foreach ($promotions as $key => $promo)
                            <li class="portfolio-item2" data-id="id-{{ $key }}" data-type="{{ $promo->category }}">
                                <div>
                                    <span class="image-block img-hover">
                                    <a class="image-zoom" href="/storage/uploads/promotions/{{ $promo->image }}" rel="prettyPhoto[gallery]">
                                        <figure>
                                            <img src="/storage/uploads/promotions/{{ $promo->image }}" class="img-responsive w3layouts agileits" alt="">
                                            <figcaption>
                                                <h3>Decouvrir</h3>
                                            </figcaption>
                                        </figure>
                                    </a>
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    @endif
               </ul>
                  {{ $promotions->links() }}
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      <!--end portfolio-area -->
      <!--counter-->
      <div class="rate" id="rate">
         <div class="container">
            <h3 class="title clr">Inter Media<span class="sub-text"> Stats</span></h3>
            <div class="my-ser-right">
               <div class="col-md-3 col-sm-3 col-xs-6 stats-grid stats-grid-1">
                  <div class="ser-icone">
                     <span class="fa fa-users font" aria-hidden="true"></span>
                     <div class="counter">{{ $clientsCount }}</div>
                     <div class="stat-info-w3ls">
                        <h4>Clients <br><br></h4>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-6 stats-grid stats-grid-2">
                  <div class="ser-icone ">
                     <span class="fa fa-cogs font" aria-hidden="true" ></span>
                     <div class="counter">{{ $techsCount }}</div>
                     <div class="stat-info-w3ls">
                        <h4>Techniciens <br><br></h4>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-6 stats-grid stats-grid-3">
                  <div class="ser-icone clr-green">
                     <span class="fa fa-dropbox font" aria-hidden="true"></span>
                     <div class="counter">{{ $ordersCount }}</div>
                     <div class="stat-info-w3ls">
                        <h4>Commandes <br><br></h4>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-6 stats-grid stats-grid-4">
                  <div class="ser-icone">
                     <span class="fa fa-check font" ></span>
                     <div class="counter">{{ $verifiedOrdersCount }}</div>
                     <div class="stat-info-w3ls">
                        <h4>Commandes verifier</h4>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      <!--//counter-->
      <!--team -->
      <section class="team" id="team" >
         <div class="container" style="border-bottom: 1px solid #9e1113;padding-bottom: 5%">
            <h3 class="title">Inter Media<span class="sub-text"> Équipe</span></h3>
            <div class="pt-md" >
                @if ($techs->isEmpty())
                    Pas des Techniciens
                @else
                    @foreach ($techs as $tech)
                        <div class="col-md-3 col-sm-6 col-xs-6 profile">
                            <div class="img-box">
                                <img src="/storage/uploads/users/{{ $tech->details->image }}">
                            </div>
                            <div class="names">
                            <h4>{{ $tech->details->first_name }} {{ $tech->details->last_name }}</h4>
                            <h6><i class="fa fa-wrench"></i>{{ $tech->post }}</h6>
                            <p>{{ $tech->bio }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="clearfix"></div>
         </div>
      </section>
      <!--//team -->
      <!-- counter-->
     
      <!--testimonials -->
      <div class="testimonials" id="testimonials">
         <div class="container">
            <h3 class="title">Interior<span class="sub-text"> Clients</span></h3>
            <div id="myCarouselbanner" class="carousel slide" data-ride="carousel">
               <!-- Indicators -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarouselbanner" data-slide-to="0" class=""></li>
                  <li data-target="#myCarouselbanner" data-slide-to="1" class=""></li>
                  <li data-target="#myCarouselbanner" data-slide-to="2" class="active"></li>
                  <li data-target="#myCarouselbanner" data-slide-to="3"></li>
               </ol>
               <!-- Wrapper for slides -->
               <div class="carousel-inner" role="listbox">
                  <div class="item">
                     <div class="client-text">
                        <div class="img-text">
                           <img src="images/c1.jpg" alt="">
                        </div>
                        <div class="clt-syas-agile">
                           <h5>clark kent</h5>
                           <p>Aenean pulvinar diam vel felis volutpat dictum, suscipit sapien scelerisque tempus non mollis massa. Aenean ac tellus suscipit sapien scelerisque tempus non mollis massa.</p>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="client-text">
                        <div class="img-text">
                           <img src="images/c2.jpg" alt="">
                        </div>
                        <div class="clt-syas-agile">
                           <h5>Sara will</h5>
                           <p>Aenean pulvinar diam vel felis volutpat dictum, suscipit sapien scelerisque tempus non mollis massa. Aenean ac tellus suscipit sapien scelerisque tempus non mollis massa.</p>
                        </div>
                     </div>
                  </div>
                  <div class="item active">
                     <div class="client-text">
                        <div class="img-text">
                           <img src="images/c3.jpg" alt="">
                        </div>
                        <div class="clt-syas-agile">
                           <h5>Wally West</h5>
                           <p>Aenean pulvinar diam vel felis volutpat dictum, suscipit sapien scelerisque tempus non mollis massa. Aenean ac tellus suscipit sapien scelerisque tempus non mollis massa.</p>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="client-text">
                        <div class="img-text">
                           <img src="images/c4.jpg" alt="">
                        </div>
                        <div class="clt-syas-agile">
                           <h5>Rose kent</h5>
                           <p>Aenean pulvinar diam vel felis volutpat dictum, suscipit sapien scelerisque tempus non mollis massa. Aenean ac tellus suscipit sapien scelerisque tempus non mollis massa.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Left and right controls -->
               <a class="left carousel-control" href="#myCarouselbanner" role="button" data-slide="prev">
               <span class="fa fa-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#myCarouselbanner" role="button" data-slide="next">
               <span class="fa fa-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </div>
      <!-- //testimonials -->
      <!--contact-->
      <div class="contact" id="contact">
         <h3 class="title clr">Contactez Nous</h3>
         <div class=" col-md-6 col-sm-6 col-xs-6 contact-map">
            <div class="map-grid">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d207179.27939543515!2d10.823986!3d35.7710469!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7d69640b4fda734!2sINTER+MEDIA!5e0!3m2!1sen!2stn!4v1526561942166"></iframe>
            </div>
         </div>
         <div class=" col-md-6 col-sm-6 col-xs-6 contact-icons text-center">
            <div class="gride-contact-agileinfo">
               <h5 style="color: #9e1113"> Contactez Nous </h5>
               <div class=" footer_grid_left">
                  <div class="col-md-3 col-sm-3 col-xs-3 icon_grid_left">
                     <span class="fa fa-map-marker" aria-hidden="true"></span>
                  </div>
                  <div class=" col-md-9 col-sm-9 col-xs-9 address-gried">
                     <p>Avenue du combattant suprême<span>5000 Monastir</span></p>
                  </div>
                  <div class="clearfix"> </div>
               </div>
               <div class="footer_grid_left">
                  <div class="col-md-3 col-sm-3 col-xs-3 icon_grid_left">
                     <span class="fa fa-volume-control-phone" aria-hidden="true"></span>
                  </div>
                  <div class=" col-md-9  col-sm-9 col-xs-9 address-gried">
                     <p>+(216) 27 400 850 <span>+(216) 73 448 601</span></p>
                  </div>
                  <div class="clearfix"> </div>
               </div>
               <div class="clearfix"> </div>
               <div class="footer_grid_left">
                  <div class="col-md-3 col-sm-3 col-xs-3 icon_grid_left">
                     <span class="fa fa-envelope" aria-hidden="true"></span>
                  </div>
                  <div class=" col-md-9 col-sm-9 col-xs-9 address-gried">
                     <p><a href="mailto:info@example.com">info@example1.com</a>
                        <span><a href="mailto:info@example.com">info@example2.com</a></span>
                     </p>
                  </div>
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
         <div class="clearfix"> </div>
      </div>
      <div class="info-contact">
         <div class="container">
            <div class="contact-us">
               <form action="#" method="post">
                  <div class="col-md-6 col-sm-6 col-xs-6 styled-input">
                    <div class="wrap-input100 validate-input" data-validate="champ requis">

                        <input class="input100" type="text" name="name" placeholder="nom">
                        <span class="focus-input100"></span>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 styled-input">
                     <div class="wrap-input100 validate-input" data-validate="champ requis">

                        <input class="input100" type="text" name="name" placeholder="prenom">
                        <span class="focus-input100"></span>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 styled-input">
                    <div class="wrap-input100 validate-input" data-validate="champ requis">

                        <input class="input100" type="email" name="name" placeholder="email">
                        <span class="focus-input100"></span>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 styled-input">
                    <div class="wrap-input100 validate-input" data-validate="champ requis">

                        <input class="input100" type="text" name="name" placeholder="">
                        <span class="focus-input100"></span>
                     </div>
                  </div>
                  <div class="clearfix"> </div>
                  <div class="styled-input">
                     <div class="wrap-input100 validate-input" data-validate="champ requis">

                          <textarea name="Message" class="input100" placeholder="Message" required=""></textarea>
                        <span class="focus-input100"></span>
                     </div>
                  
                  </div>
                  <div>
                     <div class="click">
                        <input type="submit" value="SEND" style="border-radius: 25px;">
                     </div>
                  </div>
               </form>
            </div>
            <div class="clearfix"> </div>
         </div>
      </div>

<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               Se connecter & S'inscrire
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                 
            </div>
            <section>
               <div class="modal-body">
                  <div class="w3_login_module">
                     <div class="module form-module">
                       <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                        <div class="tooltip">S'inscrire</div>
                       </div>
                       <div class="form">
                        <h3>Vous avez un compte?</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="text" name="email" placeholder="Email" required>
                            <input type="password" placeholder="Mot de passe" name="password" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Se souvenir de moi
                                </label>
                            </div>
                            <input type="submit" value="Se Connecter">
                        </form>
                       </div>
                       <div class="form">
                        <h3>Créer un compte</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="text" name="last_name" placeholder="Nom" required="">
                            <input type="text" name="first_name" placeholder="Prénom" required="">
                            <input type="email" name="email" placeholder="Addresse Email" required="">
                            <input type="text" name="phone" placeholder="Telephone" required="">
                            <input type="password" name="password" placeholder="Password" required="">
                            <input type="password" name="password_confirmation" placeholder="Confirmer" required="">
                            <input type="submit" value="S'inscrire">
                            <input type="reset" value="Annuler">
                        </form>
                       </div>
                       <div class="cta"><a href="#">Mot de passe oublié?</a></div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <script>
      $('.toggle').click(function(){
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
   </script>
      <!-- //contact-->
      <!--footer-->
      <footer style="position: absolute;">
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
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!-- //js  working-->
      <script src="js/responsiveslides.min.js"></script>
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
      <!-- service for responsive tabs -->
      <script src="js/easy-responsive-tabs.js"></script>
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
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/jquery.countup.js"></script>
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
      <script src="js/move-top.js"></script>
      <script src="js/easing.js"></script>
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
      <script src="js/bootstrap.js"></script>
      <!--// bootstrap-->
      <!-- jQuery-Photo-filter-lightbox-Gallery-plugin -->
      <script src="js/jquery-1.7.2.js"></script>
      <script src="js/jquery.quicksand.js"></script>
      <script src="js/script.js"></script>
      <script src="js/jquery.prettyPhoto.js" ></script>
      <!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->
   </body>
</html>