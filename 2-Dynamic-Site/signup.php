<?php
	include"inc/header.php";
	Session::chkLogin();
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])){
		$regimsg = $usr->UserRegistration($_POST);
	}
?>
<!--Header Section End------------->

<!--Form Start------------->
<div class="container form_container">
	<div class="mcol_8 register overflow">
	<div class="mcol_3 background signup_bg" style="background-image:url(images/signup_bg.jpg);"></div>
	
	<div class="mcol_9">
		<form action="" method="POST">
		<table class="tbl_form">
			<caption><h1>create account</h1></caption>
			<?php if(isset($regimsg)){ ?>
			<tr>
				<td colspan="4">
					<?php echo $regimsg; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>
					<label for="fname">First Name</label>
				</td>
				<td colspan="3">
					<input type="text" placeholder="Enter first name" name="fname">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="lname">Last Name</label>
				</td>
				<td colspan="3">
					<input type="text" placeholder="Enter last name" name="lname">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="username">Username</label>
				</td>
				<td colspan="3">
					<input type="text" placeholder="*3 characters minimum" name="username">
				</td>
			</tr>
			  
			<tr>
				<td>
					<label for="email">Email Address</label>
				</td>
				<td colspan="3">
					<input type="email" placeholder="Enter email address" name="email">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="phone">Cell Number</label>
				</td>
				<td colspan="3">
					<input type="phone" placeholder="Enter cell phone number" name="cellno">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="address">Address</label>
				</td>
				<td colspan="3">
					<textarea style="resize:none;" name="address"></textarea>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="password">Password</label>
				</td>
				<td colspan="3">
					<input type="password" placeholder="*6 characters minimum" name="password">
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
				<td>
					<label for="level">Join As</label>
				</td>
				<td>
					<input type="radio" name="level" value="1"><span>User</span>
				</td>
				<td>
					<input type="radio" name="level" value="2"><span>Owner</span>
				</td>
				<td>
					<input type="radio" name="level" value="3"><span>Agent</span>
				</td>
			</tr>
			
			<tr>
				<td colspan="4">
					<button class="btn_success" type="submit" name="signup">Sign Up</button>
				</td>
			</tr>

			<tr>
				<td colspan="4">
				<p>Already have an account?
				<span><a href="signin.php">Sign in</a></span>
				</p>
				</td>
			</tr>
		</table>
		</form>
	</div>
	</div>
</div>
<!--Form End------------->

	
<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->