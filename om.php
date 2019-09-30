<?php
session_start();
// require( "includes/dbh.inc.php" )
require( "includes\dbh.inc.php" );
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Om Danpanel</title>
    <style>
    html {
        scroll-behavior: smooth
    }

    @media only screen and (max-width: 768px) {
  .text-size{
  font-size: 2rem;
}
}
    </style>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body class="w3-animate-opacity">
    <!-- Navbar -->
    <!-- Links (sit on top) -->
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

    <!--Video content -->
    <div class="container-fluid" style="padding:0px; margin:0px; position:relative">
        <div class="w3-center  w3-display-middle">
            <div class="w3-text-white w3-animate-top w3-centered text-size">Om Danpanel</div>
        </div>
        <video autoplay loop muted src="Assets/om DanPanel.mov" style=" object-fit: fill; margin-top:60px; padding:0px"
            class="image w3-round"></video>
        <div class="overlay-for-vid">
            <a href="#plans" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                    class="w3-display-bottommiddle w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom"
                    style="width: 5%"></a>
        </div>
    </div>
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
            <form class="w3-container" action="/includes/contactform.inc.php" method="post">
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
                    <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="tlf" required>
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
                            class="w3-button w3-xlarge w3-transparent w3-display-topright w3-round"
                            title="Close Modal">×</span>
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
                                    <div class="w3-blue w3-round single-signup-btn"
                                        style="">
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
                            <input type="text" id="ean" class="w3-input w3-border w3-hover-border-black w3-section"
                                name="ean" placeholder="EAN Nr" style="display: none"></input>
                            <input type="text" id="cvr" class="w3-input w3-border w3-hover-border-black w3-section"
                                name="cvr" placeholder="CVR Nr" style="display: none"></input>
                            <input type="date" id="fødselsdato"
                                class="w3-input w3-border w3-hover-border-black w3-section" name="fødselsdato"
                                placeholder="yyyy-mm-dd" style="display: none"></input>
                            <input type="password" class="w3-input w3-border w3-hover-border-black w3-section"
                                name="pwd" placeholder="Password">
                            <input type="password" class="w3-input w3-border w3-hover-border-black w3-section"
                                name="pwd-repeat" placeholder="Gentag password">

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

    <!-- Konceptet bag DanPanel  -->
    <div class="w3-row-padding" id="plans">
        <div class="w3-center w3-padding-64">
            <h3>Konceptet bag DanPanel</h3>
            <div class="w3-card w3-padding w3-center w3-text-grey"
                style="width:75%; margin-left:12.5%; margin-right: 12.5%">
                <p><b>DanPanel er en portal der giver dig fri adgang til dit eget Panel, hvor du kan vælge bæredygtige
                        løsninger og services efter dit behov. <br><br>

                        Vi er fordelt over 3 afdelinger, du kan vælge mellem Det offentlige, Erhverv, Privat.<br><br>

                        Når du opretter en gratis kundekonto hos DanPanel får du fri adgang til dit eget Panel.<br> Med
                        få steps, kan du have et visuelt overblik, hvor du kan oprette en forespørgsel, bestilling eller
                        forudbestille en ordre,<br> samt arkivere de forskellige løsninger og services som du vælger via
                        dit Panel.</b></p>
            </div>
        </div>
    </div>
    <div class="w3-container w3-center"><a href="#about" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                class="w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom" style="width: 5%"></a></div>

    <div class="w3-padding-16"></div>

    <!-- Grid -->
    <div class="w3-row-padding container-fluid" id="about">
        <div class="row">
            <div class="w3-third w3-center col-lg-4 col-md-12 col-sm-12" style="height: 5%;">
                <img src="Assets/Struktur .png" style="max-width: 15%; display inline">
                <h3>Skabe struktur</h3>
                <p>
                    Savner du mere struktur over dine aktiviteter i din hverdag? <br>

                    DanPanel Portalen er med til at give dig dette. Via vores panel kan du samle dine aktiviteter ét
                    sted, hvor du nemt kan planlægge de kommende aktiviteter med et bedre overblik. </p>
            </div>

            <div class="w3-third w3-center col-lg-4 col-md-12 col-sm-12" style="height: 5%;">
                <img src="Assets/Overskud.png" style="max-width: 15%; display inline">
                <h3>Få mere overskud</h3>
                <p>
                    Bruger du for meget tid på at finde den rette leverandør<br> til den enkelte løsning / service?<br>

                    Vi har allerede forhandlet med markedets bedste udbyder til konkurrencedygtige priser og vilkår, så
                    du kan brug din tid på det du er bedst til, samt spare penge.</p>

            </div>
            <div class="w3-third w3-center col-lg-4 col-md-12 col-sm-12" style="height: 5%;">
                <img src="Assets/Udvikling.png" style="max-width: 15%; display inline">
                <h3>Opleve udvikling</h3>
                <p>
                    Når du får overblikket, ved at få en struktureret hverdag og med overskud i form at tid og penge<br>
                    kan du have mulighed for at opleve en konstruktiv udvikling.</p>
            </div>
        </div>
    </div>
    <div class="w3-container w3-center"><a href="#slogan" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                class="w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom" style="width: 5%"></a></div>
    <!-- Din vækst i vores fokus -->
    <div class="w3-row-padding" id="slogan">
        <div class="w3-center w3-padding-64">
            <h3>Din vækst i vores fokus</h3>
            <div class="w3-card w3-padding w3-center w3-text-grey" style="width:%; margin-left:10%; margin-right: 10%">
                <p><b>Vi arbejder internt med dedikeret teams der har mere end 35 års erhvervserfaring. <br>Vores teams
                        er fordelt med hver sit fagområde og afdeling, indenfor de løsninger og services som du finder
                        via DanPanel portalen. <br><br>

                        Vores fokus ligger i at give dig en skræddersyet løsning/service, der kan løfte dine aktiviteter
                        i den positive retning. <br><br>

                        Med ordenhed og punktlighed arbejder vi dedikeret for at afdække behov i den enkelte sag, det
                        vil give dig trygge rammer for at sikre dig den rette løsning, som bidrager til endnu mere
                        struktur, overskud og udvikling i din hverdag, som bidrager til en bæredygtig livsstil.! </b>
                </p>
            </div>
        </div>
    </div>
    <!-- Bæredygtige vilkår -->
    <div class="w3-row-padding" id="slogan">
        <div class="w3-center w3-padding-64">
            <h3>BÆREDYGTIGE VILKÅR</h3>
            <div class="w3-card w3-padding w3-center w3-text-grey"
                style="width:75%; margin-left:12.5%; margin-right: 12.5%">
                <p><b>Hos DanPanel vægter vi bæredygtigheden højt. Vi stræber efter at sikre vores kunders holdbare
                        resultater, og følge de forventninger der bliver stillet fra vores kunder samt regler og vilkår
                        der er gældende i den enkelte løsning/service der tilbydes.<br><br> Vi arbejder derudover
                        løbende på at udvikle nye løsninger, der vil være med til at gøre hverdagen lettere for kunderne
                        hos DanPanel.<a href="Vilkår . DP.pdf" target="_blank">Læs vilkår.</a></b></p>
            </div>
        </div>
    </div>
    <div class="w3-container w3-center"><a href="#fordele" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                class="w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom" style="width: 5%"></a></div>


    <div class="container" id="fordele">
        <div class="row">
            <div class="w3-padding-24 col-lg-12 col-md-12 col-sm-12" id="fordele">
                <h2 class="w3-center">Dine fordele</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="w3-padding w3-right-align w3-round-xxlarge container">
                            <h3>Personlig kundekonsulent</h3>
                            <span style="vertical-align: middle"></span>
                            <div class="overlay" style="background-color: white">
                                <h3 class="w3-display-left">Tilknyttet på den enkelte bestilling/sag</h3>
                            </div>
                            <img src="Assets/Kunde konsulent.png" style="max-width: 15%;">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="w3-padding w3-right-align w3-white w3-round-xxlarge container"
                            style="margin-top: 10%">
                            <h3>Kort svartid</h3>
                            <span style="vertical-align: middle"></span>
                            <div class="overlay" style="background-color: white">
                                <h3 class="w3-display-left">Svartid indenfor 24 timer i hverdagene</h3>
                            </div>
                            <img src="Assets/Svaretid indenfor 24 timer .png" style="max-width: 15%">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="w3-padding w3-right-align w3-white w3-round-xxlarge container"
                            style="margin-top: 10%">
                            <h3>Nyhedsmail </h3>
                            <div class="overlay" style="background-color: white">
                                <h3 class="w3-display-left">Omkring nye produkter og opdateringer</h3>
                            </div>
                            <img src="Assets/newsletter.png" style="max-width:15%">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="central-image" style="margin-top: 3%">
                            <img src="Assets/thumbnail_Fordele - DanPanel .jpg" class="image w3-round-xxlarge">
                        </div>
                    </div>
                </div>
                <!--<div class="row">-->
                <!--    <div class="col-lg-12 col-md-12 col-sm-12">-->
                <!--    </div>-->
                <!--</div>-->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="w3-padding w3-center w3-white w3-round-xxlarge container" style="margin-top: 6%">
                            <h3>Notifikation </h3>
                            <div class="overlay" style="background-color: white">
                                <h3 class="w3-display-bottommiddle">På aktive sager bliv opdateret dine
                                    løsninger/services</h3>
                            </div>
                            <img src="Assets/notification.png" style="max-width: 15%;" style="margin-top: 10%">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="w3-padding w3-left-align w3-white w3-round-xxlarge container">
                            <h3>Gratis og uforpligtende </h3>
                            <div class="overlay" style="background-color: white">
                                <h3 class="w3-display-right">At oprette en kundekonto (du betaler kun ved konkret
                                    bestilling)</h3>
                            </div>
                            <img src="Assets/Geatis og uforpligtende .png" style="max-width: 15%"><span
                                style="vertical-align: middle"></span>
                        </div>

                    </div>
                </div>
                <div class="row w3-padding">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="w3-padding w3-left-align w3-white w3-round-xxlarge container"
                            style="margin-top:10%">

                            <h3>Særlige kampagner </h3>
                            <div class="overlay" style="background-color: white">
                                <h3 class="w3-display-right">Vi giver dig adgang til særlige kampagner, som er
                                    fordelagtig for dig</h3>
                            </div>
                            <img src="Assets/Kampagne.png" style="max-width: 15%">
                            <span style="vertical-align: middle"></span>
                        </div>

                    </div>
                </div>
                <div class="row w3-padding">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="w3-padding w3-left-align w3-white w3-round-xxlarge container" style="margin-top:8%">
                            <h3>Skræddersyet løsning</h3>
                            <div class="overlay" style="background-color: white">
                                <h3 class="w3-display-container">Efter dit behov</h3>
                            </div>
                            <img src="Assets/Skræddersyet_løsning.png" style="max-width: 15%">
                            <span style="vertical-align: middle"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="w3-container w3-center"><a href="#referencer" class="w3-hover-opacity-off"><img
                src="Assets/arrow-down.png" class="w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom"
                style="width: 5%"></a></div>


    <!-- Slideshow referencer -->
    <div class="w3-padding-32" id="referencer"></div>
    <div class="w3-center">
        <h2>Referencer</h2>
        <p style="font-size: x-large">Vi har behandlet mere end 483 sager for vores kunder, alene i 2018.<br><br>
            Blandt vores kunder: </p>
    </div>
    <div class="w3-padding-16"></div>
    <div class="w3-container w3-center">
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/Altana.jpg" style="height: 150px">
            <img src="Assets/Køge Kommune .jpg" style="height: 150px">
        </div>
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/Mønhuset logo.jpg" style="height: 150px">
        </div>
        <div class="w3-display-container mySlides">
            <img src="Assets/HC container .jpg" style="height: 200px">
            <img src="Assets/EK - Enterprise .jpg" style="height: 200px">
        </div>
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/Dianalund Enterprise.jpg" style="height: 200px">
            <img src="Assets/Cphinvest Entreprise ApS.jpg" style="height: 70px">
        </div>
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/Hedensted VVS.jpg" style="height: 200px">
            <img src="Assets/Liborius.jpg" style="height: 200px">
        </div>
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/Londero.jpg" style="height: 200px">
            <img src="Assets/Lykkebo.jpg" style="height: 200px">
        </div>
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/Marcoplan .jpg" style="height: 150px">
            <img src="Assets/MD - Byg.jpg" style="height: 150px">
        </div>
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/Ole Larsen.jpg" style="height: 250px">
            <img src="Assets/Reno Norden.jpg" style="height: 200px">
        </div>
        <div class="w3-display-container mySlides w3-animate-opacity">
            <img src="Assets/Schlæger og Andersen .jpg" style="height: 150px">
            <img src="Assets/Skaarup Nielsen .jpg" style="height: 200px">
        </div>
    </div>
    <div class="w3-padding-64"></div>


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
		<div>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->

        <!--
		<p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a>
		</p>
		-->
    </footer>
    <!-- JS Script -->
    <script src="javascript/CollapsableScript.js"></script>
    <script src="javascript/hideandshowscript.js"></script>
    <script src="javascript/ImageslideshowScript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>