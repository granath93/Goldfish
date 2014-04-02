

<?php

 // I'm skipping a lloooot of verification steps on the file here.
 // Also, I'm assuming you uploaded a jpg.

 	move_uploaded_file($_FILES['logotype']['tmp_name'], 'images/logotype/logotype.jpg');


?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <img src="images/logotype/logotype.jpg?"/>

  </body>
</html>
