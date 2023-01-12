<?php 
	include"inc/header.php";
	
/*===========================
Page Access Control
===========================*/	
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
/*===========================
Property approval process
===========================*/
	if(isset($_GET['adapprove'])){
		if($_GET['adapprove'] == NULL){
			echo"<script>window.location='../index.php'</script>";
		} else{
			$approveId = $_GET['adapprove'];
			$approveAdMsg = $pro->approveProperty($approveId);
		}
	}
	
/*===========================
Property remove process
===========================*/
	if(isset($_GET['delad'])){
		if($_GET['delad'] == NULL){
			echo"<script>window.location='../index.php'</script>";
		} else{
			$delAdId = $_GET['delad'];
			$deleteAdMsg = $pro->deletePropertyById($delAdId);
		}
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">all ad</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol responsive_mcol_small mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
			<?php
				if(isset($approveAdMsg)){
					echo $approveAdMsg;
				}
				if(isset($deleteAdMsg)){
					echo $deleteAdMsg;
				}
			?>
				<div class="admin_property_table small_display_table">
					<table id="example">
					<?php
						$ad = $pro->getAllProperty();
						if($ad){
							while($adlist = $ad->fetch_assoc()){ ?>	
						<tr>
							<td width="20%">
								<img src="../<?php echo $adlist['adImg'];?>"/>
								<p><?php echo $adlist['adTitle'];?></p>
							</td>
							<td width="20%"><h3><?php echo $adlist['catName'];?></h3></td>
							<td width="25%"><p>Posted on: <?php echo $fm->formatDate($adlist['adDate']);?></p></td>
							<td width="12%"><p>$<?php echo $adlist['adRent']+$adlist['gasBill']+$adlist['electricBill']+$adlist['sCharge'];?>/<?php echo $adlist['rentType'];?></p></td>
							<td width="23%" class="admin_small_screen_td">
							<?php
								if($adlist['adStatus'] == 1){
							?>	
								<p class="published">published</p>
							<?php } elseif($adlist['adStatus'] == 2){ ?>
								<p class="published" style="background:#1E90FF;color:#fff;">booked</p>
							<?php } ?>
							<?php
								if($adlist['adStatus'] == 0){
							?>
								<a onclick="return confirm('Are you sure to approve this ad?')" href="?adapprove=<?php echo $adlist['adId'];?>"><button class="btn_update btn_approve"><i class="fa-solid fa-check"></i></button></a> 
							<?php } ?>
							
								<a href="profile.php?userid=<?php echo $adlist['userId'];?>"><button class="btn_update btn_owner"><i class="fa-solid fa-building-user"></i></button></a> 
								
								<a href="editproperty.php?adid=<?php echo $adlist['adId'];?>"><button class="btn_update btn_property"><i class="fa-brands fa-accusoft"></i></button></a>
								
								<a onclick="return confirm('Are you sure to delete this ad?')" href="?delad=<?php echo $adlist['adId'];?>"><button class="btn_delete"><i class="fa-solid fa-trash-can"></i></button></a>
							</td>
						</tr>
					<?php } } else{ ?>
						<div class="dashboard_lower_part overflow">
							<div class="overflow">
								<p>No Ad Available</p>
							</div>
						</div>
					<?php } ?>
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