<?php
	include"inc/header.php";
	Session::chkLogin();
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signin'])){
		$loginmsg = $usr->UserLogin($_POST);
	}
?>
<!--Header Section End------------->

<!--Sign In Form Start------------->
<div class="container form_container">
	<div class="mcol_8 register">
	<div class="mcol_3">
		<img src="images/signin_bg.png" alt="sign in background"/>
	</div>
	
	<div class="mcol_9">
		<form action="" method="POST">
		<table class="tbl_form">
			<caption><h1>sign in</h1></caption>
			<?php if(isset($loginmsg)){ ?>
			<tr>
				<td colspan="2">
					<?php echo $loginmsg; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>
					<label for="email">Email Address</label>
				</td>
				<td colspan="2">
					<input type="email" placeholder="Enter email address" name="email">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="password">Password</label>
				</td>
				<td colspan="2">
					<input type="password" placeholder="Enter password" name="password">
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<button class="btn_success" type="submit" name="signin">Sign In</button>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
				<p><a href="forgotpass.php">Forgot Password?</a></p>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
				<p>Not joined yet?
				<span><a href="signup.php">Sign up here</a></span>
				</p>
				</td>
			</tr>
		</table>
		</form>
	</div>
	</div>
</div>
<!--Sign In Form End------------->

	
<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->