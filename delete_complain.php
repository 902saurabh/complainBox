<?php 
	
	  include("config/config.php");
	 $cl = $_GET['id'];
    $sql9 = "DELETE FROM complain WHERE id='$cl'";
    mysqli_query($con,$sql9);
    header("Location: index.php");

 ?>