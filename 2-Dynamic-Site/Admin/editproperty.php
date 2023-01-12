<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if((Session::get("userLevel") == 1)){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if(!isset($_GET['adid']) || $_GET['adid'] == NULL){
		echo"<script>window.location='../index.php'</script>";
	} else{
		$adId = $_GET['adid'];
		$adimg = $pro->getPropertyImage($adId);
	
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_ad'])){
			$getUpdateMsg = $pro->propertyUpdate($adId, $_POST, $_FILES);
		}
	}
	
	if(isset($_GET['deladimg'])){
		$delImg = $_GET['deladimg'];
		$delImgMsg = $pro->deleteAdImage($delImg);
	}

?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">update property</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
			
			<!--Update Property Block Start: Basic------------->
				<form enctype="multipart/form-data" action="" method="POST">
				<?php
					$getAd = $pro->getPropertyById($adId);
					if($getAd){
						while($ad = $getAd->fetch_assoc()){ ?>
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>basic information</h2>
					</div>
				<?php
					if(isset($getUpdateMsg)){
						echo $getUpdateMsg;
					}
					if(isset($delImgMsg)){
						echo $delImgMsg;
					}
				?>
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*ad title</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="adtitle" value="<?php echo $ad['adTitle'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*select property type</p>
						</div>
						
						<div class="add_property_field">
							<select name="catid">
								<option value="">Choose Property Type</option>
							<?php
								$getCat = $cat->getAllCat();
								if($getCat){
									while($getCatId = $getCat->fetch_assoc()){ ?>
								<option value="<?php echo $getCatId['catId'];?>"
								<?php if($getCatId['catId'] == $ad['catId']){ ?>selected="selected"<?php } ?>><?php echo $getCatId['catName'];?></option>
							<?php } } ?>	
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*available from</p>
						</div>
						
						<div class="add_property_field">
							<input type="date" name="addate" value="<?php echo $ad['adDate'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*built year</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="builtyear" value="<?php echo $ad['builtYear'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*description</p>
						</div>
						
						<div class="add_property_field">
							<textarea class="tinymce" name="addetails"><?php echo $ad['adDetails'];?></textarea>
						</div>
					</div>
				</div>
			<!--Update Property Block End------------->
			
			
			<!--Update Property Block Start: Location ------------->
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>property location</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*area</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="adarea" value="<?php echo $ad['adArea'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*address</p>
						</div>
						
						<div class="add_property_field">
							<textarea name="adaddress"><?php echo $ad['adAddress'];?></textarea>
						</div>
					</div>
				</div>
			<!--Update Property Block End------------->
			
			
			<!--Update Property Block Start: Specification ------------->
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>property specification</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*property size</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="adsize" value="<?php echo $ad['adSize'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*floor</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalfloor" value="<?php echo $ad['totalFloor'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*unit</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalunit" value="<?php echo $ad['totalUnit'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*room</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalroom" value="<?php echo $ad['totalRoom'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*bedroom</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalbed" value="<?php echo $ad['totalBed'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*bathroom</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalbath" value="<?php echo $ad['totalBath'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>attach bath</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="attachbath" value="<?php echo $ad['attachBath'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>common bath</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="commonbath" value="<?php echo $ad['commonBath'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>balconies</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalbalcony" value="<?php echo $ad['totalBelcony'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*floor no</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="floorno" value="<?php echo $ad['floorNo'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*floor type</p>
						</div>
						
						<div class="add_property_field">
							<select name="floortype">
								<option value="">Choose Floor Type</option>
								<option value="Tiles" <?php if($ad['floorType'] == "Tiles"){?>selected="selected"<?php } ?>>Tiles</option>
								
								<option value="Mosice" <?php if($ad['floorType'] == "Mosice"){?>selected="selected"<?php } ?>>Mosice</option>
								
								<option value="Marble" <?php if($ad['floorType'] == "Marble"){?>selected="selected"<?php } ?>>Marble</option>
								
								<option value="Normal" <?php if($ad['floorType'] == "Normal"){?>selected="selected"<?php } ?>>Normal</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*prefferd renter</p>
						</div>
						
						<div class="add_property_field">
							<textarea name="prefferedrenter"><?php echo $ad['prefferedRenter'];?></textarea>
						</div>
					</div>
				</div>
			<!--Update Property Block End------------->	
			

			<!--Update Property Block Start: Facilities ------------->
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>facilities</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>lift/elevator</p>
						</div>
						
						<div class="add_property_field">
							<select name="liftelevetor">
								<option value="No"<?php if($ad['liftElevetor'] == "No"){?>selected="selected"<?php } ?>>No</option>
								<option value="Yes"<?php if($ad['liftElevetor'] == "Yes"){?>selected="selected"<?php } ?>>Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>generator</p>
						</div>
						
						<div class="add_property_field">
							<select name="adgenerator">
								<option value="No"<?php if($ad['adGenerator'] == "No"){?>selected="selected"<?php } ?>>No</option>
								<option value="Yes"<?php if($ad['adGenerator'] == "Yes"){?>selected="selected"<?php } ?>>Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>Wi-Fi connectivity</p>
						</div>
						
						<div class="add_property_field">
							<select name="adwifi">
								<option value="No"<?php if($ad['adWifi'] == "No"){?>selected="selected"<?php } ?>>No</option>
								<option value="Yes"<?php if($ad['adWifi'] == "Yes"){?>selected="selected"<?php } ?>>Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>car parking</p>
						</div>
						
						<div class="add_property_field">
							<select name="carparking">
								<option value="No"<?php if($ad['carParking'] == "No"){?>selected="selected"<?php } ?>>No</option>
								<option value="Yes"<?php if($ad['carParking'] == "Yes"){?>selected="selected"<?php } ?>>Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>open space</p>
						</div>
						
						<div class="add_property_field">
							<select name="openspace">
								<option value="No"<?php if($ad['openSpace'] == "No"){?>selected="selected"<?php } ?>>No</option>
								<option value="Yes"<?php if($ad['openSpace'] == "Yes"){?>selected="selected"<?php } ?>>Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>play ground</p>
						</div>
						
						<div class="add_property_field">
							<select name="playground">
								<option value="No"<?php if($ad['playGround'] == "No"){?>selected="selected"<?php } ?>>No</option>
								<option value="Yes"<?php if($ad['playGround'] == "Yes"){?>selected="selected"<?php } ?>>Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p style="text-transform:uppercase">cctv</p>
						</div>
						
						<div class="add_property_field">
							<select name="cctv">
								<option value="No"<?php if($ad['ccTV'] == "No"){?>selected="selected"<?php } ?>>No</option>
								<option value="Yes"<?php if($ad['ccTV'] == "Yes"){?>selected="selected"<?php } ?>>Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>security guard</p>
						</div>
						
						<div class="add_property_field">
							<select name="sguard">
								<option value="No"<?php if($ad['sGuard'] == "No"){?>selected="selected"<?php } ?>>No</option>
								<option value="Yes"<?php if($ad['sGuard'] == "Yes"){?>selected="selected"<?php } ?>>Yes</option>
							</select>
						</div>
					</div>					
				</div>
			<!--Update Property Block End------------->
			
			
			<!--Update Property Block Start: Price ------------->
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>price details</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>rent type</p>
						</div>
						
						<div class="add_property_field">
							<select name="renttype">
								<option value="mo"<?php if($ad['rentType'] == "mo"){?>selected="selected"<?php } ?>>Per month</option>
								<option value="we"<?php if($ad['rentType'] == "we"){?>selected="selected"<?php } ?>>Per week</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*rent (BDT)</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="adrent" value="<?php echo $ad['adRent'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*gas bill</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="gasbill" value="<?php echo $ad['gasBill'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*electric bill</p>
						</div>
						
						<div class="add_property_field">
							<select name="ebilltype">
								<option value="exc" <?php if($ad['eBillType'] == "exc"){ ?>selected="selected"<?php } ?>>Excluding</option>
								<option value="inc" <?php if($ad['eBillType'] == "inc"){ ?>selected="selected"<?php } ?>>Including</option>
							</select>
						</div>
						<div class="add_property_field">
							<input type="text" name="electricbill" value="<?php echo $ad['electricBill'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*service charge</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="scharge" value="<?php echo $ad['sCharge'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_field property_negotiable_check">
							<input type="checkbox" name="adnegotiable" value="negotiable" <?php if($ad['adNegotiable'] == "negotiable"){ ?>checked="checked"<?php } ?>/>
							<span>negotiable</span>
						</div>
					</div>
				</div>
			<!--Update Property Block End------------->
			
			
			<!--Update Property Block Start: Photo ------------->
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>property photo</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="property_gallery">
						<?php if(!empty($ad['adImg'])){ ?>	
							<div><img src="../<?php echo $ad['adImg'];?>"alt="property image"/></div>
						<?php } ?>
						<?php
							if($adimg){
								while($adImage = $adimg->fetch_assoc()){ ?>	
							<div>
							<a href="?adid=<?php echo $adImage['adId'];?>&&deladimg=<?php echo $adImage['imgId']?>"><div>X</div></a>
							<img src="../<?php echo $adImage['adImg'];?>"alt="property image"/>
							</div>
						<?php } } ?>	
						</div>
					<?php
						if(($ad['userId'] == Session::get("userId")) && (Session::get("userLevel") == 2)){
					?>	
					<?php
						if($ad['adStatus'] == 1){
					?>
						<div class="add_property_title">
							<p>upload photo</p>
						</div>
						
						<div class="add_property_field">
							<input type="file" name="adimg[]" multiple />
						</div>
					</div>
					<?php } else{
						echo"<h4 style='width:fit-content; margin: 1em auto;'>Pending</h4>";
					}?>
					<div class="action_button overflow">
						<button class="btn_update" type="submit" name="update_ad">update property</button>
					</div>
					<?php } ?>
				</div>
				<?php } } ?>
				</form>
			<!--Update Property Block End------------->
			</div>
		<!--Admin Content End------------->
		
		</div>
	</div>
</div>
<!--Update Property Section Start------------->


<!--Footer Section Start------------->		
<?php include"inc/footer.php";?>
<!--Footer Section End------------->