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
	$sent = date("M-d-Y h:i:s A"); 
	$message_id = $username.$recipient.$sent;
	$nmessage = $message."\n".$omessage;
	$query = "INSERT INTO user_messages (message_id, user_id, sender_id, message_content, sent) VALUES ('$message_id', '$username', '$recipient', '$nmessage', '$sent')";
	

	
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