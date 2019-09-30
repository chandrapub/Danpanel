<?php
session_start();
// require( "includes/dbh.inc.php" );
require( "includes\dbh.inc.php" );
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Offentlig page</title>
    <style>
    html {
        scroll-behavior: smooth
    }
    </style>
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
    <div class="container-fluid" style="margin:0px; padding: 0px; position: relative">
        <div class="w3-center w3-display-middle">
            <div class="w3-text-white w3-animate-top w3-centered text-size">Det Offentlige</div>
        </div>

        <!-- <video src="Assets/privat.mov" autoplay muted loop class="image w3-round"
            style=" object-fit: fill; margin-top:0px; padding:0px"></video> -->
        <video src="Assets/Det offentlige .mov" autoplay muted loop class="image w3-round"></video>
        <div class="overlay-for-vid">
            <a href="#plans" class="w3-hover-opacity-off"><img src="Assets/arrow-down.png"
                    class="w3-display-bottommiddle w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom"
                    style="width: 5%"></a>
        </div>
    </div>

    <!-- Beskrivelse sektion -->
    <div class="w3-padding w3-center w3-padding-64" id="beskrivelse">
        <h3>Beskrivelse</h3>
        <div class="w3-card w3-padding w3-center" style="margin-left:10%; margin-right: 10%">
            <p class="w3-text-grey w3-center"><b>
                    På den offentlige del, arbejder DanPanel internt, med et dedikeret team<br> der har mere end 35 års
                    erfaring indenfor støtte/kontaktpersoner, og familiebehandling.<br> De er klar til at varetage
                    opgaver for kommunerne med social udsatte børn/ unge og familier.
                </b></p>
        </div>
    </div>

    <!-- vi tager action sektion -->
    <div class="container-fluid w3-card-3 w3-padding-36" id="plans">
        <div class="row">
            <div class="w3-center col-lg-12 col-md-12 col-sm-12">
                <h3>Vi tager Action:</h3>
            </div>
        </div>
        <div class="row w3-card w3-padding-24">
            <div class="w3-third w3-center col-lg-4 col-md-12 col-sm-12" style="height: ;">
                <p class="w3-text-grey w3-card-4" style="margin-left:3%; margin-right:3%"><b>
                        <i class="w3-text-black">Skræddersy din egen løsning</i> <br><br>
                        Vi tilpasser hver enkel arbejdsopgave efter aktuelle behov. I kan bestille en skræddersyet
                        ydelse gennem os, for at lette arbejdsbyrden og for at finde det perfekte match til den enkelte
                        borger.<br><br>

                        DanPanel er en portal som formidler kompetente og stærke konsulenter, der er klar til at
                        varetage opgaver for kommunerne med socialt udsatte børn/ unge og familier.<br><br>

                        At finde den rette person til den enkelte borger,<br> kan ofte være en tidskrævende proces for
                        socialrådgiveren/sagsbehandleren,<br> og det kan være svært at imødekomme borgerens specifikke
                        behov og ønsker, inden for eget regi.<br><br>
                    </b></p>
            </div>
            <div class="w3-third w3-center col-lg-4 col-md-12 col-sm-12">
                <p class="w3-text-grey w3-card-4" style="margin-left:3%; margin-right:3%"><b>
                        <i class="w3-text-black">Nemt og enkelt</i> <br><br>
                        DanPanel ønsker at gøre processen nemt og enkelt for den enkelte medarbejder. Det vil resultere
                        i, at være enkelt socialrådgiver/sagsbehandler ikke længere behøver at bruge unødige ressourcer
                        på at finde den rette indsats. <br><br>

                        Hos DanPanel kan socialrådgiveren/sagsbehandleren bestille en skræddersyet ydelse gennem os, for
                        at lette arbejdsbyrden og for at finde et perfekt match til den enkelte borger.<br><br>

                        Når du logger ind på DanPanel og opretter en sag, kan du holde dig opdateret med dine sager hos
                        os, hvor og når som helst, via vores interne styre portal, som minimum vil blive opdateret en
                        gang om ugen. <br><br>
                    </b><br></p>
            </div>

            <div class="w3-third w3-center col-lg-4 col-md-12 col-sm-12">
                <p class="w3-text-grey w3-card-4" style="margin-left:3%; margin-right:3%"><b>
                        <i class="w3-text-black">Bedre overblik</i> <br><br>
                        Dette vil give dig bedre overblik og mere effektiv kommunikation og mindske mange af de opkald
                        som kan være forgæves. Der er også mulighed for både at stille spørgsmål og få svar herigennem.
                        <br><br>

                        Ligeledes vil det blive nemmere at holde fokus på den udarbejdede handleplan, og lave nogle af
                        de skriftlige opdateringer der skal udarbejdes til den enkelte status.<br><br>

                        Vi tilbyder hurtig indsats, der tilpasses den enkelte sag, og vi kan fungere som tovholder i de
                        enkelte sager. Således at opgaven bliver en helhedsløsning både for kommunen og borgeren via
                        faglige personer på området. <br><br>

                    </b><br></p>
            </div>

        </div>





        <div class="w3-container w3-center"><a href="#produkter" class="w3-hover-opacity-off"><img
                    src="Assets/arrow-down.png" class="w3-animate-fading w3-padding w3-blue w3-circle w3-margin-bottom"
                    style="width: 5%"></a></div>

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
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text"
                            name="Name" required>
                    </div>
                    <div class="w3-section">
                        <label>Email</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text"
                            name="Email" required>
                    </div>
                    <div class="w3-section">
                        <label>Tlf Nr.(max 8 tegn)</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text"
                            name="Tlf" required>
                    </div>
                    <div class="w3-section">
                        <label>Emne</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject"
                            required>
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

        <!-- kontaktform modal -->
        <div id="contact" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                <div class="w3-center"><br>
                    <span onclick="document.getElementById('contact').style.display='none'"
                        class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                        src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
                <div class="w3-center w3-padding-64" id="contact"> <span
                        class="w3-xlarge w3-bottombar w3-border-green w3-padding-16">Kontakt Os</span> </div>
                <form class="w3-container" action="includes/contactform.inc.php" method="post">
                    <div class="w3-section">
                        <label>Navn</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text"
                            name="Name" required>
                    </div>
                    <div class="w3-section">
                        <label>Email</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text"
                            name="Email" required>
                    </div>
                    <div class="w3-section">
                        <label>Tlf Nr.(max 8 tegn)</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text"
                            name="Tlf" required>
                    </div>
                    <div class="w3-section">
                        <label>Emne</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject"
                            required>
                    </div>
                    <div class="w3-section">
                        <label>Besked</label>
                        <textarea class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message"
                            required></textarea>
                    </div>
                    <button type="submit" name="contact-submit" class="w3-button w3-green">Send</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('contact').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>

        <!-- Hvad tilbyder vi sektion -->
        <div class="w3-row-padding">
            <div class="w3-center w3-padding-64" id="produkter">
                <h3>Hvad tilbyder vi</h3>
                <p class="w3-text-grey"><b>Her kan du vælge og bestille de produkter som du har brug for.<br> Du vil
                        altid få overblik og følge med de løsninger/service du vælger via DanPanel: </b></p>
            </div>
            <!-- Familiekonsulent -->
            <div class="w3-third w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                    <li class="w3-blue w3-xlarge w3-padding-32">Familiekonsulent</li>
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round w3-padding-32"
                        src="Assets/Familiebehandling.jpeg" style="height: 35%; width:80%">

                    <button class="collapsible w3-padding-large">Læs Mere</button>
                    <div class="content">
                        <p> Alle mennesker har styrker og ressourcer, som kan fremmes, ved hjælp og opbakning, og en
                            anerkendende tilgang og dette er DanPanel`s opgave at støtte det enkelte menneske i denne
                            proces. Formålet med en familierådgivning er at yde pædagogisk, praktisk, eller anden støtte
                            i hjemmet til familier med børn hvor disse har behov for særlig støtte. Vi tager
                            udgangspunkt via forskellige pædagogiske og praktiske tiltag, til at hjælpe forældrene til
                            at få en bedre kontakt eller relation til børnene, samt får overblik og hjælp til andre ting
                            i familierelationen.<br>
                            <br> Denne indsats vægter vi højt, da det anses for at være af væsentlig betydning af hensyn
                            til barnets behov, for støtte og for familiens mulighed for ar kunne forblive sammen, på en
                            god og konstruktiv måde. </p>
                    </div>
                    <?php
				if($typeofuser=="offentlig"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id03').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </ul>
            </div>
            <!-- Kontaktperson / mentor  -->
            <div class="w3-third w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                    <li class="w3-xlarge w3-padding-32 w3-blue">Kontaktperson / Mentor</li>
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round w3-padding-32"
                        src="Assets/Kontaktperson.jpeg" style="height: 35%; width:80%"">
				<button class=" collapsible w3-padding-large">Læs Mere</button>
                    <div class="content">
                        <p> DanPanel har et bredt udvalg af kvalificerede medarbejderer, som har fagligt kendskab til en
                            kontaktordning. Kontaktpersonerne har erfaring i at motivere barnet og den unge i forhold
                            til de foreliggende handleplaner og opsatte mål og har stor erfaring med utilpassede børn og
                            unge som ved hvordan de skal motiveres hen mod deres mål og senere i forløbet arbejde med en
                            fastholdelse i en positiv udvikling. <br>
                            <br> Vi tilpasser kontaktperson indsatsen efter aktuelt behov. Vi gør meget ud af at finde
                            det rigtige match mellem barnet/unge og kontaktpersonen. </p>
                    </div>
                    <?php
				if($typeofuser=="offentlig"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id03').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </ul>
            </div>
            <!-- Job boost -->
            <div class="w3-third w3-margin-bottom">
                <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                    <li class="w3-xlarge w3-padding-32 w3-blue">Job Boost</li>
                    <img class="w3-card-4 w3-margin-top w3-margin-bottom w3-round w3-padding-32"
                        src="Assets/Job Boost.jpeg" style="height: 35%; width:80%"">
				<button class=" collapsible w3-padding-large">Læs Mere</button>
                    <div class="content">
                        <p>Vi oplever i mange udsatte familier, at der findes ledighed af forskellige årsager. Dette vil
                            vi med Job Boost forsøge at støtte de voksne med, at få muligheden til at komme tilbage på
                            arbejdsmarkedet, via workshops i bl.a. en kommunikationsmodel og motivation træning. Vi har
                            igennem tiden fået mange kandidater ud på arbejdsmarkedet via. vores workshops, det viser
                            sig med stor succes, at de klarer sig langt bedre pga. de har gennemgået vores workshops.
                        </p>
                    </div>
                    <?php
				if($typeofuser=="offentlig"){
					echo"
					<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id03').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Bestil her</button>";
				}
				else{
				echo"
				<li class=\"w3-light-grey w3-padding-24\">
					<button onClick=\"document.getElementById('id02').style.display='block'\" class=\"w3-button w3-green w3-padding-large w3-hover-blue w3-round\" style=\"width: 100%\">Kontakt Os</button>
					";}
				?>
                </ul>
            </div>
        </div>
        <div class="w3-padding-32"></div>

        <!-- Reference sektion -->
        <div class="w3-center w3-container" style="margin-left: 10%; margin-right: 10%">
            <h1>Referencer</h1>
            <h2>Det siger vores kunder</h2>
            <div class="w3-padding-24"></div>
            <div class="w3-text-grey mySlides w3-animate-opacity">
                <p style="font-size: 200%; font-style: italic"><b>&#10077; I forbindelse med samarbejde med DanPanel,
                        har jeg kun positivt at sige.<br><br>
                        Jeg har haft sager med DanPanel, og kontakten forinden opstart af ydelse var god, og de var
                        behagelige at være i<br><br> kontakt med. &#10078;</b></p>
            </div>
            <div class="w3-text-grey  mySlides w3-animate-opacity">
                <p style="font-size: 200%;font-style: italic"><b>&#10077; Jeg har en oplevelse af at det er en håndfuld
                        personale der brænder for deres arbejde og gør meget for at <br>
                        <br>
                        skræddersy et forløb og finde det helt rigtige match.<br><br> Man skal ikke selv være opsøgende
                        på den del og det synes jeg er rart. Jeg har været glad for samarbejdet og har <br>
                        <br>
                        brugt dem mange gange<br><br> da jeg synes at personalet og hele deres princip stemmer godt
                        overens med det jeg søger som sagsbehandler. &#10078;</b></p>
            </div>
            <div class="w3-text-grey mySlides w3-animate-opacity">
                <p style="font-size: 200%;font-style: italic"><b>&#10077; Kontaktperson fra DanPanel har været på en af
                        mine sager, hvor han fik opbygget en god relation til drengen.<br><br> Kontaktpersonen var god
                        til at oplyse om både de gode og dårlige fremskridt i udviklingen,<br><br> hvorfor der var et
                        godt samarbejde. Kontaktperson var ligeledes fleksibel ift. drenges behov og hverdag.
                        &#10078;</b></p>
            </div>
            <div class="w3-text-grey mySlides w3-animate-opacity">
                <p style="font-size: 200%;font-style: italic"><b>&#10077; Jeg har en oplevelse af, at de er meget
                        fleksible og meget hurtigt kan sætte et forløb i gang.<br><br> Udover det oplever jeg et
                        troværdigt personale der skriver hvis forholdende i familien ændre sig eller hvis familien <br>
                        <br>
                        ikke benytter sig af tilbuddet tilstrækkeligt. &#10077;</b></p>
            </div>
        </div>
        <!-- <div class="w3-padding-64"></div> -->
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
        </footer>

    </div><!-- login Modal Login/Logout -->
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


    <!-- kontaktform modal
	<div id="contact" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-center w3-padding-64" id="contact"> <span class="w3-xlarge w3-bottombar w3-border-green w3-padding-16">Kontakt Os</span> </div>
			<form class="w3-container" action="includes/contactform.inc.php" method="post">
				<div class="w3-section">
					<label>Navn</label>
					<input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Name" required>
				</div>
				<div class="w3-section">
					<label>Email</label>
					<input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Email" required>
				</div>
				<div class="w3-section">
					<label>Tlf Nr.(max 8 tegn)</label>
					<input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Tlf" required>
				</div>
				<div class="w3-section">
					<label>Emne</label>
					<input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject" required>
				</div>
				<div class="w3-section">
					<label>Besked</label>
					<textarea class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message" required></textarea>
				</div>
				<button type="submit" name="contact-submit" class="w3-button w3-green">Send</button>
			</form>
			<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
				<button onclick="document.getElementById('contact').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
			</div>
		</div>
	</div> -->
    <!-- JS Script -->
    <script src="javascript/CollapsableScript.js"></script>
    <script src="javascript/hideandshowscript.js"></script>
    <script src="javascript/ImageslideshowScript.js"></script>
    <!-- Id03 Modal Bestilling -->
    <div class="w3-row"> </div>
    <div id="id03" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('id03').style.display='none'"
                    class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img
                    src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
            <div class="w3-section">
                <form class="w3-container" action="includes/createoffentligorder.inc.php" method="post">
                    <div class="w3-third w3-center">
                        <input class="w3-section" type="radio" name="typeoforder" value="familiekonsulent">
                        Familiekonsulent
                    </div>
                    <div class="w3-third w3-center">
                        <input class="w3-section" type="radio" name="typeoforder" value="kontaktperson">
                        Kontaktperson/Mentor</div>
                    <div class="w3-thirdw3-center">
                        <input class="w3-section" type="radio" name="typeoforder" value="jobboost"> Job Boost
                    </div>

                    <div class="w3-half">
                        <label>Start Dato</label>
                        <input required class="w3-input w3-border w3-hover-border-black w3-section" type="date"
                            name="startdate" style="border: 0px">
                    </div>
                    <div class="w3-half">
                        <label>Opstartsmøde</label>
                        <input required class="w3-input w3-border w3-hover-border-black w3-section"
                            type="datetime-local" name="opstartsdate" style="border: 0px">
                    </div>
                    <label>Sagsnummer</label>
                    <input required class="w3-input w3-border w3-hover-border-black w3-section" type="text"
                        name="sagsnr" placeholder="Indtast ønsket sagsnummer">
                    <label>Ønsket varighed</label>
                    <select required class="w3-section w3-input w3-border w3-hover-border-blue" name="duration">
                        <option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg antal
                            måneder</option>
                        <option class="w3-bar-item w3-button" value="1">1 måned</option>
                        <option class="w3-bar-item w3-button" value="2">2 måneder</option>
                        <option class="w3-bar-item w3-button" value="3">3 måneder</option>
                        <option class="w3-bar-item w3-button" value="4">4 måneder</option>
                        <option class="w3-bar-item w3-button" value="5">5 måneder</option>
                        <option class="w3-bar-item w3-button" value="6">6 måneder</option>
                        <option class="w3-bar-item w3-button" value="7">7 måneder</option>
                        <option class="w3-bar-item w3-button" value="8">8 måneder</option>
                        <option class="w3-bar-item w3-button" value="9">9 måneder</option>
                        <option class="w3-bar-item w3-button" value="10">10 måneder</option>
                        <option class="w3-bar-item w3-button" value="11">11 måneder</option>
                        <option class="w3-bar-item w3-button" value="12">12 måneder</option>
                    </select>
                    <label>antal timer om ugen</label>
                    <input required class="w3-input w3-border w3-hover-border-black w3-section" type="text"
                        name="hoursprweek" placeholder="Indtast den ønskede mængde af timer om ugen">
                    <label>(valgfri) Giv en kort beskrivelse af arbjedsopgaven</label>
                    <textarea required rows="4" cols="50" class="w3-input w3-border w3-hover-border-black w3-section"
                        name="description"></textarea>
                    <button class="w3-input w3-border w3-hover-border-black w3-section w3-green"
                        formaction="includes/createoffentligorder.inc.php" type="submit"
                        name="createoffentligorder-submit">Bestil</button>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('id03').style.display='none'" type="button"
                        class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>