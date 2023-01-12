<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if(isset($_GET['delmsg'])){
		if($_GET['delmsg'] == NULL){
		echo"<script>window.location='../index.php'</script>";
		} else{
			$msgId  = $_GET['delmsg'];
			$delMsg = $ibx->delMessageById($msgId);
		}
	}
	
	$path = $_SERVER['SCRIPT_FILENAME'];
	$title = basename($path, '.php');
	if($title == 'inbox'){
		$updMstatus = $ibx->updateMsgStatus();
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">inbox</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol  responsive_mcol_small mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow overflow_x">
			<?php
				if(isset($delMsg)){
					echo $delMsg;
				}
			?>
				<div class="admin_property_table">
					<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th width="5%">no</th>
								<th width="10%">name</th>
								<th width="10%">email</th>
								<th width="30%">message</th>
								<th width="15%">date</th>
								<th width="30%">action</th>
							</tr>
						</thead>
					
						<tbody>
						<?php
							$getMsg = $ibx->getAllMessage();
							if($getMsg){ $i = 0;
								while($message = $getMsg->fetch_assoc()){ $i++;
						?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $message['msgName'];?></td>
								<td><?php echo $message['msgEmail'];?></td>
								<td>
									<?php echo $fm->textShorten($message['msgText'], 50);?>
								</td>
								<td><?php echo $fm->formatDate($message['msgDate']);?></td>
								<td>
									<a href="viewmessage.php?msgid=<?php echo $message['msgId'];?>"><button class="btn_update"><i class="fa fa-eye"></i></button></a> <a href="replymessage.php?msgid=<?php echo $message['msgId'];?>"><button class="btn_update"><i class="fa fa-reply"></i></button></a> <a onclick="return confirm('Are you sure to delete this message?')" href="?delmsg=<?php echo $message['msgId'];?>"><button class="btn_delete"><i class="fa-solid fa-trash-can"></i></button></a>
								</td>
							</tr>
						<?php  } } ?>
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