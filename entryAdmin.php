<?php 
$pageTitle="Bidrag"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage="entry";

include("includes/headAdmin.php"); 
include("includes/db.php");



$query = 'SELECT Entry.entryName, Entry.entryImage, Entry.timeStamp, Designer.designerName, Designer.designerCity, COUNT(EntryVoter.entryId) as votes
FROM Entry 
INNER JOIN Designer 
ON Entry.designerId=Designer.designerId
LEFT JOIN EntryVoter
ON Entry.entryId=EntryVoter.entryId
GROUP BY Entry.entryName, Entry.entryImage, Entry.timeStamp, Designer.designerName, Designer.designerCity
ORDER BY Entry.timeStamp ASC';




//Exekutiverar "verkställer" SELECT-satsen
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);

/*if(isset($_POST['approve'])){

} */




?>
<div class="leftNav"></div>
	<div class="content">
	<form method="post" action="entryAdmin.php" enctype="multipart/form-data">
	<select name="select">
		<option name="senaste">senaste</option>
		<option name="flest">flest röster</option>
	</select>
	</form>	
			
				<?php 

					while($row = $res->fetch_object()) :  
						/*$entryId = ($row->entryId);*/?>
						
						<div class="entryWrapper">
							<div class="entryImg">
								<img class="imgStyle" src="<?php echo $row->entryImage ?>">
							</div>
								
							<div class="entryText">
								<h2><?php echo $row->entryName ?></h2> 
								<p><?php echo $row->designerName ?></p> <br/>
								<p><?php echo $row->designerCity ?></p> <br/>
								<p>Antal röster:</p>
								<p class="votes"><strong><?php echo $row->votes ?></strong></p>
							</div>
								
							<div class="entryBtn">
								<form method="post" action="entryAdmin.php" enctype="multipart/form-data">
									<input type="image" name="approve" src="images/godkannBtn.png">
									<!--<a href="deleteEntry.php?entryId=<?php $entryId ?>">--><input type="image" name="delete" src="images/tabortBtn.png"><!--</a>-->
								</form>
							</div>
						</div>


					<?php endwhile; ?>
		
	</div>



<?php include("includes/footerAdmin.php"); ?>