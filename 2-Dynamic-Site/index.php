<?php
	include"inc/header.php";
	
	if(isset($_GET['wlistid'])){
		if($_GET['wlistid'] == NULL){
			echo"<script>window.location='index.php'</script>";
		} else{
			if(Session::get("userlogin") != true){
				echo"<script>window.location='signin.php'</script>";
			} else{
				$wlistId = $_GET['wlistid'];
				$loginId  = Session::get("userId");
				$addWlist = $pro->addToWishlist($wlistId, $loginId);
				
				if(isset($addWlist)){ 
					echo $addWlist; 
				}
			}
		}
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sendmessage'])){
		$sendmsg = $ibx->sendMessage($_POST);
		
		if(isset($sendmsg)){ 
			echo $sendmsg; 
		}
	}
?>
<!--Header Section End------------->


<!--Banner Section Start------------->	
<?php include"inc/banner.php"; ?>
<!--Banner Section End------------->


<!--Property List Section Start------------->	
	<div class= "list overflow">
		<h1 class="sub-title">property list</h1>
		<?php
			$getAllAd = $pro->getAllPropertyByRange();
			if($getAllAd){ 
			$totalAd = mysqli_num_rows($getAllAd);
		?>
		<div class="list_content <?php if($totalAd > 2){ ?>slider<?php } ?>">
		<!--List Item 1------------->
			<?php
				while($getad = $getAllAd->fetch_assoc()){ ?>
			<div class="list_item overflow">
				<div class="item_box overflow">
				<a href="property_details.php?adid=<?php echo $getad['adId'];?>">
					<div class="item_box_upper overflow">
						<div class="item_upper item_category">
							<p><?php echo $getad['catName'];?></p>
						</div>
						<div class="item_upper item_pricebox overflow">
							<div class="item_upper_left">
								<p><span><?php echo $getad['adRent'];?>TK / <?php if($getad['rentType'] == "mo"){echo"Month";} else{ echo"Week"; };?></span></p>
							</div>
							<a href="?wlistid=<?php echo $getad['adId'];?>">
							<div class="item_upper_left item_wlist_icon">
								<p><i class="fa-solid fa-heart"></i></p>
							</div>
							</a>
						</div>
					</div>
				</a>
				<a href="property_details.php?adid=<?php echo $getad['adId'];?>">
					<div class="list_img overflow">
						<img src="<?php echo $getad['adImg'];?>" alt="ad image">
					</div>
				</a>
				<a href="property_details.php?adid=<?php echo $getad['adId'];?>">
					<div class="item_box_lower overflow"> 
						<p><?php echo $getad['adTitle'];?></p>
						<h3><i class="fa-brands fa-accusoft"></i><span><?php echo $getad['catName'];?></span></h3>
						<p><i class="fa-solid fa-file-pen"></i>Posted on: <?php echo $fm->formatDate($getad['adDate']);?></p>
						<p><img class="taka_sign" src="images/taka.png" alt="taka"/><?php echo $getad['adRent'];?>/<?php if($getad['rentType'] == "mo"){echo"Month";} else{ echo"week"; };?> <?php if($getad['adNegotiable'] == "negotiable"){ ?><span>(Negotiable)</span><?php } ?></p>
						<p><i class="fa-solid fa-location-dot"></i><?php echo $getad['adAddress'];?></p>
					</div>
				</a>
				</div>
			</div>
		<?php } ?>
		</div>
		<?php } ?>
		
		<div class="browse_list_button">
			<a href="property_list.php"><button class="btn_success btn_browse">browse list</button></a>
		</div>
	</div>
	
<!--Property List Section End------------->	


<!--Popular Category Section Start------------->	

<div class= "list overflow">
		<h1 class="sub-title">popular category</h1>
		<div class="list_content">
		
		<!--Category 1------------->
		<?php
			$getcat = $cat->getAllCat();
			if($getcat){
				while($category = $getcat->fetch_assoc()){
				$catId = $category['catId'];
				$totalAd = $cat->getCatAdNum($catId);
		?>
			<div class="list_item popular_category overflow">
				<div class="item_box overflow">
					<a href="property_by_cat.php?catid=<?php echo $category['catId'];?>">
						<div class="popular_cat_heading">
							<p>category</p>
						</div>
						<div class="popular_cat_img">
							<img src="<?php echo $category['catImg']?>"/>
							<div class="popular_cat_text">
								<p><?php echo $category['catName']?></p>
								<p><?php if(!empty($totalAd)){ echo $totalAd;} else{echo"0";} ?> Property ads</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		<?php } } ?>
		</div>
	</div>
	
<!--Popular Category Section End------------->	


<!--About Us Section Start------------->
	<div class="about"> 
		<h1 class="sub-title">About Us</h1>
		<div class="about_text">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>
		</div>
	</div>

<!--About Us Section End------------->


<!--Contact Section Start------------->
	<div class="contact">
		<form action="" method="POST">
			<h1 class="sub-title">Get In Touch</h1>
			<div class="contact_body overflow">
				<div class="contact_part">
				  <label for="name"><b>Name:</b></label>
				  <input type="text" placeholder="Enter name" name="name" required><br><br><br>
				  
				  <label for="phone"><b>Mobile No:</b></label>
				  <input type="phone" placeholder="Enter Mobile No" name="phone" required><br><br><br>
				  
				  <label for="email"><b>Email:</b></label>
				  <input type="text" placeholder="Enter Email" name="email" required><br><br><br>
				</div>
			
				<div class="contact_part">
				  <label for="message"><b>Message:</b></label>
				  <textarea placeholder="Type your message" name="message" required></textarea>
				</div>
			</div>
			<div class="contact_button">
				<button class="btn_success" type="submit" name="sendmessage">Send</button>
			</div>
		</form>
	</div>

<!--Contact Section End------------->
	</div>
	</div>
	

<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->