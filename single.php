<?php include "includes/header.php" ?>




		<div class="container main-body">
			<div class="row mt-3">
				<div class="col-md-3">
					<h3>Categories</h3>
					<ul class="list-group categories-list">
						<li class="list-group-item"><a href="ads.php?p_id='Mobile' ">Mobile</a></li>
						<li class="list-group-item"><a href="ads.php?p_id='PC_Laptop' ">PC & Laptop</a></li>
						<li class="list-group-item"><a href="ads.php?p_id='Vehicle' ">Vehicle</a></li>
						<li class="list-group-item"><a href="ads.php?p_id='Property' ">Property</a></li>
						<li class="list-group-item"><a href="ads.php?p_id='Accessories' ">Accessories</a></li>
						<li class="list-group-item"><a href="ads.php?p_id='Fashion_Health_Beauty' ">Fashion, Health & Beauty</a></li>
						<li class="list-group-item"><a href="ads.php?p_id='Pets_Animals' ">Pets & Animals</a></li>
						<li class="list-group-item"><a href="ads.php?p_id='Others' ">Others</a></li>
					</ul>
				</div>
				<div class="col-md-9">
					<!-- <h3>Posts</h3> -->
					<?php 
						global $connection;
						if (isset($_GET['post_id'])) {
							$the_post_id=$_GET['post_id'];
							$post_edit_query = "SELECT * FROM post WHERE post_id = $the_post_id ";
							$post_edit_query_result = mysqli_query($connection,$post_edit_query);
							if (!$post_edit_query_result) {
								die("view_add_query_result failed ".mysqli_error($connection));
							}

							while ($row=mysqli_fetch_assoc($post_edit_query_result)) {
								$post_id=$row['post_id'];
								$post_title=$row['post_title'];
								$post_price=$row['post_price'];
								$post_contact=$row['post_contact'];
								$post_condition=$row['post_condition'];
								$post_category=$row['post_category'];
								$post_location=$row['post_location'];
								$post_image=$row['post_image'];
								$post_details=$row['post_details'];

							


						 ?>
					<!-- single ad start -->
					<div class="row single-ad-item mb-3">
						<div class="col-md-12">
							<h3 class="item-title"><?php echo $post_title; ?></h3>
							<p>
								<span class="small mr-3"><strong>Price : </strong><?php echo $post_price." BDT"; ?> </span>
								<span class="small mr-3"><i class="fa fa-phone"></i><?php echo $post_contact;  ?></span>
								<span class="small mr-3"><strong>Condition :</strong> <?php echo $post_condition; ?></span>
								<span class="small mr-3"><strong>Category :</strong> <?php echo $post_category;  ?></span>
								<span class="small mr-3"><strong>Location :</strong> <?php echo $post_location; ?></span>
							</p>
							<div class="single-item-img p_img">
								<img src="assets/img/<?php echo $post_image; ?>" alt="Mobile">
							</div>
							<h3>Details :</h3>
							<p><?php echo $post_details; ?></p>
						</div>
					</div>
					<?php }

						} ?>
					<!-- single ad ends -->
						<?php 
						global $connection;
						if (isset($_GET['p_id'])) {
							$the_post_cat_id=$_GET['p_id'];
							$post_cat_query = "SELECT * FROM post WHERE post_category = $the_post_cat_id ";
							$post_cat_query_result = mysqli_query($connection,$post_cat_query);
							if (!$post_cat_query_result) {
								die("view_add_query_result failed ".mysqli_error($connection));
							}

							while ($row=mysqli_fetch_assoc($post_cat_query_result)) {
								$post_id=$row['post_id'];
								$post_title=$row['post_title'];
								$post_price=$row['post_price'];
								$post_contact=$row['post_contact'];
								$post_condition=$row['post_condition'];
								$post_category=$row['post_category'];
								$post_location=$row['post_location'];
								$post_image=$row['post_image'];
								$post_details=$row['post_details'];

							


						 ?>
					<!-- single ad start -->
					<div class="row single-ad-item mb-3">
						<div class="col-md-12">
							<h3 class="item-title"><?php echo $post_title; ?></h3>
							<p>
								<span class="small mr-3"><strong>Price : </strong><?php echo $post_price." BDT"; ?> </span>
								<span class="small mr-3"><i class="fa fa-phone"></i><?php echo $post_contact;  ?></span>
								<span class="small mr-3"><strong>Condition :</strong> <?php echo $post_condition; ?></span>
								<span class="small mr-3"><strong>Category :</strong> <?php echo $post_category;  ?></span>
								<span class="small mr-3"><strong>Location :</strong> <?php echo $post_location; ?></span>
							</p>
							<div class="single-item-img big">
								<img src="assets/img/<?php echo $post_image; ?>" alt="Mobile">
							</div>
							<h3>Details :</h3>
							<p><?php echo $post_details; ?></p>
						</div>
					</div>
					<?php }

						} ?>
				</div>
			</div>
		</div>
<?php include "includes/footer.php" ?>	