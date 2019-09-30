<?php
// Here we check whether the user got to this page by clicking the proper signup button.
if ( isset( $_POST[ 'signup-submit' ] ) ) {

	// We include the connection script so we can use it later.
	// We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
	require 'dbh.inc.php';
	require_once('../PHPMailer/PHPMailerAutoload.php');
	
	

	// We grab all the data which we passed from the signup form so we can use it later.
	$typeofuser = $_POST['typeofuser'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$phonenr = $_POST['phonenr'];
	$ean = $_POST['ean'];
	$cvr = $_POST['cvr'];
	$foedselsdato = $_POST['fødselsdato'];
	$nyhedsbrev = $_POST['nyhedsbrev'];
	if($nyhedsbrev == NULL){
		$nyhedsbrev = "nej";
	}

	if ( empty( empty( $typeofuser ) || $name ) || empty( $email ) || empty( $password ) || empty( $passwordRepeat ) ) {
		header( "Location: ../index.php?error=emptyfields&uid=" . $name . "&mail=" . $email );
		exit();
	}
	// We check for an invalid username AND invalid e-mail.
	else if ( !preg_match( "/^[a-zA-Z0-9' ']*$/", $name ) && !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		header( "Location: ../index.php?error=invalidname&mail&typeofuser=" . $typeofuser );
		exit();
	}
	// We check for an invalid username.
	else if ( !preg_match( "/^[a-zA-Z0-9' ']*$/", $name ) ) {
		header( "Location: ../index.php?error=invalidname&mail=" . $email . "&phonenr=" . $phonenr . "&typeofuser=" . $typeofuser );
		exit();
	}
	// We check for an invalid e-mail.
	else if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		header( "Location: ../index.php?error=invalidemail&name=" . $name . "&phonenr=" . $phonenr . "&typeofuser=" . $typeofuser );
		exit();
	} else if ( !preg_match( '/^[0-9]{8}+$/', $phonenr ) ) {
		header( "Location: ../index.php?error=invalidphonenr&name=" . $name . "&email=" . $email . "&typeofuser=" . $typeofuser );
		exit();
	}
	// We check if the repeated password is NOT the same.
	else if ( $password !== $passwordRepeat ) {
		header( "Location: ../index.php?error=passwordcheck&name=" . $name . "&email=" . $email . "&phonenr=" . $phonenr . "&typeofuser=" . $typeofuser );
		exit();
	} 
	else 
	
	{
		if ( strpos( $email, '@danpanel.dk' ) !== false ) {

			// We also need to include another error handler here that checks whether or the username is already taken. We HAVE to do this using prepared statements because it is safer!

			// First we create the statement that searches our database table to check for any identical usernames.
			$sql = "SELECT adminname FROM adminuser WHERE adminname=?;";
			// We create a prepared statement.
			$stmt = mysqli_stmt_init( $conn );
			// Then we prepare our SQL statement AND check if there are any errors with it.
			if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
				// If there is an error we send the user back to the signup page.
				header( "Location: ../index.php?error=sqlerror1" );
				exit();
			} else {
				
					// If we got to this point, it means the user didn't make an error! :)

					// Next thing we do is to prepare the SQL statement that will insert the users info into the database. We HAVE to do this using prepared statements to make this process more secure. DON'T JUST SEND THE RAW DATA FROM THE USER DIRECTLY INTO THE DATABASE!

					// Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
					$sql = "INSERT INTO adminuser (adminname, adminemail, adminpwd, adminphonenr, admintype) VALUES (?, ?, ?, ?, ?);";
					// Here we initialize a new statement using the connection from the dbh.inc.php file.
					$stmt = mysqli_stmt_init( $conn );
					// Then we prepare our SQL statement AND check if there are any errors with it.
					if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
						// If there is an error we send the user back to the signup page.
						header( "Location: ../index.php?error=sqlerror2" );
						exit();
					} else {

						// If there is no error then we continue the script!

						// Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
						// The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!
						$hashedPwd = password_hash( $password, PASSWORD_DEFAULT );

						// Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
						mysqli_stmt_bind_param( $stmt, "sssis", $name, $email, $hashedPwd, $phonenr, $typeofuser );
						// Then we execute the prepared statement and send it to the database!
						// This means the user is now registered! :)
						mysqli_stmt_execute( $stmt );


						$sql = "SELECT * FROM adminuser WHERE adminemail=?;";
						// Here we initialize a new statement using the connection from the dbh.inc.php file.
						$stmt = mysqli_stmt_init( $conn );
						// Then we prepare our SQL statement AND check if there are any errors with it.
						if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
							// If there is an error we send the user back to the signup page.
							header( "Location: ../index.php?error=sqlerror" );
							exit();
						} else {

							// If there is no error then we continue the script!

							// Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
							mysqli_stmt_bind_param( $stmt, "s", $email );
							// Then we execute the prepared statement and send it to the database!
							mysqli_stmt_execute( $stmt );
							// And we get the result from the statement.
							$result = mysqli_stmt_get_result( $stmt );
							// Then we store the result into a variable.
							if ( $row = mysqli_fetch_assoc( $result ) ) {
								// Then we match the password from the database with the password the user submitted. The result is returned as a boolean.
								$pwdCheck = password_verify( $password, $row[ 'adminpwd' ] );
								// If they don't match then we create an error message!
								if ( $pwdCheck == false ) {
									// If there is an error we send the user back to the signup page.
									header( "Location: ../index.php?error=wrongpwd" );
									exit();
								}
								// Then if they DO match, then we know it is the correct user that is trying to log in!
								else if ( $pwdCheck == true ) {

									// Next we need to create session variables based on the users information from the database. If these session variables exist, then the website will know that the user is logged in.

									// Now that we have the database data, we need to store them in session variables which are a type of variables that we can use on all pages that has a session running in it.
									// This means we NEED to start a session HERE to be able to create the variables!
									session_start();
									// And NOW we create the session variables.

									$_SESSION[ 'uid' ] = $row[ 'adminuid' ];
									$_SESSION[ 'name' ] = $row[ 'adminname' ];
									$_SESSION[ 'email' ] = $row[ 'adminemail' ];
									$_SESSION[ 'phonenr' ] = $row[ 'adminphonenr' ];
									$_SESSION[ 'typeofuser' ] = $row[ 'typeofadmin' ];
									$_SESSION['verify'] = $row['verify'];
									
									$uniquelink = uniqid();
									$mailtosend = "Velkommen til DanPanel, for at sikre os alles sikkerhed bedes du verificere din nye DanPanel konto. \n\n Brug dette link for at verificere din DanPanel konto: \n\n https://danpanel.dk/Danpanel-connection-test/verify.php?&uniquecode=".$uniquelink."&emailfromlink=".$email." \n\n Venlig Hilsen \n\n Danpanel IT-afdeling";
									
									$mail = new PHPMailer();
									$mail->setFrom('hej@danpanel.dk');
									$mail->addAddress($email, $name);
									$mail->Subject = "Verifikation";
									$mail->Body = $mailtosend;
									
									
									//Mail::sendMail("Velkommen til DanPanel", "for at sikre os alles sikkerhed bedes du verificere din nye DanPanel konto. \n\n Brug dette link for at verificere din DanPanel konto: \n\n https://danpanel.dk/Danpanel-connection-test/verify.php?&uniquecode=".$uniquelink."&emailfromlink=".$email." \n\n Venlig Hilsen", $email);
									//mail($email,"Verifikation ", $mailtosend);
									// Lastly we send the user back to the signup page with a success message!
									if($mail->send()){
										header( "Location: ../minadminprofil.php?signup=successforadmin" );
									exit();
									} else{
										header( "Location: ../index.php?signup=errorforadmin-prøv-igen" );
									exit();
									}
									
								}
							}
						}
					}
				}
			}
		}
	

 if ( !strpos( $email, '@danpanel.dk' ) !== false ) {

	// We also need to include another error handler here that checks whether or the username is already taken. We HAVE to do this using prepared statements because it is safer!

	// First we create the statement that searches our database table to check for any identical usernames.
	$sql = "SELECT name FROM users WHERE name=?;";
	// We create a prepared statement.
	$stmt = mysqli_stmt_init( $conn );
	// Then we prepare our SQL statement AND check if there are any errors with it.
	if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
		// If there is an error we send the user back to the signup page.
		header( "Location: ../index.php?error=sqlerror" );
		exit();
	} else {
		
			// If we got to this point, it means the user didn't make an error! :)

			// Next thing we do is to prepare the SQL statement that will insert the users info into the database. We HAVE to do this using prepared statements to make this process more secure. DON'T JUST SEND THE RAW DATA FROM THE USER DIRECTLY INTO THE DATABASE!

			// Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
			$sql = "INSERT INTO users (typeofuser, name, email, pwd, phonenr, ean, cvr, foedselsdato, nyhedsbrev) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
			// Here we initialize a new statement using the connection from the dbh.inc.php file.
			$stmt = mysqli_stmt_init( $conn );
			// Then we prepare our SQL statement AND check if there are any errors with it.
			if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
				// If there is an error we send the user back to the signup page.
				header( "Location: ../index.php?error=sqlerror1user" );
				exit();
			} else {

				// If there is no error then we continue the script!

				// Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
				// The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!
				$hashedPwd = password_hash( $password, PASSWORD_DEFAULT );

				// Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
				mysqli_stmt_bind_param( $stmt, "ssssissss", $typeofuser, $name, $email, $hashedPwd, $phonenr, $ean, $cvr, $foedselsdato, $nyhedsbrev);
				// Then we execute the prepared statement and send it to the database!
				// This means the user is now registered! :)
				mysqli_stmt_execute( $stmt );
				// Lastly we send the user back to the signup page with a success message!

				$sql = "SELECT * FROM users WHERE email=?;";
				// Here we initialize a new statement using the connection from the dbh.inc.php file.
				$stmt = mysqli_stmt_init( $conn );
				// Then we prepare our SQL statement AND check if there are any errors with it.
				if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
					// If there is an error we send the user back to the signup page.
					header( "Location: ../index.php?error=sqlerror2user" );
					exit();
				} else {

					// If there is no error then we continue the script!

					// Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
					mysqli_stmt_bind_param( $stmt, "s", $email );
					// Then we execute the prepared statement and send it to the database!
					mysqli_stmt_execute( $stmt );
					// And we get the result from the statement.
					$result = mysqli_stmt_get_result( $stmt );
					// Then we store the result into a variable.
					if ( $row = mysqli_fetch_assoc( $result ) ) {
						// Then we match the password from the database with the password the user submitted. The result is returned as a boolean.
						$pwdCheck = password_verify( $password, $row[ 'pwd' ] );
						// If they don't match then we create an error message!
						if ( $pwdCheck == false ) {
							// If there is an error we send the user back to the signup page.
							header( "Location: ../index.php?error=wrongpwd" );
							exit();
						}
						// Then if they DO match, then we know it is the correct user that is trying to log in!
						else if ( $pwdCheck == true ) {

							// Next we need to create session variables based on the users information from the database. If these session variables exist, then the website will know that the user is logged in.

							// Now that we have the database data, we need to store them in session variables which are a type of variables that we can use on all pages that has a session running in it.
							// This means we NEED to start a session HERE to be able to create the variables!
							session_start();
							// And NOW we create the session variables.

							$_SESSION[ 'uid' ] = $row[ 'uid' ];
							$_SESSION[ 'name' ] = $row[ 'name' ];
							$_SESSION[ 'email' ] = $row[ 'email' ];
							$_SESSION[ 'phonenr' ] = $row[ 'phonenr' ];
							$_SESSION[ 'typeofuser' ] = $row[ 'typeofuser' ];
							$_SESSION['verify'] = $row['verify'];

							$uniquelink = uniqid();
							$mailtosend = "Velkommen til DanPanel, for at sikre os alles sikkerhed bedes du verificere din nye DanPanel konto. \n\n Brug dette link for at verificere din DanPanel konto: \n\n https://danpanel.dk/Danpanel-connection-test/verify.php?uniquecode=".$uniquelink."&email=".$email." \n\n Venlig Hilsen \n\n Danpanel IT-afdeling";
							
								//mail($email,"Verify",$mailtosend);
							
								$mail = new PHPMailer();
									$mail->setFrom('hej@danpanel.dk');
									$mail->addAddress($email, $name);
									$mail->Subject = "Verifikation";
									$mail->Body = $mailtosend;
							
								if($mail->send())
								{
									header( "Location: ../min".$typeofuser."profil.php?signup=successforuser&emailsentto".$email );
								exit();
								} else{
									header( "Location: ../index.php?signup=errorforuser&prøvigen-ellerKontaktKundeservice");
								exit();
								}
								
							}

						}
					}
				}
			}
		}
	

	// Then we close the prepared statement and the database connection!
	mysqli_stmt_close( $stmt );
	mysqli_close( $conn );
} else {
	// If the user tries to access this page an inproper way, we send them back to the signup page.
	header( "Location: ../index.php" );
	exit();
}