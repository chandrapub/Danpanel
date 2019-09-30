<?php
session_start();
require( "includes/dbh.inc.php" );
$uid = $_SESSION[ 'uid' ];
$sql = "SELECT * FROM offentligorders WHERE uid=$uid AND progressionoforder!=3;";
$sqlarchieve = "SELECT * FROM offentligorders WHERE uid=$uid AND progressionoforder=3;";
$name = $_SESSION[ 'name' ];
$email = $_SESSION[ 'email' ];
$phonenr = $_SESSION[ 'phonenr' ];
if($_SESSION['typeofuser']!=="offentlig"){
	
	header("Location: /Danpanel/min".$_SESSION['typeofuser']."profil.php?access=denied");
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

<body class="w3-animate-opacity">
	
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

	<!-- First Grid Valg af produkter -->
	<div class="w3-padding-32"></div>
	<div class="w3-row ">
		<div class="w3-half w3-container w3-center" style="height:700px">
			<div class="w3-row-padding" id="plans">
				<div class="w3-center w3-padding-64">
					<h3>Dine Produkter</h3>
					<p>Tryk på "Vælg" for at starte bestilling</p>
				</div>
				<div class="w3-third w3-margin-bottom ">
					<div class="container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round">Familiekonsulent</div>
						<img src="Assets/Familiebehandling.jpeg" class="image w3-round">
						
					</div>
				</div>
				<div class="w3-third w3-margin-bottom">
					<div class="container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round">Kontaktperson / Mentor</div>
						<img src=Assets/Kontaktperson.jpeg class="image w3-round">
					</div>
				</div>
				<div class="w3-third w3-margin-bottom">
					<div class="container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round">Job Boost</div>
						<img src="Assets/Job Boost.jpeg" class="image w3-round" >
						</div>
				</div>
			</div>
			<button class="w3-button w3-green w3-hover-blue w3-round w3-card-4 w3-margin-top" onClick="document.getElementById('id03').style.display='block'"> VÆLG </button>
			<a class="w3-button w3-green w3-hover-blue w3-round w3-card-4 w3-margin-top w3-margin-left ma" href="offentligt.php" > LÆS MERE </a>
		</div>
		<!--Second Grid Mine Oplysninger -->
		<div class="w3-half w3-container" style="height:700px; background-color: #35AB67">
			<div class="w3-padding-32 w3-center">
				<h1>Mine Oplysninger</h1>
				<?php 
				$sqlimage = "SELECT * FROM users WHERE uid=$uid;";
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
					<form class="w3-container" method="post">
						<label>Navn</label>
						<h3 class="w3-block w3-center w3-round w3-white"><?php echo $name ; ?> <br></h3>
						<label>E-mail</label>
						<h3 class="w3-block w3-center w3-round w3-white"><?php echo $email ; ?> <br></h3>
						<label>Tlf Nr</label>
						<h3 class="w3-block w3-center w3-round w3-white"><?php echo $phonenr ; ?></h3>
						<a class="w3-button w3-hover-blue-gray w3-round " onClick="document.getElementById('editprofile').style.display='block'">Rediger Min Profil</a>
				</div>
			</div>
		</div>
	</div>
	<!-- editprofile Modal rediger profil -->
	<div id="editprofile" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('editprofile').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-center w3-padding-64" id="contact"> <span class="w3-xlarge w3-bottombar w3-border-green w3-padding-16">Min Profil</span> </div>
			<div class="w3-container">
			<form class="w3-container" action="includes/edit.inc.php" method="post">
				<input type="text" class="w3-input w3-border w3-hover-border-black w3-section w3-round" value="<?php echo $name;?>" name="name">
				<input type="text" class="w3-input w3-border w3-hover-border-black w3-section w3-round" value="<?php echo $email;?>" name="email">
				<input type="text" class="w3-input w3-border w3-hover-border-black w3-section w3-round" value="<?php echo $phonenr;?>" name="phonenr">
				<button type="submit" formaction="includes/edit.inc.php" class="w3-input w3-border w3-hover-border-black w3-section w3-green w3-round" name="edit-submit">Udfør</button>
			</div>
			</form>
			<div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-round">
				<button onclick="document.getElementById('editprofile').style.display='none'" type="button" class="w3-button w3-red w3-round" >Cancel</button>
			</div>
		</div>
	</div>
	<!-- Third Grid: Igangværende Ordre -->
	<div class="w3-row">
		<div class="w3-half w3-container w3-text-white" style="min-height:800px ; background-color: #5485C4;">
			<div class="w3-padding-64 w3-center">
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Status for bestilling</th>
						<?php 
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								$progress = $row['progressionoforder'];
								$totalprogress = 100;
								$currentprogress = $progress / 3 * 100;
								echo 
								"<tr>
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
									<td>
									<form action='offentligorderdetails.php' method='post'>
										<input type='hidden' value=". $row['orderid'] ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form>
									</td>
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
		<!-- Fourth Grid Ordre arkiv -->
		<div class="w3-half w3-container w3-black" style="min-height:800px">
			<div class="w3-padding-64 w3-center">
				<h2>Arkiv</h2>
				<p>en oversigt over dine afsluttede ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Slut Dato</th>
						<?php 
						$result = mysqli_query($conn, $sqlarchieve);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0){
							while ($row = mysqli_fetch_assoc($result)){
								$orderid = $row['orderid'];
								echo 	
									"<tr>
										<td>". $row["sagsnr"] ."</td>
										<td>". $row["typeoforder"] ."</td>
										<td>". $row["enddate"] ."</td>
										<td>
										<form action='offentligorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
										";
							}
							echo "</table>";
						}
					
					else { echo "Ingen ordre fundet"; }
					?>
					</table>
				</div>
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
		<a href="#" class="w3-button w3-blue w3-margin w3-round"><i class="w3-round fa fa-arrow-up w3-margin-right"></i>Tilbage til toppen</a>
		<div class="w3-xlarge w3-section"> <a href="https://www.facebook.com/DanPanelDK" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity" ></i></a> <a href="https://www.linkedin.com/company/danpanel/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a> </div>
		</div>
		<div class="w3-third">
			<a href="Cookie-og-privatlivspolitik.pdf" target="_blank">Læs om Cookies og Privatpolitik</a>
			</div>

		<!--
		<p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a>
		</p>
		-->
	</footer>
			<!-- Id03 Modal Bestilling -->
	<div class="w3-row"> </div>
	<div id="id03" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-section">
				<form class="w3-container" action="includes/createoffentligorder.inc.php" method="post">
					<div class="w3-third w3-center">
						<input class="w3-section" type="radio" name="typeoforder" value="familiekonsulent"> Familiekonsulent
					</div>
					<div class="w3-third w3-center">
						<input class="w3-section" type="radio" name="typeoforder" value="kontaktperson"> Kontaktperson/Mentor</div>
					<div class="w3-thirdw3-center">
						<input class="w3-section" type="radio" name="typeoforder" value="jobboost"> Job Boost
					</div>
				
					<div class="w3-half">
						<label>Start Dato</label>
						<input required class="w3-input w3-border w3-hover-border-black w3-section" type="date" name="startdate" style="border: 0px">
					</div>
					<div class="w3-half">
						<label>Opstartsmøde</label>
						<input required class="w3-input w3-border w3-hover-border-black w3-section" type="datetime-local" name="opstartsdate" style="border: 0px">
					</div>
					<label>Sagsnummer</label>
					<input required class="w3-input w3-border w3-hover-border-black w3-section" type="text" name="sagsnr" placeholder="Indtast ønsket sagsnummer">
					<label>Ønsket varighed</label>
					<select required class="w3-section w3-input w3-border w3-hover-border-blue" name="duration">
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
					<label>Antal timer om ugen</label>
					<input required class="w3-input w3-border w3-hover-border-black w3-section" type="text" name="hoursprweek" placeholder="Indtast den ønskede mængde af timer om ugen">
					<label>(valgfri) Giv en kort beskrivelse af arbjedsopgaven</label>
					<textarea rows="4" cols="50" class="w3-input w3-border w3-hover-border-black w3-section" name="description"></textarea>
					<button class="w3-input w3-border w3-hover-border-black w3-section w3-green" formaction="includes/createoffentligorder.inc.php" type="submit" name="createoffentligorder-submit">Bestil</button>
				</form>
				<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
					<button onclick="document.getElementById('id03').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				</div>
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
</body>
			<?php   
	
	if(strpos($_SERVER['REQUEST_URI'], "signup=success")){
			echo '<script language="javascript">';
			echo 'alert("Velkommen til din nye DanPanel konto. \nDette er din profil hvor vi har samlet alle dine produkter \n\nHusk at verificere din konto via den mail der er blevet sendt til din email adresse")';
			echo '</script>'; 
	}
	if(strpos($_SERVER['REQUEST_URI'], "createorder=success")){
			echo '<script language="javascript">';
			echo 'alert("Din bestilling er sendt til behandling \nDet kan tage et par hverdage før at den vil blive godkendt eller afvist \nTak fordi du brugte Danpanel")';
			echo '</script>'; 
	}
	if(strpos($_SERVER['REQUEST_URI'], "verification=denied")){
			echo '<script language="javascript">';
			echo 'alert("For at benyte DanPanels funktioner skal du verificere din konto gennem den mail det er blevet send til din email adresse")';
			echo '</script>'; 
	}
		?> 
</html>