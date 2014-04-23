<?php

//inkluderar databaskopplingen
include("includes/db.php");
include("includes/headFront.php");


//hämtar från tabellen text i databasen
$textRes = $mysqli->query('SELECT * FROM Text') or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);


//Vi kommer behöva göra någon slags JOIN eller UNION-sats för att få alla resultat i samma query, istället för flera olika. 
//Jag och Dennis ska titta över det.

while($row = $textRes->fetch_object()) { 
	$welcomeTitle = ($row->welcomeTitle);
	$welcomeText = ($row->welcomeText);
	$ruleTitle = ($row->ruleTitle);
	$ruleText = ($row->ruleText);

	}


?>
	
<div class="container">

		<div id="contentStart" class="content">
			
			<p>hej</p>
	

			<?php echo $welcomeTitle;?>
			<br>
			<?php echo $welcomeText; ?>
	
		</div>	

	<div id="contentScen" class="content">
			
			DESIGNSCEN

		</div>

		<div id="contentTopEntry" class="content">
			
			Topplistan

		</div>

		<div id="contentLatestEntry" class="content">
			
			Senanse bidragen

		</div>

		<div id="contentRules" class="content">
			<?php echo $ruleTitle;?>
			<br>
			<?php echo $ruleText; ?>

		</div>


</div>

<?php include("includes/footerFront.php");