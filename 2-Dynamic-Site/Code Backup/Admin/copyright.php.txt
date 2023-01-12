<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatecopyright'])){
		$getUpdMsg = $sdt->UpdateCopyright($_POST);
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">copyright</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
			
			<!--Update Category Block Start------------->
				<form action="" method="POST">
				<div class="add_property_block add_cat_block overflow">
				<?php
					$copyRight = $sdt->getCopyright();
					if($copyRight){
						$i = 0;
						while($cright = $copyRight->fetch_assoc()){
				?>
					<div class="property_block_body overflow">
					<?php
						if(isset($getUpdMsg)){
							echo $getUpdMsg;
						}
					?>
						<div class="add_property_title add_cat_title">
							<p>copyright text</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="copyright" value="<?php echo $cright['copyrightText'];?>"/>
						</div>
					</div>
					
					<div class="action_button overflow">
						<button class="btn_update" type="submit" name="updatecopyright">update</button>
					</div>
					</div>
				</form>
			<!--Update Category Block End------------->
				<?php } } ?>
				</div>
			<!--Admin Content End------------->
		
			</div>
		</div>
	</div>
</div>
<!--Add Property Section Start------------->


<!--Footer Section Start------------->		
<?php include"inc/footer.php";?>
<!--Footer Section End------------->