<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatesite'])){
		$getUpdMsg = $sdt->updateDetails($_POST, $_FILES);
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">site details</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
			
			<!--Update Category Block Start------------->
				<form enctype="multipart/form-data" action="" method="POST">
				<div class="add_property_block add_cat_block overflow">
				<?php
					$siteDetails = $sdt->getSiteDetails();
					if($siteDetails){
						$i = 0;
						while($sdetails = $siteDetails->fetch_assoc()){
				?>
					<div class="property_block_body overflow">
					<?php
						if(isset($getUpdMsg)){
							echo $getUpdMsg;
						}
					?>
						<div class="add_property_title add_cat_title">
							<p>title</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="title" value="<?php echo $sdetails['siteTitle']?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title add_cat_title">
							<p>slogan</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="slogan" value="<?php echo $sdetails['siteSlogan']?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="cover_img_block">
							<img src="../<?php echo $sdetails['siteLogo']?>" alt="Logo"/>
						</div>
						
						<div class="add_property_title add_cat_title">
							<p>logo</p>
						</div>
						
						<div class="add_property_field">
							<input type="file" name="logo"/>
						</div>
					</div>
					
					<div class="action_button overflow">
						<button class="btn_update" type="submit" name="updatesite">update</button>
					</div>
				<?php } } ?>
				</div>
				</form>
			<!--Update Category Block End------------->
			</div>
		<!--Admin Content End------------->
		
		</div>
	</div>
</div>
<!--Add Property Section Start------------->


<!--Footer Section Start------------->		
<?php include"inc/footer.php";?>
<!--Footer Section End------------->