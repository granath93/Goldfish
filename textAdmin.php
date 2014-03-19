<?php
$pageTitle="Text"; //Skriver in vad som skall stå i "webb-browser-fliken"
$currentPage = "text"; //Lägger in värde så man vet vilken sida administratören är på

//Lägger till filer som behöver vara med på sidan så att sidan skall fungera rätt
include("includes/db.php"); 
include("includes/headAdmin.php"); 

//Hämtar id som idikerar vilken sektion man är i av länkarna i vänstra menyn
$session = isset($_GET['p']) ? $_GET['p'] : 'welcome' ; 
$arrow="";

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
		<li>								<a href="textAdmin.php?p=welcome"> Välkomssttext</a>	 </li>	
		<li>								<a href="textAdmin.php?p=rules">Tävlingsregler</a>			</li>
		<li>								<a href="textAdmin.php?p=mail">Mail</a>					</li>
	</ul>

</div>

<div class="content">

<?php
if($session=="welcome"){?>

<h1>Välkomsttext</h1>


<form action="textAdmin.php?p=welcome" method="post">
			<label class="field" for ="title">Rubrik:</label>
			<input class="field" type="text" id="title" name="title" value="<?php echo $welcomeTitle ?>" /><br>
			<label class="field" for ="text">Välkomsttext:</label>
			<textarea class="field" id="text" name="text"><?php echo $welcomeText ?></textarea><br>
			<input class="button" type="submit" value="Rensa" />
			<input  type="submit" value="Spara" />
		</form>

<!--{$arrow} = <div class="arrow-right">;-->

<?php }
 else if($session=="rules"){ ?>

<h1>Tävlingsregler</h1>


<form action="textAdmin.php?p=rules" method="post">
			<label class="field" for ="name">Rubrik:</label>
			<input class="field" type="text" id="title" name="title" value="<?php echo $ruleTitle ?>" /><br>
			<label class="field" for ="text">Tävlingsregler:</label>
			<textarea class="field" id="text" name="text"> <?php echo $ruleText ?></textarea><br>
			<input class="button" type="submit" value="Rensa" />
			<input type="submit" value="Spara" />
		</form>


<?php 
} 

 else if($session=="mail") {?>

<h1>Mail</h1>


<form action="textAdmin.php?p=mail" method="post">
			<label class="field" for ="name">Rubrik:</label>
			<input class="field" type="text" id="title" name="title" value="<?php echo $mailTitle ?>" /><br>
			<label class="field" for ="text">Mailtext:</label>
			<textarea class="field" id="text" name="text"> <?php echo $mailText ?></textarea><br>
			<input class="button" type="submit" value="Rensa" />
			<input type="submit" value="Spara" />
		</form>


<?php } ?>


</div>




<?php



 include("includes/footerAdmin.php"); ?>

