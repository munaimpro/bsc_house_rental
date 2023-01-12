<?php
	include"inc/header.php";
	if(!isset($_GET['userid']) || $_GET['userid'] == NULL){
		echo "<script>window.location='../index.php'</script>";
	} elseif((Session::get("userLevel") == 2 && $_GET['userid'] != Session::get("userId")) || (Session::get("userLevel") == 1 && $_GET['userid'] != Session::get("userId"))){
		echo "<script>window.location='../index.php'</script>";
	} else{
		$userId = $_GET['userid'];
		$getuser = $usr->getUserData($userId);
			
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['upd_profile'])){
			$updusermsg = $usr->userUpdate($_POST, $_FILES, $userId);
		}
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">
			<?php
				$getuser = $usr->getUserData($userId);
				if($getuser){
					while($userData = $getuser->fetch_assoc()){
						if($userData['userId'] == Session::get("userId")){
			?>
				your profile
			<?php } else{ ?>
				owner profile
			<?php } ?>
			</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php 
			if(Session::get("userLevel") != 1){
				include"inc/sidebar.php";
			}
		?>
		
		<div class="responsive_mcol responsive_mcol_small mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow overflow_x">
				<div class="responsive_mcol_small user_profile">
				<?php if(isset($updusermsg)){
					echo $updusermsg;
				} ?>
				<!--Profile Header Start------------->
					<div class="profile_header">
						<div class="profile_image overflow">
						<?php
							if(empty($userData['userImg'])){ ?>
							<img src="../images/avater.png"/>
						<?php } else{ ?>
							<img src="../<?php echo $userData['userImg'];?>"/>
						<?php } ?>
						</div>
						<div class="profile_label">
							<h2><?php echo $userData['firstName']." ".$userData['lastName'];?></h2>
						</div>
					</div>
				<!--Profile Header End------------->
				
				<!--Profile Body Start------------->
					<div class="profile_body">
					<form enctype="multipart/form-data" action="" method="POST">	
						<table>
							<tr>
								<td colspan="2"><h3>basic information</h3></td>
							</tr>
							
							<tr>
								<td>first name</td>
								<td><input type="text" name="fname" value="<?php echo $userData['firstName'];?>"/></td>
							</tr>
							
							<tr>
								<td>last name</td>
								<td><input type="text" name="lname" value="<?php echo $userData['lastName'];?>"/></td>
							</tr>
							
							<tr>
								<td>username</td>
								<td><input type="text" name="username" value="<?php echo $userData['userName'];?>"/></td>
							</tr>
						<?php
							if($_GET['userid'] == Session::get("userId")){
						?>	
							<tr>
								<td>profile picture</td>
								<td><input type="file" name="image"/></td>
							</tr>
						<?php } ?>	
							<tr>
								<td colspan="2"><h3>contact information</h3></td>
							</tr>
							
							<tr>
								<td>E-Mail address</td>
								<td><input type="email" name="email" value="<?php echo $userData['userEmail'];?>"/></td>
							</tr>
							
							<tr>
								<td>cell number</td>
								<td><input type="phone" name="cellno" value="<?php echo $userData['cellNo'];?>"/></td>
							</tr>
							
							<tr>
								<td>phone number</td>
								<td><input type="phone" name="phone" value="<?php echo $userData['phoneNo'];?>"/></td>
							</tr>
							
							<tr>
								<td style="text-align:left !important">address</td>
								<td><textarea name="address"><?php echo $userData['userAddress'];?></textarea></td>
							</tr>
						<?php
							if($_GET['userid'] == Session::get("userId")){
						?>	
							<tr>
								<td colspan="2">
									<div class="action_button">
										<button class="btn_update" type="submit" name="upd_profile">update</button>
									</div>
								</td>
							</tr>
						<?php } ?>
						</table>
					</form>
					</div>
				<!--Profile Body End------------->
				<?php } } ?>
				</div>
			</div>
		<!--Admin Content End------------->
		
		</div>
	</div>
</div>
<!--Dashboard Section End------------->


<!--Footer Section Start------------->		
<?php include"inc/footer.php";?>
<!--Footer Section End------------->