<?php

if ( isset( $_FILES[ "file" ] ) ){ 

	//en array med de filtyper som godkänns 
    $allow_type[] = "image/gif" ;    # gif 
    $allow_type[] = "image/pjpeg" ;    # jpeg 
    $allow_type[] = "image/jpeg" ;    # jpeg 
    $allow_type[] = "image/x-png" ;    # png 

    

	if ($_FILES["file"]["error"] > 0)
	  {
	 	 echo "Error: " . $_FILES["file"]["error"] . "<br>";
	  }
	else
	  {
		  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		  echo "Type: " . $_FILES["file"]["type"] . "<br>";
		  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		  echo "Stored in: " . $_FILES["file"]["tmp_name"];

	  }

	if ( $_FILES[ "file" ][ "error" ] == 0 AND 
	         in_array( $_FILES[ "file" ][ "type" ], $allow_type) ) 
	    { 
			if ( move_uploaded_file($_FILES[ "file" ][ "tmp_name" ], 
			             "/image" . $_FILES[ "file" ][ "name" ] . $_FILES["file"]["type"]) ) 
			        { 
			            # visa om det gick 
			            echo "<br> Filen " . 
			                $_FILES[ "file" ][ "name" ] . 
			                " uppladdad i goldfish bildkatalog<br >"; 

			            # raderar filen direkt - vill inte skräpa ner mina kataloger 
			            # ni raderar självklart inte 
			            unlink ( "C:/xampp/htdocs/goldfish/image" . $_FILES[ "file" ][ "name" ] ); 
			        } 

			else 
	        { 
	            # nåt skumt håller på att ske? 
	            echo "Möjlig hackerattack?"; 
	        } 

	}

	else
	{

	echo "Du får bara ladda upp bilder"; 

	}

}

?>




<img src="<?php echo $image ?>">