<?php 
$pageTitle="Bidrag"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage="entry";

include("includes/headAdmin.php"); 
include("includes/db.php");



   	$query = 'SELECT *, COUNT(EntryVoter.entryId) as votes
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


if (isset($_POST['submit']))
  {
   if ($_POST['select'] == "2")  {
   		echo "Senaste bidragen"; 

  }

   if ($_POST['select'] == "3") {
		echo "De med flest röster"; 
   	}
  }


?>

<div class="leftNav"></div>
	<div class="content">

		<div class="h1Admin">Alla bidrag</div>
		
				<form method="post" action="" enctype="multipart/form-data">
					<select name="select">
						<option value="1">Sortera bidragen</option>
	 					<option value="2">Senaste bidragen</option>
	  					<option value="3">Flest röster</option>
					</select>

					&nbsp;&nbsp;<input name="submit" type="submit" value="Välj" /> 
				</form>
				
					&nbsp;&nbsp;&nbsp;<a href="mail.php"><button>Visa alla mail </button></a><br>

				
				<?php 

					while($row = $res->fetch_object()) :  
						$entryId = ($row->entryId);
						$entryDate = strtotime($row->timeStamp);
						$entryDate = date("d M Y", $entryDate);
						$accepted = ($row->accepted);

						if( $accepted =='n'){
							$approveEntryButton = "<a href='approveEntry.php?entryId=<?php echo $entryId; ?>'><img src='images/godkannBtn.png'></a>";
							
						}

						else{
							$approveEntryButton = "<img src='images/godkannGraBtn.png'>";
						}



						?>
						
						<div class="entryWrapper">
							<div class="entryImg">
								<img class="imgStyle" src="<?php echo $row->entryImage ?>">
							</div>
								
							<div class="entryText">
								<h2><?php echo $row->entryName ?></h2> 
								<p><?php echo $entryDate; ?></p> <br/>
								<p><?php echo $row->designerName ?></p> <br/>
								<p><?php echo $row->designerCity ?></p> <br/>
								<p>Antal röster:</p>
								<p class="votes"><strong><?php echo $row->votes ?></strong></p>
							</div>
								
							<div class="entryBtn">
								
								<?php echo $approveEntryButton ?>
							
								<a href="deleteEntry.php?entryId=<?php echo $entryId; ?>"><img src="images/tabortBtn.png"></a>
								
							</div>
						</div>


					<?php endwhile; ?>
		
	</div>



<?php include("includes/footerAdmin.php"); ?>