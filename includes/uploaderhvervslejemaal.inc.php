<?php// this script allows the user or admin to upload certain files to an order
require 'dbh.inc.php';
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
	
	$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'zip');
	
	if(in_array($fileactualext, $allowed)){
		if($fileerror === 0){
			if($filesize < 1000000){
				
				$sql="INSERT INTO erhvervlejemaaluserfiles (userfilename, userfilepath, orderid) VALUES (?, ?, ?);";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					
							header("Location: ../erhvervslejemaalorderdetails.php?error=sqlerror");
          				exit();
						
					
          				
	}
				$securefilename = uniqid('',true).".".$filename;
				$filedestination = '../uploads/'.$securefilename;
				
				move_uploaded_file($filetmpname, $filedestination);
				mysqli_stmt_bind_param($stmt, "ssi", $securefilename, $filedestination, $orderid);
				mysqli_stmt_execute($stmt);
				
				if(strpos($_SESSION['email'], "@danpanel.dk")!==false){
				header("Location: ../erhvervslejemaalorderdetails.php?upload=success&orderid=".$orderid);
				exit();
				}else{
					header("Location: ../erhvervslejemaalorderdetails.php?upload=success&orderid=".$orderid);
					exit();
				}
			
				
				
			} else{
				header("Location: ../erhvervslejemaalorderdetails.php?error3&orderid=".$orderid);
				exit();
			}
		} else{
				header("Location: ../erhvervslejemaalorderdetails.php?error2&orderid=".$orderid);
				exit();
		}
	} else{
			header("Location: ../erhvervslejemaalorderdetails.php?error1&orderid=".$orderid);
			exit();
	}
}