<?php 
session_start();

$omessage = $_POST['thread'];
$recipient =  $_POST['recipient'];
$message =  $_POST['message'];

if( $recipient != null  )
{
  	// Create connection
	$conn = mysqli_connect("localhost", "root", "", "website");
	$username = $_SESSION['user_id'];

	$query3 = "SELECT * FROM users WHERE user_id ='$username'";
	$results3 = mysqli_query($conn,$query3);
	while($row2 = mysqli_fetch_array($results3)) {
		$from = $row2['Name']; 
	}

	$query5 = "SELECT * FROM users WHERE user_id ='$recipient'";
	$results4 = mysqli_query($conn,$query5);
	while($row3 = mysqli_fetch_array($results4)) {
		$to = $row3['Name']; 
	}

	$sent = date("M-d-Y h:i:s A"); 
	$sent_reformat = date("MdYhisA"); 
	$message_id = $username.$recipient.$sent_reformat;
	$new_thread = "From: ".$from."\n\nTo: ".$to."\n\n".$message."\n\n\n\tPrevious Message:\n\t".$omessage;
	$query = "INSERT INTO user_messages (message_id, user_id, sender_id, message_content, sent, thread) VALUES ('$message_id', '$recipient', '$username', '$message', '$sent', '$new_thread')";
	

	
	if (mysqli_query($conn, $query)) {
		header( "Location:messages.php" );
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}


	exit();
} else {
	header( "Location:messages.php" );
	exit();
}
?>