<?php
		session_start();
		$user=$_SESSION['user'];		
		$con = mysqli_connect("localhost","root","");
		mysqli_select_db($con,"website");
		$query1 = mysqli_query($con,"select * from users where email='$user'");
		$rec1 = mysqli_fetch_array($query1);
		$user_id = $rec1[0];
		$query2=mysqli_query($con,"select * from user_profile_pic where user_id=$user_id");
		$rec2=mysqli_fetch_array($query2);
		
		$name=$rec1[1];
		$gender=$rec1[4];
		$user_bday=$rec1[5];
		$img=$rec2[2];
?>

<?php
	if( isset($_POST['file']) && ($_POST['file']=='post'))
	{
		$txt=$_POST['post_txt'];
		if($txt=="" && isset($_POST['file']))
		{
			$txt="added a new photo.";
		}
		
		$priority=$_POST['priority'];
		$post_time=$_POST['pic_post_time'];
		
		if(isset($_POST['file']))
		{
			$path = "../users/".$user_id."/Post/";
			$img_name=$_FILES['file']['name'];
			$img_tmp_name=$_FILES['file']['tmp_name'];
			$prod_img_path=$img_name;
			move_uploaded_file($img_tmp_name,$path.$prod_img_path);
			
		}
		else
		{
			$img_name="";
		}
		mysqli_query($con,"insert into user_post(user_id,post_txt,post_pic,post_time,priority,to_user_id) values('$user_id','$txt','$img_name','$post_time','$priority','$user_id');");
	}
	if(isset($_POST['commenting']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		$txt=$_POST['comment_txt'];
		if($txt=="" && isset($_POST['commenting']))
		{
			$txt="added a new photo.";
		}
		if(isset($_POST['commenting']))
		{
			$path = "../users/".$user_id."/Comment/";
			$img_name=$_FILES['file']['name'];
			$img_tmp_name=$_FILES['file']['tmp_name'];
			$prod_img_path=$img_name;
			move_uploaded_file($img_tmp_name,$path.$prod_img_path);
			
		}
		else
		{
			$img_name="";
		}
		mysqli_query($con,"insert into user_post_comment(post_id,user_id,comment,comment_pic) values($post_id,$user_id,'$txt','$img_name');");
	}
	if(isset($_POST['Like']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		mysqli_query($con,"insert into user_post_status(post_id,user_id,status) values($post_id,$user_id,'Like');");
	}
	if(isset($_POST['Unlike']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		mysqli_query($con,"delete from user_post_status where post_id=$post_id and  	user_id=$user_id;");
	}
	if(isset($_POST['comment']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		$txt=$_POST['comment_txt'];
		if($txt!="")
		{
		mysqli_query($con,"insert into user_post_comment(post_id,user_id,comment) values($post_id,$user_id,'$txt');");
		}
	}
	if(isset($_POST['delete_comment']))
	{
		$comm_id=intval($_POST['comm_id']);
		mysqli_query($con,"delete from user_post_comment where comment_id=$comm_id;");
	}	
	if(isset($_POST['delete_post']))
	{
		$notify_id=intval($_POST['notify_id']);
		mysqli_query($con,"delete from user_notification where notify_id=$notify_id;");
	}
	
	if(isset($_POST['approve_post']))
	{
		$notify_id=intval($_POST['notify_id']);
		$query3 = mysqli_query($con,"select * from user_notification where notify_id = $notify_id;");
		$notify_data = mysqli_fetch_array($query3);
		$notifyid=$notify_data[0];
		$from_user_id=$notify_data[1];
		$to_user_id=$notify_data[2];
		$notify_txt=$notify_data[3];
		$notify_img=$notify_data[4];
		$notify_time=$notify_data[5];
		$notify_pri = $notify_data[6];
		if($notify_img != "")
		{
			$from_path = "../users/".$from_user_id."/Notification/".$notify_img;
			$to_path = "../users/".$to_user_id."/Post/".$notify_img;
			rename($from_path,$to_path);
			
		}
		mysqli_query($con,"insert into user_post( user_id,post_txt,post_pic,post_time,priority,to_user_id) values('$from_user_id','$notify_txt','$notify_img','$notify_time','$notify_pri','$to_user_id');");
		mysqli_query($con,"delete from user_notification where notify_id=$notify_id;");
	}
?>

<!doctype html>
<html lang="en">
<head>
  <title>Profile Page</title>
  <!-- Required meta tags -->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
  <link rel="stylesheet" href="Profile_style/style.css">
  <link rel="stylesheet" href="Profile_css/ionicons.min.css"  />
  <link rel="stylesheet" href="Profile_css/font-awesome.min.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="Profile_js/Profile.js"> </script>
<script>
	function time_get()
	{
			d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		posting_pic1.pic_post_time.value=time;
		
	}
	function blank_comment_check()
	{
	var post=document.commenting.cmnt.value;
	if(post=="")
	{
		return false;
	}
	return true;
	}
</script>
</head>
<body style="margin-top:50px">
 <nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-dark bg-dark" role="navigation">
    <button class="navbar-toggler" type="button" data-toggle="collapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Site Name</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="Profile.php">Profile <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Settings/settings.php">Settings<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
</nav>
  <div id="page-contents">
	<div class="container">
	<div class="row">
	<div class="col-md-3 static">
	<div style="position:fixed;">
		 <div class="profile-card">
            	<img src="../
				<?php
					$q_pic = mysqli_query($con,"select * from user_profile_pic where user_id =$user_id");
					if(mysqli_num_rows($q_pic) == 0){
						$path = "default.png";
						echo $path;
					} else {
						$path = "users/".$user_id."/Profile/";
						$q_pic_array = mysqli_fetch_array($q_pic);
						echo $path.$q_pic_array[2];
					}
				?>
				" alt="user" class="profile-photo" />
            	<h5><a class="text-white">
				<?php
					$q_name = mysqli_query($con,"select * from users where user_id =$user_id");
					$q_name_array = mysqli_fetch_array($q_name);
					echo $q_name_array[1];
				?>
				</a></h5>
            	<a class="text-white"><i class="ion ion-podium"></i>
				<?php
					$user_f = mysqli_query($con,"SELECT * FROM user_friends where user_id='$user_id'");
					echo mysqli_num_rows($user_f);
				?>
				Total Friends</a>
         </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li>
				<i class="icon ion-ios-paper"></i>
				<div>
					<a href="newsfeed.php">My Newsfeed</a>
				</div>
			  </li>
              <li>
				<i class="icon ion-ios-people"></i>
				<div>
					<a href="friends.php">Friends</a>
				</div>
			  </li>
              <li>
				<i class="icon ion-ios-chatboxes"></i>
				<div>
					<a href="../messages.php">Messages</a>
				</div>
			  </li>
			  <li>
				<i class="icon ion-android-notifications-none"></i>
				<div>
					<a href="notifications.php">Notifications
					<?php
					$user_f = mysqli_query($con,"SELECT * FROM user_notification where to_user_id='$user_id'");
					echo mysqli_num_rows($user_f);
				?> 
					</a>
				</div>
			  </li>
            </ul><!--news-feed links ends-->
    </div>
		  </div>
		
	<div class="col-md-7">

		
		<!-- Post Content
        ================================================= -->	
		<div>
			<?php
				$que_post_bg1=mysqli_query($con,"select * from user_notification where to_user_id=$user_id");
				$count_bg1=mysqli_num_rows($que_post_bg1);
				//echo $count_bg1;
			?>
			<div style="position:absolute;"> 
			</div>
			<div>
				<table cellspacing="0">
				<?php
					$que_post=mysqli_query($con,"select * from user_notification where to_user_id=$user_id order by notify_id desc");
					while($notify_data=mysqli_fetch_array($que_post))
					{
						$notifyid=$notify_data[0];
						$from_user_id=$notify_data[1];
						$to_user_id=$notify_data[2];
						$notify_txt=$notify_data[3];
						$notify_img=$notify_data[4];
						$que_user_info=mysqli_query($con,"select * from users where user_id=$from_user_id");
						$que_user_pic=mysqli_query($con,"select * from user_profile_pic where user_id=$from_user_id");
						$fetch_user_info=mysqli_fetch_array($que_user_info);
						$fetch_user_pic=mysqli_fetch_array($que_user_pic);
						$user_name=$fetch_user_info[1];
						$user_Email=$fetch_user_info[2];
						$user_gender=$fetch_user_info[4];
						$user_pic=$fetch_user_pic[2];
				?>
				<tr>
					
					<td>  </td>
					<td> </td>
				</tr>
				<tr>
					<td colspan="7" align="right" style=" border-top:outset; border-top-width:thin;">
					</td>
				</tr>
				<tr>
					<td style="padding-left:2px;" rowspan="2"> <img class="profile-photo-md" src="../
					<?php
					if(mysqli_num_rows($que_user_pic) == 0){
						$path = "default.png";
						echo $path;
					}
					else 
					{
						$path = "users/".$from_user_id."/Profile/";
						echo $path.$user_pic;
					}
					?>
					" height="60" width="55">  
					</td>
					<td colspan="3" style="padding-left:10px;"> <a href="friendProfile.php?user_email=<?php echo $user_Email;
					?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="post_name_underLine(<?php echo $notifyid; ?>)" onMouseOut="post_name_NounderLine(<?php echo $notifyid; ?>)" id="uname<?php echo $notifyid; ?>"> <?php echo $user_name; ?> </a>  
					</td>
					
					<td > </td>
					<td> </td>
					<td> </td>
				</tr>
				<tr>
				<td colspan="3">
					<span style="color:#999999;padding-left:10px;">   <?php echo $notify_data[5]; ?> </span> 
					<span style="color:#999999;padding-left:10px;"><?php echo $notify_data[6]; ?></span>
					</td>
				</tr>
				<tr>
					<td> </td>
					<td> </td>
					<td> </td>
				</tr>
				
				
				<?php
					$len=strlen($notify_data[3]);
					if($len>0 && $len<=73)
					{
						$line1=substr($notify_data[3],0,73);
				?>
				<tr>
					<td></td>
					<td colspan="3" style="padding-left:10px;"><?php echo $line1; ?> </td>
				</tr>
				<?php
					}
				?>
				
				<?php 
					if($notify_data[4]!="")
					{
				?>
				<tr>
					<td>   </td>
					<td colspan="8" align="center">
				<?php 
					$post_img_name = $notify_data[4];
					$position = strpos($post_img_name,'.');
					$extension = substr($post_img_name,$position+1);
					$extension = strtolower($extension);
					if($extension == "mp4")
					{
				?>
					<video width="100%" controls>
						<source src ="../users/<?php echo $from_user_id; ?>/Post/<?php echo $notify_img; ?>" type='video/<?php echo $extension; ?>' >
					</video>
				<?php 
					}
					else
					{
				?>
					<img src="../users/<?php echo $from_user_id; ?>/Notification/<?php echo $notify_img; ?>" style="max-width:100%; height:auto;"> 
				<?php 
					}
				?>
					</td>
					<td> </td>
					<td> </td>
				</tr>
				<tr>
					
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td> 
						<form method="post">  
							<input type="hidden" name="notify_id" value="<?php echo $notifyid; ?>" >
							<input type="submit" name="approve_post" class="btn btn-primary pull-right" value="Approve" > 
						</form> 
					</td>
					<td style="padding: 30px;"></td>
					
					<td> 
						<form method="post">  
							<input type="hidden" name="notify_id" value="<?php echo $notifyid; ?>" >
							<input type="submit" name="delete_post"  value="Reject" class="btn btn-primary pull-right"> 
						</form> 
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				
			
				
				<?php
					}
				?>
				
				</table>
			</div>
		</div>
	</div>
	

	</div>
	</div>
  </div>
    
 <!-- <nav class="navbar fixed-bottom navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Fixed bottom</a>
</nav> -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>