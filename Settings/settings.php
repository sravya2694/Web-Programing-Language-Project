<?php

include('../template.html');
$servername = 'localhost';
$username = 'root';
$password = '';

error_reporting(0);
// Create connection
$con = new mysqli($servername, $username, $password, "website");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 		
$sql = "SELECT * FROM users where user_id='28'";
$result=mysqli_query($con,$sql);
		
if (!result) {
	die('Error: ' . mysqli_error($con));
} else {
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		$firstName = $row['firstName'];
		$lastName = $row['lastName'];
		$email = $row['Email'];
		$dob = $row['Birthday_Date'];
		$gender = strtolower($row['Gender']);
	}	
}
?>
<html>
<head>
<link rel="stylesheet" href="stylesForSettings.css"/>
<link rel="stylesheet" href="css/ionicons.min.css"  />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function saveChanges(){
	var fnLength = ($('#firstName').val()).length;
	var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	var email = $('#email').val();
	var emailLength = ($('#email').val()).length;
	var fname = $('#firstName').val();
	var lname = $('#lastName').val();
	var dob =$('#dob').val();
	var sex = $("input[name='gender']:checked").val();
	if(fnLength == 0){
		$("p").remove("#error_show");
		$("p").remove("#success");
		$('#errorMsg').append('<p id="error_show"><i class="icon ion-arrow-down-b"></i> &nbsp; First Name is mandatory</p>');
	} else if(emailLength == 0 || (!pattern.test(email))) {			
		$('#errorMsg').append('<p id="error_show"><i class="icon ion-arrow-down-b"></i> &nbsp; Invalid email</p>');
	} else {
		$.ajax({
            url:'DBInsert.php',
            method:'POST',
            data:{
                firstname:fname,
				lastname:lname,
                mail:email,
				DOB:dob,
				gender:sex,
				settings:true
            },
            success:function(data){
				$('#errorMsg').append('<p id="success">Updated details successfully. &nbsp;<i class="icon ion-information"></i></p>');
            }
         });
	}
}
	
 </script>
</head>
<body>
	<div id="page-contents">
	<div class="container">
	<div class="row">
	<div class="col-md-3 static">
            <ul class="nav-news-feed">			
			  <li><div><i class="icon ion-wrench"></i>&nbsp;<a href="settings.php">Basic Information</a></div></li>
              <li><div><i class="icon ion-android-people"></i>&nbsp;<a href="ChangePassword.php">Edit Password</a></div></li>
              <li><div><i class="icon ion-ios-settings"></i>&nbsp;<a href="PrivacySettings.php">Privacy Settings</a></div></li>
			  <li><div><i class="ion-ios-person"></i>&nbsp;<a href="UpdateProfilePicture.php">Update Picture</a></div></li>
            </ul>
    </div>
		  
		
	<div class="col-md-7">	
		 <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-wrench"></i>&nbsp;Edit Information</h4>                
                </div>
				<div id="errorMsg">
					
				</div>		
                <div class="edit-block">
                  <form name="update-pass" id="education" class="form-inline">
                    
                      <div class="form-group col-md-12">
						<div class="form-group col-md-3"><label for="firstName">First Name</label></div>
						<div class="form-group col-md-9"><input class="form-control input-group-lg" type="text" placeholder="First Name" id="firstName" value="<?php echo $firstName;?>">
						</input></div>
                      </div>                  
                      <div class="form-group col-md-12">
						<div class="form-group col-md-3"><label for="lastName">Last Name</label></div>
						<div class="form-group col-md-9"><input class="form-control input-group-lg" type="text" placeholder="Last Name" id="lastName" value="<?php echo $lastName;?>">
						</input></div>
                      </div>					  
					  <div class="form-group col-md-12">
						<div class="form-group col-md-3"><label for="email">My Email</label> </div>
						<div class="form-group col-md-9"><input class="form-control input-group-lg" type="email" placeholder="Email" id="email" value="<?php echo $email;?>">
						</div></input>
                      </div>
					  
					  <div class="form-group col-md-12">
						<div class="form-group col-md-3"><label for="dob">Date of Birth</label></div>
						<div class="form-group col-md-9"><input class="form-control input-group-lg" type="date" id="dob" value="<?php echo $dob;?>"
								max="2019-04-31" min="1980-01-01"/></div>
                      </div>
					  
					   <div class="form-group col-md-12">
						<div class="form-group col-md-3"><label for="gender">Iam a:</label></div>
						<div class="form-group col-md-9">
						<input type="radio" name="gender" value="male" <?php echo ($gender=='male')?'checked':'' ?>>Male</input>  &nbsp;&nbsp;
						<input type="radio" name="gender" value="female" <?php echo ($gender=='female')?'checked':'' ?> >Female</input></div>
                      </div>
                   
					<div class="form-group col-md-12">
					 <button type="button"class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
					</div>					 
                  </form>
                </div>
              </div>
            </div>
	
	<div class="col-md-2 static">
		
	</div>
	</div>
	</div>
  </div>
</body>
</html>