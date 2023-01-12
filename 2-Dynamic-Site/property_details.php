<?php
	include"inc/header.php";
	
	if(isset($_POST['signin'])){
		header("Location:signin.php");
	}
	
	if(!isset($_GET['adid']) || $_GET['adid'] == NULL){
		echo"<script>window.location='index.php'</script>";
	} else{
		$adId = $_GET['adid'];
		$adimg = $pro->getPropertyImage($adId);
		
		$getAd = $pro->getPropertyById($adId);
		if($getAd){
			while($ad = $getAd->fetch_assoc()){
				$adId 	  = Session::set("adId", $ad['adId']);
				$ownerId  = Session::set("ownerId", $ad['userId']);
			}
		
			$adId 	  = Session::get("adId");
			$ownerId  = Session::get("ownerId");
			$renterId = Session::get("userId");
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendmsg'])){
				$sendNotif = $ntf->notificationInsert($adId, $ownerId, $renterId, $_POST);
			}
		}
	}
?>
<!--Header Section End------------->

<div class="page_title">
	<h1 class="sub-title">property details</h1>
</div>

<!--Property Details Section Start------------->
<div class="container">
	<div class="responsive_mcol mcol_8">
	
	<!--Property Title Section------------->
	<?php
		$getAd = $pro->getPropertyById($adId);
		if($getAd){
			while($ad = $getAd->fetch_assoc()){
	?>
		<div class="property_details">
			<div class="property_title">
				<h1><?php echo $ad['adTitle'];?></h1>
				<div class="property_location">
					<p><?php echo $ad['adAddress'];?></p>
				</div>
			</div>
		</div>
		
	<!--Property Image Section------------->
		<div class="property_gallery">
			<?php if(!empty($ad['adImg'])){ ?>	
				<div><img src="<?php echo $ad['adImg'];?>"alt="property image"/></div>
			<?php } ?>
			<?php
				if($adimg){
					while($adImage = $adimg->fetch_assoc()){ ?>	
				<div>
				<a href="?adid=<?php echo $adImage['adId'];?>&&deladimg=<?php echo $adImage['imgId']?>"></a>
				<img src="<?php echo $adImage['adImg'];?>"alt="property image"/>
				</div>
			<?php } } ?>
		</div>
		
		<div class="property_small_details">
			<h2>Hosted by <?php echo $ad['firstName']." ".$ad['lastName'];?></h2>
			<h4><img class="taka_sign" src="images/taka.png" alt="taka"/><?php echo $ad['adRent'];?>/<?php echo $ad['rentType'];?> <?php if(!empty($ad['adNegotiable'])){ ?><span>(negotiable)</span><?php } ?></h4>
		</div>
		
		<div class="property_details_list">
			<h1>details</h1>
			<div class="property_details_body">
				<div class="property_feature overflow">
					<div><p>property type</p></div>
					<div><p><span><?php echo $ad['catName'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>preffered renter</p></div>
					<div><p><span><?php echo $ad['prefferedRenter'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>available from</p></div>
					<div><p><span><?php echo $fm->formatDate($ad['adDate']);?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>size</p></div>
					<div><p><span><?php echo $ad['adSize'];?> sft</span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>floor no</p></div>
					<div><p><span><?php echo $ad['floorNo'];
					if($ad['floorNo'] == 1){echo"st";} elseif($ad['floorNo'] == 2){echo"nd";} elseif($ad['floorNo'] == 3){echo"rd";} else{echo"th";} ?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>total unit</p></div>
					<div><p><span><?php echo $ad['totalUnit'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>total room</p></div>
					<div><p><span><?php echo $ad['totalRoom'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>bedroom(s)</p></div>
					<div><p><span><?php echo $ad['totalBed'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>washroom(s)</p></div>
					<div><p><span><?php echo $ad['totalBath'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>attach washroom</p></div>
					<div><p><span><?php echo $ad['attachBath'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>common washroom</p></div>
					<div><p><span><?php echo $ad['commonBath'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>balconies</p></div>
					<div><p><span><?php echo $ad['totalBelcony'];?></span></p></div>
				</div>
				
				
				<h3>location</h3>
				<div class="property_feature overflow">
					<div><p>area</p></div>
					<div><p><span><?php echo $ad['adArea'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>address</p></div>
					<div><p><span><?php echo $ad['adAddress'];?></span></p></div>
				</div>
				
				
				<h3>price details</h3>
				<div class="property_feature overflow">
					<div><p>rent type</p></div>
					<div><p><span><?php if($ad['rentType'] == "mo"){echo"Per month";} else{echo"Per week";} ?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>gas bill</p></div>
					<div><p><span>$<?php echo $ad['gasBill'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>electric bill</p></div>
					<div><p><span>$<?php echo $ad['electricBill']; if($ad['eBillType'] == "Inc"){echo" (Including)";} else{echo" (Excluding)";} ?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>service charge</p></div>
					<div><p><span>$<?php echo $ad['sCharge'];?></span></p></div>
				</div>
				
				
				<h3>facilities</h3>
				<div class="property_feature overflow">
					<div><p>generator</p></div>
					<div><p><span><?php echo $ad['adGenerator'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>lift/elevator</p></div>
					<div><p><span><?php echo $ad['liftElevetor'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>wifi connectivity</p></div>
					<div><p><span><?php echo $ad['adWifi'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>car parking</p></div>
					<div><p><span><?php echo $ad['carParking'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>open space</p></div>
					<div><p><span><?php echo $ad['openSpace'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>play ground</p></div>
					<div><p><span><?php echo $ad['openSpace'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>CCTV camera</p></div>
					<div><p><span><?php echo $ad['ccTV'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>security guard</p></div>
					<div><p><span><?php echo $ad['sGuard'];?></span></p></div>
				</div>
				
				
				<h3>other details</h3>
				<div class="property_feature overflow">
					<div><p>total floor</p></div>
					<div><p><span><?php echo $ad['totalFloor'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>floor type</p></div>
					<div><p><span><?php echo $ad['floorType'];?></span></p></div>
				</div>
				
				<div class="property_feature overflow">
					<div><p>built year</p></div>
					<div><p><span><?php echo $ad['builtYear'];?></span></p></div>
				</div>
			</div>
			
			<h1>description</h1>
			<div class="property_details_body property_description">
				<?php echo $ad['adDetails'];?>
			</div>
		</div>
	<?php } } ?>	
	<!--Contact Section Start------------->
		<div class="property_contact">
			<div class="property_contact_title">
				<h1>contact now</h1>
				<p>Contact us for necessary information about booking</p>
			</div>
			
			<form action="" method="POST">
			<?php
				if(Session::get("userlogin") == true){
			?>
			<?php if(isset($sendNotif)){
				echo $sendNotif;
			}?>
				<div class="contact_body overflow">
					<div class="contact_part">
					  <label for="name"><b>Name:</b></label>
					  <input type="text" placeholder="Enter full name" name="name" required><br><br><br>
					  
					  <label for="email"><b>Email:</b></label>
					  <input type="email" placeholder="Enter email" name="email" required><br><br><br>
					  
					  <label for="phone"><b>Mobile No:</b></label>
					  <input type="phone" placeholder="Enter mobile number" name="phone" required><br><br><br>
					  
					  <label for="phone"><b>Address:</b></label>
					  <textarea style="height:4em;" placeholder="Address" name="address" required></textarea><br><br><br>
					</div>
				
					<div class="contact_part">
					  <label for="message"><b>Message:</b></label>
					  <textarea placeholder="Type your message" name="message" required></textarea>
					</div>
				</div>
				
				<div class="action_button overflow">
					<button type="submit" name="sendmsg">Send</button>
				</div>
			<?php } else{ ?>		
				<div class="login_button overflow">
					<button class="btn_success" type="submit" name="signin">Sign In</button>
					<span>to contact us</span>
				</div>
			<?php } ?>	
			</form>
		</div>
	<!--Contact Section End------------->
		
	</div>
</div>
<!--Property Details Section End------------->

	
<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->