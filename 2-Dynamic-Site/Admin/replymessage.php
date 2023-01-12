<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if(Session::get("userLevel") != 3){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sendmail'])){
		$to      = $_POST['msgto'];
		$from    = $_POST['msgfrom'];
		$subject = $_POST['msgsubject'];
		$msg 	 = $_POST['message'];
		
		$replymsg = $ibx->replyMessage($to, $from, $subject, $msg);
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">reply message</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
				<div class="user_profile">
					<div class="profile_body">
					<form action="" method="POST">
					<?php
						if(isset($replymsg)){
							echo $replymsg;
						}
					?>
						<div class="msg_block_body overflow">
							<div class="msg_field_box"><p>from</p></div>
							<div class="msg_field_box"><input type="email" name="msgfrom" value="<?php echo Session::get("userEmail");?>"/></div>
						</div>
						
						<div class="msg_block_body overflow">
							<div class="msg_field_box"><p>to</p></div>
							<div class="msg_field_box"><input type="email" name="msgto" placeholder="Send message to"/></div>
						</div>
						
						<div class="msg_block_body overflow">
							<div class="msg_field_box"><p>subject</p></div>
							<div class="msg_field_box"><input type="text" name="msgsubject" placeholder="Write your subject"/></div>
						</div>
						
						<div class="msg_block_body overflow">
							<div class="msg_field_box"><p>message</p></div>
							<div class="msg_field_box"><textarea class="tinymce" name="message"></textarea></div>
						</div>
						
						<div class="action_button">
							<button type="submit" name="sendmail">send</button>
						</div>
					</form>
					</div>
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