<?php

//inkluderar databaskopplingen
include("includes/db.php");
include("includes/headFront.php");
$mysqli->set_charset("utf8");
$accepted="";

$inspentries = 'SELECT Entry.entryId, Entry.entryName, Entry.accepted, Entry.timeStamp, Entry.entryImage, COUNT(EntryVoter.entryId) as votes
	FROM Entry 
	LEFT JOIN EntryVoter
	ON Entry.entryId=EntryVoter.entryId
	GROUP BY Entry.entryName, Entry.entryImage, Entry.timeStamp
	ORDER BY  votes DESC LIMIT 4';

$topentries = 'SELECT Entry.entryId, Entry.entryName, Entry.accepted, Entry.timeStamp, Entry.entryImage, COUNT(EntryVoter.entryId) as votes
	FROM Entry 
	LEFT JOIN EntryVoter
	ON Entry.entryId=EntryVoter.entryId
	GROUP BY Entry.entryName, Entry.entryImage, Entry.timeStamp
	ORDER BY votes DESC LIMIT 8';

$dateentries = 'SELECT Entry.entryId, Entry.entryName, Entry.accepted, Entry.timeStamp, Entry.entryImage, COUNT(EntryVoter.entryId) as votes
	FROM Entry 
	LEFT JOIN EntryVoter
	ON Entry.entryId=EntryVoter.entryId
	WHERE Entry.accepted = "y"
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
	<div id="start"></div>
		<div class="content" >
			<div class="contenttext">
					
			<h1><?php echo $welcomeTitle;?></h1>

			<br>

			<p><?php echo nl2br($welcomeText); ?></p><br>
			</div>
			<img src="images/tjuvkika.png"><br>
					 <?php 

					while($row = $entriesRes->fetch_object()) :  
						
						

						if($row->accepted == 'y'){
							?>
							
							<div class="entryWrapper">
								<div class="entryText">
									<h2><?php echo $row->entryName ?></h2> 
								</div>
								<div class="entryImg">
									<img class="imgStyle" src="<?php echo $row->entryImage ?>">
								</div>
									
								<div class="roster">
								
								<!--<a href='addVote.php?entryId=<?php echo $row->entryId; ?>'></a>-->
								<input id="rosta" name="rosta" type="submit" value="Lägg din röst!" />
								<div class="arrow-right"></div>
								<p class="votes"><strong><?php echo $row->votes ?></strong></p>
								</div>	
							
							</div>


					<?php }
				endwhile; ?>
		</div>



	
	<img src="images/linje.png" >
			

<div id="design" ></div>
		<div class="content" >
			<div class="contenttext">
			
			
			<h1>Designa produkten här!</h1>
			<br>
</div>
			<div class="product">
			 
			 <form method="post" action="upload_image.php" enctype="multipart/form-data" target="leiframe">
      			<p>Välj en bild<p> 
      			<input  type="file" name="image" />
      			<input type="submit" value="Ladda upp"/>
    		</form>

    		<br>
			<img src="images/product/productImage.png">
			<iframe allowTransparency="true" name="leiframe"></iframe></div>
		
	<div class="sendEntry">
		<p>Skicka in ditt bidrag</p>
		<p>Fyll i formuläret först</p><br>
			

			<form action="" method="post">
				<label for="designerName"> <p>Ditt namn</p> </label>
				<input  type="text" id="designerName" name="designerName" value=""><br>
				<label for="entryName"> <p>Döp ditt bidrag</p> </label>
				<input  id="entryName" name="entryName" value=""  ><br>
				<label for="designerEmail"> <p>Din Email</p> </label>
				<input  id="designerEmail" name="designerEmail"  value=""><br>
				<input type="submit" value="SKICKA BIDRAG!"  /> 
			
			</form>

	</div>
		


		</div>

		


	
	<img src="images/linje.png">


<div id="toplist"></div>
		<div class="content" >
			<div class="contenttext">
			 <h1> Här kommer du se topplistan </h1><br>
			</div>
			 <?php 

					while($row = $entriesTop->fetch_object()) :  
						

							if($row->accepted == 'y'){
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


						<?php }
					endwhile; ?>
		</div>



	<img src="images/linje.png" >

	<div id="latest"></div>
		<div class="content" >
			<div class="contenttext">


			<h1>De senaste bidragen</h1><br>
			</div>
					 <?php 

					while($row = $entriesDate->fetch_object()) :  
						
							if($row->accepted == 'y'){

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


					<?php }
					endwhile; ?>


		</div>






	<img src="images/linje.png">

	<div id="rule"></div>
		<div class="content" >
			<div class="contenttext">
		
			<h1><?php echo $ruleTitle;?></h1>
			</div>
			<br>


			<p><?php echo nl2br($ruleText); ?></p>
			

		</div>
<img src="images/linje.png">


<?php include("includes/footerFront.php");
