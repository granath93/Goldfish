<link rel="stylesheet" href="css/stylesheet.css">
<link rel="bootstrap" href="css/bootstrap.css">
<!-- av någon anledning verkar den inte vilja läsa in bootstrap.css, har bytt namn, lagt i olika ordningar etc-->
<!--<link rel"normalize" href="normalize.css">-->
<!--<link rel"unsemantic-grid-base" href="unsemantic-grid-base">-->

<?php

//inkluderar databaskopplingen
include("includes/db.php");
include("includes/headFront.php");
$mysqli->set_charset("utf8");

//hämtar från tabellen text i databasen
$textRes = $mysqli->query('SELECT * FROM Text') or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);
$backRes = $mysqli->query('SELECT * FROM Appearance') or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);

//Vi kommer behöva göra någon slags JOIN eller UNION-sats för att få alla resultat i samma query, istället för flera olika. 
//Jag och Dennis ska titta över det.

while($row = $textRes->fetch_object()) { 
	$welcomeTitle = ($row->welcomeTitle);
	$welcomeText = ($row->welcomeText);


	}
	while($row = $backRes->fetch_object()) { 
	$background = ($row->background);
	


	}

?>

<body style="background-color:#<?php echo $background ?>">
	<div class="row">
		<div id="topNav">
		<nav>
		<a class="" href="frontend.php"> Start </a>
		<a class="" href="frontend.php"> Designa </a>
		<a class="" href="frontend.php"> Topplista </a>
		<a class="" href="frontend.php"> Senaste Bidrag </a>
		<a class="" href="frontend.php"> Regler </a>
	
	</nav>
	</div>

	<div id="content">
	<div class="row">
	<div class="col-md-4">
		<p>hej</p>
	</div>
		<div class="col-md-4">
	
		<?php echo $welcomeTitle;?>
		<br>
		<?php echo $welcomeText; ?>
	</div>
	</div>
</div>
</div>

</body>
</html>