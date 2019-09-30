<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Verify Thy Mail</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
	<div class="w3-card w3-center w3-padding-large w3-display-middle" style="width: 33%">
		<form action="includes/verification.inc.php" method="post">
			<label>Indtast din email </label>
			<div class="w3-padding"></div>
			<input class="w3-input w3-border w3-margin-bottom" type="text" name="email">
			<input type="hidden" name="emailfromlink" value="<?php echo $_GET['emailfromlink'] ;?>">
			<input type="hidden" name="uniquecode" value="<?php echo $_GET['uniquecode'] ;?>">
			<button class="w3-button" type="submit" name="verify-submit"> CONFIRM </button>
		</form>
	</div>
</body>
</html>