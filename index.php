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
$res = $mysqli->query('SELECT * FROM Text, Logotype') or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);


//Vi kommer behöva göra någon slags JOIN eller UNION-sats för att få alla resultat i samma query, istället för flera olika. 
//Jag och Dennis ska titta över det.

while($row = $res->fetch_object()) { 
	$welcomeTitle = ($row->welcomeTitle);
	$welcomeText = ($row->welcomeText);
	$ruleTitle = ($row->ruleTitle);
	$ruleText = ($row->ruleText);
	$logotype = ($row->logotypeImg);
	$logotypeUrl = ($row->logotypeUrl);


	}

?>

	<div class="logotype">
				<a href="<?php echo $logotypeUrl?>"><img src="<?php echo $logotype ?>"></a>
			</div>
	
		<div class="content" >
					
			<h1><?php echo $welcomeTitle;?></h1>

			<br>

			<p><?php echo $welcomeText; ?></p>
		</div>


	<div id="design"></div>
	<img src="images/linje.png" >
			


		<div class="content" >
			
			
			Här designar du din egna tröja!

		</div>


	<div id="toplist"></div>
	<img src="images/linje.png">



		<div class="content" >
			 Här kommer du se topplistan
		</div>


	<div id="latest"></div>
	<img src="images/linje.png" >


		<div class="content" >


			De senaste bidragen


		</div>





	<div id="rule"></div>
	<img src="images/linje.png">


		<div class="content" >
		
			<h1><?php echo $ruleTitle;?></h1>
			
			<br>

			<p><?php echo $ruleText; ?></p>

		</div>


<?php include("includes/footerFront.php");