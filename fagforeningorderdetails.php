<?php
session_start();
require("includes/dbh.inc.php") ;
$orderid = $_POST['orderid'];
if($orderid === null){
	$orderid = $_GET['orderid'];
}
?><head>
	<title>DanPanel</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/png" href="Assets/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/stylesheet.css">
	<script src="javascript/closemodal.js"></script>
	<style>	
	html{scroll-behavior: smooth}
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
					?><a  name="minprofil-submit" method="post"  class="w3-bar-item w3-button"<?php echo 'href="min'.$_SESSION['typeofuser'].'profil.php" '?>>Min Profil</a>
				<?php echo '
		  <a onClick="document.getElementById(\'login\').style.display=\'block\'" 
				class="w3-button w3-bar-item">Log ud</a>';
				}}
				?>
			</div>
		</div>
	</div>

						
					
	<!-- Edit & Show order details -->
	<div class="w3-padding-32"></div>
	<div id="id03" class="w3-half">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
			<div class="w3-section">
				<form class="w3-container" action="includes/updatefagforeningorder.inc.php" method="post">
						
					<?php 
						$sql ="SELECT * FROM fagforening WHERE orderid=$orderid";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						$row =  mysqli_fetch_assoc($result);
							
						?>
					
					<label>Adresse</label>
					<input disabled class="w3-input w3-border w3-hover-border-black w3-section" type="text" name="adresse" value="<?php echo $row['adresse']; ?>" style="border: 0px">
					
					<label>Sagsnummer</label>
					<input disabled class="w3-input w3-border w3-hover-border-black w3-section" type="text" name="sagsnr" value="<?php echo $row['sagsnr']; ?>">
					
					<label>Book et møde</label>
					<input disabled type="datetime" value="<?php echo $row['booketmoede']; ?>" class="w3-input w3-border w3-hover-border-black w3-section" name="booketmoede">
					
					<label>DanPanel's medarbejder der arbejder på denne sag</label>
					<select class="w3-section w3-input w3-border w3-hover-border-blue" name="adminuid">
						<?php 
						// $adminuid=$row['adminuid'];
						$email = $_SESSION['email'];  

						if(strpos($email, '@danpanel.dk')){
							$adminuid = $_SESSION['uid'];
							$uid = $_POST['uid'];
						}
						else{
						  $adminuid = $_POST['adminuid'];
						  $uid = $_SESSION['uid'];
						}
						
						$sql1 ="SELECT * FROM adminuser WHERE adminuid=$adminuid;";
						$result1 = mysqli_query($conn, $sql1);
						$resultCheck1 = mysqli_num_rows($result1);
						$row1 =  mysqli_fetch_assoc($result1);
						?> 
						<option style="display: none" selected value="<?php echo $adminuid;?>" class="w3-bar-item w3-button"><?php echo $row1['adminname'] ;?></option>';
						 <?php
						
						$sql1 ='SELECT * FROM adminuser;';
						$result1 = mysqli_query($conn, $sql1);
						$resultCheck1 = mysqli_num_rows($result1);
						while($row1 =  mysqli_fetch_assoc($result1)){
							$adminuid=$row1['adminuid'];
							$adminname=$row1['adminname'];
							$adminemail = $_SESSION['email'];
							if(strpos($adminemail, "ma@danpanel.dk")!==false){
							echo '<option class="w3-bar-item w3-button" value='.$adminuid.'>'.$adminname.'</option>';
						}
						}
						
						
						
						
						?>
					</select>
					
					<?php echo' <input type="hidden" name="orderid" value='.$orderid.'> ';?>
					<?php 
					if(strpos($_SESSION['email'],"@danpanel.dk")!==false){
					switch($row['progressionoforder']){
							
						case"0":	
							echo '
					<div class=" w3-center">
					<div class="w3-third w3-container w3-padding w3-green">
					<label>GODKEND</label> <br>
					<label class="switch">
  					<input type="checkbox" name="progressionoforder" value="1">
					<span class="slider round"></span>
					</label>
					</div>

					<div class="w3-third w3-container w3-padding w3-grey">
					<label>AKTIV</label><br>
					<label class="switch">
  					<input disabled type="checkbox">
					<span class="slider round"></span>
					</label>
					</div>
					
					<div class="w3-third w3-container w3-padding w3-grey">
					<label>FULDFØR</label><br>
					<label class="switch">
  					<input disabled type="checkbox">
					<span class="slider round"></span>
					</label>
					</div>
					</div>';
							break;
						case "1":
								echo '
					<div class=" w3-center">
					<div class="w3-third w3-container w3-padding w3-grey">
					<label>GODKEND</label> <br>
					<label class="switch">
  					<input name="progressionoforder" value="1" type="checkbox" checked >
					<span class="slider round"></span>
					</label>
					</div>

					<div class="w3-third w3-container w3-padding w3-green">
					<label>AKTIV</label><br>
					<label class="switch">
  					<input name="progressionoforder" value="2" type="checkbox">
					<span class="slider round"></span>
					</label>
					</div>
					
					<div class="w3-third w3-container w3-padding w3-grey">
					<label>FULDFØR</label><br>
					<label class="switch">
  					<input disabled type="checkbox">
					<span class="slider round"></span>
					</label>
					</div>
					</div>';
							break;
						case "2":
							echo '
					<div class=" w3-center">
					<div class="w3-third w3-container w3-padding w3-grey">
					<label>GODKEND</label> <br>
					<label class="switch">
  					<input disabled type="checkbox">
					<span class="slider round"></span>
					</label>
					</div>

					<div class="w3-third w3-container w3-padding w3-grey">
					<label>AKTIV</label><br>
					<label class="switch">
  					<input name="progressionoforder" value="2" type="checkbox" checked>
					<span class="slider round"></span>
					</label>
					</div>
					
					<div class="w3-third w3-container w3-padding w3-green">
					<label>FULDFØR</label><br>
					<label class="switch">
  					<input name="progressionoforder" value="3" type="checkbox">
					<span class="slider round"></span>
					</label>
					</div>
					</div>';
							break;
						case "3":
								echo '
					<div class=" w3-center">
					<div class="w3-third w3-container w3-padding w3-grey">
					<label>GODKEND</label> <br>
					<label class="switch">
  					<input disabled type="checkbox">
					<span class="slider round"></span>
					</label>
					</div>

					<div class="w3-third w3-container w3-padding w3-green">
					<label>AKTIV</label><br>
					<label class="switch">
  					<input name="progressionoforder" value="2" type="checkbox">
					<span class="slider round"></span>
					</label>
					</div>
					
					<div class="w3-third w3-container w3-padding w3-green">
					<label>FULDFØR</label><br>
					<label class="switch">
  					<input name="progressionoforder" value="3" type="checkbox" checked>
					<span class="slider round"></span>
					</label>
					</div>
					</div>';
							break;
							
					}
					}
					?>
					<button class="w3-input w3-border w3-hover-border-black w3-section w3-green w3-round"  type="submit" name="updateorder-submit">Opdater</button>
				</form>
				<form action="includes/uploadfagforening.inc.php" method="post" enctype="multipart/form-data">
					<?php echo' <input type="hidden" name="orderid" value='.$orderid.'> ';?>
					<label>Upload dokumenter her</label>
					<br>
					<input type="file" name="file" multiple="multiple">
					<button type="submit" name="upload-submit">UPLOAD</button>
					</form>				
				<table>
				<th>Filnavn</th>
				<th>Funktion</th>
				<?php 
				$sql = "SELECT * FROM fagforeninguserfiles WHERE orderid=$orderid;";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($result)){ ?>
				

					<tr>
						<td> <?php echo $row["userfilename"] ;?></td>
						<td ><a class="w3-button" target="_blank" href="http://danpanel.dk/Danpanel-connection-test/uploads/<?php echo $row['userfilename']; ?>">Download</a></td>
					</tr>
				
				<?php }
				 ?>
				</table>
				
				
				<?php 
				//if($row['progressionoforder'] == 0){
				echo"
				<button class=\"w3-input w3-border w3-hover-border-black w3-round w3-right w3-button w3-red\" onClick=\"document.getElementById('delete-modal').style.display='block'\">Slet ordre</button>
				";//}?>
		<!-- delete-modal -->		
	<div id="delete-modal" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round" style="max-width:600px">
			<div class="w3-center"><br>
				<span onclick="document.getElementById('delete-modal').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright w3-round" title="Close Modal">×</span> <img src="Assets/logo-black.png" alt="Logo" style="width:30%" class="w3-margin-top"> </div>
				<form action="includes/deletefagforeningorder.inc.php" method="post">
				<?php echo' <input type="hidden" name="orderid" value='.$orderid.'> ';?>	
		  	 <h1 class="w3-center">Er du sikker på at du vil slette denne ordre?</h1>
            <button class="w3-input w3-border w3-hover-border-black w3-right w3-button w3-red w3-round" type="submit" name="deleteorder-submit">Slet ordre</button>
			</form>
			<div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-round">
				<button onclick="document.getElementById('delete-modal').style.display='none'" type="button" class="w3-button w3-red w3-round">Cancel</button>
			</div>
		</div>
	</div>
				
				<!-- Cancel button -->
				<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
					<a href="minprivatprofil.php" type="button" class="w3-button w3-red w3-round">Cancel</a>
				</div>
			</div>
		
	</div>
	
	<!-- Comment / Chat -->
