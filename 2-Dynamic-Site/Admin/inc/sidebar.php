<div class="mcol_2 admin_aside">
		<!--Agent sidebar------------>
		<?php
			if(Session::get("userLevel") == 3){
		
			$path  = $_SERVER['SCRIPT_FILENAME'];
			$title = basename($path, '.php');
		?>
			<nav class="admin_nav">
				<ul>
					<li><a href="dashboard_agent.php" <?php if($title == "dashboard_agent"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-signal"></i><span>dashboard</span></a></li>
					
					<li><a href="site_details.php" <?php if($title == "site_details"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-gear"></i><span>site details</span></a></li>
					
					<li><a href="copyright.php" <?php if($title == "copyright"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-copyright"></i><span>copyright</span></a></li>
					
					<li><a href="property_list_admin.php" <?php if($title == "property_list_admin"){ ?> id="active_admin" <?php } ?>><i class="fa-brands fa-accusoft"></i><span>property list</span></a></li>
					
					<li><a href="category_list.php" <?php if($title == "category_list"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-list"></i><span>category list</span></a></li>
					
					<li><a href="add_category.php" <?php if($title == "add_category"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-plus"></i><span>add category</span></a></li>
					
					<li><a href="owner_list.php" <?php if($title == "owner_list"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-user-group"></i><span>owner list</span>
				<?php
					$getUsr = $usr->getNewOwner();
					if($getUsr){
						$unseen_usr = mysqli_num_rows($getUsr);
						if($unseen_usr != 0){ 
				?>	
					<span class="row_number">
						<?php echo $unseen_usr; ?>
					</span>
				<?php } } ?>
					</a></li>
					
					<li><a href="notification.php" <?php if($title == "notification"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-bell"></i><span>notification</span>
				<?php
					$getNtf = $ntf->getNewNotification();
					if($getNtf){
						$unseen_notif = mysqli_num_rows($getNtf);
						if($unseen_notif != 0){ 
				?>	
					<span class="row_number">
						<?php echo $unseen_notif; ?>
					</span>
				<?php } } ?>
					</a></li>
					
					<li><a href="booking_list.php" <?php if($title == "booking_list"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-house-circle-check"></i><span>booking list</span></a></li>
					
					<li><a href="inbox.php" <?php if($title == "inbox"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-inbox"></i><span>inbox</span>
				<?php
					$getMsg = $ibx->getNewMessage();
					if($getMsg){
						$unseen_msg = mysqli_num_rows($getMsg);
						if($unseen_msg != 0){ 
				?>	
					<span class="row_number">
						<?php echo $unseen_msg; ?>
					</span>
				<?php } } ?>
					</a></li>
					
					<li><a href="profile.php?userid=<?php echo Session::get("userId");?>" <?php if($title == "profile"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-address-card"></i><span>your profile</span></a></li>
					
					<li><a href="../changepassword.php?userid=<?php echo Session::get("userId");?>"><i class="fa fa-key"></i><span>change password</span></a></li>
					
					<li class="backtosite"><a href="../index.php"><i class="fa-solid fa-arrow-right-to-bracket"></i><span>back to site</span></a></li>
				</ul>
			</nav>
		<?php } ?>	
			
		
		<?php
			if(Session::get("userLevel") == 2){
			
			$path  = $_SERVER['SCRIPT_FILENAME'];
			$title = basename($path, '.php');
		?>
		<!--Owner sidebar------------->
			<nav class="admin_nav">
				<ul>
					<li><a href="dashboard_owner.php" <?php if($title == "dashboard_owner"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-signal"></i><span>dashboard</span></a></li>
					
					<li><a href="add_property.php" <?php if($title == "add_property"){ ?> id="active_admin" <?php } ?>><i class="fa-brands fa-buffer"></i><span>post property</span></a></li>
					
					<li><a href="property_by_owner.php?userid=<?php echo Session::get("userId");?>" <?php if($title == "property_by_owner"){ ?> id="active_admin" <?php } ?>><i class="fa-brands fa-accusoft"></i><span>your property</span></a></li>
					
					<li><a href="booking_list_owner.php?userid=<?php echo Session::get("userId");?>" <?php if($title == "booking_list_owner"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-house-circle-check"></i><span>booking list</span>
				<?php
					$userId = Session::get("userId");
					$getBooking = $bk->getNewBooking($userId);
					if($getBooking){
						$unseen_book = mysqli_num_rows($getBooking);
						if($unseen_book != 0){ 
				?>	
					<span style="margin-left:0" class="row_number">
						<?php echo $unseen_book; ?>
					</span>
				<?php } } ?>
					</a></li>
					
					<li><a href="profile.php?userid=<?php echo Session::get("userId");?>" <?php if($title == "profile"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-address-card"></i><span>your profile</span></a></li>
					
					<li><a href="../changepassword.php?userid=<?php echo Session::get("userId");?>"><i class="fa fa-key"></i><span>change password</span></a></li>
					
					<li class="backtosite"><a href="../index.php"><i class="fa-solid fa-arrow-right-to-bracket"></i><span>back to site</span></a></li>
				</ul>
			</nav>
		<?php } ?>
		</div>