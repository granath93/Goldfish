
<?php

 // I'm skipping a lloooot of verification steps on the file here.
 // Also, I'm assuming you uploaded a jpg.

 	move_uploaded_file($_FILES['image']['tmp_name'], 'product/mask.jpg');


?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <img style="width: 100%;" src="product/mask.jpg?v=<?php echo rand(0,1000) // rand() prevents the browser from displaying a previously cached image ?>"/>
  </body>
</html>

<!--

if(isset($_FILES['image'])){
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    $image_name  = $_FILES['image']['name'];
    $image_extn  = strtolower(end(explode('.', $file_name)));
    $image_temp  = $_FILES['image']['tmp_name'];

    if(in_array($file_extn, $allowed)){
      update_image($file_extn, $file_temp, $user_data['user_id']);
    }
    else {
      echo 'Incorrect file type.';
    }
  }