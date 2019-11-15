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
				<?php
				//query for view post by category 
				if (isset($_GET['p_id'])) {
				 	$p_id=$_GET['p_id'];
				 	$view_post_query = "SELECT * FROM post WHERE post_category= $p_id ";
						$view_post_query_result = mysqli_query($connection,$view_post_query);
						if (!$view_post_query_result) {
							die("view_add_query_result failed ".mysqli_error($connection));
						}

						while ($row=mysqli_fetch_assoc($view_post_query_result)) {
							$post_ids=$row['post_id'];
							$post_titles=$row['post_title'];
							$post_prices=$row['post_price'];
							$post_contacts=$row['post_contact'];
							$post_images=$row['post_image'];
							$post_detailses=$row['post_details'];

							?>

								<div class="row single-ad-item mb-3">

									<div class="col-md-3">
										<img src="assets/img/<?php echo $post_images; ?>" alt="myads">
									</div>
									<div class="col-md-9">
										<?php echo"<a href='single.php?post_id= $post_ids' class='single-ad-title'> $post_titles </a>" ?>
										<p>
											<span class="small mr-3"><?php echo "Price: ".$post_prices." BDT"; ?></span>
											<span class="small"><i class="fa fa-phone"></i><?php echo $post_contacts; ?></span>
										</p>
										<p><?php echo $post_detailses; ?></p>
									</div>
								</div>

								<?php	}

					 }else{ ?>
					<h3>All Ads</h3>
					<?php 
					//query for view all Adds
						global $connection;
						$view_post_query = "SELECT * FROM post ";
						$view_post_query_result = mysqli_query($connection,$view_post_query);
						if (!$view_post_query_result) {
							die("view_add_query_result failed ".mysqli_error($connection));
						}

						while ($row=mysqli_fetch_assoc($view_post_query_result)) {
							$post_ids=$row['post_id'];
							$post_titles=$row['post_title'];
							$post_prices=$row['post_price'];
							$post_contacts=$row['post_contact'];
							$post_images=$row['post_image'];
							$post_detailses=$row['post_details'];

					?>

					<div class="row single-ad-item mb-3">

						<div class="col-md-3">
							<img src="assets/img/<?php echo $post_images; ?>" alt="myads">
						</div>
						<div class="col-md-9">
							<?php echo"<a href='single.php?post_id= $post_ids' class='single-ad-title'> $post_titles </a>" ?>
							<button type="button" class="btn btn-success pull-right">Order Now</button>
							<p>
								<span class="small mr-3"><?php echo "Price: ".$post_prices." BDT"; ?></span>
								<span class="small"><i class="fa fa-phone"></i><?php echo $post_contacts; ?></span>
							</p>
							<p><?php echo $post_detailses; ?></p>
						</div>
					</div>
				<?php } ?>
					
				</div>

				<?php } 

				 ?>
				</div>
			</div>
		</div>

<?php include "includes/footer.php" ?>	