<?php
//this script will change the variable stored in the database, allowing the user to use the website's functions
//first we check if the submit button is pressed, if so we proceed with the script
if( isset ($_POST ['verify-submit'] ) ){
	

	require 'dbh.inc.php';
	session_start();
	// we grab the data posted, so we can use it later in the script
	$emailfromlink = $_POST['emailfromlink'];
	$email= $_POST['email'];
	$uniquecode = $_POST['uniquecode'];
	//should the user be logged in at this moment we set the variable acordingly
	if(isset($_SESSION['uid'])){
		$uid = $_SESSION['uid'];
		
	} //if not we will find it through looking into their repsective databases
	else{
		//here we check to see if your email contains the string @danpanel.dk, to determine which database to look into
		if(strpos($email,"@danpanel.dk")!==false){
			$sql = "SELECT * FROM adminuser where adminemail=$emailfromlink;";
		}else{
			$sql = "SELECT * FROM users WHERE email=$emailfromlink;";
		}// here we set the uid accordingly
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if(strpos($email,"@danpanel.dk")!==false){
			$adminemail=$row['adminemail'];
		}else{
			$useremail=$row['email'];
		}
	}
	
	
	// now we check if the entered email adress is the same as the one in the database
	if($emailfromlink == $useremail || $emailfromlink == $email){
		//to make sure the sql statement contains anything that would otherwise do harm, by using prepared statements and using placeholders
		if(strpos($emailfromlink, "@danpanel.dk")!==false){
			$sql = "UPDATE adminuser SET adminverify=? WHERE adminuid=$uid;";
		}
		
		else{
			$sql = "UPDATE users SET verify=? WHERE uid=$uid;";
		}
		
		$stmt = mysqli_stmt_init($conn);
		//should the sql statement fail, we send the user back with an error message
		if(!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../verify.php?sqlerror=&uniquecode=".$uniquecode."&emailfromlink=".$emailfromlink."&uid=".$uid);
		exit();
		}
		else{
			//if the sql statement succeed, we change the variable in the database from 0 to 1, allowing the user to use functions
			$verified = 1;

			mysqli_stmt_bind_param($stmt, "i", $verified);
			mysqli_stmt_execute($stmt);

			if(strpos($emailfromlink, "@danpanel.dk")!==false){
				$sql = "SELECT * FROM adminuser WHERE adminuid=$uid;";
			}else{
				$sql = "SELECT * FROM users WHERE uid=$uid;";
			}
			
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);

			$_SESSION['verify'] = $row['verify'];
			//lastly we send the user to the index page
			header("Location: ../index.php?verification=success");
			exit();
		}
		}
	else{//if the email does not match we send the user back with an error message
		header("Location: ../verify.php?error=forkertmail&uniquecode=".$uniquecode."&emailfromlink=".$emailfromlink);
		exit();
	}
}
else{//should the user try and initiate the script via the url or other than the button, se send the user back with a small message
	header("Location: ../verify.php?error=unauthorized access");
	exit();
}

