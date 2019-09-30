<?php
session_start();
require( "includes\dbh.inc.php" );
?>
<!DOCTYPE html>
<html>

<head>
    <title>DanPanel</title>
    <link rel="shortcut icon" type="image/png" href="Assets/favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Helvetica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <style>
    html {
        scroll-behavior: smooth;
    }
    /* .dropdown:hover> .dropdown-menu {
    display: block;
    } */
    
    /* .navbar .container-fluid .navbar-collapse > ul .dropdown:hover{
    color:red;
	opacity:1;
    border-color:red!important;
    background:lightblue!important;
    display:block!important;
} */

.navbar .navbar-collapse .navbar-nav > li:hover > a,
.navbar .navbar-collapse .navbar-nav > li.current > a,
.navbar .navbar-collapse .navbar-nav > li.current-menu-item > a{
	color:#005dbe;
	opacity:1;
	border-color:#005dbe;
}

 .navbar .navbar-collapse .navbar-nav > li:hover > a,
 .navbar .navbar-collapse .navbar-nav > li.current > a,
 .navbar .navbar-collapse .navbar-nav > li.current-menu-item > a{
	background:#005dbe;
	color:#ffffff;
	opacity:1;
	border:0px;
}

 .navbar .navbar-collapse .navbar-nav > li.current > a:after,
 .navbar .navbar-collapse .navbar-nav > li:hover > a:after,
 .navbar .navbar-collapse .navbar-nav > li > a:after{
	 display:none !important; 
}

div .navbar .navbar-collapse .navbar-nav > li > ul{
    position:absolute;
	left:0px;
	top:120%;
	width:230px;
	z-index:100;
	display:block;
	padding:0px 0px;
	transition:all 500ms ease;
	-moz-transition:all 500ms ease;
	-webkit-transition:all 500ms ease;
	-ms-transition:all 500ms ease;
	-o-transition:all 500ms ease;
	-webkit-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
	-ms-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
	-o-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
	-moz-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
	box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
}

.navbar .navbar-collapse .navbar-nav > li > ul.from-right{
	left:auto;
	right:0px;	
}

.navbar .navbar-collapse .navbar-nav > li > ul > li{
	position:relative;
	width:100%;
	margin-bottom:1px;
	background:rgba(255,255,255,0.95);
}

.navbar .navbar-collapse .navbar-nav > li > ul > li:last-child{
	border-bottom:none;	
}

.navbar .navbar-collapse .navbar-nav > li > ul > li > a{
	position:relative;
	display:block;
	padding:12px 20px;
	line-height:22px;
	font-weight:400;
	font-size:14px;
	color:#222222;
	text-align:left;
	text-transform:capitalize;
	transition:all 500ms ease;
	-moz-transition:all 500ms ease;
	-webkit-transition:all 500ms ease;
	-ms-transition:all 500ms ease;
	-o-transition:all 500ms ease;
	border-left:2px solid transparent;
}

.navbar .navbar-collapse .navbar-nav > li > ul > li:hover > a{
	color:#005dbe;
	border-color:#005dbe;
	background-color:#ffffff;
}

.navbar .navbar-collapse .navbar-nav > li > ul > li.dropdown > a:after{
	font-family: 'FontAwesome';
	content: "\f105";
	position:absolute;
	right:10px;
	top:10px;
	width:10px;
	height:20px;
	display:block;
	line-height:21px;
	font-size:16px;
	font-weight:normal;
	text-align:center;
	z-index:5;	
}

.navbar .navbar-collapse .navbar-nav > li > ul > li.dropdown:hover > a:after{
	color:#30355d;	
}

.navbar .navbar-collapse .navbar-nav > li > ul > li > ul{
	position:absolute;
	left:100%;
	top:20px;
	width:230px;
	z-index:100;
	display:block;
	-webkit-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
	-ms-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
	-o-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
	-moz-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
	box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
}

.navbar .navbar-collapse .navbar-nav > li > ul > li > ul > li{
	position:relative;
	width:100%;
	margin-bottom:1px;
	background:rgba(255,255,255,0.95);
}

.video-container .navbar .navbar-collapse .navbar-nav > li > ul > li > ul > li:last-child{
	border-bottom:none;	
}

.video-container .navbar .navbar-collapse .navbar-nav > li > ul > li  > ul > li > a{
	position:relative;
	display:block;
	padding:12px 20px;
	line-height:22px;
	font-weight:400;
	font-size:14px;
	color:#222222;
	text-align:left;
	text-transform:capitalize;
	transition:all 500ms ease;
	-moz-transition:all 500ms ease;
	-webkit-transition:all 500ms ease;
	-ms-transition:all 500ms ease;
	-o-transition:all 500ms ease;
	border-left:2px solid transparent;
}

