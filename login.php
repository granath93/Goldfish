<?php
$pageTitle="Login";

//error_reporting(0);
require 'includes/db.php';


	//med mysqli
if($result = $mysqli->query("SELECT * FROM Administrator"))
{
	if($count = $result->num_rows)
	{
		echo '<p>', $count, '</p>';
		
		while($row = $result->fetch_object());
		{
			echo $row->adminName,' ', $row->adminPassword, '<br>';
		}

		$result->free();
	}
}








?>




<?php

/* med PDO

if(!empty($_POST)){
	$username = $_POST['user'];
	$password = $_POST['password'];

	try{
		$result = $db->prepare("SELECT * from users where username = ? and password = ?");
		$result->bindParam(1,$username);
		$result->bindParam(2,$password);
		$result->execute();
	}catch(PDOException $e){
		$e->getMessage();
	}

	$matches = $result->fetchRowCount();

	if($matches){
		$_SESSION['user_id'] = $matches->id;
		header('location: loggedinpage.php');
	}
	else {
		echo 'the oassword is wrong. please try again later.';
//formet
		<form method="post" action="login.php">

	User <input type="text" name="user"><br/>
	Pass <input type="password" name="password"><br/>
	<input type="submit" name="submit" value="log in"  />

</form>
	}*/