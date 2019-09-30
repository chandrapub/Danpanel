<?php
session_start();
// require( "includes/dbh.inc.php" );
require( "includes\dbh.inc.php" );
// $typeofuser = $_SESSION['typeofuser'];
?>
<!doctype html>
<html>

<head>
<meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="Assets/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Helvetica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/glyphicons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <title>Privat</title>
    <style>
    html {
        scroll-behavior: smooth;
    }

    .navbar-toggler {
        border-color: rgb(179, 179, 204);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(179, 179, 204, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }
    </style>
</head>

<body class="w3-animate-opacity">
    <!-- Navbar -->
    <!-- Links (sit on top) -->

    <div class="video-container">
    <nav class="navbar navbar-expand-md fixed-top w3-bar navbar-style">
            <div class="container-fluid">

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
                        <li class="nav-item1 w3-button">
                            <a class="navbar-text1 w3-text-white js-scroll-trigger" href="offentligt.php">Offentligt</a>
                        </li>
                        <li class="nav-item1 w3-button">
                            <a class="navbar-text1 w3-text-white js-scroll-trigger" href="erhverv.php">Erhverv</a>
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

        <div class="container-fluid" style="padding:0px; margin:0px; position: relative">
            <video class="video-file align-video-erhverv" autoplay loop muted>

                <source src="Assets/privat.mov" type="video/mp4">
                Your browser does not support the video tag.

                <!-- <video autoplay loop muted src="Assets/forside.mp4" style=""> -->
            </video>
            <div class="w3-center w3-display-middle">
                <div class="w3-text-white w3-animate-top w3-centered text-size">Det Private</div>
            </div>
        </div>

    </div>

    <div class="w3-container w3-center" style="margin-top:1%;">
        <a href="#plans" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                class="w3-animate-fading w3-circle w3-margin-bottom"
                style="width: 4%; padding:3px; background-color: #79d279;"></a>
    </div>



    <!-- <nav
        class="navbar navbar-expand-md navbar-light fixed-top bg-light w3-white w3-bar w3-white w3-wide w3-bottombar w3-card">
        <div class="container-fluid"> -->

    <!-- Float links to the right. Hide them on small screens -->
    <!-- <a class="navbar-brand" href="index.php">
                <img src="Assets/logo-black.png" width="180" height="40" alt="Logo"></a> -->

    <!-- Toggler/collapsibe Button -->
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="ture" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse " id="navbarResponsive">
                <ul class="navbar-nav ml-auto navbar-right ">
                    <li class="nav-item w3-button">
                        <a class="nav-link js-scroll-trigger text-dark w3-bar-item" href="offentligt.php">Offentligt</a>
                    </li>
                    <li class="nav-item w3-button">
                        <a class="nav-link js-scroll-trigger text-dark w3-bar-item" href="erhverv.php">Erhverv</a>
                    </li>
                    <li class="nav-item w3-button">
                        <a class="nav-link js-scroll-trigger text-dark w3-bar-item" href="privat.php">Privat</a>
                    </li>
                    <li class="nav-item w3-button">
                        <a class="nav-link js-scroll-trigger text-dark w3-bar-item " href="om.php">Om DanPanel</a>
                    </li>
                    <li class="nav-item w3-button">
                        <?php
				if ( !isset( $_SESSION[ 'uid' ] ) ) {
					echo '<a onClick="document.getElementById(\'signup\').style.display=\'block\'" 
				class="w3-button w3-bar-item text-dark" style ="margin-left: 0px; padding: 8px 0px;">Opret Profil</a>  
				</li>
				<li class = "nav-item w3-button">
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-button w3-bar-item text-dark" style ="margin-left: 0px; 0px; padding: 8px 0px;">Log ind</a>';
				
				} else if ( isset( $_SESSION[ 'uid' ]) ) {
					if(strpos($_SESSION['email'], '@danpanel')){
						echo'<a  name="minadminprofil-submit" method="post" href="minadminprofil.php" class="w3-bar-item w3-button">Min Profil</a>
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-button w3-bar-item">Log ud</a>';
					}
					else if (!strpos($_SESSION['email'], '@danpanel')){
					?><a name="minprofil-submit" method="post" class="w3-bar-item w3-button"
                            <?php echo 'href="min'.$_SESSION['typeofuser'].'profil.php" '?>>Min Profil</a>
                        <?php echo '
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-button w3-bar-item">Log ud</a>';
				}}
				?>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->


    <!--Video content -->
    <!-- <div class="container-fluid" style="padding:0px; margin:0px; position:relative">
        <div class="w3-center w3-display-middle">
            <div class="w3-text-white w3-animate-top w3-centered text-size">Det Private</div>
        </div>
        <video src="Assets/privat.mov" autoplay muted loop class="image w3-round"
            style="object-fit: fill; margin-top:35px; padding:0px"></video>
        <div class="overlay-for-vid">
            <a href="#plans" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                    class="w3-display-bottommiddle w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom"
                    style="width: 5%"></a>
        </div>
    </div> -->
    </div>
    </div>

    <!-- Hvad tilbyder vi sektion -->
    <!-- Testing start tidbud -->
    <div class="w3-padding w3-center" id="plans">
        <h3>Hvad tilbyder vi</h3>
        <div class="w3-card1 w3-paddin w3-text-grey" style="">
            <p><b>Hos DanPanel prøver vi at skabe struktur i din hverdag.<br> Hvilket vi kan gøre, da vi har de mest
                    kvalificerede samarbejdspartnere indenfor diverse brancher,<br> som gør, at vi har en bred vifte af
                    produkter, der kan skabe værdi hos dig. <br><br>

                    Her kan du vælge og bestille de produkter som du har brug for.<br> Du vil altid få overblik og følge
                    med de løsninger/service du vælger via DanPanel. </b></p>
        </div>
    </div>

    <!-- Alarm og overvågning   -->
    <div class="w3-row-padding">
        <div class="w3-third">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-ble w3-xlarge w3-padding-16 tilbud-headline">Alarm og overvågning
                </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Alarm-system.jpeg"
                    style="height: 35%; width: 80%">

                <div class="wow zoomIn serviceSubHeadLineText">
                    <p class="serviceSubHeadLineText-li"> De ansatte som bliver sendt afsted på
                        opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                </div>
                <div class="tilbudLaasmereContainer">
                    <div onClick="document.getElementById('amarmmodal').style.display='block'" class="m-2 btn-fåTilbud">
                        Få
                        tilbud</div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereVikerRekruttering" aria-expanded="false"
                        aria-controls="CollapseLessMereVikerRekruttering">Læs
                        mere <i class="fa fa-angle-down"></i> <i class="fa fa-angle-up" style="display:none"></i>
                        <!-- <span class="glyphicon glyphicon-menu-up" style="display:none"></span> -->
                    </div>


                </div>

                <div class="collapse collapse-arrow multi-collapse w3-padding" id="CollapseLessMereVikerRekruttering">
                    <p> <b>Kamera og Alarm-systemer</b> <br>
                        Kender du tanken: at være utryg ved at være væk fra dit hjem?
                        Der er intet mere ubehageligt end at komme hjem eller tage på arbejde og opleve, at en
                        indbrudstyv har været der. Det at se, at en fremmede person har gennemrodet i ens ting, kan være
                        svært at acceptere. <br>
                        Men desværre er det i dag en realitet, at flere og flere har eller kommer til at opleve det, at
                        have uventede gæster på besøg. <br>
                        Brug af overvågning/kamera og alarm systemer, kan advare dig før truende situationer forværres,
                        samt give dig en vigtig rekord af begivenhederne. Overvågning af din butik, forretning eller
                        hjem kan være uvurderlig i at identificere tyven. <br>
                        <br> <b>Hvilket produkt skal jeg have?</b> <br>
                        Vores sikkerhedskonsulent kan rådgive dig omkring vores produkter så du nemt kan Skræddersy din
                        løsning efter dit behov, kamera/alarm-system så du har den rette pakkeløsning. </p>
                </div>

            </ul>
        </div>


        <!-- Renovering   -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Renovering</li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Renovering.jpeg"
                    style="height: 35%; width: 80%">

                <div class="wow zoomIn serviceSubHeadLineText">
                    <p class="serviceSubHeadLineText-li"> De ansatte som bliver sendt afsted på
                        opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                </div>
                <div class="tilbudLaasmereContainer">
                    <div onClick="document.getElementById('').style.display='block'" class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereAlarmofOvervagning" aria-expanded="false"
                        aria-controls="CollapseLessMereAlarmofOvervagning">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none;"></i>
                    </div>
                </div>

                <div class="collapse collapse-arrow CollapseLessMereAlarmofOvervagning w3-padding"
                    id="CollapseLessMereAlarmofOvervagning">
                    <p><b>Skal du have bygget et nyt eller renoveret dit hus eller dit rækkehus?</b><br>
                        så har vi en række samarbejdspartnere der kan hjælpe dig hele vejen igennem. Alt fra
                        arkitekttegning, projektstyring under nybyg eller renovationen af dit hus til eftersyn. Vores
                        samarbejdspartnere kan bistå jer med ny byg til renovering af alle slags huse. Få et
                        uforpligtende tilbud på dit byggeprojekt allerede i dag.<br>
                        <li>Nybyggeri</li>
                        <li>Tilbygning</li>
                        <li>Renovering</li>
                        <li>El-installation</li>
                        <li>Carporte/Garage</li>
                        <li>VVS og ventilation</li>
                        <li>Have og terrasse</li>
                    </p>
                </div>

                <!-- <button onClick="document.getElementById('i').style.display='block'"
                    class="w3-button w3-padding-large w3-hover-blue"
                    style="width: 80%; margin-top:3%; color:#fff; background-color: #79d279; border-radius:4px;">Få
                    tilbud</button>
                <?php
				if($typeofuser=="erhverv"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('alarmmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li>
                <li>
                    <button class="collapsible w3-padding-large h5" type="button" data-toggle="collapse"
                        data-target="#multiCollapseExample2" aria-expanded="false"
                        aria-controls="multiCollapseExample2">Choose here</button>
                </li> -->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                            <div class="d-flex">
                                <div class="card card-body w3-card-4 p-2 bg-info flex-fill" style="margin:8px">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident.
                                    <button class="w3-padding h6 rounded"> Bestil here </button>
                                </div>
                                <div class="card card-body w3-card-4 p-2 bg-info flex-fill" style="margin:8px">
                                    Test Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident.
                                    <button class="w3-padding h6 rounded" style="padding:0px; margin:0px"> Bestil here
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </ul>
        </div>
        <!-- </div> -->
        <!-- MMM -->
        <!-- </div> -->

        <!-- Rengøring   -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Rengøring </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Rengøring - Privat .jpg"
                    style="height: 35%; width: 80%">
                <div class="wow zoomIn serviceSubHeadLineText">
                    <p class="serviceSubHeadLineText-li">De ansatte som bliver sendt afsted på
                        opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                </div>

                <div class="tilbudLaasmereContainer">
                    <div onClick="document.getElementById('').style.display='block'" class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereDigitalisering" aria-expanded="false"
                        aria-controls="CollapseLessMereDigitalisering">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                    </div>
                </div>


                <!-- <button class="collapsible w3-padding-large w3-round w3-hover-blue CollapseLessMereDigitalisering"
                    style="width:80%; background-color: #79d279">Læs Mere</button> -->


                <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereDigitalisering">
                    <p><b>Har du også brug for en ekstra hånd til hjemmerengøring?</b><br>
                        Få rengøring af høj kvalitet via vores samarbejdspartner der har til formål at yde en god
                        service og kvalitet, uden at det behøver at koste en formue.<br>
                        Med kvalitetskontrol og styring varetages af dagligledere som sikre jer en god aftale.
                        Du kan skræddersy din egen løsning her, alt fra en fast aftale til en engangsrengøring/oprydning
                        - alt efter dine behov.<br>
                        Vi har samarbejdspartner som er specialister indenfor rengøring indenfor hjemmerengøring.
                    </p>
                </div>
                <!-- <button onClick="document.getElementById('i').style.display='block'"
                    class="w3-button w3-padding-large w3-hover-blue"
                    style="width: 80%; margin-top:3%; color:#fff; background-color: #79d279; border-radius:4px;">Få
                    tilbud</button>
                <?php
				if($typeofuser=="erhverv"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('digitaliseringmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li>
                <li>
                    <button class="collapsible w3-padding-large h5" type="button" data-toggle="collapse"
                        data-target="#multiCollapse3" aria-expanded="false" aria-controls="multiCollapse3">Choose
                        here</button>
                </li> -->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="collapse multi-collapse" id="multiCollapse3">
                            <div class="d-flex">
                                <div class="card card-body w3-card-4 p-1 mr-8 bg-info flex-fill" style="margin:5px">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident.
                                    <button class="w3-padding h6 rounded"> Bestil here </button>
                                </div>
                                <div class="card card-body w3-card-4 p-1 bg-info flex-fill" style="margin:5px">
                                    Test Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident.
                                    <button class="w3-padding h6 rounded" style="padding:0px; margin:0px"> Bestil here
                                    </button>
																</div>
																<div class="card card-body w3-card-4 p-1 m-8 bg-info flex-fill" style="margin:5px">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident.
                                    <button class="w3-padding h6 rounded"> Bestil here </button>
                                </div>
                                <div class="card card-body w3-card-4 p-1 m-8 bg-info flex-fill" style="margin:5px">
                                    Test Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident.
                                    <button class="w3-padding h6 rounded" style="padding:0px; margin:0px"> Bestil here
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div> -->
            </ul>
        </div>
    </div>

    <div class="w3-row-padding">
        <!-- Kørebog system  -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Kørebog system </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/thumbnail (1).png"
                    style="height: 35%; width: 80%">

                <div class="wow zoomIn serviceSubHeadLineText">
                    <p class="serviceSubHeadLineText-li">De ansatte som bliver sendt afsted på
                        opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                </div>

                <div class="tilbudLaasmereContainer">
                    <div onClick="document.getElementById('').style.display='block'" class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereErhvervslejemal" aria-expanded="false"
                        aria-controls="CollapseLessMereErhvervslejemal">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                    </div>
                </div>


                <!-- <button class="collapsible w3-padding-large">Læs Mere</button> -->
                <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereErhvervslejemal">
                    <p><b>Kørebog?</b><br>
                        Vores samarbejdspartner er bl.a. ABAX, som er en førende udvikler og leverandør indenfor
                        GPS-tracking, flådestyringssystemer, elektroniske kørebøger, overblikssystemer til køretøj og
                        udstyr samt opgavehåndteringssystemer.<br><br>
                        Til dig som benytter køretøjer i forbindelse med dit arbejde, er en elektronisk kørebog en smart
                        løsning. Den dokumenterer alle ture automatisk via GPS. Du kan rapportere præcist og altid sikre
                        at du ved hvor dine køretøjer befinder sig. Dokumentationsprocessen for ansatte og virksomheden
                        kan du simplificere for at overholde skattemæssige lovkrav. Sidst men ikke mindst, så kan du
                        spare penge og reducere omkostningerne til kørsel og drift.<br><br>
                        Når man tænker på et kørebog system så kan denne løsning dække dine behov:
                        <li><b>Kørebog system:</b> Administrer køreture - Kørselsgodtgørelse </li>
                    </p>
                </div>
                <!-- <?php
				if($typeofuser=="erhverv"){
						echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('lejemålmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li> -->
            </ul>
        </div>
        <!-- fagforening  -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">fagforening </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/7.jpeg"
                    style="height: 35%; width: 80%">


                <div class="wow zoomIn serviceSubHeadLineText">
                    <p class="serviceSubHeadLineText-li">De ansatte som bliver sendt afsted på
                        opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                </div>

                <div class="tilbudLaasmereContainer">
                    <div onClick="document.getElementById('').style.display='block'" class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereRengoring" aria-expanded="false"
                        aria-controls="CollapseLessMereRengoring">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                    </div>
                </div>


                <!-- <button class="collapsible w3-padding-large">Læs Mere</button> -->
                <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereRengoring">
                    <!-- <button class="collapsible w3-padding-large">Læs Mere</button> -->
                    <p><b>Leder du efter en fagforening?</b><br>
                        Vores samarbejdspartner er bl.a. Business Danmark, som er den eneste fagforening i Danmark med
                        speciale i salg og marketing. De arbejder for den kommercielle dagsorden og hjælper deres
                        medlemmer
                        med at præsentere i den nye virkelighed.<br><br>

                        Igennem DanPanel kan du få en fagforening og a-kasse, der primært organisere medarbejdere og
                        ledere
                        indenfor salg, marketing og rådgivning.<br>
                        <b>Hvad får du ud af at være medlem af en a-kasse?</b>
                        <li>Sikret dagpenge</li>
                        <li>Rådgivning</li>
                        <li>Individuelle coachingforløb</li>
                        <li>Workshops</li>
                        <li>Kurser</li>
                        Vores samarbejdspartner er den eneste a-kasse i Danmark med fuldt fokus på din faglighed, så de
                        ved,
                        hvad der skal til, for at få dig tilbage på arbejdsmarkedet igen.<br><br> Er du under
                        uddannelse, så
                        er det gratis at være medlem af denne A-kasse, så er du sikret retten til dagpenge med det
                        samme,
                        når eksamensbeviset er i hus og jagten på drømmejobbet går i gang.
                    </p>
                </div>
                <!-- <?php
				if($typeofuser=="erhverv"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('rengøringmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li> -->
            </ul>
        </div>
        <!-- Jobtilbud   -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Jobtilbud </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/thumbnail.jpeg"
                    style="height: 35%; width: 80%">

                <div class="wow zoomIn serviceSubHeadLineText">
                    <p class="serviceSubHeadLineText-li">De ansatte som bliver sendt afsted på
                        opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                </div>

                <div class="tilbudLaasmereContainer">
                    <div onClick="document.getElementById('').style.display='block'" class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereKorebogSystem" aria-expanded="false"
                        aria-controls="CollapseLessMereKorebogSystem">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                    </div>
                </div>


                <!-- <button class="collapsible w3-padding-large">Læs Mere</button> -->
                <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKorebogSystem">

                    <!-- <button class="collapsible w3-padding-large">Læs Mere</button> -->

                    <p>Vi oplever i mange udsatte familier, at der findes ledighed af forskellige årsager. Dette vil vi
                        med Job Boost forsøge at støtte de voksne med, at få muligheden til at komme tilbage på
                        arbejdsmarkedet, via workshops i bl.a. en kommunikationsmodel og motivation træning. Vi har
                        igennem tiden fået mange kandidater ud på arbejdsmarkedet via. vores workshops, det viser sig
                        med stor succes, at de klarer sig langt bedre pga. de har gennemgået vores workshops.</p>
                </div>
        </div>
        <!-- <?php
				if($typeofuser=="erhverv"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('kørebogmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li> -->
        </ul>
    </div>
    </div>

    <!-- fagforening  -->
    <div class="w3-row-padding w3-margin-top">
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                <li class="w3-xlarge w3-padding-32 w3-blue">fagforening</li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round w3-padding-10" src="Assets/7.jpeg"
                    style="height: 35%; width: 80%">

                <button class=" collapsible w3-padding-large">Læs Mere</button>
                <div class="content">
                    <p><b>Leder du efter en fagforening?</b><br>
                        Vores samarbejdspartner er bl.a. Business Danmark, som er den eneste fagforening i Danmark med
                        speciale i salg og marketing. De arbejder for den kommercielle dagsorden og hjælper deres
                        medlemmer
                        med at præsentere i den nye virkelighed.<br><br>

                        Igennem DanPanel kan du få en fagforening og a-kasse, der primært organisere medarbejdere og
                        ledere
                        indenfor salg, marketing og rådgivning.<br>
                        <b>Hvad får du ud af at være medlem af en a-kasse?</b>
                        <li>Sikret dagpenge</li>
                        <li>Rådgivning</li>
                        <li>Individuelle coachingforløb</li>
                        <li>Workshops</li>
                        <li>Kurser</li>
                        Vores samarbejdspartner er den eneste a-kasse i Danmark med fuldt fokus på din faglighed, så de
                        ved,
                        hvad der skal til, for at få dig tilbage på arbejdsmarkedet igen.<br><br> Er du under
                        uddannelse, så
                        er det gratis at være medlem af denne A-kasse, så er du sikret retten til dagpenge med det
                        samme,
                        når eksamensbeviset er i hus og jagten på drømmejobbet går i gang.
                    </p>

                </div>
                <?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('alarmmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li>
            </ul>
        </div>
        <!-- Renovering   -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                <li class="w3-xlarge w3-padding-32 w3-blue">Renovering</li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round w3-padding-10"
                    src="Assets/Renovering.jpeg" style="height: 35%; width: 80%">
                <button class="collapsible w3-padding-large">Læs Mere</button>
                <div class="content">
                    <p><b>Skal du have bygget et nyt eller renoveret dit hus eller dit rækkehus?</b><br>
                        så har vi en række samarbejdspartnere der kan hjælpe dig hele vejen igennem. Alt fra
                        arkitekttegning, projektstyring under nybyg eller renovationen af dit hus til eftersyn. Vores
                        samarbejdspartnere kan bistå jer med ny byg til renovering af alle slags huse. Få et
                        uforpligtende tilbud på dit byggeprojekt allerede i dag.<br>
                        <li>Nybyggeri</li>
                        <li>Tilbygning</li>
                        <li>Renovering</li>
                        <li>El-installation</li>
                        <li>Carporte/Garage</li>
                        <li>VVS og ventilation</li>
                        <li>Have og terrasse</li>
                    </p>
                </div>
                <?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('renoveringmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li>
            </ul>
        </div>
        <!-- Rengøring -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                <li class="w3-xlarge w3-padding-32 w3-blue">Rengøring</li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-padding-10" src="Assets/Rengøring - Privat .jpg"
                    style="height: 35%; width: 80%;">
                <button class="collapsible w3-padding-large">Læs Mere</button>
                <div class="content">
                    <p><b>Har du også brug for en ekstra hånd til hjemmerengøring?</b><br>
                        Få rengøring af høj kvalitet via vores samarbejdspartner der har til formål at yde en god
                        service og kvalitet, uden at det behøver at koste en formue.<br>
                        Med kvalitetskontrol og styring varetages af dagligledere som sikre jer en god aftale.
                        Du kan skræddersy din egen løsning her, alt fra en fast aftale til en engangsrengøring/oprydning
                        - alt efter dine behov.<br>
                        Vi har samarbejdspartner som er specialister indenfor rengøring indenfor hjemmerengøring.
                    </p>
                </div>
                <?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('rengoeringmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li>
            </ul>
        </div>
    </div>
    <div class="w3-row-padding w3-margin-top">
        <!-- Kørebog system -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                <li class="w3-xlarge w3-padding-32 w3-blue">Kørebog system</li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round w3-padding-10"
                    src="Assets/thumbnail (1).png" style="height: 35%; width: 80%;">
                <button class="collapsible w3-padding-large">Læs Mere</button>
                <div class="content">
                    <p><b>Kørebog?</b><br>
                        Vores samarbejdspartner er bl.a. ABAX, som er en førende udvikler og leverandør indenfor
                        GPS-tracking, flådestyringssystemer, elektroniske kørebøger, overblikssystemer til køretøj og
                        udstyr samt opgavehåndteringssystemer.<br><br>
                        Til dig som benytter køretøjer i forbindelse med dit arbejde, er en elektronisk kørebog en smart
                        løsning. Den dokumenterer alle ture automatisk via GPS. Du kan rapportere præcist og altid sikre
                        at du ved hvor dine køretøjer befinder sig. Dokumentationsprocessen for ansatte og virksomheden
                        kan du simplificere for at overholde skattemæssige lovkrav. Sidst men ikke mindst, så kan du
                        spare penge og reducere omkostningerne til kørsel og drift.<br><br>
                        Når man tænker på et kørebog system så kan denne løsning dække dine behov:
                        <li><b>Kørebog system:</b> Administrer køreture - Kørselsgodtgørelse </li>
                    </p>
                </div>
                <?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('koerebogmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li>
            </ul>
        </div>
        <!-- Fagforening -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                <li class="w3-xlarge w3-padding-32 w3-blue">Fagforening</li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round w3-padding-10" src="Assets/7.jpeg"
                    style="height: 35%; width: 80%;">
                <button class="collapsible w3-padding-large">Læs Mere</button>
                <div class="content">
                    <p><b>Leder du efter en fagforening?</b><br>
                        Vores samarbejdspartner er bl.a. Business Danmark, som er den eneste fagforening i Danmark med
                        speciale i salg og marketing. De arbejder for den kommercielle dagsorden og hjælper deres
                        medlemmer med at præsentere i den nye virkelighed.<br><br>

                        Igennem DanPanel kan du få en fagforening og a-kasse, der primært organisere medarbejdere og
                        ledere indenfor salg, marketing og rådgivning.<br>
                        <b>Hvad får du ud af at være medlem af en a-kasse?</b>
                        <li>Sikret dagpenge</li>
                        <li>Rådgivning</li>
                        <li>Individuelle coachingforløb</li>
                        <li>Workshops</li>
                        <li>Kurser</li>
                        Vores samarbejdspartner er den eneste a-kasse i Danmark med fuldt fokus på din faglighed, så de
                        ved, hvad der skal til, for at få dig tilbage på arbejdsmarkedet igen.<br><br> Er du under
                        uddannelse, så er det gratis at være medlem af denne A-kasse, så er du sikret retten til
                        dagpenge med det samme, når eksamensbeviset er i hus og jagten på drømmejobbet går i gang.
                    </p>
                </div>
                <?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('fagforeningmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li>
            </ul>
        </div>
        <!-- Jobtilbud -->
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                <li class="w3-xlarge w3-padding-32 w3-blue">Jobtilbud</li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/thumbnail.jpeg"
                    style="height: 35%; width: 80%;">
                <button class="collapsible w3-padding-large">Læs Mere</button>
                <div class="content">
                    <p>Vi oplever i mange udsatte familier, at der findes ledighed af forskellige årsager. Dette vil vi
                        med Job Boost forsøge at støtte de voksne med, at få muligheden til at komme tilbage på
                        arbejdsmarkedet, via workshops i bl.a. en kommunikationsmodel og motivation træning. Vi har
                        igennem tiden fået mange kandidater ud på arbejdsmarkedet via. vores workshops, det viser sig
                        med stor succes, at de klarer sig langt bedre pga. de har gennemgået vores workshops.</p>
                </div>
                <?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('jobtilbudmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </li>
            </ul>
        </div>
    </div>



    <!-- Testing end tidbud-->

    <!-- id01 Modal Log in -->
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
    <!-- id02 Modal kontakt os -->
    <div id="id02" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('id02').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-center w3-padding-64" id="contact"> <span
                    class="w3-xlarge w3-bottombar w3-border-green w3-padding-16">Kontakt Os</span> </div>
            <form class="w3-container" action="includes/contactform.inc.php" method="post">
                <div class="w3-section">
                    <label>Navn</label>
                    <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Name"
                        required>
                </div>
                <div class="w3-section">
                    <label>Email</label>
                    <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Email"
                        required>
                </div>
                <div class="w3-section">
                    <label>Tlf Nr.(max 8 tegn)</label>
                    <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Tlf"
                        required>
                </div>
                <div class="w3-section">
                    <label>Emne</label>
                    <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject" required>
                </div>
                <div class="w3-section">
                    <label>Besked</label>
                    <textarea class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message"
                        required></textarea>
                </div>
                <button type="submit" name="contact-submit" class="w3-button w3-green">Send</button>
            </form>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('id02').style.display='none'" type="button"
                    class="w3-button w3-red">Cancel</button>
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
                    if(!empty($_GET["gadenavn"])){
                        echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="Gadenavn, Nr. Og evt. etage/afdeling" placeholder="Address (Gadenavn, Nr. Og evt. etage/afdeling)" vlaue="' .$_GET["gadenavn"].'">';
                    } else{
                        echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="Gadenavn, Nr. Og evt. etage/afdeling" placeholder="Address (Gadenavn, Nr. Og evt. etage/afdeling)">';
                    }
                    if(!empty($_GET["postnr"])){
                        echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="postnr" placeholder="Post Nr." Value="'.$_GET["postnr"].'">';
                    }else{
                        echo'<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="postnr" placeholder="Post Nr.">';
                    }
                    if(!empty($_GET["by"])){
                        echo'<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="by" placeholder="by" value="'.$_GET["by"].'">';
                    }else{
                        echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section name="by" placeholder="by">';
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
                    <a href="Cookie-og-privatlivspolitik.pdf" target="_blank" class="w3-right">Læs om Cookies og
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
    <!-- Hvad tilbyder vi sektion -->

    <!-- <div class="w3-row-padding" id="plans">
		<div class="w3-center w3-padding-64">
			<h3>Hvad tilbyder vi</h3>
			<div class="w3-card w3-padding w3-center w3-text-grey" style="width:75%; margin-left:12.5%; margin-right: 12.5%">
			<p><b>Hos DanPanel prøver vi at skabe struktur i din hverdag.<br> Hvilket vi kan gøre, da vi har de mest kvalificerede samarbejdspartnere indenfor diverse brancher,<br> som gør, at vi har en bred vifte af produkter, der kan skabe værdi hos dig. <br><br>

			Her kan du vælge og bestille de produkter som du har brug for.<br> Du vil altid få overblik og følge med de løsninger/service du vælger via DanPanel.  </b></p>
				</div>
		</div> -->
    <!-- Alarm og overvågning   -->
    <!-- <div class="w3-third w3-margin-bottom">
			<ul class="w3-ul w3-border w3-center w3-hover-shadow">
				<li class="w3-xlarge w3-padding-32 w3-blue">Alarm og overvågning </li>
				<img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Alarm system .jpeg" style="height: 250px;">
				
				<button class="collapsible w3-padding-large">Læs Mere</button>
				<div class="content">
					<p> <b>Kamera og Alarm-systemer</b> <br>
				Kender du tanken: at være utryg ved at være væk fra dit hjem?
				Der er intet mere ubehageligt end at komme hjem eller tage på arbejde og opleve, at en indbrudstyv har været der. Det at se, at en fremmede person har gennemrodet i ens ting, kan være svært at acceptere.  <br>
				Men desværre er det i dag en realitet, at flere og flere har eller kommer til at opleve det, at have uventede gæster på besøg. <br>
				Brug af overvågning/kamera og alarm systemer, kan advare dig før truende situationer forværres, samt give dig en vigtig rekord af begivenhederne. Overvågning af din butik, forretning eller hjem kan være uvurderlig i at identificere tyven.   <br>
						<br> <b>Hvilket produkt skal jeg have?</b> <br>
				Vores sikkerhedskonsulent kan rådgive dig omkring vores produkter så du nemt kan Skræddersy din løsning efter dit behov, kamera/alarm-system så du har den rette pakkeløsning. </p>
					
				</div>
				<?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('alarmmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
				</li>
			</ul>
		</div> -->
    <!-- Renovering   -->
    <!-- <div class="w3-third w3-margin-bottom">
			<ul class="w3-ul w3-border w3-center w3-hover-shadow">
				<li class="w3-xlarge w3-padding-32 w3-blue">Renovering</li>
				<img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Renovering.jpeg" style="height: 250px;">
				<button class="collapsible w3-padding-large">Læs Mere</button>
				<div class="content">
					<p><b>Skal du have bygget et nyt eller renoveret dit hus eller dit rækkehus?</b><br>
							så har vi en række samarbejdspartnere der kan hjælpe dig hele vejen igennem. Alt fra arkitekttegning, projektstyring under nybyg eller renovationen af dit hus til eftersyn. Vores samarbejdspartnere kan bistå jer med ny byg til renovering af alle slags huse. Få et uforpligtende tilbud på dit byggeprojekt allerede i dag.<br>
					<li>Nybyggeri</li>
					<li>Tilbygning</li>
					<li>Renovering</li>
					<li>El-installation</li>
					<li>Carporte/Garage</li>
					<li>VVS og ventilation</li>
					<li>Have og terrasse</li>
					</p>
				</div>
				<?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('renoveringmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
				</li>
			</ul>
		</div> -->
    <!-- Rengøring -->
    <!-- <div class="w3-third w3-margin-bottom">
			<ul class="w3-ul w3-border w3-center w3-hover-shadow">
				<li class="w3-xlarge w3-padding-32 w3-blue">Rengøring</li>
				<img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Rengøring - Privat .jpg" style="height: 250px;">
				<button class="collapsible w3-padding-large">Læs Mere</button>
				<div class="content">
					<p><b>Har du også brug for en ekstra hånd til hjemmerengøring?</b><br>
						Få rengøring af høj kvalitet via vores samarbejdspartner der har til formål at yde en god service og kvalitet, uden at det behøver at koste en formue.<br>
						Med kvalitetskontrol og styring varetages af dagligledere som sikre jer en god aftale. 
						Du kan skræddersy din egen løsning her, alt fra en fast aftale til en engangsrengøring/oprydning - alt efter dine behov.<br>
						Vi har samarbejdspartner som er specialister indenfor rengøring indenfor hjemmerengøring. 
					</p>
				</div>
				<?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('rengoeringmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
				</li>
			</ul>
		</div>
	</div>
		<div class="w3-row-padding w3-margin-top"> -->
    <!-- Kørebog system -->
    <!-- <div class="w3-third w3-margin-bottom">
			<ul class="w3-ul w3-border w3-center w3-hover-shadow">
				<li class="w3-xlarge w3-padding-32 w3-blue">Kørebog system  </li>
				<img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/thumbnail (1).png" style="height: 215px;">
				<button class="collapsible w3-padding-large">Læs Mere</button>
				<div class="content">
					<p><b>Kørebog?</b><br>
					Vores samarbejdspartner er bl.a. ABAX, som er en førende udvikler og leverandør indenfor GPS-tracking, flådestyringssystemer, elektroniske kørebøger, overblikssystemer til køretøj og udstyr samt opgavehåndteringssystemer.<br><br>
						Til dig som benytter køretøjer i forbindelse med dit arbejde, er en elektronisk kørebog en smart løsning. Den dokumenterer alle ture automatisk via GPS. Du kan rapportere præcist og altid sikre at du ved hvor dine køretøjer befinder sig. Dokumentationsprocessen for ansatte og virksomheden kan du simplificere for at overholde skattemæssige lovkrav. Sidst men ikke mindst, så kan du spare penge og reducere omkostningerne til kørsel og drift.<br><br>
						Når man tænker på et kørebog system så kan denne løsning dække dine behov:
						<li><b>Kørebog system:</b> Administrer køreture - Kørselsgodtgørelse </li>
					</p>
				</div>
				<?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('koerebogmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
				</li>
			</ul>
		</div> -->
    <!-- Fagforening -->
    <!-- <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
            <li class="w3-xlarge w3-padding-32 w3-blue">Fagforening</li>
            <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/7.png" style="height: 215px;">
            <button class="collapsible w3-padding-large">Læs Mere</button>
            <div class="content">
                <p><b>Leder du efter en fagforening?</b><br>
                    Vores samarbejdspartner er bl.a. Business Danmark, som er den eneste fagforening i Danmark med
                    speciale i salg og marketing. De arbejder for den kommercielle dagsorden og hjælper deres medlemmer
                    med at præsentere i den nye virkelighed.<br><br>

                    Igennem DanPanel kan du få en fagforening og a-kasse, der primært organisere medarbejdere og ledere
                    indenfor salg, marketing og rådgivning.<br>
                    <b>Hvad får du ud af at være medlem af en a-kasse?</b>
                    <li>Sikret dagpenge</li>
                    <li>Rådgivning</li>
                    <li>Individuelle coachingforløb</li>
                    <li>Workshops</li>
                    <li>Kurser</li>
                    Vores samarbejdspartner er den eneste a-kasse i Danmark med fuldt fokus på din faglighed, så de ved,
                    hvad der skal til, for at få dig tilbage på arbejdsmarkedet igen.<br><br> Er du under uddannelse, så
                    er det gratis at være medlem af denne A-kasse, så er du sikret retten til dagpenge med det samme,
                    når eksamensbeviset er i hus og jagten på drømmejobbet går i gang.
                </p>
            </div>
            <?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('fagforeningmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
            </li>
        </ul>
    </div> -->
    <!-- Jobtilbud -->
    <!-- <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
            <li class="w3-xlarge w3-padding-32 w3-blue">Jobtilbud</li>
            <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/thumbnail.png"
                style="height: 215px;">
            <button class="collapsible w3-padding-large">Læs Mere</button>
            <div class="content">
                <p>Vi oplever i mange udsatte familier, at der findes ledighed af forskellige årsager. Dette vil vi med
                    Job Boost forsøge at støtte de voksne med, at få muligheden til at komme tilbage på arbejdsmarkedet,
                    via workshops i bl.a. en kommunikationsmodel og motivation træning. Vi har igennem tiden fået mange
                    kandidater ud på arbejdsmarkedet via. vores workshops, det viser sig med stor succes, at de klarer
                    sig langt bedre pga. de har gennemgået vores workshops.</p>
            </div>
            <?php
				if($typeofuser=="privat"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('jobtilbudmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
            </li>
        </ul>
    </div> -->
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
                        class="fa fa-linkedin w3-hover-opacity"></i></a> </div>
        </div>
        <div class="w3-third">
            <a href="Cookie-og-privatlivspolitik.pdf" target="_blank">Læs om Cookies og Privatpolitik</a>
        </div>

        <!--
		<p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a>
		</p>
		-->
    </footer>


    <!-- Modals -->
    <!-- Alarm og Overvågning modal -->
    <div class="w3-row"> </div>
    <div id="alarmmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('alarmmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for alarm og overvågning -->
                <form class="w3-container w3-animate-opacity" action="includes/createalarmovervaagningorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('alarmmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Alarm og Overågning</h4>

                    <label>Kontaktperson</label>
                    <input name="kontaktperson" class="w3-border w3-input">

                    <label>Sikkerhedscheck</label>
                    <input name="sikkerhedscheck" class="w3-input w3-border w3-hover-border-black" type="datetime-local"
                        style="border: 0px">

                    <label>Sagsnummer</label>
                    <input name="sagsnr" class="w3-border w3-input">

                    <label>Firma adresse</label>
                    <input name="firmaadresse" class="w3-border w3-input">

                    <label>Faktura Email</label>
                    <input name="fakturaemail" class="w3-border w3-input">

                    <label>*Ikke obligatorisk* EAN Nummer</label>
                    <input name="ean" class="w3-border w3-input">

                    <label> *Ikke obligatorisk* Hjemmeside </label>
                    <input name="website" class="w3-border w3-input">
                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('alarmmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Rengøring modal -->
    <div class="w3-row"> </div>
    <div id="rengoeringmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('rengoeringmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for rengøring-->
                <form class="w3-container w3-animate-opacity" action="includes/createrengoeringorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('rengoeringmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Rengøring</h4>

                    <label>Kundenavn</label>
                    <input name="virksomhedsnavn" class="w3-border w3-input">

                    <label>Kontaktperson</label>
                    <input name="kontaktperson" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input name="sagsnr" class="w3-border w3-input">

                    <label>Beskrivelse</label><br>
                    <textarea name="beskrivelse" cols="100" rows="4"></textarea><br>

                    <label>Kvadratmeter</label>
                    <input name="kvadratmeter" class="w3-border w3-input">

                    <label>Type af Opgave</label>
                    <input name="typeafopgave" class="w3-border w3-input">

                    <label>Nuværende adresse</label>
                    <input name="opgaveadresse" class="w3-border w3-input">

                    <label> *Ikke obligatorisk* Hjemmeside </label>
                    <input name="website" class="w3-border w3-input">
                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('rengoeringmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Renovering modal -->
    <div class="w3-row"> </div>
    <div id="renoveringmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('renoveringmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for create renovering -->
                <form class="w3-container w3-animate-opacity" action="includes/createrenoveringorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('renoveringmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Renovering</h4>

                    <label>Adresse</label>
                    <input required name="adresse" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input required name="sagsnr" class="w3-border w3-input">

                    <label>Type af opgave</label>
                    <input required name="typeafopgave" class="w3-border w3-input">

                    <label>Beskrivelse</label><br>
                    <textarea required name="beskrivelse" cols="100" rows="4"></textarea><br>

                    <label>Book et møde</label>
                    <input type="datetime-local" name="booketmoede" class="w3-border w3-input">

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('renoveringmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobtilbud modal -->
    <div class="w3-row"> </div>
    <div id="jobtilbudmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('jobtilbudmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for Jobtilbud -->
                <form class="w3-container w3-animate-opacity" action="includes/createjobtilbudorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('jobtilbudmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Jobtilbud</h4>

                    <label>Sagsnummer</label>
                    <input required name="sagsnr" class="w3-border w3-input">

                    <label>Adresse</label>
                    <input required name="adresse" class="w3-border w3-input">

                    <label>Stilling</label>
                    <input required name="stilling" class="w3-border w3-input">

                    <label>Book et møde</label>
                    <input type="datetime-local" name="booketmoede" class="w3-border w3-input">

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('jobtilbudmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- fagforening modal -->
    <div class="w3-row"> </div>
    <div id="fagforeningmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('fagforeningmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for fagforening-->
                <form class="w3-container w3-animate-opacity" action="includes/createfagforeningorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('fagforeningmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Fagforening</h4>

                    <label>Adresse</label>
                    <input required name="adresse" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input required name="sagsnr" class="w3-border w3-input">

                    <label> Book et møde</label>
                    <input required name="booketmoede" class="w3-border w3-input">

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('fagforeningmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Kørebog modal -->
    <div class="w3-row"> </div>
    <div id="koerebogmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('koerebogmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for kørebog -->
                <form class="w3-container w3-animate-opacity" action="includes/createkoerebogorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('koerebogmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Kørebog</h4>

                    <label>Kontaktperson</label>
                    <input name="kontaktperson" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input name="sagsnr" class="w3-border w3-input">

                    <label>Beskrivelse</label><br>
                    <textarea name="beskrivelse" cols="100" rows="4"></textarea><br>

                    <label>Antal køretøjer</label>
                    <input name="antal" class="w3-border w3-input">

                    <label>Book et uforpligtende møde</label>
                    <input name="møde" type="datetime-local" class="w3-border w3-input">

                    <label>Firma adresse</label>
                    <input name="firmaadresse" class="w3-border w3-input">

                    <label> *Ikke obligatorisk* Hjemmeside </label>
                    <input name="website" class="w3-border w3-input">

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('koerebogmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Script -->
    <script src="javascript/CollapsableScript.js"></script>
    <script src="javascript/hideandshowscript.js"></script>
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
    //arrow collapse for read more
    $(document).ready(function() {
        $('.collapse-arrow').on('shown.bs.collapse', function() {
            $(this).parent().find('.fa-angle-down')
                .removeClass('fa-angle-down')
                .addClass('fa-angle-up');
        }).on('hidden.bs.collapse', function() {
            $(this).parent().find(".fa-angle-up")
                .removeClass("fa-angle-up")
                .addClass("fa-angle-down");
        });
    });
    </script>
</body>

</html>