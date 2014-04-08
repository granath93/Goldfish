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



?>
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
			<!--<button name="reset">Rensa </button>
			<button name="regret">Ångra </button>-->
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
?>
<h1>Logotyp</h1>

<form method="post" action="" enctype="multipart/form-data" target="leiframe">
      <label>Välj en bild som är din logotyp</label><br>
      <input type="file" name="logotypeImg"/>
    <br>
    <iframe name="leiframe" width="300" height="200"><img src ="images/logotyp/logotyp.jpg"></iframe>
    	<label>Välj LogotypsUrl</label><br>
    	<input type='field' name="logotypeUrl"/>
    	<button name="save1">Spara</button>
    </form>
<?php


$query = <<<END
SELECT * FROM Logotype;
END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query

while($row = $res->fetch_object()) {
	$logotypeImg = ($row->logotypeImg);
	$logotypeUrl = ($row->logotypeUrl);
	$logotypeId = ($row->logotypeId);

}
$showlogotypeImg = $logotypeImg;
$showlogotypeUrl = $logotypeUrl;

//echo $showlogotypeImg;
echo $showlogotypeUrl;
//Användaren trycker på spara1
if(isset($_POST['save1'])){

	if(!empty($_POST)){

//Här börjar satsen som sparar välkomsttexten
 //if(isset($_POST['logotypeImg']) && isset($_POST['LogotypeUrl']) ){

//Sparar det som står i formuläret i variabler
	$logotypeImg = $_FILES['logotypeImg']; 

	$file_name = $_FILES['logotypeImg']['name'];



	$logotypeUrl = $_POST['logotypeUrl'];


	


//Här uppdateras tabellen med allt som är skrivet i formuläret
		$query =<<<END
		UPDATE Logotype
		SET logotypeUrl = '$logotypeUrl', logotypeImg = '$logotypeImg';
		
END;


$res = $mysqli->query($query) or die("Failed");
$feedback = "Sparat";
}
	//}
?>


<?php }}
include("includes/footerAdmin.php");  
?>
