<?php

  include("config/config.php");
  date_default_timezone_set('Asia/Kolkata');
	$sql2 = "INSERT INTO user (name, email,usertype,imgurl) VALUES ('sagar', 'sheth.pr@somaiya.edu', 'User','https://lh6.googleusercontent.com/-H8SDs1ZNIcI/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rd-NxcWfCQWfXpWTRRHQZH0oYOC3A/s96-c/photo.jpg')";
		
			$con->query($sql2);	

	
?>