<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if(isset($_GET['delntf'])){
		if($_GET['delntf'] == NULL){
		echo"<script>window.location='../index.php'</script>";
		} else{
			$ntfId = $_GET['delntf'];
			$delNtf = $ntf->delNotificationById($ntfId);
		}
	}
	
	$path = $_SERVER['SCRIPT_FILENAME'];
	$title = basename($path, '.php');
	if($title == 'notification'){
		$updNstatus = $ntf->updateNotifStatus();
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">notification(s)</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow overflow_x">
			<?php
				if(isset($delNtf)){
					echo $delNtf;
				}
			?>
				<div class="admin_property_table">
					<table id="example" class="display responsive_display" style="width:100%">
						<thead>
							<tr>
								<th width="5%">no</th>
								<th width="10%">name</th>
								<th width="10%">email</th>
								<th width="10%">phone</th>
								<th width="20%">message</th>
								<th width="15%">date</th>
								<th width="10%">ad</th>
								<th width="20%">action</th>
							</tr>
						</thead>
					
						<tbody>
						<?php
							$getNtf = $ntf->getAllNotification();
							if($getNtf){ $i = 0;
								while($notification = $getNtf->fetch_assoc()){ $i++;
						?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $notification['notfName'];?></td>
								<td><?php echo $notification['notfEmail'];?></td>
								<td><?php echo $notification['notfPhone'];?></td>
								<td>
									<?php echo $fm->textShorten($notification['notfMsg'], 50);?>
								</td>
								<td><?php echo $fm->formatDate($notification['notfDate']);?></td>
								<td>
									<img src="../<?php echo $notification['adImg'];?>" alt="ad image"/>
									<p><a href="profile.php?userid=<?php echo $notification['ownerId'];?>">view owner</a></p>
								</td>
								<td>
									<a href="property_booking.php?renterid=<?php echo $notification['renterId'];?>&&ownerid=<?php echo $notification['ownerId'];?>&&adid=<?php echo $notification['adId'];?>&&nftid=<?php echo $notification['notfId'];?>">book now</a> 
									
									<a href="viewmessage.php?nftmsg=<?php echo $notification['notfId'];?>"><button class="btn_update"><i class="fa fa-eye"></i></button></a> 
									
									<a href="replymessage.php?nftmsg=<?php echo $notification['notfId'];?>"><button class="btn_update"><i class="fa fa-reply"></i></button></a> 
									
									<a href="profile.php?userid=<?php echo $notification['renterId'];?>"><button class="btn_update btn_user"><i class="fa fa-user-tie"></i></button></a> 
									
									<a href="editproperty.php?adid=<?php echo $notification['adId'];?>"><button class="btn_update btn_property"><i class="fa-brands fa-accusoft"></i></button></a> 
									
									<a onclick="return confirm('Are you sure to delete this notification?')" href="?delntf=<?php echo $notification['notfId'];?>"><button class="btn_delete"><i class="fa-solid fa-trash-can"></i></button></a>
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