<?php 
$pageTitle="Bidrag"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage="entry";

include("includes/headAdmin.php"); 
include("includes/db.php");

$query = <<<END
SELECT *
FROM Entry;
END;


//Exekutiverar "verkställer" SELECT-satsen
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query

//Loopar igenom alla attribut i tabellen och lägger in de i variabler
while($row = $res->fetch_object()) { 
$entryName = ($row->entryName);
$entryImage = ($row->entryImage);



//$background = ($row->background); 

}




?>
<div class="leftNav"></div>
	<div class="content">
		<img class="imgStyle" src="<?php echo $entryImage ?>" /> <br/>
		<div class="testwrapper">
			<div class="entryText">
				<p><?php echo $entryName ?></p> <br/>
				<p>Skapare</p> <br/>
				<p>Ort</p> <br/>
				<p>Röster</p> 
			</div>
			<div class="buttonbajs">
				<img src="images/godkannBtn.png" />
				<img src="images/tabortBtn.png" />
			</div>
		</div>
		
	</div>



<?php include("includes/footerAdmin.php"); ?>