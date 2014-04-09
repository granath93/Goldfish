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

				$query =<<<END
				SELECT * FROM Product
				WHERE productId = $productId		
END;

		//Exekutiverar "verkställer" UPDATE-satsen
			$res = $mysqli->query($query) or die("Failed");
			
			while($row = $res->fetch_object()){
			$image = $row->productImg;
		}



if(isset($_POST['uploadButton'])){

	$imageName 	= $_FILES['productImage']['name'];
	$imageType	= strtolower(end(explode('.', $imageName)));
	$imageScr = 'images/product/productImage.' . $imageType;
	move_uploaded_file($_FILES['productImage']['tmp_name'], $imageScr);


 if(isset($_POST['save'])){

 		$query =<<<END
		UPDATE Product
		SET productImg = {$imageScr}
		WHERE productId = $productId
END;

//Exekutiverar "verkställer" UPDATE-satsen
	$res = $mysqli->query($query) or die("Failed");
	$feedback = "Sparat";

 }
 } ?>

		<div class="h1Admin">Produkt</div>
		Välj en bild som skall representera produkten som skall designas. <br>
		Bilden får endast vara formatet .png eller .gif. <br>
		Bilden skall vara transparant innanför konturerna och ha ett vitt lager utanför konturerna.<br>
		Bilden kan även innehålla skuggor för att göra produkten effektfull. <br><br>


<form method="post" action="productAdmin.php" enctype="multipart/form-data">
      <label>Välj bild </label>
      <input type="file" name="productImage"/>
      <input type="submit" name="uploadButton" value="Ladda upp"/>
     &nbsp;&nbsp; <button name="save">Spara </button>   &nbsp;&nbsp; <?php echo $feedback;?>
    </form><br><br>
 
<img style="width: 300px; height: 300px;" src=" <?php echo $image;?>"/>

 <?php  } 

if($session=="color"){
	$arrow="arrow-right"; 

if(isset($_POST['buttonYes_x'])){
	
}

if(isset($_POST['buttonNo_x'])){
	
}

	?>

	<div class="h1Admin">Färgval</div>
		Tillåts färgval för att designa produkten?

		<form method="post" action="productAdmin.php?p=color" enctype="multipart/form-data">
		<br><br><input type="image" src="images/godkannBtn.png" class="button" name="buttonYes"></input> <p>Ja</p>
		<br><input type="image" src="images/tabortBtn.png" class="button" name="buttonNo"></input> <p>Nej</p>

		</form>
		<!--<img src="images/godkannBtn.png" class="button" name="buttonYes" id="change1" onClick="checked(1)"> 
		<img src="images/tabortBtn.png" class="button" name="buttonNo" id="change2" onClick="checked(2)"> -->
		
		
<?php } 

if($session=="image"){
	$arrow="arrow-right"; ?>

	<div class="h1Admin">Bild</div>
		Tillåts uppladdning av bild för att designa produkten?


		<form method="post" action="productAdmin.php?p=image" enctype="multipart/form-data">
		<br><br><input type="image" src="images/godkannBtn.png" class="button" name="buttonYes"></input> <p>Ja</p>
		<br><input type="image" src="images/tabortBtn.png" class="button" name="buttonNo"></input> <p>Nej</p>

		</form>

<?php } ?>


</div>






<?php include("includes/footerAdmin.php"); ?>
