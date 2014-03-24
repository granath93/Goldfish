<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width" charset="utf-8">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="css/normalize.css" >
<link rel="stylesheet" href="css/admin.css" >
<script src="#" charset="utf-8"></script>
	<title>Admin</title>
</head>
<body>

<div class="wrapper">

<div class="topNav">
	<nav>

		<a class=" <?php if($currentPage=="index")echo "active"?>"  		href="indexAdmin.php">Statistik 				</a>
		<a class=" <?php if($currentPage=="#")echo "active"?>"  			href="#">Bidrag 								</a>
		<a class=" <?php if($currentPage=="#")echo "active"?>"  			href="#">Produkt								</a>
		<a class=" <?php if($currentPage=="text")echo "active"?>"  			href="textAdmin.php">Text 						</a>
		<a class=" <?php if($currentPage=="Appearance")echo "active"?>" 	href="appearanceAdmin.php">Utseende 			</a>
	
	</nav>
</div>


