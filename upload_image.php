
<?php

 // I'm skipping a lloooot of verification steps on the file here.
 // Also, I'm assuming you uploaded a jpg.

 	move_uploaded_file($_FILES['image']['tmp_name'], 'images/product/mask.jpg');


?>

    <img style="width: 100%;" src="images/product/mask.jpg?v=<?php echo rand(0,1000) // rand() prevents the browser from displaying a previously cached image ?>"/>
 
<!--
