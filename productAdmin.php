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



<form method="post" action="upload_image.php" enctype="multipart/form-data" target="frame1">
      <label>Välj en bild som är din produkt</label><br>
      <input type="file" name="image"/>
      <input type="submit" value="Ladda upp"/>
    </form>
    <iframe name="frame1" width="500" height="300"></iframe>


<form method="post" action="upload_image.php" enctype="multipart/form-data" target="frame2">
      <label>Välj en bild som skall vara skuggningen till produkten</label><br>
      <input type="file" name="image"/>
      <input type="submit" value="Ladda upp"/>
    </form>
    <iframe name="frame2" width="500" height="300"></iframe>

			<button name="reset">Rensa </button>
			<button name="regret">Ångra </button>
			<button name="save">Spara </button> 
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
