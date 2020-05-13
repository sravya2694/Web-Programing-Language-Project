<?php
session_start();

error_reporting(1);

if(!empty($_SESSION['tempuser']))
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

  //$email = mysqli_real_escape_string($con, $_POST['email']);

  $email=$_SESSION['tempuser'];
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($con,$sql);

  //echo mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);
  $gender=$row['Gender'];
  $userid=$row['user_id'];

  if($gender!="" && $userid!="" )
  {
    // echo $gender;
    // echo $userid;
    $sql1 = "select * from user_profile_pic where user_id='$userid'";
    $result=mysqli_query($con,$sql1);


    $count1=mysqli_num_rows($result);
    //$count1=0;//need to be removed

    if($count1==0)
    {
      if(isset($_POST['file']) && ($_POST['file']=='Upload'))
      {
      $path = "users/".$userid."/Profile/";
      $path2 = "users/".$userid."/Post/";
      $path3 = "users/".$userid."/Cover/";
      mkdir($path, 0755, true);
      mkdir($path2, 0775, true);
      mkdir($path3, 0775, true);
      $img_name=$_FILES['file']['name'];
      	$img_tmp_name=$_FILES['file']['tmp_name'];
      	$prod_img_path=$img_name;
      	move_uploaded_file($img_tmp_name,"users/".$userid."/Profile/".$prod_img_path);
        mysqli_query($con,"insert into user_profile_pic(user_id,image) values('$userid','$img_name')");
    }
  }
}

}
?>
