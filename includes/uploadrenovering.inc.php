<?php// this script allows the user or admin to upload certain files to an order
require 'dbh.inc.php';
//we grab all the data through the $files global super
if	(isset($_POST['upload-submit'])){
	$orderid = $_POST['orderid'];
	$userfile = $_FILES['file'];
	$filename = $_FILES['file']['name'];
	$filetmpname = $_FILES['file']['tmp_name'];
	$filesize = $_FILES['file']['size'];
	$fileerror = $_FILES['file']['error'];
	$filetype = $_FILES['file']['type'];
	
	$fileext = explode('.',$filename);
	$fileactualext = strtolower(end($fileext));
	//here we decide which files to allow
	$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'zip');
	//here we check to see whether the file is uploaded with error, if its too big or if its the type we have allowed
	if(in_array($fileactualext, $allowed)){
		if($fileerror === 0){
			if($filesize < 1000000){
				//here we prepare an sql statement with placeholders
				$sql="INSERT INTO renoveringuserfiles (userfilename, userfilepath, orderid) VALUES (?, ?, ?);";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//if the statement fails, we send the user back with an error message
					if(strpos($_SESSION['email'], "@danpanel.dk")!==false){
						header("Location: ../adminrengoeringorderdetails.php?error=sqlerror");
          				exit();
					}
						else{
							header("Location: ../rengoeringorderdetails.php?error=sqlerror");
          				exit();
						}
					
          				
	}			//if not we find out whats going to happen to the file
				//first we give a secure name, so there wont be dublicate filenames
				$securefilename = uniqid('',true).".".$filename;
				//then we assign which folder the file goes into
				$filedestination = '../uploads/'.$securefilename;
				//this function moves the file from the browser to the designated folder
				//and then we upload the filepath to the database, so that we can retrieve the file later
				move_uploaded_file($filetmpname, $filedestination);
				mysqli_stmt_bind_param($stmt, "ssi", $securefilename, $filedestination, $orderid);
				mysqli_stmt_execute($stmt);
				
				if(strpos($_SESSION['email'], "@danpanel.dk")!==false){
				header("Location: ../rengoeringorderdetails.php?upload=success&orderid=".$orderid);
				exit();
				}else{
					header("Location: ../rengoeringorderdetails.php?upload=success&orderid=".$orderid);
					exit();
				}
			
				
				
			} else{
				header("Location: ../rengoeringorderdetails.php?error3&orderid=".$orderid);
				exit();
			}
		} else{
				header("Location: ../rengoeringorderdetails.php?error2&orderid=".$orderid);
				exit();
		}
	} else{
			header("Location: ../rengoeringorderdetails.php?error1&orderid=".$orderid);
			exit();
	}
}