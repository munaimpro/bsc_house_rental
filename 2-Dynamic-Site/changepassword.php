<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if((!isset($_GET['userid']) || $_GET['userid'] == NULL) || (Session::get("userlogin") != true)){
		echo "<script>window.location='index.php'</script>";
	} else{
		$userId = $_GET['userid'];
		
		if($userId != Session::get("userId")){
			echo "<script>window.location='index.php'</script>";
		} else{
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updatepass'])){
				$updpassmsg = $usr->updatePassword($_POST, $userId);
			}
		}
	}
?>
<!--Header Section End------------->


<!--Change Password Form Start------------->
<div class="container form_container background" style="background-image:url(images/1.jpg);background-blend-mode:overlay;">
	<div class="mcol_8 register">
	<div class="mcol_12">
		<form action="" method="POST">
		<table class="tbl_form">
			<caption><h1>change password</h1></caption>
			<?php if(isset($updpassmsg)){ ?>
			<tr>
				<td colspan="2">
					<?php echo $updpassmsg; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>
					<label for="oldpassword">Old Password</label>
				</td>
				<td>
					<input type="password" placeholder="Enter old password" name="oldpass">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="oldpassword">New Password</label>
				</td>
				<td>
					<input type="password" placeholder="Enter new password" name="newpass">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="cnf_password">Confirm</label>
				</td>
				<td colspan="3">
					<input type="password" placeholder="Confirm password" name="cnf_password">
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<button class="btn_success" type="submit" name="updatepass">Update</button>
				</td>
			</tr>
		</table>
		</form>
	</div>
	</div>
</div>
<!--Forgot Password Form End------------->

	
<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->