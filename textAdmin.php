<?php include("includes/db.php"); ?>
<?php include("includes/headAdmin.php"); 

?>


<div class="leftNav">

	<ul>
		<li>	<a href="#">Välkomssttext</a> 	</li>
		<li>	<a href="#">Tävlingsregler</a>	</li>
		<li>	<a href="#">Mail</a>			</li>
	</ul>

</div>




<?php


$query = <<<END
 
SELECT *
FROM Text;
END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query

while($row = $res->fetch_object()) { 
$welcome = ($row->welcomeText); 
$rule = ($row->ruleText);
$mail = ($row->mailText); 

echo $welcome . "<br>";
//echo $rule. "<br>";
//echo $mail. "<br>";

}



 include("includes/footerAdmin.php"); ?>