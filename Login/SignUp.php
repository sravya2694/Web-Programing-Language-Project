<?php
include('Template_login.php');
echo '*All the feilds are mandatory';
session_start();
error_reporting(1);


?>
<html>
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

        * {
          box-sizing: border-box;
        }
      </style>
      <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="validate.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){


        $("#email").change(function(){
          var email = $(this).val()
        document.getElementById("password").disabled = true;


        $.ajax({

          url: 'validate.php',
          method: 'post',
          data: 'email=' + email,
          success:function(data){
            if(data)
            {
            document.getElementById("password").disabled = false;
            }
            else{
              alert('Email already exists');
            }

            }
          })

      })
    })
    	</script>
      <link rel="stylesheet" href="validate.css">
    </head>
    <body>
        <form id="user_info" method="post" action="">
			<div>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name">
            </div>
			<div>
				<label for="email">Email ID:</label>
				<input type="email" id="email" name="email">
			</div>
			<div>
				<label for="password">Password:</label>
				<input type="Password" id="password" name="password">

			</div>
      <div>
				<label for="gender">Gender:</label><br>
        <div>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="radio" name="gender" value="other"/> Other<br>
      </div>


			</div>
      <div>
				<label for="bday">Birthday:</label>
        <input type="date" name="bday">

			</div>

			<div id="user_submit">
				<button type="submit" >Submit</button>
			</div>


			</div>
		</form>
    </body>
</html>

<?php
if(!empty($_POST['email']))
{

$servername = 'localhost';
$username = 'root';
$password = 'root';

// Create connection
$con = new mysqli($servername, $username, $password, "website");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
//echo "Connected successfully";

$name = mysqli_real_escape_string($con, $_POST['name']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$bday = mysqli_real_escape_string($con, $_POST['bday']);
#$avatar = mysqli_real_escape_string($con, $_POST['avatar']);

$userpass = password_hash($_POST['password'], PASSWORD_BCRYPT);

if($name===NULL||$gender==""||$email===NULL||$bday===NULL||$userpass===NULL)
{
  alert('Some of the feilds are empty');
header('Location: '.$_SERVER['PHP_SELF']);

}
else{
$sql="INSERT INTO users (Name, Email, Password, Gender, Birthday_Date) VALUES "
        . "('$name', '$email', '$userpass', '$gender', '$bday')";
if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }

        session_start();
        $_SESSION['tempuser']=$email;
        if(isset($_SESSION['tempuser']))
        {
        header("location: profile_pic_upload.php");
      }
//echo "1 record added";
}
}

?>
