<?php
// this script takes the inputs from the contact form from various pages, and sends them to a specified email adress
use PHPMailer\PHPMailer\PHPMailer;
include_once "../PHPMailer/PHPMailer.php";
include_once "../PHPMailer/Exception.php";
include_once "../PHPMailer/SMTP.php";
$msg = "";


if(isset($_POST['contact-submit'])) {
$mail = new PHPMailer();
$name = $_POST['Name']; 
$email = $_POST['Email']; 
$tlf = $_POST['Tlf']; 
$subject = $_POST['Subject']; 
$message = $_POST['Message']; 

// $mail->Host = 'pop.gmail.com';

// $mail-> Port= 995;
// $mail->Host = 'mailout.one.com';
$mail->Host = 'smtp.gmail.com';

$mail->isSMTP();
// $mail->Host = 'send.one.com';  
$mail->SMTPAuth = true;                               
// $mail->Username = "cm@danpanel.dk";                
// $mail->Password = '';     
// $mail->Username = "hej@danpanel.dk";                
// $mail->Password = ';     
$mail->Username = "chandrapub@gmail.com";                
$mail->Password = '';
// $mail->Username = "tithi124410@gmail.com";                
// $mail->Password = '';   
$mail->SMTPSecure = 'ssl';      
// $mail->SMTPSecure = 'TLS';                         
// $mail->Port = 587;      
// $mail->Port = 25;
$mail->Port = 465;



// $mail->addAddress($email);
// $mail->setFrom('test@hostinger-tutorials.com', 'Your Name');
// $mail->addReplyTo('reply-box@hostinger-tutorials.com', 'Your Name');
// $mail->addAddress('example@gmail.com', 'Receiver Name');
// $mail->Subject = 'PHPMailer SMTP message';
// $mail->setFrom('test@hostinger-tutorials.com', 'Your Name');



// $mail->setFrom('hej@danpanel.dk',$name);
$mail->setFrom($email,$name);

// $mail->subject = "Subject".$subject;
$mail->message = $message;
$mail->isHTML(true);
// $mail->Body =$message;
$mail ->Body = "Du har modtaget en mail fra <b> ".$name.".</b>\n<br> Vores besked: \t <span>&nbsp;</span> <b>".$message.".</b>\n\n<br> Vedkommende kan kontaktes via <span>&nbsp;</span> <b>".$tlf."</b> eller via <b>".$email."</b>";
// $mail->Body1 =$subject;
// $mail->addAddress('danpanelmarketing@gmail.com');
// $mail->addAddress('hej@danpanel.dk');
// $mail->addAddress('chandrapub@gmail.com');
$mail->addReplyTo($email, $name);
$mail->Subject = $subject;
$mail->addAddress('chandrapub@gmail.com', 'Dan Panel');

if($mail->send()){
    header("Location:  ../index.php?mailsent");
    exit();
// 	echo 'Name: '.$name.'email from:'.$email.'<br> subject: '.$subject.'Message:'.$message;
	// $msg ="your email is send";
	}
	else{
		echo 'Please try again!!!';
	// $msg ="Please try again";
	}
	


// require "../PHPMailer/class.phpmailer.php";
// require "../PHPMailer/class.smtp.php";
// require "../PHPMailer/PHPMailerAutoload.php";

// require 'phpmaile/PHPMailerAutoload.php';

// if(isset($_POST['contact-submit'])) {
// $mail = new PHPMailer;
// $name = $_POST['Name']; 
// $email = $_POST['Email']; 
// $tlf = $_POST['Tlf']; 
// $subject = $_POST['Subject']; 
// $message = $_POST['Message']; 

// $mail->isSMTP();                                      
// // $mail->Host = 'mailout.one.com';  
// $mail->Host = 'send.one.com';  
// $mail->SMTPAuth = true;                               
// $mail->Username = 'cm@danpanel.dk';                
// $mail->Password = '';                           
// $mail->SMTPSecure = 'false';                            
// // $mail->Port = 587;      
// $mail->Port = 25;
// // $mail->Port = 465;
// $mail->AddReplyTo($email, $name);
// $mail->setFrom($email, $name);
// $mail->addAddress('cm@danpanel.dk', 'Chandra Shekhar'); 
// $mail->isHTML(true);                                  
// $mail->Subject = $_POST['Subject'];
// $mail->Body    = '<b>From:</b><br> ' . $name . ' ' . $email . '<br> <br> <b>Message:</b> <br> ' .$message; 
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

// require "../PHPMailer/class.phpmailer.php";
// require "../PHPMailer/class.smtp.php";
// require "../PHPMailer/PHPMailerAutoload.php";

	
// if(isset($_POST['contact-submit'])){
//     $name = $_POST['Name'];
// 	$emailFrom = $_POST['Email'];
// 	$tlf = $_POST['Tlf'];
// 	//this is the subject of the email
// 	$subject = $_POST['Subject'];
// 	$message = $_POST['Message'];
	
// 	//this is the spcified email adress
// 	$emailTo = "cm@danpanel.dk";
	
// 	$headers = "From:".$emailFrom;
// // 	$headers = 'From: '.$emailFrom. "\r\n" .
// //     'Reply-To:' .$emailFrom. "\r\n" .
// //     'X-Mailer: PHP/' . phpversion();
// // 	$headers = 'Fra:<'.$emailFrom.'>\r\n';
// //     $headers .="Reply-To: ".$emailFrom."\r\n";
// //     $headers .="MIME-vERSION: 1.0\r\n";
// //     $headers .= "Content-type: text/html; charset-utf-8";
	
//     // $headers = "Fra: chandrapub@gmail.com";
// 	//this is the content of the email
// // 	$headers = "From: webmaster@example.com" . "\r\n" .
// //     "CC: somebodyelse@example.com";

// 	$txt = "Du har modtaget en mail fra ".$name.".\n\n".$message.".\n\nVedkommende kan kontaktes via".$tlf." eller via ".$emailFrom;
	
// 	if(mail($emailTo, $subject, $txt, $headers)){
// 	    echo "<h1> Sent Sucessefully! Thank you"." ".$name.", We will conact you shortly!</h1>";
// 	}else{
// 	    echo "Something went worng!";
// 	}
	
// 	mail($emailTo, $subject, $txt, $headers);
	// header("Location:  ../index.php?mailsent");
	// exit();
}
?>