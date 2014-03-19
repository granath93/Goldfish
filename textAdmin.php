<?php
$pageTitle="Text";
$currentPage = "text"; 
include("includes/db.php"); 
include("includes/headAdmin.php"); 

$session = isset($_GET['p']) ? $_GET['p'] : '' ; 


$query = <<<END
 
SELECT *
FROM Text;
END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query

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



<?php
if($session=="welcome"){?>

<p>Välkommsttext</p>


<form action="textAdmin.php?p={$session}" method="post">
			<label for ="name">Rubrik:</label>
			<input type="text" id="title" name="title" value="<?php echo $welcomeTitle ?>" /><br>
			<label for ="text">Text:</label>
			<textarea id="text" name="text"><?php echo $welcomeText ?></textarea><br>
			<input type="submit" value="Submit" />
		</form>


<?php }
 else if($session=="rules"){ ?>

<p>Tävlingstext</p>


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

<p>Mailen</p>


<form action="textAdmin.php?p={$session}" method="post">
			<label for ="name">Rubrik:</label>
			<input type="text" id="title" name="title" value="<?php echo $mailTitle ?>" /><br>
			<label for ="text">Text:</label>
			<textarea id="text" name="text"> <?php echo $mailText ?></textarea><br>
			<input type="submit" value="Submit" />
		</form>


<?php } ?>







<?php



 include("includes/footerAdmin.php"); ?>

