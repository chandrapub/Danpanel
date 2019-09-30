<?php
session_start();
require( "includes/dbh.inc.php" );
// require( "includes\dbh.inc.php" );
$uid = $_SESSION[ 'uid' ];
$name = $_SESSION[ 'name' ];
$email = $_SESSION[ 'email' ];
$phonenr = $_SESSION[ 'phonenr' ];
$sqlfamiliekonsulent = "SELECT * FROM offentligorders WHERE progressionoforder!=3 AND typeoforder='familiekonsulent';";
$sqlkontaktperson = "SELECT * FROM offentligorders WHERE progressionoforder!=3 AND typeoforder='kontaktperson';";
$sqljobboost = "SELECT * FROM offentligorders WHERE progressionoforder!=3 AND typeoforder='jobboost';";
if(!strpos($email, '@danpanel.dk') !==false){
	header("Location: ../Danpanel/min".$_SESSION['typeofuser']."profil.php");
	exit();
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="Assets/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/stylesheet.css">
	<title>Min Profil</title>
</head>
	
<body class="w3-animate-opacity" style="background: black">
	<!-- Navbar -->
	<!-- Links (sit on top) -->
	<div class="w3-top">
		<div class="w3-bar w3-white w3-wide w3-bottombar w3-padding w3-card"> <a href="index.php"><img src="Assets/logo-black.png" width="180" height="40" alt=""></a>
			<!-- Float links to the right. Hide them on small screens -->
			<div class="w3-right w3-hide-small"> <a href="offentligt.php" class="w3-bar-item w3-button">Offentligt</a> <a href="erhverv.php" class="w3-bar-item w3-button">Erhverv</a> <a href="privat.php" class="w3-bar-item w3-button">Privat</a> <a href="om.php" class="w3-bar-item w3-button">Om DanPanel</a>
				
				<?php
				if ( !isset( $_SESSION[ 'uid' ] ) ) {
					echo '<a onClick="document.getElementById(\'signup\').style.display=\'block\'" 
				class="w3-button w3-bar-item">Opret Profil</a>  
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-button w3-bar-item">Log ind</a>';
				} else if ( isset( $_SESSION[ 'uid' ]) ) {
					if(strpos($_SESSION['email'], '@danpanel')){
						echo'<a  name="minadminprofil-submit" method="post" href="minadminprofil.php" class="w3-bar-item w3-button">Min Profil</a>
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-button w3-bar-item">Log ud</a>';
					}
					else if (!strpos($_SESSION['email'], '@danpanel')){
					?><a  name="minprofil-submit" method="post"  class="w3-bar-item w3-button" <?php echo 'href="min'.$_SESSION['typeofuser'].'profil.php" '?>>Min Profil</a>
				<?php echo '
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-button w3-bar-item">Log ud</a>';
				}}
				?>
			</div>
		</div>
	</div>
		<!-- login Modal Login/Logout -->
	<div id="login" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round" style="max-width:600px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('login').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright w3-round" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
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
				<button onclick="document.getElementById('login').style.display='none'" type="button" class="w3-button w3-red w3-round">Cancel</button>
			</div>
		</div>
	</div>
	<!-- First Grid Valg af afdeling/produkter -->
	<div class="w3-padding-32"></div>
	<div class="w3-row" style="background-color: white">
		<div class="w3-half w3-container w3-center" style="height:700px">
			<!-- First page choose department -->
	<div class="w3-padding"></div>
	<div class="w3-row-padding w3-animate-opacity" id="first">
		<div class="w3-center w3-padding-64">
			<h3>Vælg afdeling</h3>
			<p>Klik på et billede for at se den gældende afdeling</p>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4">
				<div class="w3-display-topleft w3-green w3-padding">Offentligt</div>
				<a type="button" onClick="document.getElementById('first').style.display='none'; document.getElementById('offentlig').style.display='block'">
				<video src="Assets/Det offentlige .mov" autoplay muted loop class="image"></video>
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4">
				<div class="w3-display-topleft w3-green w3-padding">Erhverv</div>
				<a type="button" onClick="document.getElementById('first').style.display='none'; document.getElementById('erhverv').style.display='block'">
				<video src="Assets/erhverv.mov" autoplay muted loop class="image"></video>
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4">
				<div class="w3-display-topleft w3-green w3-padding">Privat</div>
				<a type="button" onClick="document.getElementById('first').style.display='none'; document.getElementById('privat').style.display='block'">
				<video src="Assets/privat.mov" autoplay muted loop class="image"></video>
				</a>
			</div>
		</div>
	</div>

	<!-- 2nd page Offentlig page choose product -->
	<div class="w3-row-padding w3-animate-zoom" style="display: none" id="offentlig">
		<div class="w3-center w3-padding-64">
			<h3>Vælg produkt</h3>
			<p>Klik på et billede for at se orderer for gældende produkt</p>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4">
				<div class="w3-display-topleft w3-green w3-padding">Familiekonsulent</div>
				<a type="button" onClick="document.getElementById('offentlig').style.display='none'; document.getElementById('familiekonsulent').style.display='block'">
				<img src="Assets/Familiebehandling.jpeg" class="image">
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4">
				<div class="w3-display-topleft w3-green w3-padding">Kontaktperson / Mentor</div>
				<a type="button" onClick="document.getElementById('offentlig').style.display='none'; document.getElementById('kontaktperson').style.display='block'">
				<img src="Assets/Kontaktperson.jpeg" class="image">
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4	">
				<div class="w3-display-topleft w3-green w3-padding">Job Boost</div>
				<a type="button" onClick="document.getElementById('offentlig').style.display='none'; document.getElementById('jobboost').style.display='block'">
				<img src="Assets/Job Boost.jpeg" class="image">
				</a>
			</div>
		</div>
		<button onClick="document.getElementById('offentlig').style.display='none'; document.getElementById('first').style.display='block'">Tilbage</button>
		
		<form action="searchorderspage.php" method="post">
			<input type="text" name="search" placeholder="Søg efter specific ordre">
			<button type="submit" name="search-offentlig-submit">Søg</button>
		</form>
	</div>
		
	
	
	
	<!--3rd Page Table of Familiekonsulent -->
	<div id="familiekonsulent" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="customers">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Opstarts dato</th>
						<th>Detaljer</th>
						<?php 
						$result = mysqli_query($conn, $sqlfamiliekonsulent);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeoforder"] ."</td>
									<td>". $row["opstartsdate"] ."</td>
									<td><form action='adminorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('familiekonsulent').style.display='none'; document.getElementById('offentlig').style.display='block'">Tilbage</button>
			</div>
	<!--3rd Page Table of Kontaktperson / Mentor -->
	<div id="kontaktperson" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="customers">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Opstarts dato</th>
						<th>Detaljer</th>
						<?php 
						$result = mysqli_query($conn, $sqlkontaktperson);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeoforder"] ."</td>
									<td>". $row["opstartsdate"] ."</td>
									<td><form action='adminorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('kontaktperson').style.display='none'; document.getElementById('offentlig').style.display='block'">Tilbage</button>
			</div>
	
	<!--3rd Page Table of Jobboost -->
	<div id="jobboost" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="customers">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Opstarts dato</th>
						<th>Detaljer</th>
						<?php 
						$result = mysqli_query($conn, $sqljobboost);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeoforder"] ."</td>
									<td>". $row["opstartsdate"] ."</td>
									<td><form action='adminorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('jobboost').style.display='none'; document.getElementById('offentlig').style.display='block'">Tilbage</button>
			</div>
			
	<!--2nd page erhverv produkter -->
		<div class=" w3-animate-zoom" style="display: none" id="erhverv">
		<div class="w3-center w3-padding-32">
			<h3>Vælg produkt</h3>
			<p>Klik på et billede for at se orderer for gældende produkt</p>
		</div>
		<div class="w3-container w3-row-padding">
			<div class="w3-third w3-margin-bottom">
				<div class="container w3-hover-black w3-card-4">
					<div class="w3-display-topleft w3-green w3-padding">Vikar og Rekruttering</div>
					<a type="button" onClick="document.getElementById('erhverv').style.display='none'; document.getElementById('vikarrekrutteringtable').style.display='block'">
					<img src="Assets/Alm. REkruttering.jpeg" class="image">
					</a>
				</div>
			</div>
			<div class="w3-third w3-margin-bottom">
				<div class="container w3-hover-black w3-card-4">
					<div class="w3-display-topleft w3-green w3-padding">Alarm og Overågning</div>
					<a type="button" onClick="document.getElementById('erhverv').style.display='none'; document.getElementById('alarmtable').style.display='block'">
					<img src="Assets/Alarm-system.jpeg" class="image">
					</a>
				</div>
			</div>
			<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4	">
				<div class="w3-display-topleft w3-green w3-padding">Rengøring og Oprydning</div>
				<a type="button" onClick="document.getElementById('erhverv').style.display='none'; document.getElementById('rengoeringtable').style.display='block'">
				<img src="Assets/Rengøring.jpg" class="image">
				</a>
			</div>
		</div>
		</div>
		<div class="w3-container w3-row-padding">
			<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4	">
				<div class="w3-display-topleft w3-green w3-padding">Erhvervlejemål</div>
				<a type="button" onClick="document.getElementById('erhverv').style.display='none'; document.getElementById('erhvervlejemaaltable').style.display='block'">
				<img src="Assets/Erhverhvslejemaal.jpg" class="image">
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4	">
				<div class="w3-display-topleft w3-green w3-padding">Kørebog system</div>
				<a type="button" onClick="document.getElementById('erhverv').style.display='none'; document.getElementById('koerebogtable').style.display='block'">
				<img src="Assets/thumbnail (1).png" class="image">
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
				<div class="container w3-hover-black w3-card-4	">
					<div class="w3-display-topleft w3-green w3-padding">Digitalisering</div>
					<a type="button" onClick="document.getElementById('erhverv').style.display='none'; document.getElementById('digitaliseringtable').style.display='block'">
					<img src="Assets/DigitaliseringNy.png" class="image">
					</a>
				</div>
			</div>
		<button onClick="document.getElementById('erhverv').style.display='none'; document.getElementById('first').style.display='block'">Tilbage</button>
			
			<form action="searchorderspage.php" method="post">
			<input type="text" name="search" placeholder="Søg efter specific ordre">
			<button type="submit" name="search-erhverv-submit">Søg</button>
			</form>
		</div>
	</div>
			
	<!-- 3rd page tables -->
			<!-- Vikar tables -->
			<div id="vikarrekrutteringtable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="vikar">
						<th>Sagsnummer</th>
						<th>Type af opgave</th>
						<th>Virksomhedsnavn</th>
						<th>Detaljer</th>
						<?php
						$sqlvikarrekruttering ="SELECT * FROM vikarrekruttering WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlvikarrekruttering);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeafopgave"] ."</td>
									<td>". $row["virksomhedsnavn"] ."</td>
									<td><form action='vikarrekrutteringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('vikarrekrutteringtable').style.display='none'; document.getElementById('erhverv').style.display='block'">Tilbage</button>
			</div>
			
		<!-- Alarm tables -->
			<div id="alarmtable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="alarm">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Sikkerhedstjek</th>
						<th>Detaljer</th>
						<?php
						$sqlalarm ="SELECT * FROM alarmovervaagning WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlalarm);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["kontaktperson"] ."</td>
									<td>". $row["sikkerhedscheck"] ."</td>
									<td><form action='alarmovervaagningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('alarmtable').style.display='none'; document.getElementById('erhverv').style.display='block'">Tilbage</button>
			</div>
			
		<!-- Digitalisering tables -->
			<div id="digitaliseringtable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="digitalisering">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Firma adresse</th>
						<th>Detaljer</th>
						<?php
						$sqldigitalisering ="SELECT * FROM digitalisering WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqldigitalisering);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["kontaktperson"] ."</td>
									<td>". $row["firmaadresse"] ."</td>
									<td><form action='digitaliseringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('digitaliseringtable').style.display='none'; document.getElementById('erhverv').style.display='block'">Tilbage</button>
			</div>
			
		<!-- Erhvervlejemål tables -->
			<div id="erhvervlejemaaltable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="erhvervlejemaal">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Type af lokale</th>
						<th>Detaljer</th>
						<?php
						$sqlerhverlejemaal ="SELECT * FROM erhvervlejemaal WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlerhverlejemaal);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["kontaktperson"] ."</td>
									<td>". $row["typeaflokale"] ."</td>
									<td><form action='erhvervslejemaalorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('erhvervlejemaaltable').style.display='none'; document.getElementById('erhverv').style.display='block'">Tilbage</button>
			</div>
			
		<!-- Kørebog tables -->
			<div id="koerebogtable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="koerebog">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Møde tidspunkt</th>
						<th>Detaljer</th>
						<?php
						$sqlkoerebog ="SELECT * FROM koerebog WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlkoerebog);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["kontaktperson"] ."</td>
									<td>". $row["moede"] ."</td>
									<td><form action='koerebogorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('koerebogtable').style.display='none'; document.getElementById('erhverv').style.display='block'">Tilbage</button>
			</div>
			
		<!-- Rengøring tables -->
			<div id="rengoeringtable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="rengoering">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Opgave type</th>
						<th>Detaljer</th>
						<?php
						$sqlrengoering ="SELECT * FROM rengoering WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlrengoering);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["kontaktperson"] ."</td>
									<td>". $row["opgavetype"] ."</td>
									<td><form action='rengoeringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('rengoeringtable').style.display='none'; document.getElementById('erhverv').style.display='block'">Tilbage</button>
			</div>
			
		<!--2nd page privat produkter -->
		<div class="w3-row-padding w3-animate-zoom" style="display: none" id="privat">
		<div class="w3-center w3-padding-32">
			<h3>Vælg produkt</h3>
			<p>Klik på et billede for at se orderer for gældende produkt</p>
		</div>
		<div class="w3-container w3-row-padding">
			<div class="w3-third w3-margin-bottom">
				<div class="container w3-hover-black w3-card-4">
					<div class="w3-display-topleft w3-green w3-padding">Rengøring og Service</div>
					<a type="button" onClick="document.getElementById('privat').style.display='none'; document.getElementById('rengoeringprivattable').style.display='block'">
					<img src="Assets/Rengøring - Privat .jpg" class="image">
					</a>
				</div>
			</div>
			<div class="w3-third w3-margin-bottom">
				<div class="container w3-hover-black w3-card-4">
					<div class="w3-display-topleft w3-green w3-padding">Alarm og Overågning</div>
					<a type="button" onClick="document.getElementById('privat').style.display='none'; document.getElementById('alarmprivattable').style.display='block'">
					<img src="Assets/Alarm-system.jpeg" class="image">
					</a>
				</div>
			</div>
			<div class="w3-third w3-margin-bottom">
				<div class="container w3-hover-black w3-card-4	">
					<div class="w3-display-topleft w3-green w3-padding">Renovering</div>
					<a type="button" onClick="document.getElementById('privat').style.display='none'; document.getElementById('renoveringprivattable').style.display='block'">
					<img src="Assets/Renovering.jpeg" class="image">
					</a>
				</div>
			</div>
		</div>
	<div class="w3-container w3-row-padding">
			<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4	">
				<div class="w3-display-topleft w3-green w3-padding">Fagforening</div>
				<a type="button" onClick="document.getElementById('privat').style.display='none'; document.getElementById('fagforeningtable').style.display='block'">
				<img src="Assets/7.jpeg" class="image">
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4	">
				<div class="w3-display-topleft w3-green w3-padding">Jobtilbud</div>
				<a type="button" onClick="document.getElementById('privat').style.display='none'; document.getElementById('jobtilbudtable').style.display='block'">
				<img src="Assets/thumbnail.jpeg" class="image">
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4	">
				<div class="w3-display-topleft w3-green w3-padding">Kørebog system</div>
				<a type="button" onClick="document.getElementById('privat').style.display='none'; document.getElementById('koerebogprivattable').style.display='block'">
				<img src="Assets/thumbnail (1).png" class="image">
				</a>
			</div>
		</div>
	</div>
		<button onClick="document.getElementById('privat').style.display='none'; document.getElementById('first').style.display='block'">Tilbage</button><br>
			
			<form action="searchorderspage.php" method="post">
			<input type="text" name="search" placeholder="Søg efter specific ordre">
			<button type="submit" name="search-privat-submit">Søg</button>
		</form>
			</div>
			
		<!-- 3rd page privat tables -->
			<!-- Rengøring tables -->
			<div id="rengoeringprivattable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="rengoeringprivat">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Type af opgave</th>
						<th>Detaljer</th>
						<?php
						$sqlrengoeringprivat ="SELECT * FROM rengoering WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlrengoeringprivat);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["kontaktperson"] ."</td>
									<td>". $row["opgavetype"] ."</td>
									<td><form action='rengoeringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('rengoeringprivattable').style.display='none'; document.getElementById('privat').style.display='block'">Tilbage</button>
			</div>
			
			<!-- Renovering tables -->
			<div id="renoveringprivattable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="renoveringprivat">
						<th>Sagsnummer</th>
						<th>Type af opgave</th>
						<th>Booket møde</th>
						<th>Detaljer</th>
						<?php
						$sqlrenoveringprivat ="SELECT * FROM renovering WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlrenoveringprivat);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeafopgave"] ."</td>
									<td>". $row["booketmoede"] ."</td>
									<td><form action='renoveringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('renoveringprivattable').style.display='none'; document.getElementById('privat').style.display='block'">Tilbage</button>
			</div>

		<!-- alarm privat tables -->
			<div id="alarmprivattable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="alarmprivat">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Sikkerhedstjek</th>
						<th>Detaljer</th>
						<?php
						$sqlalarmprivat ="SELECT * FROM alarmovervaagning WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlalarmprivat);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["kontaktperson"] ."</td>
									<td>". $row["sikkerhedscheck"] ."</td>
									<td><form action='alarmovervaagningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('alarmprivattable').style.display='none'; document.getElementById('privat').style.display='block'">Tilbage</button>
			</div>
			
		<!-- Fagforening tables -->
			<div id="fagforeningtable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="fagforening">
						<th>Sagsnummer</th>
						<th>Adresse</th>
						<th>Booket møde</th>
						<th>Detaljer</th>
						<?php
						$sqlfagforening ="SELECT * FROM fagforening WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlfagforening);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["adresse"] ."</td>
									<td>". $row["booketmoede"] ."</td>
									<td><form action='fagforeningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('fagforeningtable').style.display='none'; document.getElementById('privat').style.display='block'">Tilbage</button>
			</div>
			
		<!-- Jobtilbud tables -->
			<div id="jobtilbudtable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="jobtilbud">
						<th>Sagsnummer</th>
						<th>Adresse</th>
						<th>Booket møde</th>
						<th>Detaljer</th>
						<?php
						$sqljobtilbud ="SELECT * FROM jobtilbud WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqljobtilbud);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["adresse"] ."</td>
									<td>". $row["booketmoede"] ."</td>
									<td><form action='jobtilbudorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('jobtilbudtable').style.display='none'; document.getElementById('privat').style.display='block'">Tilbage</button>
			</div>
			
		<!-- Kørebog tables -->
			<div id="koerebogprivattable" class="w3-padding-64 w3-center w3-animate-opacity" style="display: none">
				<h2>Igangværende Ordre</h2>
				<p>en oversigt ordre</p>
				<div class="w3-container w3-responsive">
					<table class=" container w3-center" id="koerebogprivat">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Booket møde</th>
						<th>Detaljer</th>
						<?php
						$sqlkoerebogprivat ="SELECT * FROM koerebog WHERE progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlkoerebogprivat);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["kontaktperson"] ."</td>
									<td>". $row["moede"] ."</td>
									<td><form action='koerebogorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							// echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
		<button onClick="document.getElementById('koerebogprivattable').style.display='none'; document.getElementById('privat').style.display='block'">Tilbage</button>
			</div>
	
		</div>
		<!--Second Grid Mine Oplysninger -->
		<div class="w3-half w3-container w3-green" style="height:700px">
			<div class="w3-padding-32 w3-center">
				<h1>Mine Oplysninger</h1>
				<?php 
				$sqlimage = "SELECT * FROM adminuser WHERE adminuid=$uid;";
				$resultimage = mysqli_query($conn, $sqlimage);
				$rowimage = mysqli_fetch_assoc($resultimage);
				$imagepath = $rowimage['image'];
				if(isset($rowimage['image'])){
					echo '<img src='.$imagepath.' class="w3-margin w3-circle" alt="Person" style="width:25%">';
				} else{
					echo '<img src="Assets/IHLNO.jpg" class="w3-margin w3-circle" alt="Person" style="width:25%">';
				}
				?>
				<form method="post" action="includes/uploadimage.inc.php" enctype="multipart/form-data">
				<input name="image" type="file"> 
				<button type="submit" name="image-submit">Upload personligt billed</button>
				</form>
				<div class="w3-left-align w3-padding-large">
					<form class="w3-container" action="includes/signup.inc.php" method="post">
						
						<label>Navn</label>
						<h3 class="w3-block w3-blue w3-center w3-round"><?php echo $name ; ?> <br></h3>
						<label>E-mail</label>
						<h3 class="w3-block w3-blue w3-center w3-round"><?php echo $email ; ?> <br></h3>
						<label>Tlf Nr</label>
						<h3 class="w3-block w3-blue w3-center w3-round"><?php echo $phonenr ; ?></h3>
						
						<a class="w3-button w3-hover-blue-gray w3-blue w3-round" onClick="document.getElementById('id02').style.display='block'">Rediger Min Profil</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Id02 Modal rediger profil -->
	<div id="id02" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-center w3-padding-64" id="contact"> <span class="w3-xlarge w3-bottombar w3-border-green w3-padding-16">Min Profil</span> </div>
			<form class="w3-container" action="includes/edit.inc.php" method="post">
			<div class="w3-container">
				<input type="text" class="w3-input w3-border w3-hover-border-black w3-section w3-round" value="<?php echo $name;?>" name="name">
				<input type="text" class="w3-input w3-border w3-hover-border-black w3-section w3-round" value="<?php echo $email;?>" name="email">
				<input type="text" class="w3-input w3-border w3-hover-border-black w3-section w3-round" value="<?php echo $phonenr;?>" name="phonenr">
				<button type="submit" formaction="includes/edit.inc.php" class="w3-input w3-border w3-hover-border-black w3-section w3-green w3-round" name="edit-submit">Udfør</button>
			</div>
			</form>
			<div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-round">
				<button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red w3-round" >Cancel</button>
			</div>
		</div>
	</div>
	<!-- Third Grid: Igangværende Ordre -->
	<div class="w3-row">
		<div class="w3-threequarter w3-container w3-blue" style="min-height:800px">
			
			<div class="w3-padding-64 w3-center" id="igangværende">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('igangværende').style.display='none';document.getElementById('arkiv').style.display='block'">Tryk for at se arkiv </button>
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<!-- Offentlige ordre -->
					<h4>Offentlige ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af ordre</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM offentligorders WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeoforder"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='adminorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Vikar rekruttering table admins -->
					<h4>Vikar og Rekruttering ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af opgave</th>
						<th>Status for bestilling</th>
						<?php 
						$sqlvikar = "SELECT * FROM vikarrekruttering WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sqlvikar);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeafopgave"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='vikarrekrutteringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Alarm og Overvågning table admins -->
					<h4>Alarm og Overvågning ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM alarmovervaagning WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["firmaadresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='alarmovervaagningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Digitalisering table admins -->
					<h4>Digitalisering ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM digitalisering WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["firmaadresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='digitaliseringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Erhvervlejemål table admins -->
					<h4>Erhvervlejemål ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af lokale</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM erhvervlejemaal WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeaflokale"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='erhvervslejemaalorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Kørebog table admins -->
					<h4>Kørebog ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM koerebog WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["firmaadresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='koerebogorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Rengøring og oprydning table admins -->
					<h4>Rengøring og Oprydning ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af opgave</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM rengoering WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["opgavetype"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='rengoeringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Renovering table admins -->
					<h4>Renovering ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af opgave</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM renovering WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeafopgave"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='renoveringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Fagforening table admins -->
					<h4>Fagforening ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM fagforening WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["adresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='fagforeningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Jobtilbud table admins -->
					<h4>Jobtilbud ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM jobtilbud WHERE adminuid=$uid AND progressionoforder!=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["adresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='jobtilbudorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
			</div>
		
		

			<!--Arkiv ordre -->
			<div class="w3-padding-64 w3-center" id="arkiv" style="display: none">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('arkiv').style.display='none';document.getElementById('igangværende').style.display='block'"> Tryk for at se igangværende ordrer </button>
				<h2>Arkiv</h2>
				<p>En oversigt over dine afsluttede ordre</p>
				<div class="w3-container w3-responsive">
						<h4>Offentlige ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af ordre</th>
						<th>Status for bestilling</th>
						<?php 
						$adminuid=$_SESSION['uid'];
						$sqlarchieve = "SELECT * FROM offentligorders WHERE adminuid=$uid AND progressionoforder=3;";	
						$result = mysqli_query($conn, $sqlarchieve);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeoforder"] ."</td>
									<td>
									<div class=\"outer\" style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class=\"inner1 w3-white\" style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class=\"inner\" style='width:".$currentprogress."%'>
											<div>Ordre Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner\" style='width:".$currentprogress."%'>
											<div>Ordre under behandling</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									}
									 ?>
						<?php echo"
									</div></div></div>
									</td>
									<td>". $row["enddate"] ."</td>
									<td><form action='adminorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Vikar rekruttering table admins -->
					<h4>Vikar og Rekruttering ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af opgave</th>
						<th>Status for bestilling</th>
						<?php 
						$sqlvikar = "SELECT * FROM vikarrekruttering WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sqlvikar);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeafopgave"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='vikarrekrutteringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Alarm og Overvågning table admins -->
					<h4>Alarm og Overvågning ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM alarmovervaagning WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["firmaadresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='alarmovervaagningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Digitalisering table admins -->
					<h4>Digitalisering ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM digitalisering WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["firmaadresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='digitaliseringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Erhvervlejemål table admins -->
					<h4>Erhvervlejemål ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af lokale</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM erhvervlejemaal WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeaflokale"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='erhvervslejemaalorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Kørebog table admins -->
					<h4>Kørebog ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM koerebog WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["firmaadresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='koerebogorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Rengøring og oprydning table admins -->
					<h4>Rengøring og Oprydning ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af opgave</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM rengoering WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["opgavetype"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='rengoeringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Renovering table admins -->
					<h4>Renovering ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Type af opgave</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM renovering WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeafopgave"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='renoveringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Fagforening table admins -->
					<h4>Fagforening ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM fagforening WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["adresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>

											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='fagforeningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
					<div class="w3-padding-16"></div>
					<!-- Jobtilbud table admins -->
					<h4>Jobtilbud ordre:</h4>
					<table class=" container w3-center">
						<th>Sagsnr</th>
						<th>Adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM jobtilbud WHERE adminuid=$uid AND progressionoforder=3;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr class='w3-center'>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["adresse"] ."</td>
									<td>
									<div class='outer' style='width:".$totalprogress."%'>"?>
									<?php
									switch($progress){
										case "0":
											echo "
											
											<div class='inner1 w3-white' style='width:".$totalprogress."%'>
											<div>Afventer Godkendelse</div>";
											break;
										case "1":
											echo "
											
											<div class='inner w3-white' style='width:".$currentprogress."%'>
											<div>Godkendt</div>";
											break;
										case "2":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Behandles</div>";
											break;
										case "3":
											echo "
											<div class=\"inner w3-white\" style='width:".$currentprogress."%'>
											<div>Ordre Gennemført</div>";
											break;
									} ?>
						<?php echo"
									</div></div></div>
									</td>
									<td><form action='jobtilbudorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
			</div>
		</div>
	
		<!-- Fourth Grid Opret Bruger, Ordre, slet bruger -->
		<div class="w3-quarter w3-container w3-black">
			<div class="w3-padding-64 w3-center" >
				<h2>Opret Menu</h2>
				<p>Her kan du oprette kunder, ordrer og se alle kunder</p>
				<button class="w3-padding w3-round w3-white w3-button" onClick="document.getElementById('signup').style.display='block'">Opret kunde</button><br>
				<div class="w3-padding-16"></div>
				<button class="w3-padding w3-round w3-white w3-button" onClick="document.getElementById('mainpage').style.display='block'">Opret Ordre</button>
				<div class="w3-padding-16"></div>
				<button class="w3-padding w3-round w3-white w3-button" onClick="document.getElementById('id06').style.display='block'">Se alle brugerer</button>
			</div>
		</div>
			</div>
			<!-- id06 Modal se alle users -->
			<div id="id06" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('id06').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-section">
				<form class="w3-container" action="includes/deleteuser.inc.php" method="post">
					<div class="w3-container w3-responsive">
					<table class="container w3-center">
						<th>Navn</th>
						<th>Email</th>
						<th>Tlf</th>
						<th>Type af bruger</th>
						<th>Nyhedsbrev</th>
						<?php 
						$allusersql = "SELECT * FROM users;";
						$result = mysqli_query($conn, $allusersql);
						/* $result = mysqli_query($conn, $sql); */
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								echo 
								"<tr class='w3-center'>
									<td>". $row["name"] ."</td>
									<td>". $row["email"] ."</td>
									<td>". $row["phonenr"] ."</td>
									<td>". $row["typeofuser"] ."</td>
									<td>". $row['nyhedsbrev']. "</td>
									<td><button class=\"w3-input w3-border w3-hover-border-black w3-right w3-button w3-red\" type=\"submit\" name=\"deleteuser-submit\">Slet bruger</button></td>
									<input type='hidden' name='uid' value=".$row['uid'].">
									
								</tr>";
							}
							echo "</table>";
							
						}
					
					else { echo "Ingen brugerer fundet"; }
					?>
					</table>
				</div>
				</form>
				<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
					<button onclick="document.getElementById('id06').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				</div>
			</div>
		</div>
	</div>
			
	<div class: ".outter">
		<div class=".inner" style="width:  echo $row['progressionoforder']>"></div>
	</div>
			</div>

	<!--signup Modal Opret kunde -->
	<div id="signup" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round" style="max-width:600px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('signup').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright w3-round" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-section">
				<form class="w3-container" action="includes/signup.inc.php" method="post">
					<div class="w3-center w3-padding-16">
					<h3>Vælg afdeling <br> *kun en afdeling må vælges*</h3><br>
					<div class="w3-third w3-blue w3-round w3-xlarge" style="max-width: 25%; margin-left: 4%;margin-right: 4%">
						<label>Offentlig</label>
						<input  type="checkbox" value="offentlig" name="typeofuser" onclick="myEanHideAndShowFunction()">
					</div>	
					<div class="w3-third w3-blue w3-round w3-xlarge" style="max-width: 25%; margin-left: 4%;margin-right: 4%">
						<label>Erhverv</label>
						<input  type="checkbox" value="erhverv" name="typeofuser" onclick="myCvrHideAndShowFunction()"></input>
					</div>
					<div class="w3-third w3-blue w3-round w3-xlarge" style="max-width: 25%; margin-left: 4%;margin-right: 4%">
						<label>Privat</label>
						<input  type="checkbox" value="privat" name="typeofuser" onclick="myFødselsDatoHideAndShowFunction()"></input>
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
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="phonenr" placeholder="Tlf NR.(max 8 tegn)" value="' . $_GET[ "phonenr" ] . '">';
					} else {
						echo '<input type="text" class="w3-input w3-border w3-hover-border-black w3-section" name="phonenr" placeholder="Tlf NR.(max 8 tegn)">';
					}
					?>
					<input type="text" id="ean" class="w3-input w3-border w3-hover-border-black w3-section" name="ean" placeholder="EAN Nr" style="display: none"></input>
					<input type="text" id="cvr" class="w3-input w3-border w3-hover-border-black w3-section" name="cvr" placeholder="CVR Nr" style="display: none"></input>
					<input type="date" id="fødselsdato" class="w3-input w3-border w3-hover-border-black w3-section" name="fødselsdato" placeholder="yyyy-mm-dd" style="display: none"></input>
					<input type="password" class="w3-input w3-border w3-hover-border-black w3-section" name="pwd" placeholder="Password">
					<input type="password" class="w3-input w3-border w3-hover-border-black w3-section" name="pwd-repeat" placeholder="Gentag password">
	
					<label>Vil du have nyhedsbreve fra Danpanel?</label>	
					<input  type="checkbox" checked value="ja" name="nyhedsbrev">
	
					<a href="Vilkår . DP.pdf" target="_blank" class="w3-right">Læs om Vilkår</a><br><br>
					<a href="Cookie-og-privatlivspolitik.pdf" target="_blank" class="w3-right">Læs om Cookies og Privatpolitik</a><br>
	
					<button type="submit" class="w3-button w3-green w3-margin-bottom w3-round" name="signup-submit">Opret Bruger</button>
				</form>

				<div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-round">
					<button onclick="document.getElementById('signup').style.display='none'" type="button" class="w3-button w3-red w3-round">Cancel</button>
				</div>
			</div>
		</div>
	</div>
		
	<!-- erhvervpage Modal Bestilling -->
	<div class="w3-row"> </div>

	<div class="w3-modal" id="mainpage">
		<div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width: 800px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('mainpage').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
		<div class="w3-center w3-padding-64">
			<h3>Vælg afdeling</h3>
			<p>Klik på et billede for at se den gældende afdeling</p>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4">
				<div class="w3-display-topleft w3-green w3-padding">Offentligt</div>
				<a type="button" onClick="document.getElementById('mainpage').style.display='none'; document.getElementById('offentligpage').style.display='block'">
				<video src="Assets/Det offentlige .mov" autoplay muted loop class="image"></video>
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4">
				<div class="w3-display-topleft w3-green w3-padding">Erhverv</div>
				<a type="button" onClick="document.getElementById('mainpage').style.display='none'; document.getElementById('erhvervpage').style.display='block'">
				<video src="Assets/erhverv.mov" autoplay muted loop class="image"></video>
				</a>
			</div>
		</div>
		<div class="w3-third w3-margin-bottom">
			<div class="container w3-hover-black w3-card-4">
				<div class="w3-display-topleft w3-green w3-padding">Privat</div>
				<a type="button" onClick="document.getElementById('mainpage').style.display='none'; document.getElementById('privatpage').style.display='block'">
				<video src="Assets/privat.mov" autoplay muted loop class="image"></video>
				</a>
			</div>
		</div>
	</div>
</div>
	
	<div id="offentligpage" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:800px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('offentligpage').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"><br>
<button onClick="document.getElementById('offentligpage').style.display='none'; document.getElementById('mainpage').style.display='block'">Tilbage til udvalg</button> </div>
				
			<div class="w3-section">
				<form class="w3-container" action="includes/createoffentligorder.inc.php" method="post">
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<div class="w3-third ">
						<input class="w3-section" type="radio" name="typeoforder" value="familiekonsulent"> Familiekonsulent
					</div>
					<div class="w3-third">	
						<input class="w3-section" type="radio" name="typeoforder" value="kontaktperson"> Kontaktperson/Mentor</div>
					<div class="w3-third">
						<input class="w3-section" type="radio" name="typeoforder" value="jobboost"> Job Boost
					</div>
					<div class="w3-half">
						<label>Start Dato</label>
						<input class="w3-input w3-border w3-hover-border-black w3-section" type="date" name="startdate" style="border: 0px">
					</div>
					<div class="w3-half">
						<label>Opstartsmøde</label>
						<input class="w3-input w3-border w3-hover-border-black w3-section" type="datetime-local" name="opstartsdate" style="border: 0px">
					</div>
					<label>Sagsnummer</label>
					<input class="w3-input w3-border w3-hover-border-black w3-section" type="text" name="sagsnr" placeholder="Indtast ønsket sagsnummer">
					<label>Ønsket varighed</label>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="duration">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg antal måneder</option>
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
					<input class="w3-input w3-border w3-hover-border-black w3-section" type="text" name="hoursprweek" placeholder="Indtast den ønskede mængde af timer om ugen">
					<label>DanPanel's medarbejder der arbejder på denne sag</label>
					<label>(valgfri) Giv en kort beskrivelse af arbjedsopgaven</label>
					<textarea rows="4" cols="50" class="w3-input w3-border w3-hover-border-black w3-section" name="description"></textarea>
					<button class="w3-input w3-border w3-hover-border-black w3-section w3-green" formaction="includes/createoffentligorder.inc.php" type="submit" name="createoffentligorder-submit">Bestil</button>
				</form>
				<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
					<button onclick="document.getElementById('offentligpage').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<div id="erhvervpage" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:50%">
			<div class="w3-center"><br>
				
				<span onclick="document.getElementById('erhvervpage').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"><br><div class="w3-center w3-padding-32">
			<h3>Erhverv</h3>
			<p>Klik på knapperne for at begynde den gældende bestilling </p>
		</div>
<button onClick="document.getElementById('erhvervpage').style.display='none'; document.getElementById('mainpage').style.display='block'">Tilbage til de 3 afdelinger</button> </div>
			<div class="w3-section w3-animate-opacity" id="main">
				
				<div class="w3-center w3-container">
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('erhvervvikar').style.display='block'">Vikar og Rekruterring</button>
				</div>
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('erhvervalarm').style.display='block'">Alarm og Overvågning</button>
				</div>
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('digitaliseringmodal').style.display='block'">Digitalisering</button>
				</div>
				
				<br><div class="w3-padding-32"></div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('erhvervrengoering').style.display='block'">Rengøring og Oprydning</button>
				</div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('lejemålmodal').style.display='block'">Erhvervslejemål</button>
				</div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('erhvervkoerebog').style.display='block'">Kørebog System</button>
				</div>
					
				<br><div class="w3-padding-32"></div>
				</div>
					
				</div>
				<!-- her starter de forskellige views som kunden kan vælge imellem -->
			
				<!-- view for create vikar og rekruttering -->
				<form id="erhvervvikar" style="display: none" class="w3-container w3-animate-opacity" action="includes/createvikarrekrutteringorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('erhvervvikar').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Vikar og Rekruttering</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Navnet på virksomheden</label>
					<input name="virksomhedsnavn" class="w3-border w3-input">
					
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea name="beskrivelse" cols="70" rows="4"></textarea><br>

					
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
					
					<Label>Betalling</Label><br>
					
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for alarm og overvågning -->
				<form id="erhvervalarm" style="display: none" class="w3-container w3-animate-opacity" action="includes/createalarmovervaagningorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('erhvervalarm').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Alarm og Overågning</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sikkerhedscheck</label>
					<input name="sikkerhedscheck" class="w3-input w3-border w3-hover-border-black" type="datetime-local"  style="border: 0px">
					
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
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
				<!-- view for digitalisering -->
				<form id="digitaliseringmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createdigitaliseringorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('digitaliseringmodal').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Digitalisering</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea name="beskrivelse" cols="70" rows="4"></textarea><br>
					
					<label>Firma adresse</label>
					<input name="firmaadresse" class="w3-border w3-input">
					
					<label>Faktura Email</label>
					<input name="fakturaemail" class="w3-border w3-input">
					
					<label>*Ikke obligatorisk* EAN Nummer</label>
					<input name="ean" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for rengøring-->
			<form id="erhvervrengoering" style="display: none" class="w3-container w3-animate-opacity" action="includes/createrengoeringorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('erhvervrengoering').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
				
					<h4 class="w3-center">Rengøring</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Kundenavn</label>
					<input name="virksomhedsnavn" class="w3-border w3-input">
					
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea name="beskrivelse" cols="70" rows="4"></textarea><br>
					
					<label>Kvadratmeter</label>
					<input name="kvadratmeter" class="w3-border w3-input">
					
					<label>Type af Opgave</label>
					<input name="typeafopgave" class="w3-border w3-input">
										
					<label>Nuværende adresse</label>
					<input name="opgaveadresse" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for erhvervlejemål-->
				<form id="lejemålmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createerhvervslejemaalorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('lejemålmodal').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Erhvervlejemål</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Navnet på virksomheden</label>
					<input name="virksomhedsnavn" class="w3-border w3-input">
					
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Giv en kort beskrivelse</label><br>
					<textarea name="beskrivelse" cols="70" rows="4"></textarea><br>

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

					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for kørebog -->
				<form id="erhvervkoerebog" style="display: none" class="w3-container w3-animate-opacity" action="includes/createkoerebogorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('erhvervkoerebog').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Kørebog</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea name="beskrivelse" cols="70" rows="4"></textarea><br>
					
					<label>Antal køretøjer</label>
					<input name="antal" class="w3-border w3-input">
					
					<label>Book et uforpligtende møde</label>
					<input name="møde" type="datetime-local" class="w3-border w3-input">
				
					<label>Firma adresse</label>
					<input name="firmaadresse" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
				<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
					<button onclick="document.getElementById('erhvervpage').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				</div>
			
			
			
		</div>
	</div>
	<div id="privatpage" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:50%">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('privatpage').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"><br><div class="w3-center w3-padding-32">
			<h3>Privat</h3>
			<p>Klik på knapperne for at begynde den gældende bestilling </p>
		</div>
<button onClick="document.getElementById('privatpage').style.display='none'; document.getElementById('mainpage').style.display='block'">Tilbage til de 3 afdelinger</button> </div>
			<div class="w3-section w3-animate-opacity" id="mainprivat">
				
				<div class="w3-center w3-container">
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('mainprivat').style.display='none'; document.getElementById('privatvikar').style.display='block'">Renovering</button>
				</div>
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('mainprivat').style.display='none'; document.getElementById('privatalarm').style.display='block'">Alarm og Overvågning</button>
				</div>
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('mainprivat').style.display='none'; document.getElementById('jobtilbudmodal').style.display='block'">Jobtilbud</button>
				</div>
				
				<br><div class="w3-padding-32"></div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('mainprivat').style.display='none'; document.getElementById('privatrengoering').style.display='block'">Rengøring og Oprydning</button>
				</div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('mainprivat').style.display='none'; document.getElementById('fagforeningmodal').style.display='block'">Fagforening</button>
				</div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('mainprivat').style.display='none'; document.getElementById('privatkoerebog').style.display='block'">Kørebog System</button>
				</div>
					
				<br><div class="w3-padding-32"></div>
				</div>
					
				</div>
				<!-- her starter de forskellige views som kunden kan vælge imellem -->
			
				<!-- view for create renovering -->
				<form id="privatvikar" style="display: none" class="w3-container w3-animate-opacity" action="includes/createrenoveringorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('privatvikar').style.display='none';document.getElementById('mainprivat').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Renovering</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Adresse</label>
					<input name="adresse" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Type af opgave</label>
					<input name="typeafopgave" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea name="beskrivelse" cols="70" rows="4"></textarea><br>
					
					<label>Book et møde</label>
					<input type="datetime-local" name="booketmoede" class="w3-border w3-input">
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createreno-submit">Bestil</button>
				</form>
			<!-- view for alarm og overvågning -->
				<form id="privatalarm" style="display: none" class="w3-container w3-animate-opacity" action="includes/createalarmovervaagningorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('privatalarm').style.display='none';document.getElementById('mainprivat').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Alarm og Overågning</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sikkerhedscheck</label>
					<input name="sikkerhedscheck" class="w3-input w3-border w3-hover-border-black" type="datetime-local"  style="border: 0px">
					
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
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
				<!-- view for Jobtilbud -->
				<form id="jobtilbudmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createjobtilbudorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('jobtilbudmodal').style.display='none';document.getElementById('mainprivat').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Jobtilbud</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Adresse</label>
					<input name="adresse" class="w3-border w3-input">
					
					<label>Stilling</label>
					<input name="stilling" class="w3-border w3-input">
					
					<label>Book et møde</label>
					<input type="datetime-local" name="booketmoede" class="w3-border w3-input">
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for rengøring-->
			<form id="privatrengoering" style="display: none" class="w3-container w3-animate-opacity" action="includes/createrengoeringorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('privatrengoering').style.display='none';document.getElementById('mainprivat').style.display='block'"> Tilbage til udvalg </a><br><br></div>
				
					<h4 class="w3-center">Rengøring</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Kundenavn</label>
					<input name="virksomhedsnavn" class="w3-border w3-input">
					
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea name="beskrivelse" cols="70" rows="4"></textarea><br>
					
					<label>Kvadratmeter</label>
					<input name="kvadratmeter" class="w3-border w3-input">
					
					<label>Type af Opgave</label>
					<input name="typeafopgave" class="w3-border w3-input">
										
					<label>Nuværende adresse</label>
					<input name="opgaveadresse" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for fagforening-->
				<form id="fagforeningmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createfagforeningorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('fagforeningmodal').style.display='none';document.getElementById('mainprivat').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Fagforening</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Adresse</label>
					<input name="adresse" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label> Book et møde</label>
					<input type="datetime-local" name="booketmoede" class="w3-border w3-input">

					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for kørebog -->
				<form id="privatkoerebog" style="display: none" class="w3-container w3-animate-opacity" action="includes/createkoerebogorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('privatkoerebog').style.display='none';document.getElementById('mainprivat').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Kørebog</h4>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="uid">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg bruger</option>
						<?php
						$sqlusers="SELECT * FROM users";
						$result = mysqli_query($conn, $sqlusers);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($rowusers = mysqli_fetch_assoc($result)){
						echo'
						<option class="w3-bar-item w3-button" value='.$rowusers['uid'].'>'.$rowusers['email'].' af typen '.$rowusers['typeofuser'].'</option>';
						};
						$uid=$rowusers['uid'];
						}?>
					</select>
					<label>Kontaktperson</label>
					<input name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input name="sagsnr" class="w3-border w3-input">
					
					<label>Beksrivelse</label><br>
					<textarea name="beskrivelse" cols="70" rows="4"></textarea><br>
					
					<label>Antal køretøjer</label>
					<input name="antal" class="w3-border w3-input">
					
					<label>Book et uforpligtende møde</label>
					<input name="møde" type="datetime-local" class="w3-border w3-input">
				
					<label>Firma adresse</label>
					<input name="firmaadresse" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
				<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
					<button onclick="document.getElementById('privatpage').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				</div>
			
			
			
		</div>
	</div>

	<!-- Footer -->
	<footer class="w3-container w3-black w3-padding-16">
			</footer>
<script src="javascript/hideandshowscript.js"></script>
</body>
</html>