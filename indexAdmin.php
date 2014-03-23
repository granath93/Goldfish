<?php 
$currentPage = "index";
include("includes/headAdmin.php"); 
include("includes/db.php");


$res = $mysqli->query('SELECT * FROM Entry') or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);

while($row = $res->fetch_object()) { 
$date = strtotime($row->timeStamp); 
$entryId = ($row->entryId);

}

?>


<div class="leftNav">
</div>

<div class="content">

<h1>Statistik</h1>

<div class="statisticContent">
<table>
<tr>
	<td>
		<h3> Idag </h3> 
	</td>
	<td>
		<h3> Denna vecka </h3>
	</td>
</tr>
<tr>
	<td>
		<p> <?php echo count($entryId); ?> </p> 
	</td>
	<td>
		<p><?php echo count($entryId); ?> </p> 
	</td>
</tr>
<tr>
	<td>
		<h3> Denna månad </h3> 
	</td>
	<td>
		<h3> Totalt </h3>
	</td>
</tr>
<tr>
	<td>
		<p> <?php echo count($entryId); ?> </p> 
	</td>
	<td>
		<p><?php echo count($entryId); ?></p> 
	</td>
</tr>

</table>


</div>
<?php include("includes/footerAdmin.php"); ?>

<!--

entryId
entryName
entryImage
entryColor
timeStamp
accepted
designerId
productId