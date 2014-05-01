<?php


include("includes/db.php");

$entryId = isset($_GET['entryId']) ? $_GET['entryId'] : '';

$query =<<<END
SELECT *
FROM Entry
END;


$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error);

while($row = $res->fetch_object()) { 
	$entryVote = ($row->votes);
	$entryId = ($row->entryId);


	$entryVote = $entryVote + 1; 



$query =<<<END
UPDATE Entry
SET votes = '$entryVote'
WHERE entryId = '$entryId';
END;


$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error);


	}



header("Location: index.php");




?>