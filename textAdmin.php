<?php
$pageTitle="Text";
$currentPage = "text"; 
include("includes/db.php"); 
include("includes/headAdmin.php"); 


?>


<div class="leftNav">

	<ul>
		<li>	<div class="arrow-right">	<a href="#">Välkomssttext</a>	</div> </li>	
		<li>								<a href="#">Tävlingsregler</a>			</li>
		<li>								<a href="#">Mail</a>					</li>
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

echo $welcome . " <br>";
//echo $rule. "<br>";
//echo $mail. "<br>";

}



 include("includes/footerAdmin.php"); ?>