<?php 
	include"inc/header.php";
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sendmessage'])){
		$sendmsg = $ibx->sendMessage($_POST);
	}
?>
<!--Header Section End------------->

<div class="page_title">
	<h1 class="sub-title">help & support</h1>
</div>

<!--Help Section Start------------->
<div class="container">
	<div class="mcol_8">
	<!--Contact Section Start------------->
		<div class="property_contact">
			<div class="property_contact_title">
				<h1>contact us</h1>
			</div>
			
			<form action="" method="POST">
			<?php
				if(isset($sendmsg)){ 
					echo $sendmsg; 
				}
			?>
				<div class="contact_body overflow">
					<div class="contact_part">
					  <label for="name"><b>Name:</b></label>
					  <input type="text" placeholder="Enter name" name="name" required><br><br><br>
					  
					  <label for="phone"><b>Mobile No:</b></label>
					  <input type="phone" placeholder="Enter Mobile No" name="phone" required><br><br><br>
					  
					  <label for="email"><b>Email:</b></label>
					  <input type="email" placeholder="Enter Email" name="email" required><br><br><br>
					</div>
				
					<div class="contact_part">
					  <label for="message"><b>Message:</b></label>
					  <textarea placeholder="Type your message" name="message" required></textarea>
					</div>
				</div>
				
				<div class="contact_button overflow">
					<button class="btn_success" type="submit" name="sendmessage">Send</button>
				</div>
			</form>
			
			<div class="property_contact_body">
				<div class="contact_part">
					<h3>address</h3>
					<p>HouserentalBD Limited House # 9, Road # 2/D, Block # J, Baridhara, Dhaka-212, Bangladesh</p>
				</div>
				<div class="contact_part">
					<div class="virtual_contact overflow">
						<div><p>telephone</p></div>
						<div><p>01233-4533323</p></div>
					</div>
					<div class="virtual_contact overflow">
						<div><p>mobile</p></div>
						<div><p>01233-4533323</p></div>
					</div>
					<div class="virtual_contact overflow">
						<div><p>fax</p></div>
						<div><p>01233-4533323</p></div>
					</div>
					<div class="virtual_contact overflow">
						<div><p>e-mail</p></div>
						<div><p>hrental@gmail.com</p></div>
					</div>
					<div class="virtual_contact overflow">
						<div><p>website</p></div>
						<div><p>www.houserental.com</p></div>
					</div>
				</div>
			</div>
		</div>
	<!--Contact Section End------------->	
		
		
	<!--FAQ Section Start------------->	
		<div class="property_faq">
			<div class="faq_title">
				<h1>freequently asked questions</h1>
			</div>
			<div class="faq_body">
				<div class="faq_content">
					<h3>Why choose us?</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>
				</div>
				
				<div class="faq_content">
					<h3>How to book a property as our conditions?</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium suscipit eros, congue suscipit neque. Cras eu ultrices orci. Praesent accumsan tempus faucibus. Praesent nec nibh scelerisque, tristique odio non, maximus risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse eget eros nunc. Pellentesque eu laoreet est. Phasellus hendrerit condimentum felis, in feugiat nibh sodales vitae. Sed nec tellus pretium, faucibus ex eget, pulvinar neque. Vestibulum nisi nisi, rhoncus quis pretium maximus, bibendum non massa.</p>
				</div>
			</div>
		</div>
	<!--FAQ Section End------------->
	</div>
</div>
<!--Help Section End------------->

	
<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->