<?php
include("includes/headAdmin.php"); 
include("includes/db.php");

$query = 'SELECT *
	FROM Designer, Entry 
	ORDER BY Designer.designerName ASC';

//Exekutiverar "verkställer" SELECT-satsen
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); ?>

	<div class="leftNav"></div>

	<div class="content">	

	<div class="h1Admin">Alla deltagarens email</div>
	<hr>

<?php
	while($row = $res->fetch_object()) : 
		$designerName = ($row->designerName); 
		$designerEmail = ($row->designerEmail); 
		$entryName = ($row->entryName);
		$designerCity = ($row->designerCity);?>






<b>Namn</b> <?php echo  $designerName ?> <br>

<b>Email</b>  <?php echo  $designerEmail ?> <br>
<b>Bidragets namn</b>  <?php echo  $entryName ?> <br>
<b>Kommer från </b> <?php echo  $designerCity ?> <br>
<hr>





 <?php endwhile; ?>


 </div>