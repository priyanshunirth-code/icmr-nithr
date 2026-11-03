<?php
//error_reporting(E_ALL);
$con = mysqli_connect("localhost","nirthtyx_viro","nirthtyx_viro","nirthtyx_march17");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
  $username = $_POST['username'];
 $pw = $_POST['password'];

//date function


 $pw = date("Y-m-d", strtotime($pw));

$sql = "SELECT recruitment_id, dob FROM recruitment WHERE recruitment_id = $username AND DATE(dob) = '$pw'";
$result = $con->query($sql);

 $count= $result->num_rows;

if($count==1){
	
	//file downloading
	$file = "http://www.nirth.res.in/advertisement/TCC/".$username.".pdf";

header("location:$file");
	
}
else{
	echo "please enter correct info";
}

?>
