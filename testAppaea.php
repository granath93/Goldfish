<?php
$pageTitle="Logotyp"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage = "Logotype"; //Lägger in värde så man vet vilken sida administratören är på

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
//$background = ($row->background); 
//lägg in testdata i logotypeUrl+Img för att testa
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

//Exekutiverar "verkställer" UPDATE-satsen
	$res = $mysqli->query($query) or die("Failed");
	$feedback = "Sparat";
	}

}?>
<!--Menyn på vänser sida-->
<div class="leftNav">								<!--class="<?php if($currentPage=="index")echo $class="active" ?>-->

	<ul>
		<li>	<div class="arrow"><?php if($session=="Background")echo ">"?></div>    <a href="testAppaea.php?p=Background">		Bakgrund</a> 		</li>	
		<li>	<div class="arrow"><?php if($session=="Logotype")echo ">"?></div>		<a href="testAppaea.php?p=Logotype">		Logotyp</a>		</li>
		
	</ul>	

</div>

<div class="content">

<?php

//Visar vilken sektion man är på, detta fall i välkomsttext-sektionen
if($session=="Logotype"){
$arrow="arrow-right";

//Skriver in den texten som finns i tabellen från databasen och lägger in i en variabel som skall visa texten i formuläret
$showLogotypeUrl = $logotypeUrl;
$showLogotypeImg = $logotypeImg;

//När användaren trycker på knappen "rensa" tas allt i formuläret bort med denna sats
	if(isset($_POST['reset'])){
	$background=$empty;
	
}

//Om användaren ångrar att han raderade all text ångras rensningen
	if(isset($_POST['regret'])){
	$showBackground=$background;
	
}


?>

<h1>Logotyp</h1>

<form action="testAppaea.php?p=Logotype" method="post">
			<label class="field" for ="logotypeUrl">Logotyp-Url</label>
			<input class="field title" type="text" id="logotypeUrl" name="logotypeUrl" value="<?php echo $showLogotypeUrl ?>" /><br>
			<label class="file" for ="logotypeImg">Logotypsbild:</label>
			
			<!-- <textarea class="field text" id="logotypeImg" name="logotypeImg"><?php echo $showLogotypeImg ?></textarea><br>-->
			<label for="file">Välj en fil att ladda upp:</label>
			<input type="file" name="logotypeImg" id="logotypeImg"><?php echo $showLogotypeImg ?><br>
			<button name="reset">Rensa </button>
			<button name="regret">Ångra </button>
			<button name="save">Spara </button>  &nbsp; &nbsp; &nbsp; <?php echo $feedback ?>
		</form>


<?php 

}
?>


</div>


<?php include("includes/footerAdmin.php"); 

