<?php
session_start();
require( "includes/dbh.inc.php" );
// require( "includes\dbh.inc.php" );
$typeofuser = $_SESSION['typeofuser'];
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

    <title>Erhverv</title>
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
                        <li class="nav-item1 w3-button login-li">
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

        <div class="container-fluid" style="padding:0px; margin:0px; position: relative;">
            <video class="video-file align-video-erhverv" autoplay loop muted style="max-width:100%; max-height:50%;">

                <source src="Assets/erhverv.mp4" type="video/mp4">
                Your browser does not support the video tag.

                <!-- <video autoplay loop muted src="Assets/forside.mp4" style=""> -->
            </video>
            <div class="w3-center w3-display-middle">
                <div class="w3-text-white w3-animate-top w3-centered text-size">Erhverv</div>
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
    <!-- <div class="container-fluid" style="padding:0px; margin:0px; position: relative">
        <div class="w3-center w3-display-middle">
            <div class="w3-text-white w3-animate-top w3-centered text-size">Erhverv</div>
        </div>
        <video src="Assets/erhverv.mov" autoplay muted loop class="image w3-round" style="top:0;"></video>
        <div class="overlay-for-vid">
            <a href="#plans" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                    class="w3-display-bottommiddle w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom"
                    style="width: 5%"></a>
        </div>
    </div> -->

    <!-- id01 Modal Log in -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <form class="w3-container" action="includes/login.inc.php" method="post">
                <div class="w3-section">
                    <label><b>Email</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Email"
                        name="username" required>
                    <label><b>Password</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Enter Password" name="psw" required>
                    <button class="w3-button w3-block w3-green w3-section w3-padding" name="login-submit"
                        type="submit">Login</button>
                    <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me </div>
            </form>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('id01').style.display='none'" type="button"
                    class="w3-button w3-red">Cancel</button>
                <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span> </div>
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
    <!-- Hvad tilbyder vi sektion -->
    <div class="w3-row-padding" id="plans" style="position:static">
        <div class="w3-center w3-padding-32">
            <h3>Hvad tilbyder vi</h3>
            <div class="w3-padding w3-center" style="">
                <p class="w3-text-grey"><b>Hos DanPanel prøver vi at skabe struktur i din hverdag.<br> Hvilket vi kan
                        gøre, da vi har de mest kvalificerede samarbejdspartnere indenfor diverse brancher,<br> som gør,
                        at vi har en bred vifte af produkter, der kan skabe værdi hos dig. <br><br>

                        Her kan du vælge og bestille de produkter som du har brug for.<br> Du vil altid få overblik og
                        følge med de løsninger/service du vælger via DanPanel. </b></p>
            </div>
        </div>
    </div>


    <!-- <div class="container-fluid w3-margin" style="background:#EBE8E3; padding:20px 20px;">
        <div class="row menubar-desktop-container" style="display: flex; flex-direction: row; justify-content: space-between; line-height:30px; padding:0px 10px 20px 10px;" >
            <div class="col-xs-2 rekruttering-menu" style="height: 50px; width: 220px; background:#F4F2F0; padding: 10px 20px; text-align: center;">Rekruttering</div>
            <div class="col-xs-2 rekruttering-menu" style="height: 50px; width: 220px; background:#F4F2F0; padding: 10px 20px; text-align: center">Alarm og overvågning</div>
            <div class="col-xs-2 rekruttering-menu" style="height: 50px; width: 220px; background:#F4F2F0; padding: 10px 20px; text-align: center">Digitalisering</div>
            <div class="col-xs-2 rekruttering-menu" style="height: 50px; width: 220px; background:#F4F2F0; padding: 10px 20px; text-align: center">Rengøring</div>
            <div class="col-xs-2 rekruttering-menu" style="height: 50px; width: 220px; background:#F4F2F0; padding: 10px 20px; text-align: center">Erhvervslejemål</div>
        </div>
        <div class="row">
            <div class="col-xs-12" style="display:flex; justify-content: flex-start; padding: 10px 10px; background-color:#1E3E87; width: 100%">
                <img class="rounded-circle" style="background-color: blue; height:40px; margin-right: 10px;" src="Assets/rekruttering-logo.png">
                <div style="background: gren; height:50px; color: white; font-size: 30px;">REKRUTTERING</div>
            </div>
        </div>
        <div class="row" style="display: flex">
            <div class="column"  style="flex:25%; padding:10px;">
            <a href="#"> <img src="Assets/Alm. REkruttering.jpeg" alt="Snow" style="width:100%; height: 300px"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alm. REkruttering.jpeg" alt="Forest" style="width:100%; height: 300px;"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alm. REkruttering.jpeg" alt="Mountains" style="width:100%; height: 300px;"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alm. REkruttering.jpeg" alt="Mountains" style="width:100%; height: 300px;"> </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12" style="display:flex; justify-content: flex-start; padding: 10px 10px; background-color:#D268AA; width: 100%">
                <img class="rounded-circle" style="background-color: lue; height:40px; margin-right: 10px;" src="Assets/Alarm_logo.png">
                <div style="background: gren; height:50px; color: white; font-size: 30px;">ALARM</div>
            </div>
        </div>
        <div class="row" style="display: flex">
            <div class="column"  style="flex:25%; padding:10px;">
            <a href="#"> <img src="Assets/Alarm-system.jpeg" alt="Snow" style="width:100%; height: 300px"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alarm-system.jpeg" alt="Forest" style="width:100%; height: 300px;"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alarm-system.jpeg" alt="Mountains" style="width:100%; height: 300px;"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alarm-system.jpeg" alt="Mountains" style="width:100%; height: 300px;"> </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12" style="display:flex; justify-content: flex-start; padding: 10px 10px; background-color:#4A96B6; width: 100%">
                <img class="rounded-circle" style="background-color: lue; height:40px; margin-right: 10px;" src="Assets/digitalisering-logo.png">
                <div style="background: gren; height:50px; color: white; font-size: 30px;">DIGITALISERING</div>
            </div>
        </div>
        <div class="row" style="display: flex">
            <div class="column"  style="flex:25%; padding:10px;">
            <a href="#"> <img src="Assets/DigitaliseringNy.png" alt="Snow" style="width:100%; height: 300px"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/DigitaliseringNy.png" alt="Forest" style="width:100%; height: 300px;"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/DigitaliseringNy.png" alt="Mountains" style="width:100%; height: 300px;"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/DigitaliseringNy.png" alt="Mountains" style="width:100%; height: 300px;"> </a>
            </div>
        </div>
 

        <div class="row" style="display: flex; flex-direction: row; justify-content: space-around; margin:10px 0px; line-height:px;">
            <img class="col-xs-3" style="width:260px; height:300px; margin:10px;" src="Assets/Alarm-system.jpeg">
            <img class="col-xs-3" style="width:260px; height:300px; margin:10px;" src="Assets/Alarm-system.jpeg">
            <img class="col-xs-3" style="width:260px; height:300px; margin:10px;" src="Assets/Alarm-system.jpeg">
            <img class="col-xs-3" style="width:260px; height:300px; margin:10px;" src="Assets/Alarm-system.jpeg">
        </div>

    </div>

