<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if((isset($_GET['renterid']) && isset($_GET['ownerid']) && isset($_GET['adid']))){
		if($_GET['renterid'] == NULL || $_GET['ownerid'] == NULL || $_GET['adid'] == NULL){
			echo"<script>window.location='../index.php'</script>";
		} else{
			$renterId = $_GET['renterid'];
			$ownerId  = $_GET['ownerid'];
			$adId 	  = $_GET['adid'];
			
			$CancelBook = $bk->cancelBooking($renterId, $ownerId, $adId);
		}
		
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">booking list</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol  responsive_mcol_small mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow overflow_x">
				<div class="admin_property_table">
				<?php
					if(isset($CancelBook)){
						echo $CancelBook;
					}
				?>
					<table id="example" class="display" style="width:100%">
					<thead>
						<tr>
							<th>no</th>
							<th>ad</th>
							<th>ad type</th>
							<th>booking date</th>
							<th>f price</th>
							<th>action</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$getblist = $bk->getBookingList();
						if($getblist){
							$i = 0;
							while($bookinglist = $getblist->fetch_assoc()){ $i++;
					?>
						<tr>
							<td><?php echo $i;?></td>
							<td width="20%">
								<img src="../<?php echo $bookinglist['adImg'];?>" alt="property image"/>
								<p><?php echo $bookinglist['adTitle'];?></p>
							</td>
							<td width="20%"><h3><?php echo $bookinglist['catName'];?></h3></td>
							<td width="25%"><p>Posted on: <?php echo $fm->formatDate($bookinglist['bookingDate']);?></p></td>
							<td width="12%"><p>$<?php echo $bookinglist['adRent']+$bookinglist['gasBill']+$bookinglist['electricBill']+$bookinglist['sCharge'];?>/<?php echo $bookinglist['rentType'];?></p></td>
							<td width="23%">
								<a href="view_booking.php?renterid=<?php echo $bookinglist['renterId'];?>&&ownerid=<?php echo $bookinglist['ownerId'];?>&&adid=<?php echo $bookinglist['adId'];?>"><button class="btn_update"><i class="fa fa-eye"></i></button></a> 
							
								<a onclick="return confirm('Are you sure to cancel this booking?')" href="?renterid=<?php echo $bookinglist['renterId'];?>&&ownerid=<?php echo $bookinglist['ownerId'];?>&&adid=<?php echo $bookinglist['adId'];?>"><button class="btn_delete"><i class="fa-solid fa-trash-can"></i></button></a>
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