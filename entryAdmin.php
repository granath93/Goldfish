<?php 
$pageTitle="Bidrag"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage="entry";

include("includes/headAdmin.php"); 
include("includes/db.php");





?>
<div class="leftNav"></div>
	<div class="content">
		<img class="imgStyle" src="images/ggg.png" /> <br/>
		<div class="entryText">
			<p>BidragsNamn</p> <br/>
			<p>Skapare</p> <br/>
			<p>Ort</p> <br/>
			<p>Röster</p> 
		</div>
		<div class="testDiv">
		<img src="images/godkannBtn.png" /> <br/>
		<img src="images/tabortBtn.png" />
		</div>
	</div>



<?php include("includes/footerAdmin.php"); ?>