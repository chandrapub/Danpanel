<?php
// Here we check whether the user got to this page by clicking the proper signup button.
//if (isset($_POST['createorder-submit'])) {
	session_start();
  // We include the connection script so we can use it later.
  // We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
  require 'dbh.inc.php';
  

  // We grab all the data which we passed from the signup form so we can use it later.
  $startdate = $_POST['startdate'];
  $opstartsdate = $_POST['opstartsdate'];
  $typeoforder = $_POST['typeoforder'];
  $progressionoforder = $_POST['progressionoforder'];
  $sagsnr = $_POST['sagsnr'];
  $duration = $_POST['duration'];
  $hoursprweek = $_POST['hoursprweek'];
  $userfile = $_POST['userfile'];
  $uid = $_SESSION['uid'];
  $description = $_POST['description'];
  $orderid = $_POST['orderid'];
	if(isset($_POST['adminuid'])){
		$adminuid =$_POST['adminuid'];
	}
  
  $enddate = date("Y-m-d");

 
        // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
        $sql = "UPDATE offentligorders SET sagsnr=?, duration=?, hoursprweek=?, progressionoforder=?, enddate=?, description=?, adminuid=?  WHERE orderid=$orderid;";
        // Here we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
        			if(strpos($_SESSION['email'],'@danpanel.dk')!==false){
          header("Location: ../adminorderdetails.php?updateorder=error&orderid=".$orderid);
          exit();
			}
			else{
				 header("Location: ../orderdetails.php?updateorder=error&orderid=".$orderid);
          exit();
			}
        }
        else {

          // If there is no error then we continue the script!
			
          // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
          // The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!
		$sqlbefore = "SELECT * FROM offentligorders WHERE orderid=$orderid";
		$resultbefore = mysqli_query($conn, $sqlbefore);
		$rowbefore = mysqli_fetch_assoc($resultbefore);
			
		if($sagsnr!==$rowbefore['sagsnr']){
			$sagsnrchange = "sagsnr er blevet ændret fra ".$rowbefore['sagsnr']. " til ".$sagsnr;
		}else{
			$sagsnrchange = "sagsnr er ikke ændret";
		}
			
		if($duration!==$rowbefore['duration']){
			$durationchange = "varigheden er blevet ændret fra ".$rowbefore['duration']. " til ".$duration;
		}else{
			$durationchange = "varigheden er ikke ændret";
		}
			
		if($description!==$rowbefore['description']){
			$descriptionchange = "beskrivelsen er blevet ændret fra ".$rowbefore['description']. " til ".$description;
		}else{
			$descriptionchange = "beskrivelsen er ikke ændret";
		}
		
		if($hoursprweek!==$rowbefore['hoursprweek']){
			$hoursprweekchange = "timer om ugen er blevet ændret fra ".$rowbefore['hoursprweek']. " til ".$hoursprweek;
		}else{
			$hoursprweekchange = "timer om ugen er ikke ændret";
		}
			
			
			
			if($progressionoforder == 3){
				
				mysqli_stmt_bind_param($stmt, "siiissi",$sagsnr, $duration, $hoursprweek, $progressionoforder, $enddate, $description, $adminuid );
				mysqli_stmt_execute($stmt);
			} else {
				$enddate = null;
				mysqli_stmt_bind_param($stmt, "siiissi",$sagsnr, $duration, $hoursprweek, $progressionoforder, $enddate, $description, $adminuid);
				mysqli_stmt_execute($stmt);
			}
          // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
         
          // Then we execute the prepared statement and send it to the database!
          // This means the user is now registered! :)
          
				if(isset($_POST['adminuid'])){			
			$sql = 'SELECT * FROM adminuser WHERE adminuid='.$adminuid.'';
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				$emailto = $row['adminemail'];
				$nameto = $_SESSION['name'];
				$subject = "Opdatering til sag ".$sagsnr. "af typen offentlig";
				$txt = "sagsnummeret: ".$sagsnr." er blevet opdateret af ".$nameto. ".\n\nÆndringerne er følgende: ".$sagsnrchange." . ". $durationchange." . ".$descriptionchange." . ". $hoursprweekchange;
				}
			
          // Lastly we send the user back to the signup page with a success message!
			if(strpos($_SESSION['email'],'@danpanel.dk')!==false){
				if($emailto==$_SESSION['email']){
		  header("Location: ../adminorderdetails.php?updateorder=success&orderid=".$orderid."&noemailsentto=".$emailto."&datais=".$progressionoforder);
          exit();
				}
				mail($emailto, $subject, $txt);
          header("Location: ../adminorderdetails.php?updateorder=success&orderid=".$orderid."&emailsentto=".$emailto);
          exit();
			}
			else{

				mail($emailto, $subject, $txt);
				 header("Location: ../offentligorderdetails.php?updateorder=success&orderid=".$orderid."&emailsentto=".$emailto);
          exit();
			}
			}


        
   //   }
    //}
  //}
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);


  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../minprofil.php");
  exit();

