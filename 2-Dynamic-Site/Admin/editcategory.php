<?php 
	include"inc/header.php";
	
	/*========================
	User Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
		echo "<script>window.location='../index.php'</script>";
	} else{
		$catId = $_GET['catid'];
		$getCat = $cat->getCatById($catId);
		
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upd_category'])){
			$updcatmsg = $cat->catUpdate($_POST, $_FILES, $catId);
		}
	}
	
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">update category</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
			
			<!--Update Category Block Start------------->
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="add_property_block add_cat_block overflow">
				<?php
					if(isset($updcatmsg)){
						echo $updcatmsg;
					}
				?>
				<?php
					if($getCat){
						while($cat = $getCat->fetch_assoc()){ ?>
					<div class="property_block_body overflow">
						<div class="add_property_title add_cat_title">
							<p>category name</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="catname" value="<?php echo $cat['catName'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="cover_img_block">
							<img src="../<?php echo $cat['catImg'];?>" alt="Category"/>
						</div>
						
						<div class="add_property_title add_cat_title">
							<p>category cover</p>
						</div>
						
						<div class="add_property_field">
							<input type="file" name="catimg"/>
						</div>
					</div>
					
					<div class="action_button overflow">
						<button class="btn_update" type="submit" name="upd_category">update category</button>
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