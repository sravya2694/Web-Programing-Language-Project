<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';

// Create connection
$con = new mysqli($servername, $username, $password, "website");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
#echo "Connected successfully";


	if(!empty($_POST["email"]))
  {
  //  $email="kurrasravya41@gmail.com"
    $sql = "SELECT * FROM users WHERE Email='".$_POST["email"]."'";
    $result=mysqli_query($con,$sql);
    if (!result)
    		{
    	die('Error: ' . mysqli_error($con));
    		}



    	if (mysqli_num_rows($result) > 0)
    	{
        $row = mysqli_fetch_array($result);
    	$email = $row['Email'];
        echo false;
      }
      else {
        echo true;
      }

  }
?>
