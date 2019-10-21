
useer
<style>
/* Center the loader */


#loader {
  	position: relative;
	top: 50%;
	margin: 0px auto auto auto;
  border:5px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


#myDiv {
  display: none;
  text-align: center;
}
</style>
//loader style close


//get dept name
$sqlt = "SELECT name from user WHERE email like '%" . $_SESSION['email'] . "%'";
            $result1 = mysqli_query($con, $sqlt);
            $deptnamearr = array();
            while ($row1 = mysqli_fetch_array($result1)) {
                $deptnamearr[] = $row1['name'];
            }