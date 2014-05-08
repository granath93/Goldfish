		
<?php 

include("includes/db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['sendEntry'])){

	if($_POST['designerName'] == "" || $_POST['entryName'] == "" || $_POST['designerEmail'] == "" || $_POST['designerCity'] == ""){

	?>

		<script> alert("Du måste fylla i alla fält för att skicka in bidraget");
		return false; </script>

	<?php	
	


	}

	else{?>
			<script> alert("Tack för ditt bidrag! Nu ska det godkännas innan det syns på sidan.");</script>

	<?php 	$designerName = $_POST['designerName'];
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