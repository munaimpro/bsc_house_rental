<?php 
	include"inc/header.php";
	
	/*========================
	User Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if(isset($_GET['delcatid'])){
		if($_GET['delcatid'] == NULL){
			echo"<script>window.location='../index.php'</script>";
		} else{
			$delCatId = $_GET['delcatid'];
			$delCatMsg = $cat->delCatById($delCatId);
		}
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">all category</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol responsive_mcol_small mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
			<?php
				if(isset($delCatMsg)){
					echo $delCatMsg;
				}
			?>	
				<div class="admin_property_table">
					<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th>serial no</th>
								<th>category name</th>
								<th>category image</th>
								<th>action</th>
							</tr>
						</thead>
						
						<tbody>
						<?php
							$catList = $cat->getAllCat();
							if($catList){
								$i = 0;
								while($cat = $catList->fetch_assoc()){ $i++;
						?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $cat['catName'];?></td>
								<td>
								<img style="width:4em;height:3em;" src="../<?php echo $cat['catImg'];?>" alt="category"/>
								</td>
								<td width="23%">
									<a href="editcategory.php?catid=<?php echo $cat['catId'];?>"><button class="btn_update"><i class="fa fa-pencil"></i></button></a> <a onclick="return confirm('Are you sure to delete this category?')" href="?delcatid=<?php echo $cat['catId'];?>"><button class="btn_delete"><i class="fa-solid fa-trash-can"></i></button></a>
								</td>
							</tr>
						<?php } } ?>	
						</tbody>
					</table>
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