.video-container .navbar .navbar-collapser .navbar-nav > li > ul > li  > ul > li > a:hover{
	color:#005dbe;
	border-color:#005dbe;
	background-color:#ffffff;
}

.video-container .navbar .navbar-collapse .navbar-nav > li.dropdown:hover > ul{
	visibility:visible;
	opacity:1;
	top:100%;	
}

.video-container .navbar .navbar-collapse .navbar-nav li > ul > li.dropdown:hover > ul{
	visibility:visible;
	opacity:1;
	top:0px;
	transition:all 500ms ease;
	-moz-transition:all 500ms ease;
	-webkit-transition:all 500ms ease;
	-ms-transition:all 500ms ease;
	-o-transition:all 500ms ease;	
}


/* 
.navbar .navbar-collapse ul li a{
     display:block;
     color:#222;
     font-size: 14px;
     padding: 24px 14px;
     text-decoration:none;
 }
 .navbar .navbar-collapse ul li{
     position:relative;
     list-style:none;
 }
 .navbar .navbar-collapse ul li ul{
     display:none;
     position:absolute;
     background-color:#111;
     padding:10px;
     border-radius:0px 0px 5px 5px;

 }
 .navbar .navbar-collapse ul li:hover ul{
     display:block;
     z-index:-5;
     position:absolute;
     
 }

 .navbar .navbar-collapse ul li{
     width: 180px;
     border-radius:4px;
 }

 .navbar .navbar-collapse ul li ul a{
    padding: 8px 14px;
 }

 .navbar .navbar-collapse ul li ul a:hover{
    background-color:#f3f3f3;
 } */




