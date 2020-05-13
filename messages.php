<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		#message
		{
			height:200px;
			width:300px;
			font-size:12pt;
			word-wrap: break-word;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<a class="navbar-brand" href="#">Site Name</a>
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="#">Profile <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="Settings/settings.php">Settings<span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<nav class="navbar fixed-bottom navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Fixed bottom</a>
	</nav>
	<br>
	<div id=body>
		<h2><center>Messages</center></h2>
		<br>
		<div class="container">
			<div class="row">
				<div class="col">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Compose</button><br><br>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Reply</button><br><br>
				</div>
				<div class="col-10 border-top">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col">From</th>
								<th scope="col">Content</th>
								<th scope="col">Timestamp</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Create connection
							$conn = mysqli_connect("localhost", "root", "", "website");
							$username = '28';
							$query = "SELECT * FROM user_messages WHERE user_id ='$username'";
							$results = mysqli_query($conn,$query);

							if(!$results) {
								echo "No messages";
							}

							while($row = mysqli_fetch_array($results)) {
								echo '<tr><td width="20%">'.$row['sender_id'].'</td><td width="50%">'.$row['message_content'].'</td><td width="20%"">'.$row['sent'].'</td></tr>';
							}
							?>
							<input type="submit" style="display:none" />
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
		<div class="container">
			
			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">


					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Compose a Message</h4>

							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="send_message.php" method="post">
								Recipient:<br>
								<input type="text" name="recipient">
								<br><br>
								Message:<br>
								<input type="text" id="message" name="message">
								<br><br>
								<input type="submit" value="Submit">
							</form> 

						</div>

					</div>

				</div>

			</div>
			
		</div>
		<div class="container">
			
			<!-- Modal -->
			<div class="modal fade" id="myModal2" role="dialog">
				<div class="modal-dialog">


					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Compose a Message</h4>

							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="reply_to_thread.php" method="post">
								Reply To:<br>
								<select name="thread">
									<?php
								// Create connection
									$conn = mysqli_connect("localhost", "root", "", "website");
									$username = '28';
									$query = "SELECT * FROM user_messages WHERE user_id ='$username'";
									$results = mysqli_query($conn,$query);


									while($row = mysqli_fetch_array($results)) {
										echo '<option id='.$row['message_id'].'>'.$row['message_content'].'</option>';
									}
									?>
								</select>
								<br><br>
								Recipient:<br>
								<input type="text" name="recipient">
								<br><br>
								Message:<br>
								<input type="text" id="message" name="message">
								<br><br>
								<input type="submit" value="Submit">
							</form> 

						</div>

					</div>

				</div>

			</div>
			
		</div>

	</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>

