		
<?php 

include("includes/db.php");

$feedback="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['sendEntry'])){

	if($_POST['designerName'] == "" || $_POST['entryName'] == "" || $_POST['designerEmail'] == "" || $_POST['designerCity'] == ""){

			if($_POST['designerName'] == ""){
				$feedback ="Du måste fylla i alla fält";
			}
			else{
				$designerName = $_POST['designerName'];
			}




		$feedback ="Du måste fylla i alla fält";

	}

	else{
			$feedback ="Tack för ditt bidrag";

			$designerName = $_POST['designerName'];
			$designerEmail = $_POST['designerEmail'];
			$entryName = $_POST['entryName'];
			$designerCity = $_POST['designerCity'];

			if(isset($_POST['agreeMail'])){

				$query =<<<END
				INSERT INTO Designer (designerName, designerEmail, designerCity, mailAgree )
				VALUES ($designerName, $designerEmail, $designerCity, 'y');
END;

			$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
			" : " . $mysqli->error);

			}

			else{

				$query =<<<END
				INSERT INTO Designer (designerName, designerEmail, designerCity, mailAgree )
				VALUES ($designerName, $designerEmail, $designerCity, 'n');
END;


			$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
			" : " . $mysqli->error);
			}




	}
}
}

?>