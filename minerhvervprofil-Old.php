<?php
session_start();
require( "includes/dbh.inc.php" );
$uid = $_SESSION[ 'uid' ];
$name = $_SESSION[ 'name' ];
$email = $_SESSION[ 'email' ];
$phonenr = $_SESSION[ 'phonenr' ];
$typeofuser = $_SESSION['typeofuser'];
if($typeofuser!="erhverv"){
	
	header("Location: /Danpanel/min".$typeofuser."profil.php?access=denied");
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
		<div class="w3-half w3-container w3-center" style="height:1000px">
			<div class="w3-row-padding" id="plans">
				<div class="w3-center">
					<h3>Dine Produkter</h3>
					<p>Tryk på "Vælg" for at starte bestilling</p>
				</div>
				
				<div class="w3-third w3-margin-bottom ">
					<div class="w3-container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round">Vikar og Rekruterring</div>
						<img src="Assets/Alm. REkruttering.jpeg" class="image w3-round" >
					</div>
				</div>
				<div class="w3-third w3-margin-bottom ">
					<div class="w3-container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round">Alarm og Overvågning</div>
						<img src="Assets/Alarm system .jpeg" class="image w3-round">
					</div>
				</div>
				<div class="w3-third w3-margin-bottom ">
					<div class="w3-container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round">Rengøring og Oprydning</div>
						<img src="Assets/Rengøring.jpg" class="image w3-round" >
						</div>
				</div>
				
				<div class="w3-row-padding">
				<div class="w3-third w3-margin-bottom " style="margin-top: 3%">
						<div class="w3-container">
							<div class="w3-display-top-middle w3-green w3-padding w3-round">Digitalisering</div>
							<img src="Assets/DigitaliseringNy.png" class="image w3-round">
							</div>
					</div>
				<div class="w3-padding w3-margin-top">
				
				<div class="w3-third w3-margin-bottom ">
					<div class="w3-container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round ">Erhvervslejemål</div>
						<img src="Assets/ErhverhvslejemaalNy.jpg" class="image w3-round">
						</div>
				</div>
				<div class="w3-third w3-margin-bottom ">
					<div class="w3-container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round">Kørebog System</div>
						<img src="Assets/thumbnail (1).png" class="image w3-round" >
						</div>
				</div>
					</div>
			</div>
				<div class="w3-padding-16"></div>
				<div class="w3-third w3-margin-bottom ">
					<div class="w3-container">
						<div class="w3-display-top-middle w3-green w3-padding w3-round">Kaffe løsning</div>
						<img src="Assets/Kaffeløsning.png" class="image w3-round" >
						</div>
				</div>
		</div>
			<button class="w3-button w3-green w3-hover-blue w3-round w3-card-4 w3-margin-top" onClick="document.getElementById('id03').style.display='block'"> VÆLG </button>
			<a class="w3-button w3-green w3-hover-blue w3-round w3-card-4 w3-margin-top w3-margin-left ma" href="offentligt.php" > LÆS MERE </a>
		</div>
		<!--Second Grid Mine Oplysninger -->
		<div class="w3-half w3-container w3-green" style="height:1000px;background-color: #35AB67">
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
					<form class="w3-container" action="includes/signup.inc.php" method="post">
						<label>Navn</label>
						<h3 class="w3-block w3-white w3-center w3-round"><?php echo $name ; ?> <br></h3>
						<label>E-mail</label>
						<h3 class="w3-block w3-white w3-center w3-round"><?php echo $email ; ?> <br></h3>
						<label>Tlf Nr</label>
						<h3 class="w3-block w3-white w3-center w3-round"><?php echo $phonenr ; ?></h3>
						<a class="w3-button w3-hover-blue-gray w3-white w3-round" onClick="document.getElementById('editprofile').style.display='block'">Rediger Min Profil</a>
				</div>
			</div>
		</div>
	</div>
	<!-- editprofile Modal rediger profil -->
	<div id="editprofile" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('editprofile').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-center w3-padding-64" id="contact"> <span class="w3-xlarge w3-bottombar w3-border-green w3-padding-	16">Min Profil</span> </div>
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
		<!-- igangværende for vikar -->
		<div class="w3-half w3-container w3-blue" style="min-height:800px" id="vikar">
			<div class="w3-padding-64 w3-center">
				<button disabled class="w3-round w3-button w3-green">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikar').style.display='none';
																	 document.getElementById('alarm').style.display='block'">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikar').style.display='none';
																	 document.getElementById('digitalisering').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikar').style.display='none';
																	 document.getElementById('rengøring').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikar').style.display='none';
																	 document.getElementById('lejemål').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikar').style.display='none';
																	 document.getElementById('kørebog').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikar').style.display='none';
																	 document.getElementById('kaffeløsning').style.display='block'">Kaffe løsning</button>
				
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM vikarrekruttering WHERE uid = $uid;";
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
									<td>
									<form action='vikarrekrutteringorderdetails.php' method='post'>
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
		
		<!-- igangværende for alarm -->
		<div class="w3-half w3-container w3-blue" style="min-height:800px ; display: none" id="alarm">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarm').style.display='none';
																	 document.getElementById('vikar').style.display='block'">Vikar og Rekruterring</button>
				
				<button disabled class="w3-round w3-button w3-green">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarm').style.display='none';
																	 document.getElementById('digitalisering').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarm').style.display='none';
																	 document.getElementById('rengøring').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarm').style.display='none';
																	 document.getElementById('lejemål').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarm').style.display='none';
																	 document.getElementById('kørebog').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarm').style.display='none';
																	 document.getElementById('kaffeløsning').style.display='block'">Kaffe løsning</button>
				
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM alarmovervaagning WHERE uid = $uid;";
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
									<td>
									<form action='alarmovervaagningorderdetails.php' method='post'>
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
		<!-- igangværende for digitalisering -->
		<div class="w3-half w3-container w3-blue" style="min-height:800px ; display: none" id="digitalisering">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitalisering').style.display='none';
																	 document.getElementById('vikar').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitalisering').style.display='none';
																	 document.getElementById('alarm').style.display='block'">Alarm og Overvågning</button>
				
				<button disabled class="w3-round w3-button w3-green">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitalisering').style.display='none';
																	 document.getElementById('rengøring').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitalisering').style.display='none';
																	 document.getElementById('lejemål').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitalisering').style.display='none';
																	 document.getElementById('kørebog').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitalisering').style.display='none';
																	 document.getElementById('kaffeløsning').style.display='block'">Kaffe løsning</button>
				
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM digitalisering WHERE uid = $uid;";
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
									<td>
									<form action='digitaliseringorderdetails.php' method='post'>
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
		<!-- igangværende for rengøring -->
		<div class="w3-half w3-container w3-blue" style="min-height:800px ; display: none" id="rengøring">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøring').style.display='none';
																	 document.getElementById('vikar').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøring').style.display='none';
																	 document.getElementById('alarm').style.display='block'">Alarm og Overvågning</button>
				
				<button  class="w3-round w3-button w3-green" onClick="document.getElementById('rengøring').style.display='none';
																	 document.getElementById('digitalisering').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button disabled class="w3-round w3-button w3-green">rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøring').style.display='none';
																	 document.getElementById('lejemål').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøring').style.display='none';
																	 document.getElementById('kørebog').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøring').style.display='none';
																	 document.getElementById('kaffeløsning').style.display='block'">Kaffe løsning</button>
				
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Kvadratmeter</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM rengoering WHERE uid = $uid;";
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
									<td>". $row["kvadratmeter"] ." m2</td>
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
									<form action='rengoeringorderdetails.php' method='post'>
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
		<!-- igangværende for lejemål -->
		<div class="w3-half w3-container w3-blue" style="min-height:800px ; display: none" id="lejemål">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemål').style.display='none';
																	 document.getElementById('vikar').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemål').style.display='none';
																	 document.getElementById('alarm').style.display='block'">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemål').style.display='none';
																	 document.getElementById('digitalisering').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemål').style.display='none';
																	 document.getElementById('rengøring').style.display='block'">Rengøring og Oprydning</button>
				
				<button disabled class="w3-round w3-button w3-green" >Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemål').style.display='none';
																	 document.getElementById('kørebog').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemål').style.display='none';
																	 document.getElementById('kaffeløsning').style.display='block'">Kaffe løsning</button>
				
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Type af Lokale</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM erhvervlejemaal WHERE uid = $uid;";
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
									<td>
									<form action='erhvervslejemaalorderdetails.php' method='post'>
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
		<!-- igangværende for kørebog -->
		<div class="w3-half w3-container w3-blue" style="min-height:800px ; display: none" id="kørebog">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebog').style.display='none';
																	 document.getElementById('vikar').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebog').style.display='none';
																	 document.getElementById('alarm').style.display='block'">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebog').style.display='none';
																	 document.getElementById('digitalisering').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebog').style.display='none';
																	 document.getElementById('rengøring').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebog').style.display='none';
																	 document.getElementById('lejemål').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebog').style.display='none';
																	 document.getElementById('kaffeløsning').style.display='block'">Kaffe løsning</button>
				
				<button disabled class="w3-round w3-button w3-green" >Kørebog System</button>
				
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM koerebog WHERE uid = $uid;";
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
									<td>
									<form action='koerebogorderdetails.php' method='post'>
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
		
		<!-- igangværende for kaffeløsning -->
		<div class="w3-half w3-container w3-blue" style="min-height:800px ; display: none" id="kaffeløsning">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffeløsning').style.display='none';
																	 document.getElementById('vikar').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffeløsning').style.display='none';
																	 document.getElementById('alarm').style.display='block'">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffeløsning').style.display='none';
																	 document.getElementById('digitalisering').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffeløsning').style.display='none';
																	 document.getElementById('rengøring').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffeløsning').style.display='none';
																	 document.getElementById('lejemål').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffeløsning').style.display='none';
																	 document.getElementById('kørebog').style.display='block'">Kørebog</button>
				
				<button disabled class="w3-round w3-button w3-green" >Kaffe Løsning</button>
				
				<h2>Igangværende Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Mdr. tilbage</th>
						<th>Pris pr. Kg</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM kaffeloesning WHERE uid = $uid;";
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
									<td>". $row["monthleftoncurrentdeal"] ."</td>
									<td>". $row["priceprkgcoffe"] ."</td>
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
									<form action='kaffeloesningorderdetails.php' method='post'>
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
		
		<!-- arkiv for vikar -->
<div class="w3-half w3-container w3-black" style="min-height:800px" id="vikararkiv">
			<div class="w3-padding-64 w3-center">
				<button disabled class="w3-round w3-button w3-green">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikararkiv').style.display='none';
																	 document.getElementById('alarmarkiv').style.display='block'">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikararkiv').style.display='none';
																	 document.getElementById('digitaliseringarkiv').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikararkiv').style.display='none';
																	 document.getElementById('rengøringarkiv').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikararkiv').style.display='none';
																	 document.getElementById('lejemålarkiv').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikararkiv').style.display='none';
																	 document.getElementById('kørebogarkiv').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('vikararkiv').style.display='none';
																	 document.getElementById('kaffearkiv').style.display='block'">Kørebog System</button>
				
				<h2>Arkiv Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM vikarrekruttering WHERE uid = $uid AND progressionoforder=3;";
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
									<td>
									<form action='vikarrektrutteringorderdetails.php' method='post'>
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
		
		<!-- arkiv for alarm -->
		<div class="w3-half w3-container w3-black" style="min-height:800px ; display: none" id="alarmarkiv">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarmarkiv').style.display='none';
																	 document.getElementById('vikararkiv').style.display='block'">Vikar og Rekruterring</button>
				
				<button disabled class="w3-round w3-button w3-green">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarmarkiv').style.display='none';
																	 document.getElementById('digitaliseringarkiv').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarmarkiv').style.display='none';
																	 document.getElementById('rengøringarkiv').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarmarkiv').style.display='none';
																	 document.getElementById('lejemålarkiv').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarmarkiv').style.display='none';
																	 document.getElementById('kørebogarkiv').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('alarmarkiv').style.display='none';
																	 document.getElementById('kaffearkiv').style.display='block'">Kørebog System</button>
				
				<h2>Arkiv Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM alarmovervaagning WHERE uid = $uid AND progressionoforder=3;";
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
									<td>
									<form action='alarmovervaagningorderdetails.php' method='post'>
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
		<!-- arkiv for digitalisering -->
		<div class="w3-half w3-container w3-black" style="min-height:800px ; display: none" id="digitaliseringarkiv">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitaliseringarkiv').style.display='none';
																	 document.getElementById('vikararkiv').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitaliseringarkiv').style.display='none';
																	 document.getElementById('alarmarkiv').style.display='block'">Alarm og Overvågning</button>
				
				<button disabled class="w3-round w3-button w3-green">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitaliseringarkiv').style.display='none';
																	 document.getElementById('rengøringarkiv').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitaliseringarkiv').style.display='none';
																	 document.getElementById('lejemålarkiv').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitaliseringarkiv').style.display='none';
																	 document.getElementById('kørebogarkiv').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('digitaliseringarkiv').style.display='none';
																	 document.getElementById('kaffearkiv').style.display='block'">Kørebog System</button>
				
				<h2>Arkiv Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM digitalisering WHERE uid = $uid AND progressionoforder=3;";
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
									<td>
									<form action='digitaliseringorderdetails.php' method='post'>
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
		<!-- arkiv for rengøring -->
		<div class="w3-half w3-container w3-black" style="min-height:800px ; display: none" id="rengøringarkiv">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøringarkiv').style.display='none';
																	 document.getElementById('vikararkiv').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøringarkiv').style.display='none';
																	 document.getElementById('alarm').style.display='block'">Alarm og Overvågning</button>
				
				<button  class="w3-round w3-button w3-green" onClick="document.getElementById('rengøringarkiv').style.display='none';
																	 document.getElementById('digitaliseringarkiv').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button disabled class="w3-round w3-button w3-green">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøringarkiv').style.display='none';
																	 document.getElementById('lejemålarkiv').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøringarkiv').style.display='none';
																	 document.getElementById('kørebogarkiv').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('rengøringarkiv').style.display='none';
																	 document.getElementById('kaffearkiv').style.display='block'">Kørebog System</button>
				
				<h2>Arkiv Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Kvadratmeter</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM rengoering WHERE uid = $uid AND progressionoforder=3;";
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
									<td>". $row["kvadratmeter"] ." m2</td>
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
									<form action='rengoeringorderdetails.php' method='post'>
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
		<!-- arkiv for lejemål -->
		<div class="w3-half w3-container w3-black" style="min-height:800px ; display: none" id="lejemålarkiv">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemålarkiv').style.display='none';
																	 document.getElementById('vikararkiv').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemålarkiv').style.display='none';
																	 document.getElementById('alarmarkiv').style.display='block'">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemålarkiv').style.display='none';
																	 document.getElementById('digitaliseringarkiv').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemålarkiv').style.display='none';
																	 document.getElementById('rengøringarkiv').style.display='block'">Rengøring og Oprydning</button>
				
				<button disabled class="w3-round w3-button w3-green" >Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemålarkiv').style.display='none';
																	 document.getElementById('kørebogarkiv').style.display='block'">Kørebog System</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('lejemålarkiv').style.display='none';
																	 document.getElementById('kaffearkiv').style.display='block'">Kørebog System</button>
				
				<h2>Arkiv Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Type af Lokale</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM erhvervlejemaal WHERE uid = $uid AND progressionoforder=3;";
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
									<td>
									<form action='erhvervslejemaalorderdetails.php' method='post'>
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
		<!-- arkiv for kørebog -->
		<div class="w3-half w3-container w3-black" style="min-height:800px ; display: none" id="kørebogarkiv">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebogarkiv').style.display='none';
																	 document.getElementById('vikararkivarkiv').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebogarkiv').style.display='none';
																	 document.getElementById('alarmarkiv').style.display='block'">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebogarkiv').style.display='none';
																	 document.getElementById('digitaliseringarkiv').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebogarkiv').style.display='none';
																	 document.getElementById('rengøringarkiv').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebogarkiv').style.display='none';
																	 document.getElementById('lejemålarkiv').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kørebogarkiv').style.display='none';
																	 document.getElementById('kaffearkiv').style.display='block'">Kørebog System</button>
				
				<button disabled class="w3-round w3-button w3-green" >Kørebog System</button>
				
				<h2>Arkiv Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Sagsnummer</th>
						<th>Firma adresse</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM koerebog WHERE uid = $uid AND progressionoforder=3;";
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
									<td>
									<form action='koerbogorderdetails.php' method='post'>
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
		<!-- arkiv for kaffeløsning -->
		<div class="w3-half w3-container w3-blue" style="min-height:800px ; display: none" id="kaffearkiv">
			<div class="w3-padding-64 w3-center">
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffearkiv').style.display='none';
																	 document.getElementById('vikar').style.display='block'">Vikar og Rekruterring</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffearkiv').style.display='none';
																	 document.getElementById('alarm').style.display='block'">Alarm og Overvågning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffearkiv').style.display='none';
																	 document.getElementById('digitalisering').style.display='block'">Digitalisering</button><br>
				<div class="w3-padding"></div>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffearkiv').style.display='none';
																	 document.getElementById('rengøring').style.display='block'">Rengøring og Oprydning</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffearkiv').style.display='none';
																	 document.getElementById('lejemål').style.display='block'">Erhvervslejemål</button>
				
				<button class="w3-round w3-button w3-green" onClick="document.getElementById('kaffearkiv').style.display='none';
																	 document.getElementById('kørebog').style.display='block'">Kaffe løsning</button>
				
				<button disabled class="w3-round w3-button w3-green" >Kaffe Løsning</button>
				
				<h2>Arkiv Ordre</h2>
				<p>Oversigt over dine ordre</p>
				<div class="w3-container w3-responsive">
					<table class="container">
						<th>Mdr. tilbage</th>
						<th>Pris pr. Kg</th>
						<th>Status for bestilling</th>
						<?php 
						$sql = "SELECT * FROM kaffeloesning WHERE uid = $uid;";
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
									<td>". $row["monthleftoncurrentdeal"] ."</td>
									<td>". $row["priceprkgcoffe"] ."</td>
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
									<form action='kaffeloesningorderdetails.php' method='post'>
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


	</footer>
		
	<!-- Id03 Modal Bestilling -->
	<div class="w3-row"> </div>
	<div id="id03" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:50%">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-section w3-animate-opacity" id="main">
				
				<div class="w3-center w3-container">
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('vikarmodal').style.display='block'">Vikar og Rekruterring</button>
				</div>
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('alarmmodal').style.display='block'">Alarm og Overvågning</button>
				</div>
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('digitaliseringmodal').style.display='block'">Digitalisering</button>
				</div>
				
				<br><div class="w3-padding-32"></div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('rengøringmodal').style.display='block'">Rengøring og Oprydning</button>
				</div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('lejemålmodal').style.display='block'">Erhvervslejemål</button>
				</div>
				
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large" onClick="document.getElementById('main').style.display='none'; document.getElementById('kørebogmodal').style.display='block'">Kørebog System</button>
				</div>
				<div class="w3-third ">
					<button class="w3-round w3-button w3-green w3-large w3-margin-top" onClick="document.getElementById('main').style.display='none'; document.getElementById('kaffeloesningmodal').style.display='block'">Kaffe Løsening</button>
				</div>
					
				<br><div class="w3-padding-32"></div>
				</div>
					
				</div>
				<!-- her starter de forskellige views som kunden kan vælge imellem -->
			
				<!-- view for create vikar og rekruttering -->
				<form id="vikarmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createvikarrekrutteringorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('vikarmodal').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Vikar og Rekruttering</h4>
					
					<label>Navnet på virksomheden</label>
					<input required name="virksomhedsnavn" class="w3-border w3-input">
					
					<label>Kontaktperson</label>
					<input required name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input required name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea required name="beskrivelse" cols="70" rows="4"></textarea><br>

					
					<label>Antal</label>
					<input required name="antal" class="w3-border w3-input">
					
					<label>Type af Opgave</label>
					<input required name="typeafopgave" class="w3-border w3-input">
					
					<label>Varighed</label>
					<input required name="varighed" class="w3-border w3-input">
					
					<label>Mødetid</label>
					<input required name="moedetid" type="time" class="w3-border w3-input">
					
					<label>Opgaveadresse</label>
					<input required name="opgaveadresse" class="w3-border w3-input">
					
					<label>Firma adresse</label>
					<input required name="firmaadresse" class="w3-border w3-input">
					
					<label>Faktura Email</label>
					<input required name="fakturaemail" class="w3-border w3-input">
					
					<label>*Ikke obligatorisk* EAN Nummer</label>
					<input name="ean" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
					
					<Label>Betalling</Label><br>
					<?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
					<a href="#" onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService online tilmelding</a>
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for alarm og overvågning -->
				<form id="alarmmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createalarmovervaagningorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('alarmmodal').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Alarm og Overågning</h4>
					
					<label>Kontaktperson</label>
					<input required name="kontaktperson" class="w3-border w3-input">
					
					<label>Sikkerhedscheck</label>
					<input required name="sikkerhedscheck" type="datetime-local" class="w3-input w3-border w3-hover-border-black" style="border: 0px">
					
					<label>Sagsnummer</label>
					<input required name="sagsnr" class="w3-border w3-input">
										
					<label>Firma adresse</label>
					<input required name="firmaadresse" class="w3-border w3-input">
					
					<label>Faktura Email</label>
					<input required name="fakturaemail" class="w3-border w3-input">
					
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
					
					<label>Kontaktperson</label>
					<input required name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input required name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea required name="beskrivelse" cols="70" rows="4"></textarea><br>
					
					<label>Firma adresse</label>
					<input required name="firmaadresse" class="w3-border w3-input">
					
					<label>Faktura Email</label>
					<input required name="fakturaemail" class="w3-border w3-input">
					
					<label>*Ikke obligatorisk* EAN Nummer</label>
					<input name="ean" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
					
					<Label>Betalling</Label><br>
					<?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
					<a href="#" onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService online tilmelding</a>
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for rengøring-->
			<form id="rengøringmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createrengoeringorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('rengøringmodal').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
				
					<h4 class="w3-center">Rengøring</h4>
					
					<label>Kundenavn</label>
					<input required name="virksomhedsnavn" class="w3-border w3-input">
					
					<label>Kontaktperson</label>
					<input required name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input required name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea required name="beskrivelse" cols="70" rows="4"></textarea><br>
					
					<label>Kvadratmeter</label>
					<input required name="kvadratmeter" class="w3-border w3-input">
					
					<label>Type af Opgave</label>
					<input required name="typeafopgave" class="w3-border w3-input">
										
					<label>Nuværende adresse</label>
					<input required name="opgaveadresse" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
				
					<Label>Betalling</Label><br>
					<?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
					<a href="#" onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService online tilmelding</a>
				
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for erhvervlejemål-->
				<form id="lejemålmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createerhvervslejemaalorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('lejemålmodal').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Erhvervlejemål</h4>
					
					<label>Navnet på virksomheden</label>
					<input required name="virksomhedsnavn" class="w3-border w3-input">
					
					<label>Kontaktperson</label>
					<input required name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input required name="sagsnr" class="w3-border w3-input">
					
					<label>Skriveområde</label><br>
					<textarea required name="beskrivelse" cols="70" rows="4"></textarea><br>

					<label>Kvadratmeter</label>
					<input required name="kvadratmeter" class="w3-border w3-input">
					
					<label>Hvor søger du lokaler?</label>
					<input required name="typeaflokale" class="w3-border w3-input">
					
					<label>Budget</label>
					<input required name="budget" class="w3-border w3-input">
					
					<label>Nuværende firma adresse</label>
					<input required name="firmaadresse" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
						
					<Label>Betalling</Label><br>
					<?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
					<a href="#" onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService online tilmelding</a>
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for kørebog -->
				<form id="kørebogmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createkoerebogorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('kørebogmodal').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>
					
					<h4 class="w3-center">Kørebog</h4>

					<label>Kontaktperson</label>
					<input required name="kontaktperson" class="w3-border w3-input">
					
					<label>Sagsnummer</label>
					<input required name="sagsnr" class="w3-border w3-input">
					
					<label>Beskrivelse</label><br>
					<textarea required name="beskrivelse" cols="100" rows="4"></textarea><br>
					
					<label>Antal køretøjer</label>
					<input required name="antal" class="w3-border w3-input">
					
					<label>Book et uforpligtende møde</label>
					<input required name="møde" type="datetime-local" class="w3-border w3-input">
				
					<label>Firma adresse</label>
					<input required name="firmaadresse" class="w3-border w3-input">
					
					<label> *Ikke obligatorisk* Hjemmeside </label>
					<input name="website" class="w3-border w3-input">
					<Label>Betalling</Label><br>
					<?php 
					if(isset($_SESSION['cvr'])){
						$cvr = $_SESSION['cvr'];
					}
					?>
					<a href="#" onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService online tilmelding</a>
					
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>
			<!-- view for kaffeløsnig -->
				<form id="kaffeloesningmodal" style="display: none" class="w3-container w3-animate-opacity" action="includes/createkaffeloesningorder.inc.php" method="post">
					<div class="w3-center w3-margin-top"><a class="w3-border w3-green w3-hover-blue w3-large w3-padding w3-round-large" onClick="document.getElementById('kaffeloesningmodal').style.display='none';document.getElementById('main').style.display='block'"> Tilbage til udvalg </a><br><br></div>	
					
					
					<h4 class="w3-center">Kaffe Løsning</h4>
					
					<label>Sags Nr.</label>
					<input required name="sagsnr" class="w3-border w3-input">

					<label>Nuværende løsning</label>
					<select required class="w3-section w3-input w3-border w3-hover-border-blue" name="currentsolution">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg nuværende løsning</option>
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
					
					<label>Hvad er deres pris pr. kg. Kaffe og hvad giver de for de evt. for øvrige ingredienser </label>
					<textarea name="priceprkgcoffe" cols="100" rows="4"></textarea><br>
				
					<label>Hvilken fremtidig løsning kunne du være interesseret i?</label>
					<select required class="w3-section w3-input w3-border w3-hover-border-blue" name="futuresolution">
						<option style="display: none" disabled selected value class="w3-bar-item w3-button">Vælg fremtidig løsning</option>
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
					<a href="#" onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=3054924174722e473d2f8dadb5b0b924&dbnr=<?php echo $uid;?>&cvr=<?php echo $cvr;?>&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService online tilmelding</a>
					
					<button class="w3-input w3-border w3-round w3-hover-border-black w3-section w3-green" type="submit" name="createvikar-submit">Bestil</button>
				</form>	
				<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
					<button onclick="document.getElementById('kørebogmodal').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
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
			echo 'alert("Din bestilling er sendt til behandling \nDet kan tage et par hverdage før at den vil blive godkendt eller afvist \nTak fordi du brugte Danpanel ")';
			echo '</script>'; 
	}
	if(strpos($_SERVER['REQUEST_URI'], "verification=denied")){
			echo '<script language="javascript">';
			echo 'alert("For at benyte DanPanels funktioner skal du verificere din konto gennem den mail det er blevet send til din email adresse")';
			echo '</script>'; 
	}
		?> 
</html>