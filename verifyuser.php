<?php

//verify and login user from gmail
include("config/config.php");
if(isset($_POST["id"])){
	$_SESSION["id"] = $_POST["id"];
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["imgurl"] = $_POST["imgurl"];	

	$sql = "SELECT usertype FROM user WHERE email='".$_POST["email"]."'";
	$res=$res_u=mysqli_query($con,$sql);
	$row=$res->fetch_assoc();
	
	$result = $con->query($sql);
		if($row["usertype"]=="admin")
	{	
		$sql2 = "UPDATE user SET imgurl='".$_POST["imgurl"]."' WHERE email='".$_POST["email"]."'";
		$con->query($sql2);		
		$usertype="admin";
		$_SESSION["type"]="admin";
		echo $usertype;//return value to ajax
	}

	else 	if($row["usertype"]=="Department")
	{	
		$sql2 = "UPDATE user SET imgurl='".$_POST["imgurl"]."' WHERE email='".$_POST["email"]."'";
		$con->query($sql2);		
		$usertype="Department";
		
		$_SESSION["type"]="Department";
		echo $usertype;//return value to ajax
	}
	
	
	else 	if($row["usertype"]=="Manager")
	{	
		$sql2 = "UPDATE user SET imgurl='".$_POST["imgurl"]."' WHERE email='".$_POST["email"]."'";
		$con->query($sql2);		
		$usertype="Manager";
		
		$_SESSION["type"]="Manager";
		echo $usertype;//return value to ajax
	}
	
	else{
		if(!empty($result->fetch_assoc())){
			$sql2 = "UPDATE user SET imgurl='".$_POST["imgurl"]."' WHERE email='".$_POST["email"]."'";
			$usertype="User";
			$con->query($sql2);
			
		$_SESSION["type"]="User";
			echo $usertype;
		}else{
			$sql2 = "INSERT INTO user (name, email,usertype,imgurl) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', 'User','".$_POST["imgurl"]."')";
			$usertype= "Firstuser";
			$con->query($sql2);	

		$_SESSION["type"]="User";			
			echo $usertype;
		}
	}
	
}

else{
	header("Location: index.php");
	exit();
}
?>