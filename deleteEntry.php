
<?php

include("includes/db.php");




$entryId = isset($_GET['entryId']) ? $_GET['entryId'] : '';


if(isset($_GET['entryId'])){

$query =<<<END
DELETE FROM Entry
WHERE entryId = {$entryId};
END;

$res = $mysqli->query($query) or die("You failed miserably.");
header("Location: indexAdmin.php");

}



?>