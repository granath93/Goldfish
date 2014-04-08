<?php 
$currentPage = "product";

include("includes/headAdmin.php"); 
include("includes/db.php");


$session = isset($_GET['p']) ? $_GET['p'] : 'product' ;
$productId = 1;
$feedback="";

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


if(isset($_POST['uploadButton1'])){

	$imageName 	= $_FILES['productImage']['name'];
	$imageType	= strtolower(end(explode('.', $imageName)));
	$imageScr = 'images/product/productImage.' . $imageType;
	move_uploaded_file($_FILES['productImage']['tmp_name'], $imageScr);
	


}


 if(isset($_POST['save'])){

 		$query =<<<END
		UPDATE Product
		SET productImg = $imageScr
		WHERE productId = $productId
END;

//Exekutiverar "verkställer" UPDATE-satsen
	$res = $mysqli->query($query) or die("Failed");
	$feedback = "Sparat";
	
 } ?>

		<div class="h1Admin">Produkt</div>
		Välj en bild som skall representera produkten som skall designas. <br>
		Bilden får endast vara formatet .png eller .gif. <br>
		Bilden skall vara transparant innanför konturerna och ha ett vitt lager utanför konturerna.<br>
		Bilden kan även innehålla skuggor för att göra produkten effektfull. <br><br>


<form method="post" action="productAdmin.php" enctype="multipart/form-data">
      <label>Välj bild </label>
      <input type="file" name="productImage"/>
      <input type="submit" name="uploadButton1" value="Ladda upp"/>
     &nbsp;&nbsp; <button name="save">Spara </button>   &nbsp;&nbsp;<?php echo $feedback;?>
    </form><br><br>
 
<img style="width: 300px; height: 300px;" src=" <?php echo $imageScr?> ?v=<?php echo rand(0,1000) // rand() prevents the browser from displaying a previously cached image ?>"/>
 
 <?php  } 

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
