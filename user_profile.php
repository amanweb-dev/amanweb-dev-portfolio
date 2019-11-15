<?php include "includes/header.php" ?>
<?php 
global $connection;
if (isset($_SESSION['user_pass'])) {
	$user_email_ss=$_SESSION['user_email']; 

	$query_for_pic="SELECT * FROM users WHERE user_email= '$user_email_ss' ";
	$result_query_for_pic = mysqli_query($connection,$query_for_pic);
	while ($row=mysqli_fetch_assoc($result_query_for_pic)) {
		$user_email = $row['user_email'];
		$user_pass = $row['user_pass'];
		$user_name = $row['user_name'];
		$user_phone = $row['user_phone'];
		$user_phto = $row['user_photo'];
	}
	$query_for_count_post="SELECT post_id FROM post WHERE post_user_email= '$user_email_ss' ";
	$result_query_for_count_post = mysqli_query($connection,$query_for_count_post);
	$rowcount=mysqli_num_rows($result_query_for_count_post);

	
}
if (empty($user_phto)) {
		$user_phto = '1.jpg';
	}

//start update profile
if (isset($_POST['edit_profile'])) {
	$usernames = $_POST['username'];
	$phones = $_POST['phone'];
	$passwords = $_POST['password'];

	$usernames = mysqli_real_escape_string($connection,$usernames);
	$phones = mysqli_real_escape_string($connection,$phones);
	$passwords = mysqli_real_escape_string($connection,$passwords);

	///image file query
      $user_phtos = $_FILES['user_phto']['name'];
      $destination = "assets/img/" . $user_phtos;  
      $file = $_FILES['user_phto']['tmp_name'];
      move_uploaded_file($file, $destination);

       if (empty($user_phtos)) {
            $query_select_user_image = "SELECT user_phto FROM users WHERE user_email = '$user_email_ss' ";
            $select_user_image = mysqli_query($connection,$query_select_user_image);
            while($row=mysqli_fetch_assoc($select_user_image)) {
            $user_phtos = $row['user_phto'];
            }
          }

	
	$passwords = password_hash($passwords, PASSWORD_BCRYPT,  array('cost' => 12 ));

	$user_update = "UPDATE users SET ";
    $user_update .= "user_name = '{$usernames}', ";
    $user_update .= "user_phone = '{$phones}', ";
    $user_update .= "user_photo = '{$user_phtos}', ";
    $user_update .= "user_pass = '{$passwords}' ";
    
    $user_update .= "WHERE user_email = '{$user_email_ss}' ";

    $update_user_query = mysqli_query($connection,$user_update);
    if (!$update_user_query) {
        die("update_user_query  failed".mysqli_error($connection) );
    }else{
      echo "<p style='color:green' class='text-center mt-2'>Your Account Has been updated Succesfully</p>";
    }

	
}



?>
<div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic text-center">
					<img src="assets/img/<?php echo $user_phto; ?>" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $user_name ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo "Email : ".$user_email."</br>"; ?>
						<?php echo "Contact No : ".$user_phone."</br>"; ?>
						<?php echo "Total Post : ".$rowcount."</br>"; ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<?php  
					echo "<a href='user_profile.php?edit_user=$user_email'><button type='button' class='btn btn-success btn-sm'>Edit</button></a>";
					
					?>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-6 offset-md-2">
			<?php 

				if (isset($_GET['edit_user'])) {
					?>

					<div class="jumbotron">
						<h3 class="text-center">Edit Profile</h3>
						<form action="user_profile.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Phone</label>
								<input type="text" name="phone" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Profile Photo</label></br>
								<input type="file" name="user_phto">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" value="Update" name="edit_profile" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>

					
				<?php }else{ ?>


					            <div class="profile-content">
			   <h2 class="text-center"> Your All Ad</h2>
			<?php 
				global $connection;
				$view_add_query = "SELECT * FROM post WHERE post_user_email = '$user_email_ss' ";
				$view_add_query_result = mysqli_query($connection,$view_add_query);
				if (!$view_add_query_result) {
					die("view_add_query_result failed ".mysqli_error($connection));
				}

				while ($row=mysqli_fetch_assoc($view_add_query_result)) {
					$post_ids=$row['post_id'];
					$post_titles=$row['post_title'];
					$post_prices=$row['post_price'];
					$post_contacts=$row['post_contact'];
					$post_images=$row['post_image'];
					$post_detailses=$row['post_details'];

				?>
				
			<div class="row single-ad-item mb-3">
				<div class="col-md-3">
					<img src="assets/img/<?php echo $post_images ?>" alt="myads">
				</div>
				<div class="col-md-9">
					<a href="user_profile.php" class="single-ad-title"><?php echo $post_titles;  ?></a>
					<p>
						<span class="small mr-3"><?php echo $post_prices." "."TK"; ?></span>
						<span class="small"><i class="fa fa-phone"></i><?php echo $post_contacts; ?></span>
					</p>
					<p><?php echo $post_detailses; ?></p>
					<div class="row">
					<span class="small mr-3"><button type='button' class='btn btn-danger'><?php echo "<a href='post_an_ad.php?edit= $post_ids '>Edit</a>"?></button></span> 
					<span class="small"><button type='button' class='btn btn-danger'><?php echo "<a href='post_an_ad.php?delete= $post_ids '>Delrte</a>"?></button> </span>	
					</div>
				</div>
			</div>
		<?php } ?>
            </div>


				<?php 
			}

			 ?>
		</div>
	</div>
</div>

<?php include "includes/footer.php" ?>
