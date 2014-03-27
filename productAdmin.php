<?php 
$currentPage = "product";

include("includes/headAdmin.php"); 
include("includes/db.php");


$session = isset($_GET['p']) ? $_GET['p'] : 'product' ;

?>


<div class="leftNav">
	<ul>
		<li>	<div class="arrow"><?php if($session=="product")echo ">"?></div>    <a href="productAdmin.php?p=product">		Produkt</a> 		</li>	
		<li>	<div class="arrow"><?php if($session=="color")echo ">"?></div>		<a href="productAdmin.php?p=color">			Färgval</a>			</li>
		<li>	<div class="arrow"><?php if($session=="image")echo ">"?></div>		<a href="productAdmin.php?p=image">			Bild</a>			</li>
	</ul>
</div>


<div class="content">

<?php

if($session=="product"){
	$arrow="arrow-right"; 


 ?>

		<div class="h1Admin">Produkt</div>

<form action="productAdmin.php?p=product" method="post"
enctype="multipart/form-data">
<label for="file">Välj en fil att ladda upp:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Ladda upp">
</form>



<?php } 

if($session=="color"){
	$arrow="arrow-right"; ?>

	<div class="h1Admin">Färgval</div>
		Tillåts färgval för att designa produkten?

		
		<br><br><img src="images/godkannBtn.png" class="button"> <p>Ja</p>
		<br><img src="images/tabortBtn.png" class="button"> <p>Nej</p>

<?php } 

if($session=="image"){
	$arrow="arrow-right"; ?>

	<div class="h1Admin">Bild</div>
		Tillåts uppladdning av bild för att designa produkten?


		<br><br><img src="images/godkannBtn.png" class="button"> <p>Ja</p>
		<br><img src="images/tabortBtn.png" class="button"> <p>Nej</p>

<?php } ?>


</div>






<?php include("includes/footerAdmin.php"); ?>
