<?php 
$pageTitle="Appearance"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage = "Appearance"; //Lägger in värde så man vet vilken sida administratören är på

include("includes/db.php"); 
include("includes/headAdmin.php");

//Hämtar id som idikerar vilken sektion man är i av länkarna i vänstra menyn
$session = isset($_GET['p']) ? $_GET['p'] : '' ;

//Hämtar all data från tabellen "Text" ur databasen
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
$logotypeId = ($row->logotypeId);
}

?>


<div class="leftNav">
<ul>
		
<li><a href="appearanceAdmin.php?p=Background">>Bakgrund</a></li>	
<li><a href="appearanceAdmin.php?p=Logotype">Logotyp</a></li>
	</ul>	
</div>
<div class="content">
<?php
//ifall det är bakgrundssidan
if($session=="Background"){?>

<h1>Bakgrund</h1>


<div class="backgroundButton">
</div>


<?php }
//ifall det är logotype-sidan
 else if($session=="Logotype"){ ?>
<h1>Logotyp</h1>
 
<?php } ?>
</div>