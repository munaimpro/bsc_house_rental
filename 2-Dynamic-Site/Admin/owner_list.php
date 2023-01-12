<?php 
	include"inc/header.php";
	
	/*========================
	User Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if(isset($_GET['deluser'])){
		if($_GET['deluser'] == NULL){
			echo"<script>window.location='../index.php'</script>";
		} else{
			$delUserId = $_GET['deluser'];
			$delUserMsg = $usr->delUserById($delUserId);
		}
	}
	
	$path = $_SERVER['SCRIPT_FILENAME'];
	$title = basename($path, '.php');
	if($title == 'owner_list'){
		$updUstatus = $usr->updateUserStatus();
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">property owner(s)</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol responsive_mcol_small mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow overflow_x">
			<?php
				if(isset($delUserMsg)){
					echo $delUserMsg;
				}
			?>
				<div class="admin_property_table">
					<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th width="10%">no</th>
								<th width="15%">name</th>
								<th>username</th>
								<th>email</th>
								<th>phone</th>
								<th>action</th>
							</tr>
						</thead>
					
						<tbody>
						<?php
							$ownerList = $usr->getAllOwner();
							if($ownerList){
								$i = 0;
							while($owner = $ownerList->fetch_assoc()){ $i++;
						?>
							<tr>
								<td><?php echo $i;?></td>
								<td>
									<?php
										if(empty($owner['userImg'])){ ?>
										<img class="user_img" src="../images/avater.png"/>
									<?php } else{ ?>
										<img class="user_img" src="../<?php echo $owner['userImg'];?>"/>
									<?php } ?>
									<p><?php echo $owner['firstName']." ".$owner['lastName'];?></p>
								</td>
								<td><?php echo $owner['userName'];?></td>
								<td><?php echo $owner['userEmail'];?></td>
								<td><?php echo $owner['cellNo'];?></td>
								<td width="23%">
									<a href="profile.php?userid=<?php echo $owner['userId'];?>"><button class="btn_update btn_owner"><i class="fa fa-building-user"></i></button></a> <a onclick="return confirm('Are you sure to delete user?')" href="?deluser=<?php echo $owner['userId'];?>"><button class="btn_delete"><i class="fa fa-trash-can"></i></button></a>
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