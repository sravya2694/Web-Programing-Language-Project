<?php
include('Template_login.php');
echo 'Login page';

?>
<html lang="en">
<head>
	<style>
		#user_info label{
			display: inline-block;
			width: 100px;
			text-align: right;
		}
		#user_submit{
			padding-left: 100px;
		}
		#user_info div{
			margin-top: 1em;
		}
		#forgotpwd{
			display: block;
			width: 200px;
			text-align: right;

		}
		* {
			box-sizing: border-box;
		}
	</style>

	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript">

	$(document).ready(function(){


		$("#email").change(function(){

				var email = $(this).val()
				$.ajax({

					url: 'session.php',
					method: 'post',
					data: 'email=' + email,
					
					})


		})
	})
</script>

</head>
    <body>
		<form id="user_info" method="post" action="">
			<div>
				<label for="email">Email ID:</label>
				<input type="text" id="email" name="email">


			<div>
				<label for="user_password">Password:</label>
				<input type="Password" id="user_password" name="user_password">

			</div>
			<div>


				<a href="./forgotpwd.php" id="forgotpwd" >forgot password</a>
			</div>
			<div id="user_submit">
				<button type="submit">Submit</button>
			</div>
			<div id="Message">


			</div>

		</form>
	</body>
</html>
<?php
if(!empty($_POST['email']))
{
// Start the session


$servername = 'localhost';
$username = 'root';
$password = 'root';
$con = new mysqli($servername, $username, $password, "website");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
#echo "Connected successfully";


$email = mysqli_real_escape_string($con, $_POST['email']);
$userpass = mysqli_real_escape_string($con, $_POST['user_password']);

$sql = "SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($con,$sql);
if (!result)
		{
	die('Error: ' . mysqli_error($con));
		}



	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_array($result);
		$dbpass = $row['Password'];

    if (password_verify($userpass, $dbpass))
    {
      echo 'success';
      #$_SESSION["name"] =  $row['Name'];
      #$_SESSION["user_id"] =  $row['user_id'];
    }
    else{

      echo 'Incorrect Password';
    }



	}
	else {
		echo 'Account with this email does not exist';
	}
}
?>
