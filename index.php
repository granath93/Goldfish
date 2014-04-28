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
$inspentries = 'SELECT Entry.entryId, Entry.entryName, Entry.timeStamp, Entry.entryImage, COUNT(EntryVoter.entryId) as votes
	FROM Entry 
	LEFT JOIN EntryVoter
	ON Entry.entryId=EntryVoter.entryId
	GROUP BY Entry.entryName, Entry.entryImage, Entry.timeStamp
	ORDER BY EntryVoter.entryId DESC LIMIT 4';

$topentries = 'SELECT Entry.entryId, Entry.entryName, Entry.timeStamp, Entry.entryImage, COUNT(EntryVoter.entryId) as votes
	FROM Entry 
	LEFT JOIN EntryVoter
	ON Entry.entryId=EntryVoter.entryId
	GROUP BY Entry.entryName, Entry.entryImage, Entry.timeStamp
	ORDER BY EntryVoter.entryId DESC LIMIT 8';

$dateentries = 'SELECT Entry.entryId, Entry.entryName, Entry.timeStamp, Entry.entryImage, COUNT(EntryVoter.entryId) as votes
	FROM Entry 
	LEFT JOIN EntryVoter
	ON Entry.entryId=EntryVoter.entryId
	GROUP BY Entry.entryName, Entry.entryImage, Entry.timeStamp
	ORDER BY Entry.timeStamp DESC LIMIT 8';

//hämtar från tabellen text i databasen
$res = $mysqli->query('SELECT * FROM Text, Logotype') or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);
$entriesRes = $mysqli->query($inspentries) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);
$entriesTop = $mysqli->query($topentries) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);
$entriesDate = $mysqli->query($dateentries) or die("Could not query database" . $mysqli->errno . 
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

			<p><?php echo $welcomeText; ?></p><br>
			<img src="images/tjuvkika.png"><br>
					 <?php 

					while($row = $entriesRes->fetch_object()) :  
						
						?>
						
						<div class="entryWrapper">
							<div class="entryText">
								<h2><?php echo $row->entryName ?></h2> 
							</div>
							<div class="entryImg">
								<img class="imgStyle" src="<?php echo $row->entryImage ?>">
							</div>
								
							<div class="roster">
							<input id="rosta" name="rosta" type="submit" value="Lägg din röst!" />
							<div class="arrow-right"></div>
							<p class="votes"><strong><?php echo $row->votes ?></strong></p>
							</div>	
						
						</div>


					<?php endwhile; ?>
		</div>



	
	<img src="images/linje.png" >
			

<div id="design"></div>
		<div class="content" >
			
			
			<h1>Här designar du din egna tröja!</h1>

		</div>


	
	<img src="images/linje.png">


<div id="toplist"></div>
		<div class="content" >
			 <h1> Här kommer du se topplistan </h1><br>
			 <?php 

					while($row = $entriesTop->fetch_object()) :  
						
						?>
						
						<div class="entryWrapper">
							<div class="entryText">
								<h2><?php echo $row->entryName ?></h2> 
							</div>
							<div class="entryImg">
								<img class="imgStyle" src="<?php echo $row->entryImage ?>">
							</div>
								
							<div class="roster">
							<input id="rosta" name="rosta" type="submit" value="Lägg din röst!" />
							<div class="arrow-right"></div>
							<p class="votes"><strong><?php echo $row->votes ?></strong></p>
							</div>	
						
						</div>


					<?php endwhile; ?>
		</div>



	<img src="images/linje.png" >

	<div id="latest"></div>
		<div class="content" >


			<h1>De senaste bidragen</h1><br>
					 <?php 

					while($row = $entriesDate->fetch_object()) :  
						
						?>
						
						<div class="entryWrapper">
							<div class="entryText">
								<h2><?php echo $row->entryName ?></h2> 
							</div>
							<div class="entryImg">
								<img class="imgStyle" src="<?php echo $row->entryImage ?>">
							</div>
								
							<div class="roster">
							<input id="rosta" name="rosta" type="submit" value="Lägg din röst!" />
							<div class="arrow-right"></div>
							<p class="votes"><strong><?php echo $row->votes ?></strong></p>
							</div>	
						
						</div>


					<?php endwhile; ?>


		</div>






	<img src="images/linje.png">

	<div id="rule"></div>
		<div class="content" >
		
			<h1><?php echo $ruleTitle;?></h1>
			
			<br>

			<p><?php echo $ruleText; ?></p>

		</div>


<?php include("includes/footerFront.php");