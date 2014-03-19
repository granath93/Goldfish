<?php
$pageTitle="Text"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage = "text"; //Lägger in värde så man vet vilken sida administratören är på

//Lägger till filer som behöver vara med på sidan så att sidan skall fungera rätt
include("includes/db.php"); 
include("includes/headAdmin.php"); 

//Hämtar id som idikerar vilken sektion man är i av länkarna i vänstra menyn
$session = isset($_GET['p']) ? $_GET['p'] : '' ; 

//Hämtar all data från tabellen "Text" ur databasen
$query = <<<END
SELECT *
FROM Text;
END;

//Exekutiverar "verkställer" SELECT-satsen
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query

//Loopar igenom alla attribut i tabellen och lägger in de i variabler
while($row = $res->fetch_object()) { 
$welcomeTitle = ($row->welcomeTitle); 
$welcomeText = ($row->welcomeText); 
$ruleTitle = ($row->ruleTitle);
$ruleText = ($row->ruleText);
$mailTitle = ($row->mailTitle);
$mailText = ($row->mailText); 
}

?>


<div class="leftNav">

	<ul>
		<li>	<div class="arrow-right">	<a href="textAdmin.php?p=welcome"> Välkomssttext</a>	</div> </li>	
		<li>								<a href="textAdmin.php?p=rules">Tävlingsregler</a>			</li>
		<li>								<a href="textAdmin.php?p=mail">Mail</a>					</li>
	</ul>

</div>

<div class="content">

<?php
if($session=="welcome"){?>

<h1>Välkommsttext</h1>


<form action="textAdmin.php?p={$session}" method="post">
			<label for ="name">Rubrik:</label>
			<input type="text" id="title" name="title" value="<?php echo $welcomeTitle ?>" /><br>
			<label for ="text">Text:</label>
			<textarea id="text" name="text"><?php echo $welcomeText ?></textarea><br>
			<input type="submit" value="Submit" />
		</form>


<?php }
 else if($session=="rules"){ ?>

<h1>Tävlingstext</h1>


<form action="textAdmin.php?p={$session}" method="post">
			<label for ="name">Rubrik:</label>
			<input type="text" id="title" name="title" value="<?php echo $ruleTitle ?>" /><br>
			<label for ="text">Text:</label>
			<textarea id="text" name="text"> <?php echo $ruleText ?></textarea><br>
			<input type="submit" value="Submit" />
		</form>


<?php 
} 

 else if($session=="mail") {?>

<h1>Mailen</h1>


<form action="textAdmin.php?p={$session}" method="post">
			<label for ="name">Rubrik:</label>
			<input type="text" id="title" name="title" value="<?php echo $mailTitle ?>" /><br>
			<label for ="text">Text:</label>
			<textarea id="text" name="text"> <?php echo $mailText ?></textarea><br>
			<input type="submit" value="Submit" />
		</form>


<?php } ?>


</div>




<?php



 include("includes/footerAdmin.php"); ?>

