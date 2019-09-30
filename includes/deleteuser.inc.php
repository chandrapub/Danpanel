<?php

	session_start();

	require'dbh.inc.php';
	
	$uid = $_POST['uid'];
	

if(isset($_POST['deleteuser-submit'])){
	
  // $sql = "DELETE FROM users WHERE uid=?;";
  $sql = "DELETE FROM users WHERE uid=$uid;";
        // Here we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
          header("Location: ../minadminprofil.php?delete=error=sqlerror");
          exit();
        }
        else {

          mysqli_stmt_bind_param($stmt, 'i', $uid);
          // Then we execute the prepared statement and send it to the database!
          mysqli_stmt_execute($stmt);
			
          header("Location: ../minadminprofil.php?delete=success&".$uid);
          exit();

        }
   
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

header("Location: ../minadminprofil.php");
exit();
}
else{
	header("Loacation: ../minadminprofil.php");
	exit();
}
