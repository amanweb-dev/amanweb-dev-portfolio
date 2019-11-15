<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
//database Connection For Every Page
	include "../kinakini/includes/db.php";
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Kenabecha</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-sm navbar-dark bg-info">
			<div class="container">
				<a class="navbar-brand" href="index.php">Kenabecha</a>

				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="ads.php">All Ads</a>
					</li>
				</ul>
				<?php 
				global $connection;
					///menu for login session
					
					if (isset($_SESSION['user_email']) || isset($_SESSION['user_pass'])) { 

						$user_email=$_SESSION['user_email'];
						$query="SELECT user_photo FROM users WHERE user_email= '$user_email' ";
						$result = mysqli_query($connection,$query);
						while ($row=mysqli_fetch_assoc($result)) {
							$user_phto = $row['user_photo'];
						}
						if (empty($user_phto)) {
							$user_phto = '1.jpg';
						}

						?>
						
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active mr-3">
								<a class="nav-link btn btn-danger" href="post_an_ad.php">Order Request</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link btn btn-warning" href="post_an_ad.php">Post Your Ad</a>
							</li>
							<div class="dropdown ml-4">
								<img class="dropdown-toggle" data-toggle="dropdown" style="height: 35px; width: 35px; border-radius: 50%; border-style: solid; border-color: black;border-width: 2px;" src="assets/img/<?php echo $user_phto; ?>" alt="">
								<div class="dropdown-menu">
									<a class="dropdown-item" href="../kinakini/user_profile.php">My Profile</a>
									<a class="dropdown-item" href="../kinakini/logout.php">Logout</a>
								</div>
							</div>

						</ul>
					<?php	}else{  ?>
						
						<!-- menu for logout session or visitor -->	
						<ul class="navbar-nav ml-auto">
							
							<!-- <li class="nav-item active">
								<a class="nav-link" href="admin_login.php">Admin</a>
							</li> -->
							<li class="nav-item active">
								<a class="nav-link" href="signup.php">Sign Up</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="login.php">Login</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link btn btn-warning" href="post_an_ad.php">Post Your Ad</a>
							</li>
						</ul>


					<?php 
				}

				 ?>
						
			</div>
		</nav>

