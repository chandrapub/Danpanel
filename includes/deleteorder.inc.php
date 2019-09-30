<?php

	session_start();

	require'dbh.inc.php';
	

	$orderid = $_POST['orderid'];
	$uid = $_SESSION['uid'];

if(isset($_POST['deleteorder-submit'])){
	
		$sql = "DELETE FROM offentligorders WHERE orderid=?;";
		
		
		
		
        // Here we initialize a new statement using the connection from the dbh.inc.php file.
        
		$stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
			if(strpos($_SESSION['email'],'@danpanel.dk')){
				header("Location: ../adminorderdetails.php");
					exit();
			}
			else{
          // If there is an error we send the user back to the signup page.
          header("Location: ../min".$_SESSION['typeofuser']."profil.php");
          exit();
			}
        }
        else {

          	mysqli_stmt_bind_param($stmt, "i",$orderid);
		  	$sqlGetAllFiles ="SELECT * FROM offentliguserfiles WHERE orderid=$orderid;";
			$result = mysqli_query($conn, $sqlGetAllFiles);
			while($row = mysqli_fetch_assoc($result)){
				unlink($row['userfilepath']);
			}
		  
          // Then we execute the prepared statement and send it to the database!
          mysqli_stmt_execute($stmt);
		
		  if(strpos($_SESSION['email'],'@danpanel.dk')){
			  header("Location: ../minadminprofil.php?succes");
          exit();
		  }
			else{
          header("Location: ../min".$_SESSION['typeofuser']."profil.php?succes");
          exit();
			}
        }
   
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
if(strpos($_SESSION['email'],'@danpanel.dk')){
	header("Location: ../minadminprofil.php?succes");
    exit();
}
	else{
header("Location: ../min".$_SESSION['typeofuser']."profil.php");
exit();
	}
}
else if(strpos($_SESSION['email'],'@danpanel.dk')){
	header("Loacation: ../admindorderdetails.php");
	exit();
}
else{
	header("Loacation: ../offentligorderdetails.php");
	exit();
}
