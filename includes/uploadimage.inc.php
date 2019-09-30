<?php
// this script allows the user or admin to upload certain files to an order

require 'dbh.inc.php';
session_start();
if	(isset($_POST['image-submit'])){
	$typeofuser = $_SESSION['typeofuser'];
	$uid = $_SESSION['uid'];
	$userfile = $_FILES['image'];
	$filename = $_FILES['image']['name'];
	$filetmpname = $_FILES['image']['tmp_name'];
	$filesize = $_FILES['image']['size'];
	$fileerror = $_FILES['image']['error'];
	$filetype = $_FILES['image']['type'];
	$email = $_SESSION['email'];
	
	$fileext = explode('.',$filename);
	$fileactualext = strtolower(end($fileext));
	
	$allowed = array('jpg', 'jpeg', 'png');
	
	if(in_array($fileactualext, $allowed)){
		if($fileerror === 0){
			if($filesize < 1000000){
				if(strpos($email, '@danpanel.dk') !==false){
					$sql="UPDATE adminuser SET image=? WHERE adminuid=$uid;";
				}
				else{
					$sql="UPDATE users SET image=? WHERE uid=$uid;";
				}
				
				$stmt = mysqli_stmt_init($conn);
				
				if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: ../minadminprofil.php?error=sqlerror");
          				exit();
					}
				if(strpos($email, '@danpanel.dk') !==false){
					$sql1 = "SELECT * FROM adminuser WHERE adminuid=$uid;";
				}
				else{
					$sql1 = "SELECT * FROM users WHERE uid=$uid;";
				}
				$result = mysqli_query($conn, $sql1);
				$row1 = mysqli_fetch_assoc($result);				
				if(isset($row1['image'])){
				unlink("../".$row1['image']);
				}
						
				
				$securefilename = uniqid('',true).".".$filename;
				$filedestination = '../uploads/'.$securefilename;
				$filepath = 'uploads/'.$securefilename;
				
				move_uploaded_file($filetmpname, $filedestination);
				mysqli_stmt_bind_param($stmt, "s", $filepath);
				mysqli_stmt_execute($stmt);
				
				if(strpos($email, '@danpanel.dk')!==false){
					header("Location: ../minadminprofil.php?upload=success");
					exit();
				}
				else{
					header( "Location: ../min".$typeofuser."profil.php?upload=success");
					exit();
					}
				

				
			} else{
				header("Location: ../minadminprofil.php?error=filetoobig");
				exit();
			}
		} else{
				header("Location: ../minadminprofil.php?error2");
				exit();
		}
	} else{
			header("Location: ../minadminprofil.php?error=filenotsupported");
			exit();
	}
}

