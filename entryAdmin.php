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
ORDER BY Entry.timeStamp DESC';

/*Entry.entryName, Entry.entryImage, Entry.timeStamp, Designer.designerName, Designer.designerCity, COUNT(EntryVoter.entryId) as votes
FROM Entry 
INNER JOIN Designer 
ON Entry.designerId=Designer.designerId
INNER JOIN EntryVoter
WHERE Entry.entryId= 1';*/


//Exekutiverar "verkställer" SELECT-satsen
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);
  

?>
<div class="leftNav"></div>
	<div class="content">
		
		
			
				<?php 

					while($row = $res->fetch_object()) :  ?>
						
						<div class="entryWrapper">
							<div class="entryImg">
								<img class="imgStyle" src="<?php echo $row->entryImage ?>">
							</div>
								
							<div class="entryText">
								<h2><?php echo $row->entryName ?></h2> 
								<p><?php echo $row->designerName ?></p> <br/>
								<p><?php echo $row->designerCity ?></p> <br/>
								<p>Antal röster:</p>
								<h3><?php echo $row->votes ?></h3>
							</div>
								
							<div class="entryBtn">
								<input type="image" name="approve" src="images/godkannBtn.png">
								<input type="image" name="delete" src="images/tabortBtn.png">
							</div>
						</div>


					<?php endwhile; ?>
		
	</div>



<?php include("includes/footerAdmin.php"); ?>