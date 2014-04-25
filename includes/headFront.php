<?php 
include("includes/db.php");

	$res = $mysqli->query('SELECT * FROM Appearance, Logotype') or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error);

	while($row = $res->fetch_object()) { 
	$background = ($row->background);
	$logga = ($row->logotypeImg);
	
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width" charset="utf-8">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="css/normalize.css" >
<link rel="stylesheet" href="css/front.css" >
<script src="js/functions.js" charset="utf-8"></script>
	<title>Front</title>
</head>

<body style="background-color:#<?php echo $background ?>">



	<div class="topNav">
		<nav>
			<a class="" href="#start">  Start  </a>
			<a class="" href="#design"> Designa </a>
			<a class="" href="#toplist"> Topplista </a>
			<a class="" href="#latest"> Senaste bidrag </a>
			<a class="" href="#rule"> Regler </a>
		</nav>
	</div>

	<div id="start"></div>
		<div class="container">


