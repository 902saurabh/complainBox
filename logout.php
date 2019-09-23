<?php
//require_once "finalconfig.php";


//Unset token and user data from session

//unset($_SESSION['type']);

//Reset OAuth access token
//$client = new Google_Client();
//$client->revokeToken();
session_start();
//Destroy entire session
session_destroy();


$helper = array_keys($_SESSION);
foreach ($helper as $key) {
    unset($_SESSION[$key]);
}


echo '
	<script>
 	myWindow=window.open("https://accounts.google.com/Logout", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
	//	window.location.href=( "https://accounts.google.com/Logout", "_blank");
	window.location.href = ("index.php");
		//window.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://lms-kjsce.somaiya.edu/complainbox";

	</script>
 
	';


?>