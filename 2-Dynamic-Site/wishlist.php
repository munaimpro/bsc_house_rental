<?php
	include"inc/header.php";
	
	if(isset($_GET['delwlist'])){
		if($_GET['delwlist'] == NULL){
			
		} else{
			$delWlistId = $_GET['delwlist'];
			$userId = Session::get("userId");
			
			$delwlist = $pro->delWishlistData($userId, $delWlistId);
		}
	}
	
/*===========================
Pagination process
===========================*/
	$per_page = 5;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else{
		$page = 1;
	}
	$start_from = ($page-1) * $per_page; 
	
?>
<!--Header Section End------------->

<div class="page_title">
	<h1 class="sub-title">wish list</h1>
</div>

<!--Wishlist Section Start------------->
<div class="container">
	<div class="responsive_mcol mcol_8">
		<?php
			$userId = Session::get("userId");
			$getWlist = $pro->getWlistAdById($userId, $start_from, $per_page);
			if($getWlist){
				while($wlist = $getWlist->fetch_assoc()){ 
		?>
		<div class="wishlist_box overflow">
			<a onclick="return confirm('Are you sure to delete this ad?')" href="?delwlist=<?php echo $wlist['wlistId'];?>" class="del_wlist">
				<span class="wishlist_button">X</span>
			</a>
			<div class="property_box">
				<a href="property_details.php?adid=<?php echo $wlist['adId'];?>">
					<div class="property_box_content overflow">
						<div class="property_box_img">
							<img src="<?php echo $wlist['adImg'];?>" alt="ad image"/>
						</div>
						<div class="property_box_text">
							<p><?php echo $wlist['adTitle'];?></p>
							<h3><i class="fa-brands fa-accusoft"></i><?php echo $wlist['catName'];?></h3>
							<p><i class="fa-solid fa-file-pen"></i>Posted on: <?php echo $fm->formatDate($wlist['adDate']);?></p>
							<p><i class="fa-solid fa-location-dot"></i><?php echo $wlist['adAddress'];?></p>
							<p><img class="taka_sign" src="images/taka.png" alt="taka"/><?php echo $wlist['adRent'];?>/<?php if($wlist['rentType'] == "mo"){echo"Month";} else{ echo"Week"; };?><?php if(!empty($wlist['adNegotiable'])){ ?><span> (negotiable)</span><?php } ?></p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<?php } ?>
<!--Pagination Section Start------------->		
	<div class="mcol_12">
	<?php
		$getAdRows = $pro->getPropertyRows();
		$total_pg  = ceil($getAdRows/$per_page);
	?>
		<div class="pagination">
			<ul>
				<li><a href="?page=1">prev</a></li>
			<?php for($i = 1; $i<= $total_pg; $i++){ ?>
				<li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php } ?>
				<li><a href="?page=<?php echo $total_pg; ?>">next</a></li>
			</ul>
		</div>
	</div>
	<?php } else{
		echo "<script>window.location='index.php'</script>";
	} ?>
<!--Pagination Section End------------->
</div>
<!--Wishlist Section End------------->

	
<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->