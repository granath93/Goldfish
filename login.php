<?php
require 'includes/db.php';
$pageTitle="Login";
//tom array som ges värden vid fel
$error = array();
//kollar om textrutorna är tomma
if(!empty($_POST)){
	$username = trim($_POST['user']);
	$password = trim($_POST['password']);
//skapar en array med värdena från inputboxarna
	$required_field = array('user', 'password');
//loopar igenom post och tar fram nyckelvärdet och värdet i arrayen
	//om värdet är tomt i posten och tomt i required fields så skrivs fel-
	//meddelande ut
	foreach($_POST AS $key => $value){
		if(empty($value) && in_array($key, $required_field)){
			$error[] = 'all fields are required';
			break 1;
		}
	}
	//om det forrtfarande inte är tomt i posten och error-arrayen är tom så går koden vidare i stegen
	if(!empty($_POST) && empty($error)){
		$username = $mysqli->real_escape_string($username);
		$password = $mysqli->real_escape_string($password);
		$result = $mysqli->query("SELECT * FROM Administrator WHERE adminName = '{$username}' AND adminPassword = '{$password}'");
		if($result->num_rows){
			$row = $result->fetch_assoc();
			session_start();
			session_regenerate_id();
			//kopplar session med databas-id
			$_SESSION['user_id'] = $row['adminId'];
			header('location:indexAdmin.php'); 
				
		}
		else {
			$error[] = 'your username or password is wrong!';
			
		}
	}
	print_r($error);
}	
?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<form method="post" action="">

	User <input type="text" name="user"><br/>
	Pass <input type="password" name="password"><br/>
	<input type="submit" name="submit" value="log in"  />

</form>
</body>
</html>