/* .dropdown>.dropdown-toggle:active { */
  /*Without this, clicking will make it sticky*/
    /* pointer-events: none;
} */
/* .navbar .dropdown-menu:hover, .navbar .nav-item1 {
    color:red !important;
    background:orange !important;
    
} */

    .navbar-toggler {
        border-color: rgb(179, 179, 204);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(179, 179, 204, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }
    </style>

</head>

<body class="w3-animate-opacity">

    <?php 
// $query = "SELECT * FROM users";

// $result = mysqli_query($conn, $query);

// while($value = mysqli_fetch_array($result)){
//     echo $value['name']. "--" ." ";
//     echo $value['email']."<br>";
// }
?>


    <div class="video-container">
        <nav class="navbar navbar-expand-md fixed-top w3-bar navbar-style" style="overflow:hidden">
            <div class="container-fluid" style="z-index:3px;">

                <!-- Float links to the right. Hide them on small screens -->
                <a class="navbar-brand" href="index.php">
                    <img src="Assets/logo-black.png" width="180" height="40" alt="Logo"></a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" style="" aria-expanded="ture" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style=""></span>
                </button>
                <div class="navbar-collapse collapse " id="navbarResponsive">
                    <ul class="navbar-nav ml-auto navbar-right">
                        <li class="nav-item1 w3-button dropdown">
                            <a class="navbar-text1 w3-text-white js-scroll-trigger1 dropdown-toggle" data-toggle="dropdown1" aria-haspopup="ture" href="offentligt.php">Offentligt</a>
                            
                        </li>
                        <li class="current dropdown"><a href="erhverv.php">Erhverv</a>
                                    <ul>
                                        <li><a href="index.html">Homepage One</a></li>
                                        <li><a href="index-2.html">Homepage Two</a></li>
                                        <li><a href="index-3.html">Homepage Three</a></li>
                                        <li class="dropdown"><a href="#">Header Styles</a></li>
                                    </ul>
                                </li>
                        <li class="nav-item1 w3-button dropdown" style="z-index:101;" ><a href="erhverv.php">Erhverv </a>
                            <!-- <a class="navbar-text1 w3-text-white js-scroll-trigger1 dropdown-toggle" id="dropdown-product-menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="erhverv.php">Erhverv</a> -->
                            <ul class="dropdown-menu1 dropdown-primary" aria-labelledby="dropdown-product-menu1" style="">
                                <li><a class="dropdown-item" href="#Rekruttering-erhverv">Rekruttering</a></li>
                                <li><a class="dropdown-item" href="#Erhvervslejemål-erhverv">Erhvervslejemål</a></li>
                                <li><a class="dropdown-item" href="#">Digitalisering</a></li>
                                <li><a class="dropdown-item" href="#">Kaffeløsning</a></li>
                                <li><a class="dropdown-item" href="#">Rengøring</a></li>
                                <li><a class="dropdown-item" href="#">Elektronisk Kørebog</a></li>
                               
                            </ul>
                            
                        </li>
                        
                        <li class="nav-item1 w3-button">
                            <a class="navbar-text1 w3-text-white js-scroll-trigger" href="privat.php">Privat</a>
                        </li>
                        <li class="nav-item1 w3-button">
                            <a class="navbar-text1 w3-text-white js-scroll-trigger" href="om.php">Om
                                Os</a>
                        </li>
                        <li class="nav-item1 w3-button operate-profil-li">
                            <?php
				if ( !isset( $_SESSION[ 'uid' ] ) ) {
					echo '<a onClick="document.getElementById(\'signup\').style.display=\'block\'" 
				class="w3-text-white js-scroll-trigger operate-profil" style ="">Opret Profil</a>  
				</li>
				<li class = "nav-item1 w3-button login-li">
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-text-white js-scroll-trigger login" style ="">Log ind</a> </li><li class = "nav-item1 w3-button login-li">';
                
                
				} else if ( isset( $_SESSION[ 'uid' ]) ) {
                    
					if(strpos($_SESSION['email'], '@danpanel')){
                        echo'<a  name="minadminprofil-submit" method="post" href="minadminprofil.php" class="w3-text-white js-scroll-trigger operate-profil">Min Profil</a>
                        </li>
                        <li class = "nav-item1 w3-button login-li">
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
                class="w3-text-white js-scroll-trigger login">Log ud</a></li><li class = "nav-item1 w3-button login-li">';
                
					}
					else if (!strpos($_SESSION['email'], '@danpanel')){
                        
					?><a name="minprofil-submit" method="post" class="w3-text-white js-scroll-trigger operate-profil"
                                <?php echo 'href="min'.$_SESSION['typeofuser'].'profil.php" '?>>Min Profil</a>
                    </li>
                    <li class = "nav-item1 w3-button login-li">
                            <?php echo '
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-text-white js-scroll-trigger login">Log ud</a>';
				}}
				?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <video class="video-file" autoplay loop muted >
            <source src="Assets/Forside.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>


    <div class="container-fluid overlay-desc" style="padding:10px;">
        <div class="row">
            <div class="col-sm-6 video-text-container">
                <ul class="fly-in-text" type="square">
                    <li class="wow delay-1s fadeInRightBig fly-in-text-li">Skabe
                        struktur
                    </li>
                    <li class="wow delay-1s fadeInLeftBig fly-in-text-li">
                        Få mere overskud
                    </li>
                    <li class="wow delay-1s fadeInRightBig fly-in-text-li">
                        Oplev udvikling
                    </li>
                </ul>


                <button type="button" class="btn-explore w3-button">
                    <a href="#channel">Udforsk her</a>
                </button>
            </div>


            <div class="col-sm-6 video-text-container">
                <ul class="fly-in-text hidden-text" type="square">
                    <li class="wow delay-1s fadeInRightBig fly-in-text-li">
                        Gratis kundekonto
                    </li>
                    <li class="wow delay-1s fadeInLeftBig fly-in-text-li">
                        Ingen binding
                    </li>
                    <li class="wow delay-1s fadeInRightBig fly-in-text-li">
                        Særlige kampagner
                    </li>
                </ul>

                <button type="button" class="btn-explore w3-button">
                    <a style="" href="#fordele">Dine fordele</a>
                </button>
            </div>
        </div>

    </div>


    <div class="w3-container w3-center" style="margin-top:1%;">
        <a href="#about" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                class="w3-animate-fading w3-circle w3-margin-bottom arrow-icon"></a>
    </div>

    <div class="w3-center">
        <h3>Vi giver dig overblikket:</h3>
        <hr class="draw-line-left">
        <hr class="draw-line-right">
        <p>Ved at samle dine aktiviteter hos os, vil det give dig en unik mulighed for at:</p>
    </div>

    <div class="container-fluid" id="about">

        <div class="row" style="align-items:center; justify-content:center">
            <div class="w3-third w3-margin w3-round-large shadow w3-border w3-center w3-hover-shadow pt-2 overblikket-sub-container"
                style="">
                <img src="Assets/Struktur .png" style="max-width: 15%;">
                <h3>Skabe struktur</h3>
                <div class="skabe-struk-flip">
                    <p class="skabe-struk-question">
                        Savner du mere struktur over dine aktiviteter i din hverdag?
                    </p>
                    <p class="skabe-struk-answer">DanPanel Portalen er med til at give dig
                        dette. Via
                        vores panel kan du samle dine aktiviteter ét
                        sted, hvor du nemt kan planlægge de kommende aktiviteter med et bedre overblik.
                    </p>
                </div>
                <button type="button" class="w3-green w3-button w3-round-xxlarge w3-center overblikket-btn"
                    onClick="flipStruktur()">
                    Klik her
                </button>
            </div>
            <div class="w3-third w3-margin w3-round-large shadow w3-border w3-center w3-hover-shadow pt-2 overblikket-sub-container"
                style="">
                <img src="Assets/Overskud.png" style="max-width: 15%;">
                <h3>Få mere overskud</h3>
                <div class="overskud-flip">
                    <p class="overskud-question">
                        Bruger du for meget tid på at finde den rette leverandør<br> til den enkelte løsning /
                        service?
                    </p>
                    <p class="overskud-answer">Vi har allerede forhandlet med markedets
                        bedste
                        udbyder til konkurrencedygtige priser og vilkår,
                        så du kan brug din tid på det du er bedst til, samt spare penge.
                    </p>
                </div>
                <button type="button" class="w3-green w3-button w3-round-xxlarge w3-center overblikket-btn"
                    onClick="flipOverskud()">
                    Klik her
                </button>
            </div>
            <div class="w3-third w3-margin w3-round-large shadow w3-border w3-center w3-hover-shadow pt-2 overblikket-sub-container"
                style="">
                <img src="Assets/Udvikling.png" style="max-width: 15%;">
                    <h3>Oplev udvikling</h3>
                    <div class="udvikling-flip">
                        <p class="udvikling-question">
                        Ønsker du fremgang og udvikling i dine projekter? 
                        </p>
                        <p class="udvikling-answer" style="display:n">Når du får alt samlet i ét panel hos os, får du overblikket og en struktureret hverdag med overskud. 
                        Du sparer tid og penge ved at anvende DanPanel og dermed opleve den konstruktive udvikling. 


                        </p>
                    </div>
                    <button type="button" class="w3-green w3-button w3-round-xxlarge w3-center overblikket-btn"
                        style="outline:none" onClick="flipUdvikling()">Klik her
                    </button>
            </div>
        </div>
    </div>

    <!-- <div class="w3-padding-8" id="overblik"></div> -->

    <div class="w3-container w3-center"><a href="#channel" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                class="w3-animate-fading w3-paddin w3-blu w3-circle w3-margin-bottom arrow-icon"></a>
    </div>

    <!-- fordele -->

    <div class="container-fluid w3-padding-bottom " id="fordele">
        <div class="row">
            <div class="w3-paddi col-lg-12 col-md-12 col-sm-12 ">
                <h2 class="w3-center">Dine fordele</h2>
                <hr class="draw-line-left-ref">
                <hr class="draw-line-right-ref">
            </div>
        </div>
    </div>
    <div class="w3-padding-16"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 wow zoomIn">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 w3-padding">
                        <div class="w3-padding w3-right-align fordele-align">
                            <h4 class="">Personlig kundekonsulent</h4>
                            <p class="">Tilknyttet på den enkelte bestilling/sag</p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 w3-padding-24 w3-right-align fordele-align">
                        <img src="Assets/Kunde konsulent.png" style="max-width: 60%;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 w3-padding fordele-align">
                        <div class="w3-padding w3-right-align fordele-align">
                            <h4>Kort svartid</h4>
                            <p class="">Svartid indenfor 24 timer i hverdagene</p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 w3-padding-16 w3-right-align fordele-align">
                        <img src="Assets/Svaretid indenfor 24 timer .png" style="max-width: 60%">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 w3-padding">
                        <div class="w3-padding container w3-right-align fordele-align">
                            <h4>Nyhedsmail </h4>
                            <p class="">På aktive sager bliv opdateret dine
                                løsninger/services</p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 w3-padding-16 w3-right-align fordele-align">
                        <img src="Assets/newsletter.png" style="max-width:60%">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 wow zoomIn">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="central-image" style="margin-top: 3%">
                            <img src="Assets/thumbnail_Fordele - DanPanel .jpg" class="image">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 wow bounce">
                        <div class="w3-padding w3-center w3-white fordele-align" style="margin-top: 10%">
                            <div>
                                <img src="Assets/notification.png" style="max-width: 15%;">
                            </div>
                            <h4>Notifikation </h4>
                            <p class="">På aktive sager bliv opdateret dine
                                løsninger/services</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-4 wow zoomIn">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 w3-padding-24 fordele-align">
                        <img src="Assets/Geatis og uforpligtende .png" style="max-width: 60%"><span
                            style="vertical-align: middle"></span>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 w3-padding">
                        <div class="w3-padding w3-left-align fordele-align">
                            <h4>Gratis og uforpligtende </h4>
                            <p class="">At oprette en kundekonto (du betaler kun ved konkret
                                bestilling)/sag</p>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding:;">
                    <div class="col-lg-3 col-md-3 col-sm-3 w3-padding-8 fordele-align">
                        <img src="Assets/Kampagne.png" style="max-width: 60%">
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 w3-paddin">
                        <div class="w3-padding w3-left-align fordele-align">
                            <h4>Særlige kampagner </h4>
                            <p class="">Vi giver dig adgang til særlige kampagner, som er
                                fordelagtig for dig</p>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 w3-padding-8 fordele-align">
                        <img src="Assets/Skræddersyet_løsning.png" style="max-width: 60%">
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 w3-padding-4">
                        <div class="w3-padding container w3-left-align fordele-align">
                            <h4>Skræddersyet løsning</h4>
                            <p class="">Efter dit behovs</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="w3-container w3-center"><a href="#plans" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                class="w3-animate-fading w3-paddin w3-blu w3-circle w3-margin-bottom arrow-icon"></a></div>

    <!-- Channel -->
    <div class="w3-center" id="channel">
        <h3>Kanal valg</h3>
        <hr class="draw-line-left">
        <hr class="draw-line-right">
        <p>DanPanel portalen er fordelt over tre hovedafdelinger: </p>
    </div>

    <!-- Offentlig info -->
    <div class="w3-third w3-margin-bottom">
        <div class="container">
            <div class="w3-display-topleft w3-green w3-padding w3-round sss">Offentligt</div>
            <video src="Assets/iStock-150165100 (1).mp4" autoplay muted loop class="image w3-round"></video>
            <div class="overlay">
                <a class="text" href="offentligt.php" class="text"></a>
            </div>
        </div>
    </div>
    <!-- Erhverv sektion -->
    <div class="w3-third w3-margin-bottom">
        <div class="container">
            <div class="w3-display-topleft w3-green w3-padding w3-round">Erhverv</div>
            <video src="Assets/erhverv.mov" autoplay muted loop class="image w3-round"></video>
            <div class="overlay">
                <a href="erhverv.php" class="text"></a>
            </div>
        </div>
    </div>
    <!-- Privat sektion -->
    <div class="w3-third w3-margin-bottom">
        <div class="container">
            <div class="w3-display-topleft w3-green w3-padding w3-round">Privat</div>
            <video src="Assets/privat.mov" autoplay muted loop class="image w3-round"></video>
            <div class="overlay">
                <a href="privat.php" class="text"></a>
            </div>
        </div>
    </div>
    <div class="w3-container w3-center"><a href="#referencer" class="w3-hover-opacity-off"><img
                src="Assets/arrow-down.png"
                class="w3-animate-fading w3-paddin w3-blu w3-circle w3-margin-bottom arrow-icon"></a>
    </div>

    <!-- Hvad tilbyder vi sektion -->
    <div class="w3-row w3-padding" id="plans">
        <div class="w3-center">

            <h3 class="wow fadeInDown">Konceptet bag DanPanel</h3>
            <hr class="draw-line-left">
            <hr class="draw-line-right">
            <div class="w3-padding">
                <p class="w3-text-black standrad-text wow zoomIn danpanel-koncept">

                    DanPanel er en portal, hvor du kan samle alle dine aktiviteter et sted, hvad end du er
                    offentlig,
                    erhverv eller privatperson. <br><br>

                    Opret en gratis kundekonto allerede i dag og får fri adgang til dit eget panel, hvor du nemt
                    kan
                    vælge og samle alle dine forskellige løsninger og services via DanPanel Portal. Læs mere
                    her. <br>
                </p>
            </div>
        </div>
    </div>

    <div class="w3-container w3-center"><a href="#referencer" class="w3-hover-opacity-off"><img
                src="Assets/logo-sign.png" class="dan-icon"></a></div>

    <!-- vækst i vores fokus -->

    <div class="w3-row" id="din-vaakst">
        <div class="w3-center w3-padding-16">

            <h3 class="wow fadeInDown">Din vækst i vores fokus</h3>
            <div class="w3-padding">
                <p class="w3-text-black standrad-text wow zoomIn danpanel-fokus">

                    Hos DanPanel arbejder vi i teams med hver vores ekspertise, på den måde kan vi give en
                    dedikeret og
                    professionel kundeoplevelse. Vores fokus vil altid ligge i at give Jer en skræddersyet
                    løsning der
                    kan løfte Jeres aktiviteter på bedstevis og kun i den rigtige retning. <br><br>

                    Vi arbejder internt med dedikerede teams der har mere end 35 års erhvervserfaring, fordelt
                    med hver
                    sit fagområde, indenfor de løsninger og services som du finder via DanPanel portalen. <br>

                </p>
            </div>

        </div>
    </div>




    <!-- <div style="padding-top:1%"></div> -->


    <div class="w3-container w3-center"><a href="#referencer" class="w3-hover-opacity-off"><img
                src="Assets/arrow-down.png" class="w3-animate-fading w3-circle w3-margin-bottom arrow-icon"></a></div>



    <!-- Slideshow referencer -->
    <div class="w3-padding-8" id="referencer"></div>
    <div class="w3-center">
        <h2>Referencer</h2>
        <hr class="draw-line-left-ref">
        <hr class="draw-line-right-ref">
        <p style="font-size: x-large">Vi har behandlet mere end 483 sager for vores kunder, alene i
            2018.<br><br>
            Blandt vores kunder: </p>
    </div>
    <div class="container">
        <div class="row w3-center">
            <div class="col-sm-5 customers-comment-sub-container">
                <img class="rounded-circle customers-comment-logo" src="Assets/Dan-kunde-dialog.png">
                <div class=" numCount customers-comment-count">
                    8866
                </div>
                <div class="customers-count-headline">
                    Kunde dialog
                </div>

            </div>
            <div class="col-sm-2 customers-comment-sub-container">
                <img class="rounded-circle customers-comment-logo" src="Assets/Dan-Kunde-visit.png"
                    style="height:90px;">
                <div class="numCount customers-comment-count">
                    26022
                </div>
                <div class="customers-count-headline">
                    Kunde besøg
                </div>
            </div>
            <div class="col-sm-5 customers-comment-sub-container">
                <img class="rounded-circle customers-comment-logo" src="Assets/Dan-Rating.png">
                <div class="customers-comment-count">
                    <span class="numCount" style="margin-right:-5px;">4</span> <span style="margin:0px;">,</span> <span
                        class="numCount" style="margin-left:-5px;">3</span>
                    <span>ud af </span> <span class="numCount"> 5 </span>
                </div>
                <div class="customers-count-headline">
                    Kundeanmeldelser
                </div>
            </div>
        </div>
    </div>

    <!-- Slideshow partners logo -->

    <div class="w3-padding-16" id="overbli"></div>

    <div class="w3-container w3-center">
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/customize-Samarbejdsartner/business-danmark.png"
                style="height: 80px; width:160px; margin:15px;">
            <img src="Assets/customize-Samarbejdsartner/Ager-Byg.png" style="height: 100px; width:120px; margin:15px;">
            <img src="Assets/customize-Samarbejdsartner/Alhua-logo.png" style="height: 50px; width:100px; margin:15px;">
            <img src="Assets/customize-Samarbejdsartner/ALS-Design.png" style="height: 80px; width:120px; margin:15px;">
            <img src="Assets/customize-Samarbejdsartner/areej_group_eng.png"
                style="height:60px; width:120px; margin:15px;">
        </div>
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/customize-Samarbejdsartner/Aroma-Coffee-logo.png"
                style="height: 120px; width:120px; margin:5px;">
            <img src="Assets/customize-Samarbejdsartner/ABAX.png" style="height:100px; width:150px; margin:5px;">
            <img src="Assets/customize-Samarbejdsartner/Chuango.png" style="height: 100px; width:150px; margin:15px;">
            <img src="Assets/customize-Samarbejdsartner/pilvikar.png" style="height: 80px; width:120px; margin:15px;">
            <img src="Assets/customize-Samarbejdsartner/væxthuset_logo.png"
                style="height: 80px; width:120px; margin:15px;">
        </div>
    </div>


    <!-- Contact us -->
    <div class="w3-center w3-padding-32"> <span class="w3-xlarge w3-bottombar w3-border-green w3-padding-16">Kontakt
            Os</span> </div>
    <div class="w3-container w3-padding-32 w3-theme-l5" id="contact form">
        <div class="w3-row">
            <div class="w3-container" style="padding:0% 10%">
            
                <form class="w3-container w3-card-4 w3-padding-8 w3-white w3-round"
                    action="includes/contactform.inc.php" Method="post">
                    <div class="w3-section1">
                        <label>Navn</label>
                        <input class="w3-input" type="text" name="Name" required placeholder="Dit fulde navn her">
                    </div>
                    <div class="w3-section1">
                        <label>Email</label>
                        <input class="w3-input" type="text" name="Email" required placeholder="Din mail her">
                    </div>
                    <div class="w3-section1">
                        <label>Tlf</label>
                        <input class="w3-input" type="text" name="Tlf" required
                            placeholder="Dit tlf nummer her(max 8 tegn)">
                    </div>
                    <div class="w3-section1">
                        <label>Emne</label>
                        <input class="w3-input" type="text" name="Subject" placeholder="Hvad handler din besked om?">
                    </div>
                    <div class="w3-section1">
                        <label>Besked</label>
                        <textarea class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message"
                            required placeholder="Skriv din besked her"></textarea>
                    </div> 
                    <button type="submit" name="contact-submit" value="submit"
                        class="w3-button w3-green w3-padding-large w3-center w3-round" style="width:30%">Send</button>
                </form>
                <!-- <?php if($msg != "") echo "$msg<br><br>";?> -->
                <!-- <h5><?php $result1;?></h5> -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-light-grey w3-center">

        <div class="w3-third">
            <h4>Danpanel</h4>
            <p>CVR-Nummer: 38362925</p>
            <p>Info@danpanel.dk</p>
            <p>Farverland 6
                2600 Glostrup</p>
        </div>
        <div class="w3-third">
            <h4>Ny Kunde</h4>
            <p>Man - Fre fra kl. 09:00 - 15:00</p>
            <p>nykunde@danpanel.dk</p>
            <p>+45 32 22 32 03</p>
        </div>
        <div class="w3-third">
            <h4>Kundeservice</h4>
            <p>Man - Fre fra kl. 09:00 - 15:00</p>
            <p>hej@danpanel.dk</p>
            <p>+45 32 22 32 03</p>
        </div>
        <div class="w3-third">
            <a href="Vilkår . DP.pdf" target="_blank">Læs om Vilkår</a>
        </div>
        <div class="w3-third">
            <a href="#" class="w3-button w3-blue w3-margin w3-round"><i
                    class="w3-round fa fa-arrow-up w3-margin-right"></i>Tilbage til toppen</a>
            <div class="w3-xlarge w3-section"> <a href="https://www.facebook.com/DanPanelDK" target="_blank"><i
                        class="fa fa-facebook-official w3-hover-opacity"></i></a> <a
                    href="https://www.linkedin.com/company/danpanel/" target="_blank"><i
                        class="fa fa-linkedin w3-hover-opacity"></i></a>

            </div>
        </div>
        <div class="w3-third">
            <a href="Cookie-og-privatlivspolitik.pdf" target="_blank">Læs om Cookies og
                Privatpolitik</a>
        </div>
        </div>
        <div class="w3-container">
            <p class="copyright-text">Copyright &copy; 2019 Danpanel Aps. All Right Reserved.</p>
        </div>
    </footer>

    <!-- login Modal Login/Logout -->
    <div id="login" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('login').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright w3-round" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <?php
			if (!isset( $_SESSION['uid'])) {
				echo '<form class="w3-container" action="includes/login.inc.php" method="POST">
				<div class="w3-section">
					<label><b>Email</b></label>
					<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Email" name="email" required>
					<label><b>Password</b></label>	
					<input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pwd" required>
					<button class="w3-button w3-block w3-green w3-section w3-padding" name="login-submit" type="submit">Login</button>
					<input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me </div>
			</form>';
			} else if ( isset( $_SESSION[ 'uid' ] ) ) {
				echo '<form class="w3-container" action="includes/logout.inc.php" method="post">
		  	 <h1 class="w3-center">Er du sikker på at du vil logge ud?</h1>
             <button name="login-submit" class="w3-button w3-block w3-green w3-section w3-padding w3-round" type="submit">Log ud</button>
          </form>';
			}
			?>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-round">
                <?php if(!isset( $_SESSION[ 'uid' ] )){echo '<span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span> ';} ?>
                <button onclick="document.getElementById('login').style.display='none'" type="button"
                    class="w3-button w3-red w3-round">Cancel</button>
            </div>
        </div>
    </div>
    <!-- signup Modal Opret bruger  -->
    <div id="signup" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('signup').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright w3-round" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section">
                <form class="w3-container" action="includes/signup.inc.php" method="post">
                    <div class="w3-center w3-padding-">
                        <h3>Vælg afdeling <br> *kun en afdeling må vælges*</h3><br>
                        <div class="choose-signup-btn">
                            <div class="w3-blue w3-round single-signup-btn">
                                <label class="text-siginupform">Offentlig</label>
                                <input class="text-siginupform" type="checkbox" value="offentlig" name="typeofuser"
                                    onclick="myEanHideAndShowFunction()">
                            </div>
                            <div class="w3-blue w3-round single-signup-btn" style="">
                                <label class="text-siginupform">Erhverv</label>
                                <input class="text-siginupform" type="checkbox" value="erhverv" name="typeofuser"
                                    onclick="myCvrHideAndShowFunction()">
                            </div>
                            <div class="w3-blue w3-round single-signup-btn">
                                <label class="text-siginupform">Privat</label>
                                <input class="text-siginupform" type="checkbox" value="privat" name="typeofuser"
                                    onclick="myFødselsDatoHideAndShowFunction()">
                            </div>
                        </div>
                    </div>
                    <?php
					// Here we check if the user already tried submitting data.

					// We check Name.
					if ( !empty( $_GET[ "name" ] ) ) {
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="name" placeholder="Navn" value="' . $_GET[ "name" ] . '">';
					} else {
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="name" placeholder="Navn">';
					}

					// We check e-mail.
					if ( !empty( $_GET[ "email" ] ) ) {
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="email" placeholder="E-mail" value="' . $_GET[ "email" ] . '">';
					} else {
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="email" placeholder="E-mail">';
					}
					if ( !empty( $_GET[ "phonenr" ] ) ) {
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="phonenr" placeholder="Tlf Nr.(max 8 tegn)" value="' . $_GET[ "phonenr" ] . '">';
					} else {
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="phonenr" placeholder="Tlf Nr.(max 8 tegn)">';
					}
					?>
                    <input type="text" id="ean" class="w3-input w3-border w3-hover-border-black w3-section" name="ean"
                        placeholder="EAN Nr" style="display: none"></input>
                    <input type="text" id="cvr" class="w3-input w3-border w3-hover-border-black w3-section" name="cvr"
                        placeholder="CVR Nr" style="display: none"></input>
                    <input type="date" id="fødselsdato" class="w3-input w3-border w3-hover-border-black w3-section"
                        name="fødselsdato" placeholder="yyyy-mm-dd" style="display: none"></input>
                    <input type="password" class="w3-input w3-border w3-hover-border-black w3-section" name="pwd"
                        placeholder="Password">
                    <input type="password" class="w3-input w3-border w3-hover-border-black w3-section" name="pwd-repeat"
                        placeholder="Gentag password">

                    <label>Vil du have nyhedsbreve fra Danpanel?</label>
                    <input type="checkbox" checked value="ja" name="nyhedsbrev">

                    <a href="Vilkår . DP.pdf" target="_blank" class="w3-right">Læs om Vilkår</a><br><br>
                    <a href="Cookie-og-privatlivspolitik.pdf" target="_blank" class="w3-right">Læs om
                        Cookies og
                        Privatpolitik</a><br>

                    <button type="submit" class="w3-button w3-green w3-margin-bottom w3-round"
                        name="signup-submit">Opret Bruger</button>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-round">
                    <button onclick="document.getElementById('signup').style.display='none'" type="button"
                        class="w3-button w3-red w3-round">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <!--JS scripts -->
    <script src="javascript/TextSlideShowScript.js"></script>
    <script src="javascript/ImageslideshowScript.js"></script>
    <script src="javascript/closemodal.js"></script>
    <script src="javascript/hideandshowscript.js"></script>
    <script src="javascript/CollapsableScript.js"></script>
    <script src="javascript/TextAnimateInIndex.js"></script>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"> </script>
    <!-- count number -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="javascript/plugins.js"></script>
    <script>
    // var wow = new WOW({
    //     boxClass: 'wow', // animated element css class (default is wow)
    //     animateClass: 'animated', // animation css class (default is animated)
    //     offset: 0, // distance to the element when triggering the animation (default is 0)
    //     mobile: true, // trigger animations on mobile devices (default is true)
    //     live: true, // act on asynchronously loaded content (default is true)
    //     callback: function(box) {
    //         // the callback is fired every time an animation is started
    //         // the argument that is passed in is the DOM node being animated
    //     },
    //     scrollContainer: null // optional scroll container selector, otherwise use window
    // });
    // wow.init();





    // function flipStruktur() {
    //     $('.skabe-struk-flip').toggleClass('flipped');
    // }

    // function flipOverskud() {
    //     $('.overskud-flip').toggleClass('flipped');
    // }

    // function flipUdvikling() {
    //     $('.udvikling-flip').toggleClass('flipped');
    // }
    </script>

    <script>
    // $(".numCount").counterUp({
    //     delay: 10,
    //     time: 1000
    // });
    </script>

    <script>
    // $('#bs4-multi-slide-carousel').carousel({
    //     interval: 5000
    // })
    </script>
    <script>
//     $('body').on('mouseover mouseout', '.dropdown', function(e) {
//     $(e.target).dropdown('toggle');
// });
    </script>

    <!-- <script>
    $('#carouselExample').on('slide.bs.carousel', function(e) {


        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
        var totalItems = $('.carousel-item').length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $('.carousel-item').eq(i).appendTo('.carousel-inner');
                } else {
                    $('.carousel-item').eq(0).appendTo('.carousel-inner');
                }
            }
        }
    });


    $('#carouselExample').carousel({
        interval: 2000
    });


    $(document).ready(function() {
        /* show lightbox when clicking a thumbnail */
        $('a.thumb').click(function(event) {
            event.preventDefault();
            var content = $('.modal-body');
            content.empty();
            var title = $(this).attr("title");
            $('.modal-title').html(title);
            content.html($(this).html());
            $(".modal-profile").modal({
                show: true
            });
        });

    });
    </script> -->

    <!-- <script>
            function scroll(val){
                document.getElementByClassName(val).click();
            }
        
        </script> -->

    <!-- <script type="text/javascript">
            
            $(function() {
                
                setTimeout(function() {
                    $('.fly-in-text').removeClass('hidden-text');
                }, 3000);
                
            })();
            
        </script> -->
</body>
<?php   if(strpos($_SERVER['REQUEST_URI'], "login=success")){
				echo '<script language="javascript">';
				echo 'alert("Du er nu logget ind")';
				echo '</script>'; }
		if(strpos($_SERVER['REQUEST_URI'], "mailsent")){
				echo '<script language="javascript">';
				echo 'alert("Tak fordi du har kontaktet DanPanel \nVi vil tage kontakt til dig hurtigst muligt")';
				echo '</script>'; }
		?>

</html>