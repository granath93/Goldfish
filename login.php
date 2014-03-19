<?php
$pageTitle="Login";

include("includes/db.php");


	//med mysqli
	$sql = "SELECT * FROM Administrator where adminName = {$username} and adminPassword = {$password}";

	$result = $mysqli->query($sql);
	//print_r($result);
	if($result->num_rows){
		echo 'there is some admins in the database.';
	}
	else {
		echo 'sorry, there is no user with that name/password';
	}




}



?>

<form method="post" action="login.php">

	User <input type="text" name="user"><br/>
	Pass <input type="password" name="password"><br/>
	<input type="submit" name="submit" value="log in"  />

</form>

//med PDO
/*
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
	}*/