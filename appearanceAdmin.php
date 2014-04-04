<?php
$pageTitle="Bakgrund"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage = "Background"; //Lägger in värde så man vet vilken sida administratören är på

//Lägger till filer som behöver vara med på sidan så att sidan skall fungera rätt
include("includes/db.php"); 
include("includes/headAdmin.php"); 

//Sparar det som finns i alla fält i formuläten och sparar de i variabler
$session = isset($_GET['p']) ? $_GET['p'] : 'Background' ; 
$feedback="";
$empty="";
$arrow="";


//Hämtar all data från tabellen "Logotype" ur databasen
$query = <<<END
SELECT *
FROM Logotype;
END;

//Exekutiverar "verkställer" SELECT-satsen
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query

//Loopar igenom alla attribut i tabellen och lägger in de i variabler
while($row = $res->fetch_object()) { 
$logotypeUrl = ($row->logotypeUrl); 
$logotypeImg = ($row->logotypeImg); 
}


//När användaren trycker på "spara"-knappen uppdateras och sparas välkomsttexten, reglerna och mailen i respektive tabeller/fält som ligger i formuläret
if(isset($_POST['save'])){

//Här börjar satsen som sparar välkomsttexten
 	if(isset($_POST['logotypeImg']) && isset($_POST['logotypeUrl']) ){

//Sparar det som står i formuläret i variabler
	$logotypeImg = isset($_POST['logotypeImg']) ? $_POST['logotypeImg'] : '' ;  
	$logotypeUrl = isset($_POST['logotypeUrl']) ? $_POST['logotypeUrl'] : '' ; 

//Här uppdateras tabellen med allt som är skrivet i formuläret
		$query =<<<END
		UPDATE Logotype
		SET logotypeImg = '$logotypeImg', logotypeUrl = '$logotypeUrl'
		
END;
$showLogotypeUrl = $logotypeUrl;
$showLogotypeImg = $logotypeImg;

//Exekutiverar "verkställer" UPDATE-satsen
	$res = $mysqli->query($query) or die("Failed");
	$feedback = "Sparat";
	}

}?>
<!--Menyn på vänser sida-->
<div class="leftNav">								<!--class="<?php if($currentPage=="index")echo $class="active" ?>-->

	<ul>
		<li>	<div class="arrow"><?php if($session=="Background")echo ">"?></div>    <a href="appearanceAdmin.php?p=Background">		Bakgrund</a> 		</li>	
		<li>	<div class="arrow"><?php if($session=="Logotype")echo ">"?></div>		<a href="appearanceAdmin.php?p=Logotype">		Logotyp</a>		</li>
		
	</ul>	

</div>

<div class="content">
<?php

if ($session =="Background"){

	?>
	<?php 
$query = <<<END
SELECT *
FROM Appearance;
END;



//Exekutiverar "verkställer" SELECT-satsen
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query

//Loopar igenom alla attribut i tabellen och lägger in de i variabler
while($row = $res->fetch_object()) { 
$background = ($row->background);

}
$showBackground = $background;

//När användaren trycker på "spara"-knappen uppdateras och sparas välkomsttexten, reglerna och mailen i respektive tabeller/fält som ligger i formuläret
if(isset($_POST['save'])){

//Här börjar satsen som sparar bakgrundsfärgen
 	if(isset($_POST['background'])){

//Sparar det som står i formuläret i variabler
	$background = isset($_POST['background']) ? $_POST['background'] : '' ;  
	

//Här uppdateras tabellen med allt som är skrivet i formuläret
		$query =<<<END
		UPDATE Appearance
		SET background = '$background'
		
END;
$showBackground = $background;
echo $background;
echo " ";
echo $showBackground;
//Exekutiverar "verkställer" UPDATE-satsen
	$res = $mysqli->query($query) or die("Failed");
	$feedback = "Sparat";
	}

}?>
	<h1>Bakgrund</h1>

<p> Ange en sex-siffrig Hex-kod för att ange sidans bakgrundsfärg<br>
	t.ex. "FFFFFF" (utan citattecken) för svart, ""f7e859" för gult och "#bae860" för grönt!</p>
	<form action="appearanceAdmin.php?p=Background" method="post">
			<label class="field" for ="background">Välj Bakgrundsfärg:</label>
			<textarea id="background" name="background"><?php echo $showBackground ?></textarea><br>
			<button name="reset">Rensa </button>
			<button name="regret">Ångra </button>
			<button name="save">Spara </button>  &nbsp; &nbsp; &nbsp; <?php echo $feedback ?>
		</form>
</form>

	
<iframe name="leiframe" width="341,5" height="192" style="background-color:#<?php echo $background ?>"></iframe>
	<?php
}
?>
<?php

//Visar vilken sektion man är på, detta fall i logotyp-sektionen

if($session=="Logotype"){
$arrow="arrow-right";

//Skriver in den texten som finns i tabellen från databasen och lägger in i en variabel som skall visa texten i formuläret
$showLogotypeUrl = $logotypeUrl;
$showLogotypeImg = $logotypeImg;
?>

<h1>Logotyp</h1>

<form method="post" action="upload_logotype.php" enctype="multipart/form-data" target="leiframe">
      <label>Välj en bild som är din logotyp</label><br>
      <input type="file" name="logotype"/>
      <input type="submit" value="Ladda upp"/>
    </form>
    <iframe name="leiframe" width="300" height="200"></iframe>
<?php }
include("includes/footerAdmin.php");  
?>
