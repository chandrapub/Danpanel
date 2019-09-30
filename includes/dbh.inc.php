<?php
//original connection string
// $dBServername = "danpanel.dk.mysql";
// $dBUsername = "danpanel_dk_test_db";
// $dBPassword = "123456";
// $dBName = "danpanel_dk_test_db";
//local connection string
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "danpanel_dk_test_db";
// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
?>