<?php

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





 move_uploaded_file($_FILES['file']['tmp_name'], 'images/mask.jpg');
?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <img width="100%" height="100%" src="images/mask.jpg?v=<?php echo rand(0,1000) // rand() prevents the browser from displaying a previously cached image ?>"/>
  </body>
</html>



