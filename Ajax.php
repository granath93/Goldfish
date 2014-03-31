<?php 
	if(isset($_POST)){
		$id = $_POST['id'];

		/*try{
			$test = 'INSERT INTO Appearance (color) VALUES($id)';
		}catch{
			echo ;
		}*/

		echo $id;
	}

?>