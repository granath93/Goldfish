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
	t.ex. "FFFFFF" (utan citattecken) för svart, "f7e859" för gult och "bae860" för grönt!</p>
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
$logotypeId=1;

				$query =<<<END
				SELECT * FROM Logotype
				WHERE logotypeId = $logotypeId		
END;

		//Exekutiverar "verkställer" UPDATE-satsen
			$res = $mysqli->query($query) or die("Failed");
			
			while($row = $res->fetch_object()){
			$logotype = ($row->logotypeImg);
			$logotypeUrl = ($row->logotypeUrl);
			$logotypeId = ($row->logotypeId);
			
			}	


//När användaren väljer att ladda upp bilden på logotypen sker detta
if(isset($_POST['uploadButton'])){

	$logotypeName 	= $_FILES['logotypeImg']['name']; //sparar hela namnet på logotypen som användaren laddar upp
	$logotypeType	= strtolower(end(explode('.', $logotypeName))); //sparar logotypens format
	$logotypeScr = 'images/logotype/logotypeImage.' . $logotypeType; //skapar hela URLen till bilden i bildmappen
	move_uploaded_file($_FILES['logotypeImg']['tmp_name'], $logotypeScr); //sparar logotypen i bildmappen

//När användaren trycker på "spara", sparas logotypen i databasen med en "UPDATE"-sats	
if(isset($_POST['save'])){

 		$query =<<<END
		UPDATE Logotype
		SET productImg = {$logotypeScr}
		WHERE logotypeId = $logotypeId
END;

//Exekutiverar "verkställer" UPDATE-satsen
	$res = $mysqli->query($query) or die("Failed");
	$feedback = "Sparat";

echo $logotypeScr . "<br>";
echo $logotypeType;

 }
 }


?>
<h1>Logotyp</h1>


<!-- Formuläret där användaren laddar upp logotypen från egen dator -->
<form method="post" action="appearanceAdmin.php?p=Logotype" enctype="multipart/form-data">
      <label>Välj en bild som är din logotyp </label>
      <input type="file" name="logotypeImg"/>
      <input type="submit" name="uploadButton" value="Ladda upp"/>
   &nbsp;&nbsp;  <button type="submit" name="save">Spara </button>    </form> 
  <br><br>
 
 <!-- Visar logotypen med hjälp av hela url-en som tidigare sparats i variabeln "$logotype"-->
<img style="width: 300px; height: 300px;" src=" <?php echo $logotype;?>"/><br><br>

<form method="post" action="appearanceAdmin.php?p=Logotype" enctype="multipart/form-data">
<!-- Formuläret där användaren sparar en URL kopplat till logotypen -->
    	<label>Välj LogotypsUrl</label><br>
    	<input type='field' name="logotypeUrl"/>
    	<button name="saveUrl">Spara</button>
    </form>
<?php
//Skriver ut URL-en användaren har matat in
echo $logotypeUrl;

//Användaren trycker på "spara" för att spara URL-en till databasen med en "UPDATE"-sats 
if(isset($_POST['saveUrl'])){

//Här uppdateras tabellen med allt som är skrivet i formuläret
		$query =<<<END
		UPDATE Logotype
		SET logotypeUrl = '$logotypeUrl'
		WHERE logotypeId = $logotypeId
		
END;


$res = $mysqli->query($query) or die("Failed");	

}

}
include("includes/footerAdmin.php");  
?>

