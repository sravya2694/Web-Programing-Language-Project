<?php
$servername = 'localhost';
$username = 'root';
$password = '';

// Create connection
error_reporting(0);
$con = new mysqli($servername, $username, $password, "website");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
if($_POST['settings']){	
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['mail'];
	$dob = $_POST['DOB'];
	$gender = $_POST['gender'];
	$userid = 28;
	
	$sql = "UPDATE users SET firstName='$fname', lastName='$lname', Email='$email', Birthday_Date='$dob', Gender='$gender' WHERE user_id='$userid'";
	echo $sql;
	$result=mysqli_query($con,$sql);
	if ($result == false) {
		echo "false";
	} else {
		echo "true";
	}
}

if($_POST['privacy_settings']){	
	$reviewPost=$_POST['review_Post'];
	$addPost=$_POST['add_Post'];
	$postPrivacy=$_POST['post_Privacy'];
	$userid = 8;
	$sql = "UPDATE users_privacy SET post_lookup_privacy='$postPrivacy', addPost_privacy='$addPost', reviewPost='$reviewPost' WHERE user_id='$userid'";
	$result=mysqli_query($con,$sql);
	if ($result == false) {
		echo "false";
	} else {
		echo "true";
	}
}
if($_POST['changePassword']){	
	$oldPassword=$_POST['old_password'];
	//$newPassword=$_POST['new_password'];
	$newPassword = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

	$userid = 8;
	
	$sql = "SELECT Password FROM users where user_id='8'";
	$result=mysqli_query($con,$sql);
		
	if (!result) {
		die('Error: ' . mysqli_error($con));
	} else {
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$old_password = $row['Password'];
			
			if (password_verify($oldPassword, $old_password)){
			//if($oldPassword == $old_password){
				$updatesql = "UPDATE users SET Password='$newPassword' WHERE user_id='$userid'";
				$result=mysqli_query($con,$updatesql);
				if ($result == false) {
						echo "false";
				} else {
						echo "true";
				}
			} else {				
				echo "false";
			}
		}	
	}
	
	
}
?>