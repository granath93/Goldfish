<?php
include("includes/db.php");

$res = $mysqli->query('SELECT * FROM Appearance') or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);

	while($row = $res->fetch_object()) { 
	$background = ($row->background);
	
	}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width" charset="utf-8">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="css/normalize.css" >
<link rel="stylesheet" href="css/front.css" >
<script src="js/functions.js" charset="utf-8"></script>
	<title>Front</title>
</head>
<body style="background-color:#<?php echo $background ?>">



<!--	

<div class="nav-container">
<div class="nav">
		
			<a class="" href="#contentStart"> Start </a>
			<a class="" href="index.php"> Designa </a>
			<a class="" href="index.php"> Topplista </a>
			<a class="" href="index.php"> Senaste Bidrag </a>
			<a class="" href="#contentRules"> Regler </a>
		
	</div>
</div>
	


-->

	
	<div class="topNav">
		<nav>
			<a class="" href="index.php"> Start </a>
			<a class="" href="#contentScen"> Designa </a>
			<a class="" href="#contentTopEntry"> Topplista </a>
			<a class="" href="#contentLatestEntry"> Senaste Bidrag </a>
			<a class="" href="#contentRules"> Regler </a>
		</nav>
	</div>
