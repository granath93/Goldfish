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
									<p>Skapare</p> <br/>
									<p>Ort</p> <br/>
									<p>Röster</p>
								</div>
								
								<div class="entryBtn">
									<input type="image" name="approve" src="images/godkannBtn.png">
									<input type="image" name="delete" src="images/tabortBtn.png">
								</div>
						</div>


						<?php endwhile; ?>
		
	</div>



<?php include("includes/footerAdmin.php"); ?>