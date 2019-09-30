<?php

// Here we check whether the user got to this page by clicking the proper signup button.
if (isset($_POST['createcomment-submit'])) {
	session_start();
	
  // We include the connection script so we can use it later.
  // We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
  require 'dbh.inc.php';
  

  // We grab all the data which we passed from the signup form so we can use it later.
	$comment = $_POST['comment'];
	$uid = $_SESSION['uid'];
	$orderid = $_POST['orderid'];
	
		
		
		if(strpos($_SESSION['email'],'@danpanel.dk')){
        // Next thing we do is to prepare the SQL statement that will insert the users info into the database. We HAVE to do this using prepared statements to make this process more secure. DON'T JUST SEND THE RAW DATA FROM THE USER DIRECTLY INTO THE DATABASE!

        // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
        $sql = "INSERT INTO alarmovervaagningcomments (commenttext, adminuid, orderid) VALUES (?, ?, ?);";
		
		
        // Here we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
          header("Location: ../alarmovervaagningorderdetails.php?error=sqlerror");
          exit();
        }
		
        else {

          // If there is no error then we continue the script!

          // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
          // The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!

          // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
          mysqli_stmt_bind_param($stmt, "sii",$comment,$uid,$orderid);
          // Then we execute the prepared statement and send it to the database!
          // This means the user is now registered! :)
          mysqli_stmt_execute($stmt);
          // Lastly we send the user back to the signup page with a success message!
          header("Location: ../adminalarmovervaagningorderdetails.php?createcomment=success&orderid=".$orderid);
          exit();
		}
        }
		$sql = "INSERT INTO alarmovervaagningcomments (commenttext, uid, orderid) VALUES (?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
          header("Location: ../alarmovervaagningorderdetails.php?error=sqlerror");
          exit();
        }
		
        else {

          // If there is no error then we continue the script!

          // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
          // The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!

          // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
          mysqli_stmt_bind_param($stmt, "sii",$comment,$uid,$orderid);
          // Then we execute the prepared statement and send it to the database!
          // This means the user is now registered! :)
          mysqli_stmt_execute($stmt);
          // Lastly we send the user back to the signup page with a success message!

				header("Location: ../alarmovervaagningorderdetails.php?updateorder=success&orderid=".$orderid);
          exit();
			
		}
   //   }
    //}
  //}
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../minprofil.php");
  exit();