</div> -->


    <div class="container-fluid" style="background:#EBE8E3; padding: 20px 10%;">
        <div class="row menubar-desktop-container"
            style="display: flex; flex-direction: row; justify-content: space-betwee; line-height; padding:0px 10px 20px 10px;">
            <div class="col-xs-2 rekruttering-menu"
                style="height: 50px; width: 19.5%; background:#F4F2F0; padding: 12px 20px; margin:3px; justify-content:center; text-align: center;">
                <a href="#Rekruttering-erhverv"> Rekruttering</a></div>
            <div class="col-xs-2 rekruttering-menu"
                style="height: 50px; width: 19.5%; background:#F4F2F0; padding: 12px 20px; margin:3px; text-align: center">
                <a href="#Erhvervslejemål-erhverv"> Erhvervslejemål</a></div>
            <div class="col-xs-2 rekruttering-menu"
                style="height: 50px; width: 19.5%; background:#F4F2F0; padding: 12px 20px; margin:3px; text-align: center">
                <a href="#Digitalisering-erhverv">
                    Digitalisering </a></div>
            <div class="col-xs-2 rekruttering-menu"
                style="height: 50px; width: 19.5%; background:#F4F2F0; padding: 12px 20px; margin:3px; text-align: center">
                <a href="#Kaffeløsning-erhverv"> Kaffeløsning </a>
            </div>
            <div class="col-xs-2 rekruttering-menu"
                style="height: 50px; width: 19.5%; background:#F4F2F0; padding: 12px 20px; margin:3px; text-align: center">
                <a href="#Rengøring-erhverv"> Rengøring</a></div>
        </div>
        <div class="row" id="Rekruttering-erhverv">
            <div class="col-xs-12 product-category-rekruttering" style="">
                <img class="rounded-circle product-category-icon" style="" src="Assets/rekruttering-icon.png">
                <div class="product-category-title" style="">REKRUTTERING
                </div>
            </div>
        </div>
        <div class="row">
            <div class="w3-quarter" style="mar">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/rekruttering.png"
                        style="height:; width: 80%;">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Grundig screening
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Referencer på alle cv’er
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Konkurrence dygtige priser
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Min. 14 dages garanti
                        </p>
                    </div>

                    <div class="tilbudLaasmereContainer">
                        <?php
                    
                     if(!isset($_SESSION['uid'])){
                        echo "<div class=\"m-2 btn-fåTilbud\"
                                onClick=\"document.getElementById('pricemodalrekruttering').style.display='block'\">Se pris
                        </div>";

                        // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                        //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                        
                        //  </div>";
                     }else {
                         if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                         {
                     echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                         }
                     else {
                         if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                        echo '<script language="javascript">';
                        // echo 'alert("Du er nu logget ind")';
                        echo 'alert("you need to create business account to get offer!!")';
                        echo '</script>';
                        // echo 'alert("you need to create business account to get offer!!")';
                        echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                     }
                        // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                        // class=\"w3-button w3-bar-item">Få tilbud</a>';
                     }
                     ?>


                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereRekruttering" aria-expanded="false"
                            aria-controls="CollapseLessMereRekruttering">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none"></i>
                            <!-- <span class="glyphicon glyphicon-menu-up" style="display:none"></span> -->
                        </div>
                    </div>
                    <div class="collapse collapse-arrow multi-collapse w3-padding" id="CollapseLessMereRekruttering">
                        <p> <b>Rekruttering:</b> <br>
                            DanPanel tilbyder unikke løsninger inden for rekruttering gennem vore samarbejdspartnere. Vi
                            bestræber
                            os på at forberede kandidaterne til deres nye job og matche jeres kriterier med
                            kandidaternes kompetencer.
                            Vi opererer med en palette af kunder fordelt på flere brancher.
                            <br><br>

                            De, der rekrutteres, vil sammen med den rekrutteringsansvarlige gennemgå et workshopforløb,
                            som styrker kandidaten i kommunikation og motivation inden endelig samtale med kunden.

                        </p>

                    </div>
                </ul>
            </div>

            <div class="w3-quarter">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Interim.png"
                        style="height: ; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Ansættelse i det tidsrum du ønsker
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Garanteret arbejdskraft i perioden
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Grundig screening
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Referencer på alle CV’er
                        </p>
                        <!-- <p class="serviceSubHeadLineText-li">
                            Aflønning efter Dansk overenskomst
                        </p> -->
                    </div>

                    <div class="tilbudLaasmereContainer">
                        <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalinterim').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>

                        <!-- onClick="document.getElementById('vikarmodal').style.display='block'" class="m-2 btn-fåTilbud"> -->
                        <!-- Få tilbud</div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereInterim" aria-expanded="false"
                            aria-controls="CollapseLessMereInterim">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow multi-collapse w3-padding" id="CollapseLessMereInterim">
                        <p> <b>Interim:</b> <br>
                            Vi håndterer interim ansættelser for vore kunder gennem vore samarbejdspartnere.
                            Det er op til kunden efter samtale med kandidaten at planlægge ansættelsens varighed.
                            I tilfælde af sygdom fra den ansattes side sørger vi gennem vore samarbejdspartnere at
                            finde en tiltræder med samme kompetencer, således at kunden ikke er foruden arbejdsskaft
                            i den aftalte periode. Vi sørger for at kandidaten er kompetent efter nøje screening og
                            gode referencer på CV’et. Aflønning foregår efter Dansk overenskomst og er baseret på
                            kandidatens kompetencer.
                        </p>
                    </div>
                </ul>
            </div>

            <div class="w3-quarter">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Freelance.png"
                        style="height:; width: 80%">
                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Selvstændig udførelse til perfektion
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Udvælgelse efter dit budget
                        </p>
                        <!-- <p class="serviceSubHeadLineText-li">
                            Pris afhænger af kompetencer
                        </p> -->
                        <p class="serviceSubHeadLineText-li">
                            Pris afhænger af kompetencer
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Referencer på alle CV’er
                        </p>
                    </div>

                    <div class="tilbudLaasmereContainer">
                        <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalfreelance').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>

                        <!-- onClick="document.getElementById('vikarmodal').style.display='block'" class="m-2 btn-fåTilbud"> -->
                        <!-- Få tilbud</div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereFreelance" aria-expanded="false"
                            aria-controls="CollapseLessMereFreelance">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none"></i>
                            <!-- <span class="glyphicon glyphicon-menu-up" style="display:none"></span> -->
                        </div>
                    </div>

                    <div class="collapse collapse-arrow multi-collapse w3-padding" id="CollapseLessMereFreelance">
                        <p> <b>Freelance:</b> <br>
                            Hvordan vælger du den rigtige freelancer til opgaven? <br>
                            Vi hjælper dig med at finde den rette freelancer, så du kan fokusere på det som er vigtigt
                            for dig, mens freelanceren arbejder selvstændigt med de opgaver du uddelegerer.<br><br>

                            Ønskes freelance som løsning til et arbejdsprojekt, er vi behjælpelige med denne opgave. Går
                            du og tænker ”Hvordan vælger jeg den rette kandidat til denne freelance opgave?”, så skal du
                            ikke være bekymret. Vi hjælper med at finde den rette freelancer, så du kan prioritere det,
                            der er vigtigt for dig. Alt imens freelanceren selvstændigt udfører den uddelegerede opgave.
                            Vi screener gennem vore samarbejdspartnere databasen for den freelancer, der opfylder dine
                            behov. Prisen afhænger af kandidatens kompetencer.


                        </p>

                    </div>
                </ul>
            </div>

            <div class="w3-quarter">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Vikariat.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Grundig screening
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Referencer på alle cv’er
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Konkurrence dygtige priser
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Aflønnet efter Dansk Overenskomst
                        </p>
                    </div>

                    <div class="tilbudLaasmereContainer">
                        <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalvikariat').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>

                        <!-- onClick="document.getElementById('vikarmodal').style.display='block'" class="m-2 btn-fåTilbud"> -->
                        <!-- Få tilbud</div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereVikariat" aria-expanded="false"
                            aria-controls="CollapseLessMereVikariat">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none"></i>
                            <!-- <span class="glyphicon glyphicon-menu-up" style="display:none"></span> -->
                        </div>
                    </div>

                    <div class="collapse collapse-arrow multi-collapse w3-padding" id="CollapseLessMereVikariat">
                        <p> <b>Vikariat:</b> <br>
                            De ansatte, som får uddelegeret en opgave, er altid klædt på i det rette tøj og værktøjer.
                            Vore kunder er alt fra mindre virksomheder til de større koncerner. Vi imødekommer jeres
                            behov for den rette kandidat med de rette kompetencer. Alle ansatte gennem vores
                            samarbejdspartnere har gode referencer og er blevet screenet, før vi sender dem ud til vore
                            kunder. Vi er i konstant dialog med dem, der er på opgave.

                        </p>

                    </div>
                </ul>
            </div>
        </div>

        <div class="row" id="Erhvervslejemål-erhverv">
            <div class="col-xs-12 product-category-erhvervslejemal" style="">
                <img class="rounded-circle product-category-icon" style="" src="Assets/erhvervslejemål-icon.png">
                <div class="product-category-title" style="">ERHVERVSLEJEMÅL</div>
            </div>
        </div>

        <div class="row">
            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">

                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/kontorplads.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li"> Kontormiljø
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kontorfællesskab
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Services og faciliteter
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Vidensdeling
                        </p>
                    </div>


                    <div class="tilbudLaasmereContainer">

                        <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalkontorplads').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereKontorplads" aria-expanded="false"
                            aria-controls="CollapseLessMereKontorplads">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKontorplads">
                        <p> <b> Kontorplads?</b> <br>
                            Vi er i tæt samarbejde med Danmarks største kontorhotelkæde, hvor du som lejer får adgang
                            til over
                            20 afdelinger i hele Danmark. Vores samarbejdspartner har samlet services og faciliteter på
                            deres kontorhoteller.
                            Alle disse stilles til rådighed til virksomheder med kontor hos dem. Dermed kan virksomheder
                            fokusere på det, som er vigtigt
                            for deres forretning.

                            <br>
                            Blandt de services og faciliteter der udbydes er rengøring af fællesarealer,
                            gratis internet, mødelokaler, køkkenfacilitet, frokostordninger mv. Virksomheder med kontor
                            hos vores
                            samarbejdspartner bliver en del af et kontormiljø – og fællesskab. Konceptet byder på at
                            virksomheder kan
                            sparre med hinanden, dele viden og bidrage til fællesskabet. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">

                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/lager-hotel.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li"> Pluk og Pak
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Ordrehåndtering
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Opbevaring
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Forsendelse
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">

                        <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalkontorplads').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>


                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereLagerHotel" aria-expanded="false"
                            aria-controls="CollapseLessMereLagerHotel">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereLagerHotel">
                        <p> <b> Lagerhotel</b> <br>
                            Vi er i tæt samarbejde med Danmarks største kontorhotelkæde, hvor du som lejer
                            får adgang til over 20 afdelinger i hele Danmark. Vores samarbejdspartner har samlet
                            services og
                            faciliteter på deres kontorhoteller. Alle disse stilles til rådighed til virksomheder med
                            kontor hos dem.
                            Dermed kan virksomheder fokusere på det, som er vigtigt for deres forretning. <br>

                            Et lagerhotel er ideelt til dig, der gerne vil have opbevaret inventar, men ikke har
                            lagerfaciliteten til det. Det er billigere at opbevarer produkter, maskiner mv. i et
                            lagerhotel end
                            selv at etablere et lager. Ligeledes er et lagerhotel en løsning til dig med en webshop.
                            Lagerhoteller i
                            dag kan tilbyde opbevaring, pluk og pak, forsendelse, håndtering af returordre mv. Du sparer
                            tid,
                            penge og kræfter og fokusere kun på din webshop. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm3
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/dropin-kontor.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li"> Professionel firmaadresse
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis internet
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis parkering
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Mulighed for tilkøb
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                        <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodaldropinkonto').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>

                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereDropIn" aria-expanded="false"
                            aria-controls="CollapseLessMereDropIn">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereDropIn">
                        <p> <b> Drop in</b> <br>
                            Vi er i tæt samarbejde med Danmarks største kontorhotelkæde, hvor du som lejer får adgang
                            til over 20 afdelinger i hele Danmark. Vores samarbejdspartner har samlet services og
                            faciliteter på
                            deres kontorhoteller. Alle disse stilles til rådighed til virksomheder med kontor hos dem.
                            Dermed kan virksomheder fokusere på det, som er vigtigt for deres forretning.<br>

                            Med drop-in får du nem adgang til et kontor. Denne kontorløsning tilbydes med adgang til 17
                            kontorhoteller fordelt i hele Danmark. Vores samarbejdspartner sørger for professionel
                            firmaadresse
                            og god internetforbindelse. Som lejer hos vores samarbejdspartner får du adgang til gratis
                            parkering
                            og fællesarealer som køkken, kantine, toiletter mv.
                            Skulle din virksomhed have behov for andet, er det muligt med tilkøb til drop-in. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm4
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/lukket-kontor.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Kontormiljø
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kontorfællesskab
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Services og faciliteter
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Vidensdeling
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                        <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodallukketkontor').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereLukketKontor" aria-expanded="false"
                            aria-controls="CollapseLessMereLukketKontor">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereLukketKontor">
                        <p> <b> Lukket kontor</b> <br>
                            Vi er i tæt samarbejde med Danmarks største kontorhotelkæde, hvor du som lejer får adgang
                            til over 20
                            afdelinger i hele Danmark. Vores samarbejdspartner har samlet services og faciliteter på
                            deres kontorhoteller.
                            Alle disse stilles til rådighed til virksomheder
                            med kontor hos dem. Dermed kan virksomheder fokusere på det, som er vigtigt for deres
                            forretning. <br><br>

                            Vores samarbejdspartner byder på 25 fordele ved at leje sig ind hos dem. Blandt de services
                            og faciliteter der udbydes er rengøring af fællesarealer, gratis internet, mødelokaler,
                            køkkenfacilitet, frokostordninger mv. Virksomheder med kontor hos vores samarbejdspartner
                            bliver en del af et kontormiljø – og fællesskab. Konceptet byder på at virksomheder kan
                            sparre med hinanden, dele viden og bidrage til fællesskabet.
                        </p>
                    </div>

                </ul>
            </div>

        </div>
        <!-- <div class="row" style="display: flex">
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alarm-system.jpeg" alt="Snow" style="width:100%; height: 300px"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alarm-system.jpeg" alt="Forest" style="width:100%; height: 300px;"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alarm-system.jpeg" alt="Mountains" style="width:100%; height: 300px;">
                </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/Alarm-system.jpeg" alt="Mountains" style="width:100%; height: 300px;">
                </a>
            </div>
        </div> -->

        <div class="row" id="Digitalisering-erhverv">
            <div class="col-xs-12 product-category-digitalisering" style="">
                <img class="rounded-circle product-category-icon" style="" src="Assets/Digitalisering-icon.png">
                <div class="product-category-title" style="">DIGITALISERING</div>
            </div>
        </div>
        <div class="row">
            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">

                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/HTML-CSS-PHP.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Optimering/opbygning af HTML
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Optimering/opbygning af CSS
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Optimering/opbygning af JavaScript
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Optimering/opbygning af PHP
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalhtmlcssphp').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereHtmlCssJSPhp" aria-expanded="false"
                            aria-controls="CollapseLessMereHtmlCssJSPhp">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereHtmlCssJSPhp">
                        <p> <b> HTML, CSS, JavaScript & PHP</b> <br>
                            Hos DanPanel kan vi hjælpe dig med din webside. HTML (HyperText Markup Language) er en
                            betegnelse for din hjemmesides byggesten. Indholdsdannelse med HTML muliggør at du kan
                            fremvise
                            billeder, tekstindhold, videoer, formularer mv. Alt hvad der ses og læses på websiden er
                            dannet med HTML.
                            CSS (Cascading Style Sheets) er med til at diktere udseendet samt fornemmelsen, når du har
                            besøgende på siden.
                            Skriftsstørelse-, -farve, -type og styling bestemmes af CSS og ligeledes også effekter når
                            den besøgende
                            fører musen over billeder, knapper mv. PHP (Personal Home Page) er funktionaliteten på din
                            side. Kodning
                            hertil gør at der sker ting på din side. Eksempelvis hvis din side er udstyret med et
                            søgefelt, så er
                            det PHP delen der muliggør at der søges på siden og et resultat fremvises af det søgte.
                            DanPanel
                            kan grundet sit samarbejde med udbydere af disse hjælpe med at optimere, opbygge og opdatere
                            disse ting. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">

                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round"
                        src="Assets/logo-design-og-billedredigering.png" style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Ubegrænsede revisoner
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Høj kvalitet (resolution)
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Flere filformater
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Flere koncepter
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodallogodesign').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereLogoDesign" aria-expanded="false"
                            aria-controls="CollapseLessMereLogoDesign">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow  w3-padding" id="CollapseLessMereLogoDesign">
                        <p> <b> Logo design og billedredigering </b> <br>
                            DanPanel er i tæt samarbejde med freelancere, der har erfaring med logo design i høj
                            kvalitet og billedredigering. Kunden kan tilsende idéer til logo og brand navn, hvorefter
                            skitsering af logo vil finde sted i tæt samarbejde med designeren. Næste led er at tegne
                            logoet i de respektive formater, således at det kan anvendes efter kundens behov. Kundens
                            tilfredshed med logoets design er vores prioritet og resultatet godkendes af kunden før
                            levering af produkt. Hvis kunden har produkter, som ønskes klarlagt til
                            reklame eller billeder til websiden mv., kan det ligeledes administreres. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm3
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/SEM.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Paid Search
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Google Ads
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Facebook Ads
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Display Ads
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalsem').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereSEM" aria-expanded="false"
                            aria-controls="CollapseLessMereSEM">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereSEM">
                        <p> <b> SEM</b> <br>
                            SEM er forkortelsen for Search Engine Marketing. Begrebet dækker over digital markedsføring
                            på søgemaskiner som Google, Bing og Yahoo. Oftest dækker begrebet kun annoncering på
                            søgemaskiner,
                            men betegnelsen dækker også for betalt annoncering. Det kan være annoncering på medier som
                            Facebook,
                            Instagram, YouTube mv. I samarbejde med vores partnere tilbydes et skræddersyet program
                            bestående af
                            en marketingplan for SEM-kampagner, der hjælper vores kunder med at blive eksponeret på de
                            digitale platforme. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm4
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/SEO.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Content marketing
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Keywords optimering
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Organisk trafik til websiden
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Højere rangering
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalseo').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereSEO" aria-expanded="false"
                            aria-controls="CollapseLessMereSEO">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereSEO">
                        <p> <b> SEO</b> <br>
                            SEO er forkortelsen for Search Engine Optimization. Begrebet dækker over optimering af
                            hjemmeside indhold, således at hjemmesiden kan rangeres højere på søgemaskiner som Google,
                            Bing og Yahoo.
                            Indhold på hjemmesiden skal gøres relevant, når det sættes op mod brugernes søgninger.
                            Modsat SEM er SEO
                            organisk trafik til din hjemmeside, hvorfor du ikke betaler for at folk klikker ind på din
                            side. <br> Gennem
                            samarbejde med vores partnere kan en plan skræddersyes til din hjemmeside. Dette kan baseres
                            på din branche,
                            dine produkter mv. i forbindelse med søgeordsoptimering (Keywords). En plan skal sættes for
                            hvilke keywords
                            hjemmesiden skal indeholde. Hvis du ved hvad dine kunder søger efter kan hjemmesidens
                            indhold
                            gøres relevant, og organisk trafik kan øges. </p>
                    </div>

                </ul>
            </div>

        </div>
        <div class="row">
            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">

                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round"
                        src="Assets/tekstforfatning-og-blog.png" style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Content Marketing
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Blog indlæg
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Relevant indhold
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Relevante søgeord
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodaltekstforfatning').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereTekstforfatningBlog" aria-expanded="false"
                            aria-controls="CollapseLessMereTekstforfatningBlog">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereTekstforfatningBlog">
                        <p> <b> Tekstforfatning og Blog</b> <br>
                            Tekstforfatning og blog indlæg er i forbindelse digital marketing blevet et vigtigt element
                            i at eksponere din hjemmeside i søgemaskinerne. Dette er også betegnet som Content
                            marketing,
                            hvor indhold på siden gøres relevant for brugerne. Søgemaskiner indekserer indhold på din
                            hjemmeside
                            til at eksponere det for brugeren, der søger efter et produkt, et begreb, en frase mv. Det
                            er derfor
                            vigtigt at have relevant indhold på siden. Blog indlæg om din branche, dine produkter, dine
                            succescases,
                            søgeord som dine potentielle kunder anvender mm. kan medvirke til at brugere finder det
                            denne søgte. Hvilket
                            gør din side relevant og påvirker rangeringen af din webside. DanPanel kan tilbyde
                            freelancere til
                            tekstforfatning og blog indlæg. En plan udarbejdes, så der konstant kommer nyt og relevant
                            indhold på din side.
                            Jo mere og længere tid brugerne tilbringer på din side, desto bedre er det for rangeringen
                            af din side. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">

                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round"
                        src="Assets/vedligeholdelse-af-hjemmeside.png" style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Skræddersyet program
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Ajourført side
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Planlægning
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Marketingplan
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalvedligeholdelse').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereVedligeholdelseHjemmeside" aria-expanded="false"
                            aria-controls="CollapseLessMereVedligeholdelseHjemmeside">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow  w3-padding" id="CollapseLessMereVedligeholdelseHjemmeside">
                        <p> <b> Vedligeholdelse af hjemmeside </b> <br>
                            o Dette produkt er en kombination af de øvrige digitaliseringsprodukter. Alt efter kundens
                            behov
                            sammensættes en pakkeløsning. Kunden kan have behov for SEO, Tekstforfatning og
                            Billedredigering.
                            Til dette vil en pakkeløsning fremlægges. Ydermere kan vedligeholdelse omfatter
                            også din hjemmesides back-end og front, således at din side holdes ajour. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm3
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Webdesign.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Design
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Funktioner
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Brugervenlighed
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Appeller til din målgruppe
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalwebdesign').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereWebdesign" aria-expanded="false"
                            aria-controls="CollapseLessMereWebdesign">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereWebdesign">
                        <p> <b> Webdesign</b> <br>
                            Webdesign består af flere færdigheder og discipliner. Hos DanPanel kan vi tilbyde webdesign
                            til dig,
                            der ønsker grafisk design til din webside, interface design, kodning på din side, layout,
                            CTA’er mm.
                            Vi vægter brugeroplevelsen med din websides udseende og anvendelse højt, så det appellerer
                            til din målgruppe.
                            Vi samarbejder tæt med kunden og vores partnere, så du får opfyldt dine ønsker om udseende,
                            indhold og
                            funktioner på din webside. CTA’er oprettes, og siden gøres responsiv til nemmere navigering
                            på diverse enheder.
                            Vi hjælper dig med at skabe en tilfredsstillende front-end
                            side til dine klienter, og en brugervenlig back-end til dig, så du let kan styre din
                            webside. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm4
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/wordpress-CMS.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Responsiv webside
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Brugervenligt
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Plug-ins
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Let betjenelig og vedligeholdelse
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalwordpress').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereWordpressCMS" aria-expanded="false"
                            aria-controls="CollapseLessMereWordpressCMS">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereWordpressCMS">
                        <p> <b> Wordpress CMS</b> <br>
                            Wordpress anvendes i dag af mange, der har en webside. Wordpress er blandt de mest
                            velkendte systemer, og det kendetegnes som et open source blogsystem med CMS, der er skrevet
                            i PHP. Hos DanPanel kan vi hjælpe dig med at oprette en wordpress side, med det indhold du
                            ønsker. Vi hjælper dig med at oprette en side, når du har dit domæne, og installerer de
                            plug-ins du ønsker. I tæt dialog med dig vælges temaer, funktioner og plug-ins, så dit
                            behov imødekommes. Dernæst kan vores mandskab hjælpe med kodning efter behov samt CSS.
                            CSS (Cascading Style Sheets) er med til at diktere udseendet samt fornemmelsen, når du
                            har besøgende på siden. Skriftsstørelse-, -farve, -type og styling bestemmes
                            af CSS og ligeledes også effekter når den besøgende fører musen over billeder, knapper mv.
                        </p>
                    </div>

                </ul>
            </div>

        </div>
        <!-- <div class="row" style="display: flex">
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/DigitaliseringNy.png" alt="Snow" style="width:100%; height: 300px"> </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/DigitaliseringNy.png" alt="Forest" style="width:100%; height: 300px;">
                </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/DigitaliseringNy.png" alt="Mountains" style="width:100%; height: 300px;">
                </a>
            </div>
            <div class="column" style="flex:25%; padding:10px;">
                <a href="#"> <img src="Assets/DigitaliseringNy.png" alt="Mountains" style="width:100%; height: 300px;">
                </a>
            </div>
        </div> -->

        <div class="row" id="Kaffeløsning-erhverv">
            <div class="col-xs-12 product-category-kaffelosning" style="">
                <img class="rounded-circle product-category-icon" style="" src="Assets/kaffeløsninger-icon.png">
                <div class="product-category-title">KAFFELØSNING</div>
            </div>
        </div>

        <div class="row">
            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">

                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/kaffeløsninger.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Friskbrygget kaffe
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Flere valgmuligheder
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Ingen bekymringer om mangel på kaffe
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kan fås på abonnement
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalkaffelosninger').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereKaffeløsning" aria-expanded="false"
                            aria-controls="CollapseLessMereKaffeløsning">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKaffeløsning">
                        <p> <b> Kaffeløsning</b> <br>
                            Erhvervslivet byder på mange ting, men starter med en kop kaffe om morgenen.
                            Ønsker din virksomhed dejlig brygget kaffe fra en maskine, så har vi den rette kaffeløsning
                            til jer.
                            DanPanel kan i samarbejde med sin partner tilbyde en kaffeløsning til din virksomhed.
                            Vi tilbyder en række kaffeordninger alt efter det behov de måtte være. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">

                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/kaffe.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Frisk kaffe og te
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Bredt udvalg
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Bestil efter behov
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Mulighed for abonnement
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalkaffe').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereKaffeogTe" aria-expanded="false"
                            aria-controls="CollapseLessMereKaffeogTe">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow  w3-padding" id="CollapseLessMereKaffeogTe">
                        <p> <b> Kaffe og Te </b> <br>
                            Hvis du har en kaffeløsning og ønskeret kaffeabonnement, kan DanPanel levere kaffe
                            og te til din virksomhed. Vi har et bredt udvalg og levere alt efter jeres behov. Frisk
                            kaffe både bønner men også kværnet. Kaffe og te kan bestilles løbende eller
                            sættes på abonnement, så din virksomhed ikke løber tør. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm3
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/te.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Rent arbejdsmiljø
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetskontrol
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetsstyring
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Professionel udførelse
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalte').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereRengoringErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereRengoringErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereRengoringErhverv">
                        <p> <b> Rengøring (erhverv)</b> <br>
                            Skal din virksomhed have en solid rengøringsaftale? DanPanel har aftaler med professionelle
                            rengøringsfolk
                            med mange års erfaring. Få en rengøring af høj kvalitet via vores samarbejdspartnere, der
                            har til formål
                            at yde en god service, kvalitet og et rent arbejdsmiljø, uden at det behøver at koste en
                            formue. <br>

                            De daglige ledere sørger for kvalitetskontrol og -styring, og de sikrer jer en god aftale.
                            Få skræddersyet en rengøringsløsning efter virksomhedens behov med mulighed for fast aftale
                            eller en engangsrengøring/oprydning. Vores samarbejdspartnere er specialister inden for
                            rengøring hos
                            små som store virksomheder, kontorlandskaber, institutioner,
                            butikker, lagre, byggepladser mm. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm4
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/partner-glaad-dig.png"
                        style="height:; width: 80%">
                    <div style="height:120px"></div>

                    <!-- <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li"> Professionel firmaadresse
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis internet
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis parkering
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Mulighed for tilkøb
                        </p>
                    </div> -->
                    <div class="tilbudLaasmereContainer">
                        <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Bliv partner
                        </div>
                        <!-- <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereKørebogErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereKørebogErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div> -->
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKørebogErhverv">
                        <p> <b> Kørebog (erhverv)</b> <br>
                            Vores samarbejdspartner er en førende udvikler og leverandør af GPS tracking, flådestyring,
                            elektronisk kørebog, realtids visning samt udstyr
                            til opgavehåndtering. <br>
                            En GPS tracking enhed er en smart løsning til dig, der vil skabe et overblik over
                            erhvervsmæssige
                            kørsler med en elektronisk kørebog. Enheden dokumenterer per automatik alle kørsler via GPS
                            i realtid.
                            Hold styr på din flåde med flådestyring. Du kan med præcision dokumenterer, hvor dit/dine
                            køretøjer
                            har været. Indsaml data til dokumentering for at overholde skattemæssige lovkrav. Sikre din
                            kørselsgodtgørelse og spar penge ved at reducere omkostninger til kørsel og drift,
                            så det kan ses på bundlinjen. </p>
                    </div>

                </ul>
            </div>

        </div>

        <div class="row" id="Rengøring-erhverv">
            <div class="col-xs-12 product-category-rengoring" style="">
                <img class="rounded-circle product-category-icon" style="" src="Assets/rengoring-icon.png">
                <div class="product-category-title" style="">RENGØRING</div>
            </div>
        </div>

        <div class="row">
            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5 col">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm3
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/rengøring-Erhverv.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Rent arbejdsmiljø
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetskontrol
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetsstyring
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Professionel udførelse
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalrengoring').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få
                            tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereRengoringErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereRengoringErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereRengoringErhverv">
                        <p> <b> Rengøring (erhverv)</b> <br>
                            Skal din virksomhed have en solid rengøringsaftale? DanPanel har aftaler med professionelle
                            rengøringsfolk
                            med mange års erfaring. Få en rengøring af høj kvalitet via vores samarbejdspartnere, der
                            har til formål
                            at yde en god service, kvalitet og et rent arbejdsmiljø, uden at det behøver at koste en
                            formue. <br>

                            De daglige ledere sørger for kvalitetskontrol og -styring, og de sikrer jer en god aftale.
                            Få skræddersyet en rengøringsløsning efter virksomhedens behov med mulighed for fast aftale
                            eller en engangsrengøring/oprydning. Vores samarbejdspartnere er specialister inden for
                            rengøring hos
                            små som store virksomheder, kontorlandskaber, institutioner,
                            butikker, lagre, byggepladser mm. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5 coll">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm3
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/partner-glaad-dig.png"
                        style="height:; width: 80%">

                    <div style="height:105px"></div>
                    <!-- <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Rent arbejdsmiljø
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetskontrol
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetsstyring
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Professionel udførelse
                        </p>
                    </div> -->
                    <div class="tilbudLaasmereContainer">
                        <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Bliv partner
                        </div>
                        <!-- <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereRengoringErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereRengoringErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div> -->
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereRengoringErhverv">
                        <p> <b> Rengøring (erhverv)</b> <br>
                            Skal din virksomhed have en solid rengøringsaftale? DanPanel har aftaler med professionelle
                            rengøringsfolk
                            med mange års erfaring. Få en rengøring af høj kvalitet via vores samarbejdspartnere, der
                            har til formål
                            at yde en god service, kvalitet og et rent arbejdsmiljø, uden at det behøver at koste en
                            formue. <br>

                            De daglige ledere sørger for kvalitetskontrol og -styring, og de sikrer jer en god aftale.
                            Få skræddersyet en rengøringsløsning efter virksomhedens behov med mulighed for fast aftale
                            eller en engangsrengøring/oprydning. Vores samarbejdspartnere er specialister inden for
                            rengøring hos
                            små som store virksomheder, kontorlandskaber, institutioner,
                            butikker, lagre, byggepladser mm. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5 coll">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm3
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/partner-glaad-dig.png"
                        style="height:; width: 80%">
                    <div style="height:105px"></div>
                    <!-- <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Rent arbejdsmiljø
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetskontrol
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetsstyring
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Professionel udførelse
                        </p>
                    </div> -->
                    <div class="tilbudLaasmereContainer">
                        <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Bliv partner
                        </div>
                        <!-- <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereRengoringErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereRengoringErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div> -->
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereRengoringErhverv">
                        <p> <b> Rengøring (erhverv)</b> <br>
                            Skal din virksomhed have en solid rengøringsaftale? DanPanel har aftaler med professionelle
                            rengøringsfolk
                            med mange års erfaring. Få en rengøring af høj kvalitet via vores samarbejdspartnere, der
                            har til formål
                            at yde en god service, kvalitet og et rent arbejdsmiljø, uden at det behøver at koste en
                            formue. <br>

                            De daglige ledere sørger for kvalitetskontrol og -styring, og de sikrer jer en god aftale.
                            Få skræddersyet en rengøringsløsning efter virksomhedens behov med mulighed for fast aftale
                            eller en engangsrengøring/oprydning. Vores samarbejdspartnere er specialister inden for
                            rengøring hos
                            små som store virksomheder, kontorlandskaber, institutioner,
                            butikker, lagre, byggepladser mm. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5 coll">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm3
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/partner-glaad-dig.png"
                        style="height:; width: 80%">
                    <div style="height:105px"></div>
                    <!-- <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li">
                            Rent arbejdsmiljø
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetskontrol
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Kvalitetsstyring
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Professionel udførelse
                        </p>
                    </div> -->
                    <div class="tilbudLaasmereContainer">
                        <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Bliv partner
                        </div>
                        <!-- <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereRengoringErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereRengoringErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div> -->
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereRengoringErhverv">
                        <p> <b> Rengøring (erhverv)</b> <br>
                            Skal din virksomhed have en solid rengøringsaftale? DanPanel har aftaler med professionelle
                            rengøringsfolk
                            med mange års erfaring. Få en rengøring af høj kvalitet via vores samarbejdspartnere, der
                            har til formål
                            at yde en god service, kvalitet og et rent arbejdsmiljø, uden at det behøver at koste en
                            formue. <br>

                            De daglige ledere sørger for kvalitetskontrol og -styring, og de sikrer jer en god aftale.
                            Få skræddersyet en rengøringsløsning efter virksomhedens behov med mulighed for fast aftale
                            eller en engangsrengøring/oprydning. Vores samarbejdspartnere er specialister inden for
                            rengøring hos
                            små som store virksomheder, kontorlandskaber, institutioner,
                            butikker, lagre, byggepladser mm. </p>
                    </div>

                </ul>
            </div>

        </div>


        <div class="row" id="Elektronisk-kørebog">
            <div class="col-xs-12 product-category-korebog" style="">
                <img class="rounded-circle product-category-icon" style="" src="Assets/korebog-system-icon.png">
                <div class="product-category-title" style="">ELEKTRONISK KØREBOG</div>
            </div>
        </div>

        <div class="row" style="display:flex1;">
            <div class="w3-quarter w3-margin-bottom coll">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5 ">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm4
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/elektronisk-kørebog.png"
                        style="height:; width: 80%">

                    <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li"> Professionel firmaadresse
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis internet
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis parkering
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Mulighed for tilkøb
                        </p>
                    </div>
                    <div class="tilbudLaasmereContainer">
                    <?php
                    
                    if(!isset($_SESSION['uid'])){
                       echo "<div class=\"m-2 btn-fåTilbud\"
                               onClick=\"document.getElementById('pricemodalelektronisk').style.display='block'\">Se pris
                       </div>";

                       // echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud-medKonto\" style='padding:5px'>
                       //  <div onClick=\"document.getElementById('signup').style.display='block';\"><b>Med Kundekonto</b><br> pris:XXX  ex.moms<br> </div>
                       
                       //  </div>";
                    }else {
                        if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                        {
                    echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud-medKonto\">Bestil her</div>";
                        }
                    else {
                        if(($typeofuser=="privat")||($typeofuser=="offentligt"))
                       echo '<script language="javascript">';
                       // echo 'alert("Du er nu logget ind")';
                       echo 'alert("you need to create business account to get offer!!")';
                       echo '</script>';
                       // echo 'alert("you need to create business account to get offer!!")';
                       echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                    }
                       // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                       // class=\"w3-button w3-bar-item">Få tilbud</a>';
                    }
                    ?>
                        <!-- <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Få tilbud
                        </div> -->
                        <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereKørebogErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereKørebogErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div>
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKørebogErhverv">
                        <p> <b> Kørebog (erhverv)</b> <br>
                            Vores samarbejdspartner er en førende udvikler og leverandør af GPS tracking, flådestyring,
                            elektronisk kørebog, realtids visning samt udstyr
                            til opgavehåndtering. <br>
                            En GPS tracking enhed er en smart løsning til dig, der vil skabe et overblik over
                            erhvervsmæssige
                            kørsler med en elektronisk kørebog. Enheden dokumenterer per automatik alle kørsler via GPS
                            i realtid.
                            Hold styr på din flåde med flådestyring. Du kan med præcision dokumenterer, hvor dit/dine
                            køretøjer
                            har været. Indsaml data til dokumentering for at overholde skattemæssige lovkrav. Sikre din
                            kørselsgodtgørelse og spar penge ved at reducere omkostninger til kørsel og drift,
                            så det kan ses på bundlinjen. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom coll">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm4
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/partner-glaad-dig.png"
                        style="height:; width: 80%">
                    <div style="height:120px"></div>
                    <!-- <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li"> Professionel firmaadresse
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis internet
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis parkering
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Mulighed for tilkøb
                        </p>
                    </div> -->
                    <div class="tilbudLaasmereContainer">
                        <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Bliv partner
                        </div>
                        <!-- <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereKørebogErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereKørebogErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div> -->
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKørebogErhverv">
                        <p> <b> Kørebog (erhverv)</b> <br>
                            Vores samarbejdspartner er en førende udvikler og leverandør af GPS tracking, flådestyring,
                            elektronisk kørebog, realtids visning samt udstyr
                            til opgavehåndtering. <br>
                            En GPS tracking enhed er en smart løsning til dig, der vil skabe et overblik over
                            erhvervsmæssige
                            kørsler med en elektronisk kørebog. Enheden dokumenterer per automatik alle kørsler via GPS
                            i realtid.
                            Hold styr på din flåde med flådestyring. Du kan med præcision dokumenterer, hvor dit/dine
                            køretøjer
                            har været. Indsaml data til dokumentering for at overholde skattemæssige lovkrav. Sikre din
                            kørselsgodtgørelse og spar penge ved at reducere omkostninger til kørsel og drift,
                            så det kan ses på bundlinjen. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom coll">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm4
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/partner-glaad-dig.png"
                        style="height:; width: 80%">
                    <div style="height:120px"></div>
                    <!-- <div class="wow zoomIn serviceSubHeadLineText">
                        <p class="serviceSubHeadLineText-li"> Professionel firmaadresse
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis internet
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis parkering
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Mulighed for tilkøb
                        </p>
                    </div> -->
                    <div class="tilbudLaasmereContainer">
                        <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Bliv partner
                        </div>
                        <!-- <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereKørebogErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereKørebogErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div> -->
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKørebogErhverv">
                        <p> <b> Kørebog (erhverv)</b> <br>
                            Vores samarbejdspartner er en førende udvikler og leverandør af GPS tracking, flådestyring,
                            elektronisk kørebog, realtids visning samt udstyr
                            til opgavehåndtering. <br>
                            En GPS tracking enhed er en smart løsning til dig, der vil skabe et overblik over
                            erhvervsmæssige
                            kørsler med en elektronisk kørebog. Enheden dokumenterer per automatik alle kørsler via GPS
                            i realtid.
                            Hold styr på din flåde med flådestyring. Du kan med præcision dokumenterer, hvor dit/dine
                            køretøjer
                            har været. Indsaml data til dokumentering for at overholde skattemæssige lovkrav. Sikre din
                            kørselsgodtgørelse og spar penge ved at reducere omkostninger til kørsel og drift,
                            så det kan ses på bundlinjen. </p>
                    </div>

                </ul>
            </div>

            <div class="w3-quarter w3-margin-bottom coll">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                    <!-- <li class="w3-ble w3-larg w3-paddin tilbud-headline">Alarm4
                    </li> -->
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/partner-glaad-dig.png"
                        style="height:; width: 80%">
                    <div style="height:120px"></div>
                    <!-- <div class="wow zoomIn serviceSubHeadLineText" s>
                        <p class="serviceSubHeadLineText-li"> Professionel firmaadresse
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis internet
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Gratis parkering
                        </p>
                        <p class="serviceSubHeadLineText-li">
                            Mulighed for tilkøb
                        </p> 
                    </div> -->
                    <div class="tilbudLaasmereContainer">
                        <div onClick="document.getElementById('alarmmodal').style.display='block'"
                            class="m-2 btn-fåTilbud">
                            Bliv partner
                        </div>
                        <!-- <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                            data-target="#CollapseLessMereKørebogErhverv" aria-expanded="false"
                            aria-controls="CollapseLessMereKørebogErhverv">Læs
                            mere <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up" style="display:none;"></i>
                        </div> -->
                    </div>

                    <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKørebogErhverv">
                        <p> <b> Kørebog (erhverv)</b> <br>
                            Vores samarbejdspartner er en førende udvikler og leverandør af GPS tracking, flådestyring,
                            elektronisk kørebog, realtids visning samt udstyr
                            til opgavehåndtering. <br>
                            En GPS tracking enhed er en smart løsning til dig, der vil skabe et overblik over
                            erhvervsmæssige
                            kørsler med en elektronisk kørebog. Enheden dokumenterer per automatik alle kørsler via GPS
                            i realtid.
                            Hold styr på din flåde med flådestyring. Du kan med præcision dokumenterer, hvor dit/dine
                            køretøjer
                            har været. Indsaml data til dokumentering for at overholde skattemæssige lovkrav. Sikre din
                            kørselsgodtgørelse og spar penge ved at reducere omkostninger til kørsel og drift,
                            så det kan ses på bundlinjen. </p>
                    </div>

                </ul>
            </div>

        </div>


        <!-- <div class="row" style="display: flex; flex-direction: row; justify-content: space-around; margin:10px 0px; line-height:px;">
            <img class="col-xs-3" style="width:260px; height:300px; margin:10px;" src="Assets/Alarm-system.jpeg">
            <img class="col-xs-3" style="width:260px; height:300px; margin:10px;" src="Assets/Alarm-system.jpeg">
            <img class="col-xs-3" style="width:260px; height:300px; margin:10px;" src="Assets/Alarm-system.jpeg">
            <img class="col-xs-3" style="width:260px; height:300px; margin:10px;" src="Assets/Alarm-system.jpeg">
        </div> -->

    </div>

    <!-- </div> -->

    <!-- Vikar og Rekruttering  -->
    <!-- <div class="w3-row-padding">
        <div class="w3-third">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-ble w3-xlarge w3-padding-16 tilbud-headline">Vikar og Rekruttering
                </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Alm. REkruttering.jpeg"
                    style="height: 35%; width: 80%">

                <div class="wow zoomIn serviceSubHeadLineText">
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                    <p class="serviceSubHeadLineText-li">
                        De ansatte som bliver sendt afsted på opgave
                    </p>
                </div>

                <div class="tilbudLaasmereContainer">
       -->

    <!-- 
                    <?php
                    //  $msg ="Pleaseprintname i";
                    //  function alert($msg){
                        // echo "<script type ='text/javascript'>";
                        // echo 'Hellow Testing';
                        // alert('$msg');
                        
                        // echo "</script>";
                    // }
                    // function alert($msg) {
                    //     echo "<script type='text/javascript'>
                    //       echo alert('$msg');
                    //     echo </script>";
                    //  };
                     if(!isset($_SESSION['uid'])){
                    //     $msg = "Hellow";
                    //     function alert($msg) {
                    //        echo "<script type='text/javascript'>alert('$msg');</script>";
                    //    }
                   
                    // echo '<script type="text/javascript">alert("sdfda eafdsd");</script>';
                        // echo 'alert("you need to create business account to get offer!!")';
                        echo "<div onClick= alert(); class=\"m-2 btn-fåTilbud\">
                         <div onClick=\"document.getElementById('signup').style.display='block'\">Få tilbud </div>
                        
                         </div>";
                         
                         

                        // echo '<a onClick =\"document.getElementById(\signup\').style.display=\'block\'"
                        // class="w3-button w3-bar-item">Opret Profil</a>';
                     }else{
                         if(($typeofuser=="erhverv")||(strpos($_SESSION['email'], '@danpanel')))
                         {
                     echo "<div onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"m-2 btn-fåTilbud\">Bestil her</div>";
                         }
                     else {
                        echo '<script language="javascript">';
                        echo 'alert("Du er nu logget ind")';
                        echo '</script>';
                        // echo 'alert("you need to create business account to get offer!!")';
                        echo "<div onClick=\"document.getElementById('signup').style.display='block'\" class=\"m-2 btn-fåTilbud\">Få tilbud1</div>";
                     }
                        // echo '<a onClick =\"document.getElementById('vikarmodal').style.display='block\'"
                        // class=\"w3-button w3-bar-item">Få tilbud</a>';
                     }
                     ?> -->

    <!-- onClick="document.getElementById('vikarmodal').style.display='block'" class="m-2 btn-fåTilbud"> -->
    <!-- Få tilbud</div> -->
    <!-- <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereVikerRekruttering" aria-expanded="false"
                        aria-controls="CollapseLessMereVikerRekruttering">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                        <span class="glyphicon glyphicon-menu-up" style="display:none"></span>
                    </div>
                </div>

                <div class="collapse collapse-arrow multi-collapse w3-padding" id="CollapseLessMereVikerRekruttering">
                    <p> <b>Vikariater:</b> <br>
                        De ansatte som bliver sendt afsted på opgave, er altid klædt på i det rette tøj og værktøj.<br>
                        De kunder vi betjener, er alt fra den lille virksomhed til de større koncerner. <br>
                        Uanset om du skal bruge en leder eller en i den daglige produktion, så har vi den rette
                        samarbejdspartner klar til at hjælpe med det rette match af mandskab. <br>
                        Alle ansatte gennem vores samarbejdspartnere har gode referencer, og er blevet screenet før vi
                        sender dem ud til vores kunder. Og vi er i konstant dialog med dem vi har på opgave. <br><br>

                        <b>Rekruttering:</b><br>
                        DanPanel tilbyder unikke løsninger indenfor rekruttering gennem sine samarbejdspartnere.<br>
                        Vi gør meget ud af at forberede kandidaterne til deres nye job. Så vi sikrer den rette
                        match.<br>
                        Vi rekrutterer medarbejdere ind til forskellige type kunder til mange forskellige Brancher.
                        <br><br>
                        De medarbejdere som rekrutteres, vil sammen med rekrutteringsansvarlig kan gennemgå et forløb i
                        form af en workshop, som styrker medarbejderen i kommunikation og motivation, inden en endelig
                        samtale hos kunden. <br><br>

                    </p>

                </div> -->
    <!-- <div class=" row">
                    <div class="col-12">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
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
                                <div class="card card-body w3-card-4 p-2 bg-info flex-fill" style="margin:8px">
                                    Test Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident.
                                    <button class="w3-padding h6 rounded">Bestil here</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <?php
				if($typeofuser=="erhverv"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('vikarmodal').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
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
                            data-target="#multiCollapseExample1" aria-expanded="false"
                            aria-controls="multiCollapseExample1">Choose here</button>
                    </li> -->
    <!-- <div class="row">
                    <div class="col-12">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
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
                                <div class="card card-body w3-card-4 p-2 bg-info flex-fill" style="margin:8px">
                                    Test Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident.
                                    <button class="w3-padding h6 rounded">Bestil here</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    </ul>
    </div>


    <!-- Alarm og overvågning   -->
    <!-- <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Alarm og overvågning </li>
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
                    <div onClick="document.getElementById('alarmmodal').style.display='block'" class="m-2 btn-fåTilbud">
                        Få
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
                    <p> <b>Kamera og Alarm-systemer</b> <br>
                        Kender du tanken: at være utryg ved at være væk fra dit hjem eller din forretning?
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
        </div> -->


    <!-- Digitalisering   -->
    <!-- <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Digitalisering </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/DigitaliseringNy.png"
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
                    <div onClick="document.getElementById('digitaliseringmodal').style.display='block'"
                        class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereDigitalisering" aria-expanded="false"
                        aria-controls="CollapseLessMereDigitalisering">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                    </div>
                </div>


                <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereDigitalisering">
                    <p><b>Har du brug for en ny hjemmeside eller SoMe?</b><br>
                        I DanPanel står vi klar til at spare dig for en masse unødvendigt tidsspild. Med vores
                        samarbejdspartnere inden for bl.a. digitalisering, kan vi hjælpe dig med at finde den rette
                        leverandør til websiteudvikling og digital markedsføring. <br>
                        Hos DanPanel har vi støvsuget markedet for de mest kompetente leverandører af SoMe og
                        hjemmesider, hvilket vil sige, at vi hurtigt kan finde den rette løsning til dine ønsker og
                        behov.
                        Henvend dig allerede i dag og få en uforpligtende samtale om dine muligheder.

                    </p>
                </div>


            </ul>
        </div>
    </div> -->

    <!-- Erhvervslejemål  -->
    <!-- <div class="w3-row-padding">
       
        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Erhvervslejemål </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Erhverhvslejemaal.jpg"
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
                    <div onClick="document.getElementById('lejemålmodal').style.display='block'"
                        class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereErhvervslejemal" aria-expanded="false"
                        aria-controls="CollapseLessMereErhvervslejemal">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                    </div>
                </div>


                <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereErhvervslejemal">
                    <p><b>Nyt kontor?</b><br>
                        Vores samarbejdspartner er bl.a. Væxthuset, som er Danmarks største landsdækkende
                        kontorhotelkæde, hvor du som lejer får adgang til alle 20 kontorhoteller i hele
                        Danmark.<br>
                        Vores samarbejdspartner har samlet en række services og faciliteter, på deres
                        kontorhoteller
                        som
                        de stiller til rådighed for at gøre det nemt for virksomheder at fokusere på det, som er
                        vigtigt
                        for deres forretning. De forskellige services kan bl.a. være rengøring af fællesarealer,
                        internetforbindelse, mødelokaler, frokostordninger osv. <br>
                        Når man bliver en del af dette kontormiljø, bliver man samtidig også en del af et
                        kontorfællesskab. Et kontorfællesskab er et kontor, som deles af flere virksomheder.
                        Konceptet
                        er at virksomhederne i et kontorfællesskab har den fordel at de kan sidde sammen og
                        sparre
                        med
                        hinanden samt dele sin viden. Man er en del af et fællesskab, som alle bidrager til.

                    </p>
                </div>
          
            </ul>
        </div> -->


    <!-- Rengøring  -->

    <!-- <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Rengøring </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Rengøring.jpg"
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
                    <div onClick="document.getElementById('rengøringmodal').style.display='block'"
                        class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereRengoring" aria-expanded="false"
                        aria-controls="CollapseLessMereRengoring">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                    </div>
                </div>


                <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereRengoring">
                    <p><b>Skal du have en solid rengøringsaftale?</b><br>
                        Få rengøring af høj kvalitet via vores samarbejdspartner der har til formål at yde en
                        god
                        service og kvalitet, uden at det behøver at koste en formue.<br>
                        Med kvalitetskontrol og styring varetages af dagligledere som sikre jer en god aftale.
                        Du kan skræddersy din egen løsning her, alt fra en fast aftale til en
                        engangsrengøring/oprydning
                        - alt efter dine behov.<br>
                        Vi har samarbejdspartner som er specialister indenfor rengøring alt fra små som store
                        kontorlandskaber, butikker, lagre, byggepladser mm.
                    </p>
                </div>

            </ul>
        </div> -->

    <!-- Kørebog system   -->
    <!-- <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-center w3-hover-shadow pb-5">
                <li class="w3-xlarge w3-padding-16 tilbud-headline">Kørebog system </li>
                <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round" src="Assets/Kørebog-system.png"
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
                    <div onClick="document.getElementById('kørebogmodal').style.display='block'"
                        class="m-2 btn-fåTilbud">Få
                        tilbud
                    </div>
                    <div class="collapsible m-2 btn-laasmere" data-toggle="collapse"
                        data-target="#CollapseLessMereKorebogSystem" aria-expanded="false"
                        aria-controls="CollapseLessMereKorebogSystem">Læs
                        mere <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up" style="display:none"></i>
                    </div>
                </div>


                <div class="collapse collapse-arrow w3-padding" id="CollapseLessMereKorebogSystem">


                    <p><b>Kørelog og Flådestyring?</b><br>
                        Vores samarbejdspartner er bl.a. ABAX, som er en førende udvikler og leverandør indenfor
                        GPS-tracking, flådestyringssystemer, elektroniske kørebøger, overblikssystemer til
                        køretøj
                        og
                        udstyr samt opgavehåndteringssystemer.<br><br>
                        Til dig som benytter køretøjer i forbindelse med dit arbejde, er en elektronisk kørebog
                        en
                        smart
                        løsning. Den dokumenterer alle ture automatisk via GPS. Du kan rapportere præcist og
                        altid
                        sikre
                        at du ved hvor dine køretøjer befinder sig. Dokumentationsprocessen for ansatte og
                        virksomheden
                        kan du simplificere for at overholde skattemæssige lovkrav. Sidst men ikke mindst, så
                        kan du
                        spare penge og reducere omkostningerne til kørsel og drift.<br><br>
                        Der findes forskellige pakker, alt efter hvilket behov man har:
                        <li><b>LOCATION:</b> Flådeoversigt på kort - Administrer område </li>
                        <li><b>REPORTS:</b> Administrer ture - Rapporter </li>
                        <li><b>FULL OVERVIEW:</b> Flådeoversigt på kort - Administrer områder - Administrer ture
                            -
                            Rapporter </li>
                        <li><b>MILEAGE CLAIM:</b> Administrer køreture - Kørselsgodtgørelse </li>
                    </p>
                </div>

            </ul>
        </div>
    </div> -->





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
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="name" placeholder="navn" value="' . $_GET[ "name" ] . '">';
					} else {
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="name" placeholder="navn">';
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
    <!-- See Price modal -->
    <div class="w3-row">
        <div id="pricemodalrekruttering" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalrekruttering').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe strukturf
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>20.000<span>,-</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalrekruttering').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalrekruttering').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>25.000<span>,-</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalrekruttering').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div id="pricemodalinterim" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalinterim').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>324<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalinterim').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalinterim').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>333<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalinterim').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalfreelance" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalfreelance').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>360<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalfreelance').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalfreelance').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>370<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalfreelance').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalvikariat" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalvikariat').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>198<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalvikariat').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalvikariat').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>240<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalvikariat').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalkontorplads" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalkontorplads').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>1895<span>,-/mdr</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalkontorplads').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalkontorplads').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>2095<span>,-/mdr</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalkontorplads').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodallagerhotel" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodallagerhotel').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>198<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodallagerhotel').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodallagerhotel').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>240<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodallagerhotel').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodaldropinkonto" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodaldropinkonto').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>995<span>,-/mdr</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodaldropinkonto').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodaldropinkonto').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>1095<span>,-/mdr</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodaldropinkonto').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodallukketkontor" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodallukketkontor').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>1995<span>,-/mdr</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodallukketkontor').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodallukketkontor').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>2195<span>,-/mdr</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodallukketkontor').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalhtmlcssphp" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalhtmlcssphp').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>329<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalhtmlcssphp').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalhtmlcssphp').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>347<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalhtmlcssphp).style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodallogodesign" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodallogodesign').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>198<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodallogodesign').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodallogodesign').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>240<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodallogodesign').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalsem" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalsem').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>4000<span>,-/mdr for 5 time</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalsem').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalsem').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>5000<span>,-/mdr for 5 time</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalsem').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalseo" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalseo').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>4000<span>,-/mdr for 5 time</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalseo').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalseo').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>5000<span>,-/mdr for 5 time</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalseo').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        
        <div id="pricemodaltekstforfatning" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodaltekstforfatning').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                               <span>Fra &nbsp</span>1600<span>,-/mdr for 4 artikler</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodaltekstforfatning').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodaltekstforfatning').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>1998<span>,-/mdr for 4 artikler</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodaltekstforfatning).style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalvedligeholdelse" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalvedligeholdelse').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>198<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalvedligeholdelse').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalvedligeholdelse').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>240<span>,-/time</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalvedligeholdelse').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalwebdesign" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalwebdesign').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>4000<span>,-</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalwebdesign').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalwebdesign').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>5000<span>,-</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalwebdesign').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalwordpress" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalwordpress').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>2000<span>,-</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalwordpress').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalwordpress').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>2750<span>,-</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalwordpress').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div id="pricemodalkaffelosninger" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalkaffelosninger').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>2.5<span>,-/kop</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalkaffelosninger').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalkaffelosninger').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                            <span>Fra &nbsp</span>2.9<span>,-/kop</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalkaffelosninger').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        
        <div id="pricemodalkaffe" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalkaffe').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                               <span>Fra &nbsp</span>139<span>,-/kg</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalkaffe').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalkaffe').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                            <span>Fra &nbsp</span>149<span>,-/kg</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalkaffe').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalte" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalte').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>15<span>,-/pakke</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalte').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalte').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                            <span>Fra &nbsp</span>25<span>,-/pakke</span><br><span class="ex-moms" style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalte').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalrengoring" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalrengoring').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>229<span>,-/time</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalrengoring').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalrengoring').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>249<span>,-/time</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalrengoring').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="pricemodalelektronisk" style="display:none" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:100%;  text-align: center;">
                <span onclick="document.getElementById('pricemodalelektronisk').style.display='none'" ;
                    class="w3-button w3-transparent w3-display-topright" title="Close Modal">x</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%; " class="w3-margin-top">
                <h2 style="text-align:center"> Pris tabel</h2>
                <!-- <p style="text-align:center">Resize the browser window to see the effect.</p> -->
                <div class="container-fluid">
                    <div class="row" style="display:flex; justify-content: center;">
                        <div class="col-xs-12 medlem-container w3-center1">
                            <p class="medlem-title">
                                Med Kundekonto</p>
                            <p class="w3-padding medlem-kundekonto-text" style="">Når du
                                logger ind med din kundekonto, kan du samle alle dine løsninger i ét panel hos os, her
                                får du overblikket og en struktureret hverdag med overskud.<br>Du sparer tid og penge
                                ved at anvende DanPanel og dermed opleve den konstruktive udvikling. </p>
                            <p class="medlem-kundekonto-subtitle" style="">Med vores
                                platform kan du: </p>
                            <ul class="Kunekonto-Ulist" style="">
                                <li>
                                    Skabe struktur
                                </li>
                                <li>
                                    Få mere overskud
                                </li>
                                <li>
                                    Opleve Udvikling
                                </li>
                                <li>
                                    Besparelse på penge, tid og kræfter
                                </li>
                            </ul>

                            <p class="medlem-price" style="">
                                <span>Fra &nbsp</span>69<span>,-/mdr</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>
                            <p class="" style="padding:10px;"><a href="#pricemodal" class="log-på-konto"
                                    onclick="document.getElementById('login').style.display='block'; document.getElementById('pricemodalelektronisk').style.display='none';"
                                    style="">Er
                                    du allerede kunde kan du blot logge ind her og få dit tilbud?</a></p>
                        </div>
                        <div class="col-xs-12 uden-medlem-container w3-center1" style="">
                            <p class="uden-medlem-title">
                                Uden Kundekonto</p>
                            <p class="w3-padding uden-kundekonto-text">Hos DanPanel kan du også få
                                et tilbud uden kundekonto. Det har dog en betydning for prisen på vores tilbud, da vores
                                forhandlinger med samarbejdspartnerne muliggør rabatter til de med kundekonto.<br>Det er
                                helt gratis at tilmelde sig og anvende fordelene med vores let betjenelige koncept. </p>
                            <p class="uden-medlem-kundekonto-subtitle">Uden
                                kundekonto betyder at: </p>
                            <ul class="Uden-kunekonto-UList">
                                <li>
                                    Der ikke er rabatter
                                </li>
                                <li>
                                    Aktiviteter ikke opbevares på dit helt eget panel
                                </li>
                                <li>
                                    Der ikke fremsendes særlige kampagner
                                </li>
                                <li>
                                    Du går glip af masse fordele
                                </li>

                            </ul>
                            <p class="btn-price-fåTilbud1" style=""><a href="#" class="fortsaat-uden-konto"
                                    Onclick="document.getElementById('vikarmodal').style.display='block'; document.getElementById('pricemodalelektronisk').style.display='none'"
                                    ; style="">Fortsæt
                                    uden kundekonto</a></p>

                            <p class="uden-medlem-price" style="">
                                <span>Fra &nbsp</span>99<span>,-/mdr</span><br><span class="ex-moms"
                                    style="">ex moms
                                    <span> </p>


                            <p class="" style=""><a href="#" class="opret-kunde-rabat"
                                    onclick="document.getElementById('signup').style.display='block'; document.getElementById('pricemodalelektronisk').style.display='none'"
                                    ; style="">Få kunderabat –
                                    Opret dig gratis</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>



    <!-- Vikar og Rekruttering modal -->
    <div class="w3-row"> </div>
    <div id="vikarmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('vikarmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for create vikar og rekruttering -->
                <form class="w3-container w3-animate-opacity" action="includes/createvikarrekrutteringorder.inc.php"
                    method="post">


                    <h4 class="w3-center">Vikar og Rekruttering</h4>

                    <label>Navnet på virksomheden</label>
                    <input name="virksomhedsnavn" class="w3-border w3-input">

                    <label>Kontaktperson</label>
                    <input name="kontaktperson" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input name="sagsnr" class="w3-border w3-input">

                    <label>Beskrivelse</label><br>
                    <textarea name="beskrivelse" cols="85" rows="4"></textarea><br>


                    <label>Antal</label>
                    <input name="antal" class="w3-border w3-input">

                    <label>Type af Opgave</label>
                    <input name="typeafopgave" class="w3-border w3-input">

                    <label>Varighed</label>
                    <input name="varighed" class="w3-border w3-input">

                    <label>Mødetid</label>
                    <input name="moedetid" type="time" class="w3-border w3-input">

                    <label>Opgaveadresse</label>
                    <input name="opgaveadresse" class="w3-border w3-input">

                    <label>Firma adresse</label>
                    <input name="firmaadresse" class="w3-border w3-input">

                    <label>Faktura Email</label>
                    <input name="fakturaemail" class="w3-border w3-input">

                    <label>*Ikke obligatorisk* EAN Nummer</label>
                    <input name="ean" class="w3-border w3-input">

                    <label> *Ikke obligatorisk* Hjemmeside </label>
                    <input name="website" class="w3-border w3-input">
                    <?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
                    <a href="#"
                        onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService
                        online tilmelding</a>

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('vikarmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Alarm og Overvågning modal -->
    <div class="w3-row"> </div>
    <div id="alarmmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('alarmmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
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
                    <input name="sikkerhedscheck" type="datetime-local" class="w3-input w3-border w3-hover-border-black"
                        type="datetime" style="border: 0px">

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
                    <?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
                    <a href="#"
                        onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService
                        online tilmelding</a>

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


    <!-- Digitalisering modal -->
    <div class="w3-row"> </div>
    <div id="digitaliseringmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('digitaliseringmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for digitalisering -->
                <form class="w3-container w3-animate-opacity" action="includes/createdigitaliseringorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('digitaliseringmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Digitalisering</h4>

                    <label>Kontaktperson</label>
                    <input name="kontaktperson" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input name="sagsnr" class="w3-border w3-input">

                    <label>Beskrivelse</label><br>
                    <textarea name="beskrivelse" cols="85" rows="4"></textarea><br>

                    <label>Firma adresse</label>
                    <input name="firmaadresse" class="w3-border w3-input">

                    <label>Faktura Email</label>
                    <input name="fakturaemail" class="w3-border w3-input">

                    <label>*Ikke obligatorisk* EAN Nummer</label>
                    <input name="ean" class="w3-border w3-input">

                    <label> *Ikke obligatorisk* Hjemmeside </label>
                    <input name="website" class="w3-border w3-input">
                    <?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
                    <a href="#"
                        onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService
                        online tilmelding</a>

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('digitaliseringmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Rengøring modal -->
    <div class="w3-row"> </div>
    <div id="rengøringmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('rengøringmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for rengøring-->
                <form class="w3-container w3-animate-opacity" action="includes/createrengoeringorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('rengøringmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Rengøring</h4>

                    <label>Kundenavn</label>
                    <input name="virksomhedsnavn" class="w3-border w3-input">

                    <label>Kontaktperson</label>
                    <input name="kontaktperson" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input name="sagsnr" class="w3-border w3-input">

                    <label>Beskrivelse</label><br>
                    <textarea name="beskrivelse" cols="85" rows="4"></textarea><br>

                    <label>Kvadratmeter</label>
                    <input name="kvadratmeter" class="w3-border w3-input">

                    <label>Type af Opgave</label>
                    <input name="typeafopgave" class="w3-border w3-input">

                    <label>Nuværende adresse</label>
                    <input name="opgaveadresse" class="w3-border w3-input">

                    <label> *Ikke obligatorisk* Hjemmeside </label>
                    <input name="website" class="w3-border w3-input">
                    <?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
                    <a href="#"
                        onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService
                        online tilmelding</a>

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('rengøringmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Erhverv modal -->
    <div class="w3-row"> </div>
    <div id="lejemålmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('lejemålmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for erhvervlejemål-->
                <form class="w3-container w3-animate-opacity" action="includes/createerhvervslejemaalorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('lejemålmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Erhvervlejemål</h4>

                    <label>Navnet på virksomheden</label>
                    <input name="virksomhedsnavn" class="w3-border w3-input">

                    <label>Kontaktperson</label>
                    <input name="kontaktperson" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input name="sagsnr" class="w3-border w3-input">

                    <label>Beskrivelse</label><br>
                    <textarea name="beskrivelse" cols="85" rows="4"></textarea><br>

                    <label>Kvadratmeter</label>
                    <input name="kvadratmeter" class="w3-border w3-input">

                    <label>Hvor søger du lokaler?</label>
                    <input name="typeaflokale" class="w3-border w3-input">

                    <label>Budget</label>
                    <input name="budget" class="w3-border w3-input">

                    <label>Nuværende firma adresse</label>
                    <input name="firmaadresse" class="w3-border w3-input">

                    <label> *Ikke obligatorisk* Hjemmeside </label>
                    <input name="website" class="w3-border w3-input">
                    <?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
                    <a href="#"
                        onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService
                        online tilmelding</a>


                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('lejemålmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Kørebog modal -->
    <div class="w3-row"> </div>
    <div id="kørebogmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('kørebogmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for kørebog -->
                <form class="w3-container w3-animate-opacity" action="includes/createkoerebogorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('kørebogmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Kørebog</h4>

                    <label>Kontaktperson</label>
                    <input name="kontaktperson" class="w3-border w3-input">

                    <label>Sagsnummer</label>
                    <input name="sagsnr" class="w3-border w3-input">

                    <label>Beskrivelse</label><br>
                    <textarea name="beskrivelse" cols="85" rows="4"></textarea><br>

                    <label>Antal køretøjer</label>
                    <input name="antal" class="w3-border w3-input">

                    <label>Book et uforpligtende møde</label>
                    <input name="møde" type="datetime-local" class="w3-border w3-input">

                    <label>Firma adresse</label>
                    <input name="firmaadresse" class="w3-border w3-input">

                    <label> *Ikke obligatorisk* Hjemmeside </label>
                    <input name="website" class="w3-border w3-input">
                    <?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
                    <a href="#"
                        onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService
                        online tilmelding</a>

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('kørebogmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Kaffeløsning modal -->
    <div class="w3-row"> </div>
    <div id="kaffeløsningmodal" style="display: none" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('kaffeløsningmodal').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section w3-animate-opacity" id="main">
                <!-- view for kaffeløsnig -->
                <form class="w3-container w3-animate-opacity" action="includes/createkaffeloesningorder.inc.php"
                    method="post">
                    <div class="w3-center w3-margin-top"><a
                            class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large"
                            onClick="document.getElementById('kaffeløsningmodal').style.display='none';document.getElementById('main').style.display='block'">
                            Tilbage til udvalg </a><br><br></div>

                    <h4 class="w3-center">Kaffe Løsning</h4>

                    <label>Sags Nr.</label>
                    <input required name="sagsnr" class="w3-border w3-input">

                    <label>Nuværende løsning</label>
                    <select required class="w3-section w3-input w3-border w3-hover-border-blue" name="currentsolution">
                        <option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg
                            nuværende løsning</option>
                        <option class="w3-bar-item w3-button" value="købt">Købt</option>
                        <option class="w3-bar-item w3-button" value="leaset">Leaset</option>
                        <option class="w3-bar-item w3-button" value="lejet ">Lejet</option>
                        <option class="w3-bar-item w3-button" value="kopaftale">kopaftale</option>
                    </select>

                    <label>Hvad giver de pr. Mdr?</label>
                    <textarea name="amountprmonth" cols="100" rows="4"></textarea><br>

                    <label>Hvormange mdr. er der tilbage på deres nuværende aftale?</label><br>
                    <textarea name="monthleft" cols="100" rows="4"></textarea><br>

                    <label>Hvor meget kaffe og øvrige ingredienser (kakao, granulat) køber de pr. Mdr.? </label>
                    <textarea name="amountofcoffeprmonth" cols="100" rows="4"></textarea><br>

                    <label>Hvad er deres pris pr. kg. Kaffe og hvad giver de for de evt. for øvrige ingredienser
                    </label>
                    <textarea name="priceprkgcoffe" cols="100" rows="4"></textarea><br>

                    <label>Hvilken fremtidig løsning kunne du være interesseret i?</label>
                    <select required class="w3-section w3-input w3-border w3-hover-border-blue" name="futuresolution">
                        <option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg
                            fremtidig løsning</option>
                        <option class="w3-bar-item w3-button" value="hele bønner">Hele bønner</option>
                        <option class="w3-bar-item w3-button" value="formalet kaffe">Formalet kaffe</option>
                        <option class="w3-bar-item w3-button" value="friskmælk ">Friskmælk</option>
                        <option class="w3-bar-item w3-button" value="mælke granulat">mælke granulat</option>
                    </select>

                    <?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
                    <a href="#"
                        onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService
                        online tilmelding</a>

                    <button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit"
                        name="createvikar-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('kørebogmodal').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Script -->
    <script src="javascript/CollapsableScript.js"></script>
    <script src="javascript/hideandshowscript.js"></script>
    <script src="javascript/plugins.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"> </script>
    <!-- count number -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>

    <script src="javascript/plugins.js"></script>

    <script type="text/javascript">
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

    <
    script >
        function helllo() {
            alert("Hellow worrldsdsf");
        }
    </script>

    <!-- // $(document).ready(function(){
    // $('.collapsible').on('show.bs.collapsible', function(){
    // $(this).find('.glyphicon-menu-up').removeClass('glyphicon-menu-up').addClass('glyphicon-menu-down')
    // }).on('hidden.bs.collapsible', function(){
    // $(this).find("glyphicon-menu-down").removeClass('glyphicon-menu-down').addClass('glyphicon-menu-down');
    // });
    // }); -->
    </script>

</body>

</html>