<div class="w3-half">
<?php 
	$uid = $_SESSION['uid'];
	$sql = "SELECT * FROM fagforeningcomment WHERE orderid=$orderid;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){


	if(!isset($row['adminuid'])){
		echo '
			  <div class="w3-padding"></div>
			  <div class="w3-blue w3-round">
			  <div class=panel w3-blue w3-round">
			  By <b>'.$_SESSION['name'].'</b>
			  <i>'.$row['timestamp'].'</i>
			  </div>
			  <div class="panel w3-pale-blue w3-round">'.$row['commenttext'].'
			  </div>
			  </div>';
				}
			if(isset($row['adminuid'])){
			
			$adminid=$row['adminuid'];
			$adminsql = "SELECT * FROM adminuser WHERE adminuid=$adminid;";
			$adminresult = mysqli_query($conn, $adminsql);
			$adminresultCheck = mysqli_num_rows($adminresult);
			$adminrow=mysqli_fetch_assoc($adminresult);
				
				echo '
			  <div class="w3-padding"></div>
			  <div class="w3-green w3-round">
			  <div class=panel w3-green w3-round">
			  By <b>'.$adminrow['adminname'].'</b>
			  <i>'.$row['timestamp'].'</i>
			  </div>
			  <div class="panel w3-pale-green w3-round">'.$row['commenttext'].'
			  </div>
			  </div>';
			}
			}
		}

				

	else { echo "Ingen kommentarer fundet"; }
?>		 	
<div class="w3-padding-16"></div>
	 <form action="includes/createfagforeningcomment.inc.php" class="container w3-bottom w3-margin-left" style="position: fixed" method="post">
		 <div class="w3-section">
		 <textarea name="comment" rows="6" cols="75" class="w3-round" placeholder="Skriv her..."></textarea> 
		 </textarea>
		<?php echo '<input type="hidden" name="orderid" value='.$orderid.'>'; ?>
		 <img src="Assets/IHLNO.jpg" class="w3-circle" style="width: 5%">
		 </div>
	<button onKeyPress="enter" name="createcomment-submit" class="w3-button w3-green w3-round" type="submit">Send</button>
	  </form>
	
</div>
<footer>
</footer>
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