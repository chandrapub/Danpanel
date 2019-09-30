<?php
// Here we check whether the user got to this page by clicking the proper signup button.
//if (isset($_POST['createorder-submit'])) {
	session_start();
  // We include the connection script so we can use it later.
  // We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
  require 'dbh.inc.php';
  
if(isset($_POST['updateorder-submit'])){
  // We grab all the data which we passed from the signup form so we can use it later.

	$kontaktperson = $_POST['kontaktperson'];
	$website = $_POST['website'];
	$beskrivelse = $_POST['beskrivelse'];
	$adminuid =$_POST['adminuid'];
	$progressionoforder = $_POST['progressionoforder'];
	$orderid = $_POST['orderid'];
	
  
       
		// Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
        $sql = "UPDATE erhvervlejemaal SET kontaktperson=?, beskrivelse=?, website=?, adminuid=?, progressionoforder=? WHERE orderid=$orderid;";
        // Here we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
        			
				 header("Location: ../erhvervslejemaalorderdetails.php?updateorder=error&orderid=".$orderid);
          exit();
			
        }
        else {

          // If there is no error then we continue the script!
			
          // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
          // The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!
			
		$sqlbefore = "SELECT * FROM erhvervlejemaal WHERE orderid=$orderid";
		$resultbefore = mysqli_query($conn, $sqlbefore);
		$rowbefore = mysqli_fetch_assoc($resultbefore);
			
		if($kontaktperson!==$rowbefore['kontaktperson']){
			$kontaktpersonchange = "kontaktperson er blevet ændret fra ".$rowbefore['kontaktperson']. " til ".$kontaktperson;
		}else{
			$kontaktpersonchange = "kontaktperson er ikke ændret";
		}
			
		if($beskrivelse!==$rowbefore['beskrivelse']){
			$beskrivelsechange = "beskrivelse nummeret er blevet ændret fra ".$rowbefore['beskrivelse']. " til ".$beskrivelse;
		}else{
			$beskrivelsechange = "beskrivelse nummeret er ikke ændret";
		}
			
		if($website!==$rowbefore['website']){
			$websitechange = "hjemmesiden er blevet ændret fra ".$rowbefore['website']. " til ".$website;
		}else{
			$websitechange = "hjemmesiden er ikke ændret";
		}

			
				if(!mysqli_stmt_bind_param($stmt, "sssii", $kontaktperson, $beskrivelse, $website, $adminuid, $progressionoforder)){
					header("Location: ../erhvervslejemaalorderdetails.php?updateorder=error1&orderid=".$orderid);
          			exit();
				}
				if(!mysqli_stmt_execute($stmt)){
					header("Location: ../erhvervslejemaalorderdetails.php?updateorder=error2&orderid=".$orderid);
          			exit();
				}
				
				$sqlmail = "SELECT * FROM adminuser WHERE adminuid=$adminuid";
				$result = mysqli_query($conn, $sqlmail);
				$row = mysqli_fetch_assoc($result);
				$emailto = $row['adminemail'];
				$nameto = $_SESSION['name'];
				$subject = "Opdatering til sag ".$rowbefore['sagsnr']. "af typen erhverv";
				$txt = "sagsnummeret: ".$rowbefore['sagsnr']." er blevet opdateret af ".$nameto. ".\n\nÆndringerne er følgende: ".$kontaktpersonchange." || ". $beskrivelsechange." || ".$websitechange;
				
		if(strpos($_SESSION['email'],'@danpanel.dk')!==false){
				if($emailto==$_SESSION['email']){
					mail("ma@danpanel.dk", $subject, $txt);
					header("Location: ../erhvervslejemaalorderdetails.php?updateorder=success&orderid=".$orderid."&noemailsentto=".$emailto);
          			exit();
					}
					mail("ma@danpanel.dk", $subject, $txt);
					mail($emailto, $subject, $txt);
					header("Location: ../erhvervslejemaalorderdetails.php?updateorder=success&orderid=".$orderid."&emailsentto=".$emailto);
					exit();
					}
				else{
				mail("ma@danpanel.dk", $subject, $txt);
				mail($emailto, $subject, $txt);
			 	header("Location: ../erhvervslejemaalorderdetails.php?updateorder=success&orderid=".$orderid."&emailsentto=".$emailto);
          exit();
			}
			
			}

}
        

  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);


  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../min".$_SESSION['typeofuser']."profil.php");
  exit();


