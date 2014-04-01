<?php 
$pageTitle="Appearance"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage = "Appearance"; //Lägger in värde så man vet vilken sida administratören är på

include("includes/db.php"); 
include("includes/headAdmin.php");

//Hämtar id som idikerar vilken sektion man är i av länkarna i vänstra menyn
$session = isset($_GET['p']) ? $_GET['p'] : 'Background' ;

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
$logotypeUrl = ($row->logotypeUrl);
}

if(isset($_POST['save'])){

if(isset($_POST['logotypeImg']) && isset($_POST['logotypeUrl']) ){

	$logotypeImg = isset($_POST['logotypeImg']) ? $_POST['logotypeImg'] : '' ;  
	//$welcomeText = isset($_POST['logotypeUrl']) ? $_POST['logotypeUrl'] : '' ; 
?>


<div class="leftNav">
	<ul>
		<li>
			<div class="arrow"><?php if($session=="Background")echo ">"?></div>
			<a href="appearanceAdmin.php?p=Background">	Bakgrund</a> 
			</li>	
		<li>
			<div class="arrow"><?php if($session=="Logotype")echo ">"?></div>
			<a href="appearanceAdmin.php?p=Logotype">Logotyp</a>
		</li>
		
	</ul>
</div>
<div class="content">
<?php
//ifall det är bakgrundssidan
if($session=="Background"){?>

<h1>Bakgrund</h1>

<form action"appearanceAdmin.php?p=Background" method="post"
enctype="multipart/form-data">
<input type="textfield" name"Hex-värde" id="color"><br>
<input type="submit" name"Skicka" id"color"></br>
</form>
<!--<div class="backgroundButton">
</div>-->


<?php }
//ifall det är logotype-sidan
 else if($session=="Logotype"){ ?>
<h1>Logotyp</h1>


<form action="appearanceAdmin.php?p=Logotyp" method="post"
enctype="multipart/form-data">

<label for="file">Välj en fil att ladda upp:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Ladda upp">

<form action="appearanceAdmin.php?p=Logotype" method="post">
			<label class="field" for ="logotypeUrl">Logotypslänk</label>
			<textarea class="field text" id="logotypeUrl" name="logotypeUrl"><?php echo $showLogotypeUrlText ?></textarea><br>
</form>
 
</div>

?>