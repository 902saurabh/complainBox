<?php 
	
	  include("config/config.php");
	   
	 $cl = $_GET['id'];

	 $query= mysqli_query($con,"SELECT * FROM complain WHERE id='$cl'");

	 $row = mysqli_fetch_array($query);

	 $body= $row['description'];

	 $file_path= $row['complainimg'];

	 $department= $row['Departmentname'];
	 $name= $row['complainant'];
	 $email= $row['complainantmail'];
	 $building= $row['building'];

	 $location= $row['location'];
	 $datetime= $row['complaindate'];


	  mysqli_query($con,"INSERT into cancelcomplain(description,complainimg,Departmentname,status,complainant,complainantmail,building,location,complaindate) values('$body','$file_path','$department','Pending','$name','$email','$building','$location','$datetime')");


	  $sql = "SELECT email FROM user where name='$department' ";
		$result=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$mail_to=$row['email'];


	    $var ='
	    <script src="assets/js/core/jquery.min.js"></script>

	    <script type="text/javascript">
        
      $.ajax({              
                url:"cancel_complain_ajax.php",
                type:"POST",
                data:"id='.$cl.'&mail_to='.$mail_to.'",
                cache:false,

              
            }).done(function(data){
                console.log(data);
               // window.location.href = "complaindone.php";

            }).fail(function() { 
                alert( "Something went wrong" );
            });
            </script>';






            echo $var;


    $sql9 = "DELETE FROM complain WHERE id='$cl'";
    mysqli_query($con,$sql9);

   


  // header("Location: index.php");

 ?>