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
	$arrow="arrow-right"; ?>

		<div class="h1Admin">Produkt</div>


<?php } 

if($session=="color"){
	$arrow="arrow-right"; ?>

		<div class="h1Admin">Färgval</div>
	Tillåts färgval för att designa produkten?

<?php } 

if($session=="image"){
	$arrow="arrow-right"; ?>

	<div class="h1Admin">Bild</div>
		Tillåts uppladdning av bild för att designa produkten?


<?php } ?>


</div>






<?php include("includes/footerAdmin.php"); ?>
