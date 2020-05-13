<?php
include('../template.html');
$servername = 'localhost';
$username = 'root';
$password = '';

error_reporting(0);
// Create connection
$con = new mysqli($servername, $username, $password, "website");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 		
$sql = "SELECT * FROM user_info where user_id='28'";
$result=mysqli_query($con,$sql);
		
if (!result) {
	die('Error: ' . mysqli_error($con));
} else {
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		$post_lookup_privacy = $row['post_lookup_privacy'];
		$addPost_privacy = $row['addPost_privacy'];
		$reviewPost = $row['reviewPost'];
	}	
}
?>
<html>
<head>
<link rel="stylesheet" href="stylesForSettings.css">
<link rel="stylesheet" href="css/ionicons.min.css" >
<link rel="stylesheet" href="css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>
$( document ).ready(function() {
        console.log( "document loaded" );
		//$("#PostPrivacy").val("private");
});
function updateValues(){
		$("p").remove("#success");
		$("p").remove("#error_show");
		var postPrivacy = document.getElementById("PostPrivacy").value;
		console.log(postPrivacy);
		var reviewPost = document.getElementById("reviewPost").value;
		var addPost = document.getElementById("addPost").value;
		$.ajax({
            url:'DBInsert.php',
            method:'POST',
            data:{
                post_Privacy:postPrivacy,
				add_Post:addPost,
                review_Post:reviewPost,
				privacy_settings:true
            },
            success:function(data){
				$('#errorMsg').append('<p id="success">Changes updated successfully. &nbsp;<i class="icon ion-information"></i></p>');
            }
         });		
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
                  <h4 class="grey"><i class="icon ion-ios-settings"></i>&nbsp;Privacy Settings</h4>                
                </div>
				<div id="errorMsg">
					
				</div>
                <div class="edit-block">
                  <form name="update-pass" id="education" class="form-inline">
                    
                      <div class="form-group col-md-12">
						<label for="postPrivacy">Who can see your posts?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<select id="PostPrivacy" class="form-control input-group-lg">
							<option value="public"<?php if ($post_lookup_privacy == 'public') echo 'selected="selected"'; ?>>Public</option>
							<option value="private"<?php if ($post_lookup_privacy == 'private') echo 'selected="selected"'; ?>>Private</option>
							<option value="friends"<?php if ($post_lookup_privacy == 'friends') echo 'selected="selected"'; ?>>Friends</option>
							<option value="friendsoffriends" <?php if ($post_lookup_privacy == 'friendsoffriends') echo 'selected="selected"'; ?>>Friends of friends</option>
						</select>
                      </div>
             
                   
                      <div class="form-group col-md-12" >
                        <label for="addPost">Who can post on your page?</label>&nbsp;&nbsp;
						<select id="addPost" class="form-control input-group-lg">
							<option value="public"<?php if ($addPost_privacy == 'public') echo 'selected="selected"'; ?>>Public</option>
							<option value="private"<?php if ($addPost_privacy == 'private') echo 'selected="selected"'; ?>>Private</option>
							<option value="friends"<?php if ($addPost_privacy == 'friends') echo 'selected="selected"'; ?>>Friends</option>
							<option value="friendsoffriends" <?php if ($addPost_privacy == 'friendsoffriends') echo 'selected="selected"'; ?>>Friends of friends</option>
						</select>
                      </div>
					  
					  <div class="form-group col-md-12">
                        <label for="reviewPost">Review post you're tagged in <br> before it appears on timeline?</label>
						<select id="reviewPost" class="form-control input-group-lg" style="width: 170px">
							<option value=1 <?php if ($reviewPost == true) echo 'selected="selected"'; ?>>Enabled</option>
							<option value=0 <?php if ($reviewPost == false) echo 'selected="selected"'; ?>>Disabled</option>
						</select>
                      </div>
            
                   
					<div class="form-group col-md-12">
					 <button type="button"class="btn btn-primary" onclick="updateValues()">Update Settings</button>
					</div>					 
                  </form>
                </div>
              </div>
            </div>
     
    </div>
	
	<div class="col-md-2 static">
		
	</div>
	</div>
	</div>
</body>
</html>