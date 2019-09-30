<?php
session_start();
require( "includes/dbh.inc.php" )
?>
<!doctype html>
<html>
<head>
	<title>Søg ordre</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/png" href="Assets/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/stylesheet.css">
	<script src="javascript/closemodal.js"></script>
	<style>
		html{
			scroll-behavior: smooth;
		}
	</style>
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
	
	<div class="w3-padding-64"></div>
	
	<h2 class="w3-center">Resultatet for din søgning:</h2>
	
	<div class="w3-padding-16"></div>
	
	<!-- Search offentlig function -->
		<?php
			if(isset($_POST['search-offentlig-submit'])){
				$search = mysqli_real_escape_string($conn, $_POST['search']);
				$sql="SELECT * FROM offentligorders WHERE sagsnr LIKE '%$search%' OR typeoforder LIKE '%$search%' OR startdate LIKE '%$search%' OR opstartsdate LIKE '%$search%';";
				$result = mysqli_query($conn, $sql);
				$queryResult = mysqli_num_rows($result);
				
				if($queryResult > 0){
					echo"
						<h4>Offentlige ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Opstarts dato</th>
						<th>Detaljer</th>";
					while($row = mysqli_fetch_assoc($result))
					{
						$orderid = $row['orderid'];
						echo 
								"<tr>
									<td>". $row["sagsnr"] ."</td>
									<td>". $row["typeoforder"] ."</td>
									<td>". $row["opstartsdate"] ."</td>
									<td><form action='adminorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
			}
		?>
	
	<!-- Search Erhverv function -->
		<?php
			if(isset($_POST['search-erhverv-submit'])){
				$search = mysqli_real_escape_string($conn, $_POST['search']);
				$sqlvikar= "SELECT * FROM vikarrekruttering WHERE sagsnr LIKE '%". $search ."%' OR virksomhedsnavn LIKE '%". $search ."%';";
				$resultvikar = mysqli_query($conn, $sqlvikar);
				$queryResultvikar = mysqli_num_rows($resultvikar);
				
				if($queryResultvikar > 0){
					echo"
						<h4>Vikar og Rekruttering ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Type af ordre</th>
						<th>Opstarts dato</th>
						<th>Detaljer</th>";
					while($rowvikar = mysqli_fetch_assoc($resultvikar))
					{
						$orderid = $rowvikar['orderid'];
						echo 
								"<tr>
									<td>". $rowvikar["sagsnr"] ."</td>
									<td>". $rowvikar["typeafopgave"] ."</td>
									<td>". $rowvikar["kontaktperson"] ."</td>
									<td><form action='vikarrekrutteringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
					
				$sqlalarm= "SELECT * FROM alarmovervaagning WHERE sagsnr LIKE '%". 
				$search ."%' OR kontaktperson LIKE '%". $search ."%' OR firmaadresse LIKE '%". $search. "%';";
				$resultalarm = mysqli_query($conn, $sqlalarm);
				$queryResultalarm = mysqli_num_rows($resultalarm);
				
				if($queryResultalarm > 0){
					echo"
						<h4>Alarm og Overvågning ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Firma adresse</th>
						<th>Detaljer</th>";
					while($rowalarm = mysqli_fetch_assoc($resultalarm))
					{
						$orderid = $rowalarm['orderid'];
						echo 
								"<tr>
									<td>". $rowalarm["sagsnr"] ."</td>
									<td>". $rowalarm["kontaktperson"] ."</td>
									<td>". $rowalarm["firmaadresse"] ."</td>
									<td><form action='alarmovervaagningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
				
				$sqldigitalisering= "SELECT * FROM digitalisering WHERE sagsnr LIKE '%". 
				$search ."%' OR kontaktperson LIKE '%". $search ."%' OR firmaadresse LIKE '%". $search. "%';";
				$resultdigitalisering = mysqli_query($conn, $sqldigitalisering);
				$queryResultdigitalisering = mysqli_num_rows($resultdigitalisering);
				
				if($queryResultdigitalisering > 0){
					echo"
						<h4>Digitalisering ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Firma adresse</th>
						<th>Detaljer</th>";
					while($rowdigitalisering = mysqli_fetch_assoc($resultdigitalisering))
					{
						$orderid = $rowdigitalisering['orderid'];
						echo 
								"<tr>
									<td>". $rowdigitalisering["sagsnr"] ."</td>
									<td>". $rowdigitalisering["kontaktperson"] ."</td>
									<td>". $rowdigitalisering["firmaadresse"] ."</td>
									<td><form action='digitaliseringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
				
				$sqlerhvervlejemaal= "SELECT * FROM erhvervlejemaal WHERE sagsnr LIKE '%". 
				$search ."%' OR kontaktperson LIKE '%". $search ."%' OR firmaadresse LIKE '%". $search. "%';";
				$resulterhvervlejemaal = mysqli_query($conn, $sqlerhvervlejemaal);
				$queryResulterhvervlejemaal = mysqli_num_rows($resulterhvervlejemaal);
				
				if($queryResulterhvervlejemaal > 0){
					echo"
						<h4>Erhvervlejemål ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Firma adresse</th>
						<th>Detaljer</th>";
					while($rowerhvervlejemaal = mysqli_fetch_assoc($resulterhvervlejemaal))
					{
						$orderid = $rowerhvervlejemaal['orderid'];
						echo 
								"<tr>
									<td>". $rowerhvervlejemaal["sagsnr"] ."</td>
									<td>". $rowerhvervlejemaal["kontaktperson"] ."</td>
									<td>". $rowerhvervlejemaal["firmaadresse"] ."</td>
									<td><form action='erhvervslejemaalorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
				
				$sqlkoerebog= "SELECT * FROM koerebog WHERE sagsnr LIKE '%". 
				$search ."%' OR kontaktperson LIKE '%". $search ."%' OR firmaadresse LIKE '%". $search. "%';";
				$resultkoerebog = mysqli_query($conn, $sqlkoerebog);
				$queryResultkoerebog = mysqli_num_rows($resultkoerebog);
				
				if($queryResultkoerebog > 0){
					echo"
						<h4>Kørebog ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Firma adresse</th>
						<th>Detaljer</th>";
					while($rowkoerebog = mysqli_fetch_assoc($resultkoerebog))
					{
						$orderid = $rowkoerebog['orderid'];
						echo 
								"<tr>
									<td>". $rowkoerebog["sagsnr"] ."</td>
									<td>". $rowkoerebog["kontaktperson"] ."</td>
									<td>". $rowkoerebog["firmaadresse"] ."</td>
									<td><form action='koerebogorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
				
				$sqlrengoering= "SELECT * FROM rengoering WHERE sagsnr LIKE '%". 
				$search ."%' OR kontaktperson LIKE '%". $search ."%' OR opgaveadresse LIKE '%". $search. "%';";
				$resultrengoering = mysqli_query($conn, $sqlrengoering);
				$queryResultrengoering = mysqli_num_rows($resultrengoering);
				
				if($queryResultrengoering > 0){
					echo"
						<h4>Rengøring og Oprydning ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Opgave adresse</th>
						<th>Detaljer</th>";
					while($rowrengoering = mysqli_fetch_assoc($resultrengoering))
					{
						$orderid = $rowrengoering['orderid'];
						echo 
								"<tr>
									<td>". $rowrengoering["sagsnr"] ."</td>
									<td>". $rowrengoering["kontaktperson"] ."</td>
									<td>". $rowrengoering["opgaveadresse"] ."</td>
									<td><form action='rengoeringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
			}
	
		?>
	
	<!-- Search Privat function -->
		<?php
			if(isset($_POST['search-privat-submit'])){
				$search = mysqli_real_escape_string($conn, $_POST['search']);
				$sqlrenovering= "SELECT * FROM renovering WHERE sagsnr LIKE '%". $search ."%' OR typeafopgave LIKE '%". $search ."%' OR booketmoede LIKE '%". $search. "%';";
				$resultrenovering = mysqli_query($conn, $sqlrenovering);
				$queryResultrenovering = mysqli_num_rows($resultrenovering);
				
				if($queryResultrenovering > 0){
					echo"
						<h4>Renovering ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Type af opgave</th>
						<th>Booket møde</th>
						<th>Detaljer</th>";
					while($rowrenovering = mysqli_fetch_assoc($resultrenovering))
					{
						$orderid = $rowrenovering['orderid'];
						echo 
								"<tr>
									<td>". $rowrenovering["sagsnr"] ."</td>
									<td>". $rowrenovering["typeafopgave"] ."</td>
									<td>". $rowrenovering["booketmoede"] ."</td>
									<td><form action='renoveringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
					
				$sqlalarm= "SELECT * FROM alarmovervaagning WHERE sagsnr LIKE '%". 
				$search ."%' OR kontaktperson LIKE '%". $search ."%' OR firmaadresse LIKE '%". $search. "%';";
				$resultalarm = mysqli_query($conn, $sqlalarm);
				$queryResultalarm = mysqli_num_rows($resultalarm);
				
				if($queryResultalarm > 0){
					echo"
						<h4>Alarm og Overvågning ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Firma adresse</th>
						<th>Detaljer</th>";
					while($rowalarm = mysqli_fetch_assoc($resultalarm))
					{
						$orderid = $rowalarm['orderid'];
						echo 
								"<tr>
									<td>". $rowalarm["sagsnr"] ."</td>
									<td>". $rowalarm["kontaktperson"] ."</td>
									<td>". $rowalarm["firmaadresse"] ."</td>
									<td><form action='alarmovervaagningorderdtails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
				
				$sqlfagforening= "SELECT * FROM fagforening WHERE sagsnr LIKE '%". 
				$search ."%' OR booketmoede LIKE '%". $search ."%' OR adresse LIKE '%". $search. "%';";
				$resultfagforening = mysqli_query($conn, $sqlfagforening);
				$queryResultfagforening = mysqli_num_rows($resultfagforening);
				
				if($queryResultfagforening > 0){
					echo"
						<h4>Fagforening ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Booket møde</th>
						<th>Adresse</th>
						<th>Detaljer</th>";
					while($rowfagforening = mysqli_fetch_assoc($resultfagforening))
					{
						$orderid = $rowfagforening['orderid'];
						echo 
								"<tr>
									<td>". $rowfagforening["sagsnr"] ."</td>
									<td>". $rowfagforening["booketmoede"] ."</td>
									<td>". $rowfagforening["adresse"] ."</td>
									<td><form action='fagforeningorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
				
				$sqljobtilbud= "SELECT * FROM jobtilbud WHERE sagsnr LIKE '%". 
				$search ."%' OR booketmoede LIKE '%". $search ."%' OR adresse LIKE '%". $search. "%';";
				$resultjobtilbud = mysqli_query($conn, $sqljobtilbud);
				$queryResultjobtilbud = mysqli_num_rows($resultjobtilbud);
				
				if($queryResultjobtilbud > 0){
					echo"
						<h4>Jobtilbud ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Booket møde</th>
						<th>Adresse</th>
						<th>Detaljer</th>";
					while($rowjobtilbud = mysqli_fetch_assoc($resultjobtilbud))
					{
						$orderid = $rowjobtilbud['orderid'];
						echo 
								"<tr>
									<td>". $rowjobtilbud["sagsnr"] ."</td>
									<td>". $rowjobtilbud["booketmoede"] ."</td>
									<td>". $rowjobtilbud["adresse"] ."</td>
									<td><form action='jobtilbudorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
				
				$sqlkoerebog= "SELECT * FROM koerebog WHERE sagsnr LIKE '%". 
				$search ."%' OR kontaktperson LIKE '%". $search ."%' OR firmaadresse LIKE '%". $search. "%';";
				$resultkoerebog = mysqli_query($conn, $sqlkoerebog);
				$queryResultkoerebog = mysqli_num_rows($resultkoerebog);
				
				if($queryResultkoerebog > 0){
					echo"
						<h4>Kørebog ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Firma adresse</th>
						<th>Detaljer</th>";
					while($rowkoerebog = mysqli_fetch_assoc($resultkoerebog))
					{
						$orderid = $rowkoerebog['orderid'];
						echo 
								"<tr>
									<td>". $rowkoerebog["sagsnr"] ."</td>
									<td>". $rowkoerebog["kontaktperson"] ."</td>
									<td>". $rowkoerebog["firmaadresse"] ."</td>
									<td><form action='koerebogorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
				
				$sqlrengoering= "SELECT * FROM rengoering WHERE sagsnr LIKE '%". 
				$search ."%' OR kontaktperson LIKE '%". $search ."%' OR opgaveadresse LIKE '%". $search. "%';";
				$resultrengoering = mysqli_query($conn, $sqlrengoering);
				$queryResultrengoering = mysqli_num_rows($resultrengoering);
				
				if($queryResultrengoering > 0){
					echo"
						<h4>Rengøring og Service ordre:</h4>
						<div class=\"w3-container w3-responsive w3-card\">
						<table class=\"container w3-center w3-bordered w3-table\" id=\"customers\">
						<th>Sagsnummer</th>
						<th>Kontaktperson</th>
						<th>Opgave adresse</th>
						<th>Detaljer</th>";
					while($rowrengoering = mysqli_fetch_assoc($resultrengoering))
					{
						$orderid = $rowrengoering['orderid'];
						echo 
								"<tr>
									<td>". $rowrengoering["sagsnr"] ."</td>
									<td>". $rowrengoering["kontaktperson"] ."</td>
									<td>". $rowrengoering["opgaveadresse"] ."</td>
									<td><form action='rengoeringorderdetails.php' method='post'>
										<input type='hidden' value=". $orderid ." name='orderid'>
										<button type='submit' name='details-submit' class='w3-button w3-green w3-round w3-bar-item'>Se detaljer</button>
									</form></td>
								</tr>";
					}	
					echo"</table> </div>";
				}
				
			}
	
		?>
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
</html>