<?php
// Here we check whether the user got to this page by clicking the proper signup button.
//if (isset($_POST['createorder-submit'])) {
	session_start();
  // We include the connection script so we can use it later.
  // We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
  require 'dbh.inc.php';
  
  if($_SESSION['verify']==0 && strpos($_SESSION['email'], '@danpanel.dk')==false){
		header("Location: ../min".$_SESSION['typeofuser']."profil.php?verification=denied");
		exit();
	}
  // We grab all the data which we passed from the signup form so we can use it later.
  $virksomhedsnavn = $_POST['virksomhedsnavn'];
$kontaktperson = $_POST['kontaktperson'];
$sagsnr = $_POST['sagsnr'];
$beskrivelse = $_POST['beskrivelse'];
$antal = $_POST['antal'];
$typeafopgave = $_POST['typeafopgave'];
$varighed = $_POST['varighed'];
$moedetid = $_POST['moedetid'];
$opgaveadresse = $_POST['opgaveadresse'];
$firmaadresse = $_POST['firmaadresse'];
$fakturaemail = $_POST['fakturaemail'];
$ean = $_POST['ean'];
$website = $_POST['website'];
  $email = $_SESSION['email'];  

if(strpos($email, '@danpanel.dk')){
	$adminuid = $_SESSION['uid'];
	$uid = $_POST['uid'];
}
else{
  $adminuid = $_POST['adminuid'];
  $uid = $_SESSION['uid'];
}

if ( empty( empty( $kontaktperson ) || $virksomhedsnavn ) || empty( $sagsnr ) || empty( $firmaadresse ) || empty( $fakturaemail) || empty( $beskrivelse) || empty( $antal) || empty( $typeafopgave) || empty( $varighed) || empty( $moedetid) || empty( $opgaveadresse) ) 
	{
		header( "Location: ../min".$_SESSION['typeofuser']."profil.php?error=emptyfields&uid=" . $kontaktperson);
		exit();
	}
	// We check for an invalid username AND invalid e-mail.
	else if ( !preg_match( "/^[a-zA-Z0-9' ']*$/", $kontaktperson ) && !filter_var( $fakturaemail, FILTER_VALIDATE_EMAIL ) ) {
		header( "Location: ../min".$_SESSION['typeofuser']."profil.php?error=invalidname&mail");
		exit();
	}
	// We check for an invalid username.
	else if ( !preg_match( "/^[a-zA-Z' ']*$/", $kontaktperson ) ) {
		header( "Location: ../min".$_SESSION['typeofuser']."profil.php?error=invalidname");
		exit();
	}
	// We check for an invalid e-mail.
	else if ( !filter_var( $fakturaemail, FILTER_VALIDATE_EMAIL ) ) {
		header( "Location: ../min".$_SESSION['typeofuser']."profil.php?error=invalidemail");
		exit();
	}	



        // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
        $sql = "INSERT INTO vikarrekruttering (virksomhedsnavn, kontaktperson, sagsnr, beskrivelse, antal, typeafopgave, varighed, moedetid, opgaveadresse, firmaadresse, fakturaemail, ean, website, uid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        // Here we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
          header("Location: ../min".$_SESSION['typeofuser']."profil.php?error=sqlerror");
          exit();
        }
        else {

          // If there is no error then we continue the script!

          // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
          // The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!

          // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
          mysqli_stmt_bind_param($stmt, "ssssisissssssi",$virksomhedsnavn, $kontaktperson, $sagsnr, $beskrivelse, $antal, $typeafopgave, $varighed, $moedetid, $opgaveadresse, $firmaadresse, $fakturaemail, $ean, $website, $uid);
          // Then we execute the prepared statement and send it to the database!
          // This means the user is now registered! :)
          mysqli_stmt_execute($stmt);
			
			$subject = "Sag oprettet ".$sagsnr. "af typen privat/erhverv";
				$txt = "sagsnummeret: ".$sagsnr." er blevet oprettet af ".$kontaktperson;
          // Lastly we send the user back to the signup page with a success message!
			if(strpos($_SESSION['email'],'@danpanel.dk')!==false){
				mail("ma@danpanel.dk", $subject, $txt);
          header("Location: ../minadminprofil.php?createorder=success");
          exit();
			}
			mail("ma@danpanel.dk", $subject, $txt);
			header("Location: ../min".$_SESSION['typeofuser']."profil.php?createorder=success");
          exit();

        }
   //   }
    //}
  //}
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);


  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../min".$_SESSION['typeofuser']."profil.php.php");
  exit();

