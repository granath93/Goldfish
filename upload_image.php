<?php

 	move_uploaded_file($_FILES['image']['tmp_name'], 'images/pic.jpg');

		list($width, $height) = getimagesize("images/pic.jpg");
	if ($width > $height){
		$size = "height: 350px";
	}
	if($height > $width){
		$size = "width: 350px";
	}






?>
<!DOCTYPE html>
<html>
  <head>
  	
  </head>
  <body>
    <img style=" <?php echo $size ?> " src="images/pic.jpg?v=<?php echo rand(0,1000) // rand() prevents the browser from displaying a previously cached image ?>"/>
  </body>
</html>
