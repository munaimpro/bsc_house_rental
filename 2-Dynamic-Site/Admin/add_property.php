<?php
	include"inc/header.php";
	
	/*========================
	User Access Control
	========================*/
	if(Session::get("userLevel") != 2){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_ad'])){
		$getAdMsg = $pro->propertyInsert($_POST, $_FILES);
	}
?>


<!--Dashboard Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">add property</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol responsive_mcol_small mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
			
			<!--Add Property Block Start: Basic------------->
			<form enctype="multipart/form-data" action="" method="POST">
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>basic information</h2>
					</div>
				<?php
					if(isset($getAdMsg)){
						echo $getAdMsg;
					}
				?>	
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*ad title</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="adtitle" placeholder="Property Title"/>
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
								<option value="<?php echo $getCatId['catId'];?>"><?php echo $getCatId['catName'];?></option>
							<?php } } ?>	
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*available from</p>
						</div>
						
						<div class="add_property_field">
							<input type="date" name="addate"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*built year</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="builtyear" placeholder="Built Year"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*description</p>
						</div>
						
						<div class="add_property_field">
							<textarea class="tinymce"name="addetails"></textarea>
						</div>
					</div>
				</div>
			<!--Add Property Block End------------->
			
			
			<!--Add Property Block Start: Location ------------->
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>property location</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*area</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="adarea" placeholder="Area Name"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*address</p>
						</div>
						
						<div class="add_property_field">
							<textarea class="" name="adaddress"></textarea>
						</div>
					</div>
				</div>
			<!--Add Property Block End------------->
			
			
			<!--Add Property Block Start: Specification ------------->
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>property specification</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*property size</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="adsize" placeholder="Sq Ft"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*floor</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalfloor" placeholder="Total Floor"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*unit</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalunit" placeholder="Total Unit"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*room</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalroom" placeholder="Total Room"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*bedroom</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalbed" placeholder="Total Bedroom"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*bathroom</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalbath" placeholder="Total Bathroom"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>attach bath</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="attachbath" placeholder="Attach Bath"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>common bath</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="commonbath" placeholder="Common Bath"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>balconies</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="totalbalcony" placeholder="Total Balcony"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*floor no</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="floorno" placeholder="Floor No"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*floor type</p>
						</div>
						
						<div class="add_property_field">
							<select name="floortype">
								<option value="">Choose Floor Type</option>
								<option value="Tiles">Tiles</option>
								<option value="Mosice">Mosice</option>
								<option value="Marble">Marble</option>
								<option value="Normal">Normal</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*prefferd renter</p>
						</div>
						
						<div class="add_property_field">
							<textarea name="prefferedrenter"></textarea>
						</div>
					</div>
				</div>
			<!--Add Property Block End------------->	
			

			<!--Add Property Block Start: Facilities ------------->
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
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>generator</p>
						</div>
						
						<div class="add_property_field">
							<select name="adgenerator">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>Wi-Fi connectivity</p>
						</div>
						
						<div class="add_property_field">
							<select name="adwifi">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>car parking</p>
						</div>
						
						<div class="add_property_field">
							<select name="carparking">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>open space</p>
						</div>
						
						<div class="add_property_field">
							<select name="openspace">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>play ground</p>
						</div>
						
						<div class="add_property_field">
							<select name="playground">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p style="text-transform:uppercase">cctv</p>
						</div>
						
						<div class="add_property_field">
							<select name="cctv">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>security guard</p>
						</div>
						
						<div class="add_property_field">
							<select name="sguard">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</div>
					</div>					
				</div>
			<!--Add Property Block End------------->
			
			
			<!--Add Property Block Start: Price ------------->
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
								<option value="mo">Per month</option>
								<option value="we">Per week</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*rent (BDT)</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="adrent" placeholder="Rent (BDT)"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*gas bill</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="gasbill" placeholder="Gas Bill"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*electric bill</p>
						</div>
						
						<div class="add_property_field">
							<select name="ebilltype">
								<option value="exc">Excluding</option>
								<option value="inc">Including</option>
							</select>
						</div>
						<div class="add_property_field">
							<input type="text" name="electricbill"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*service charge</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="scharge" placeholder="Service Charge"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_field property_negotiable_check">
							<input type="checkbox" name="adnegotiable" value="negotiable"/>
							<span>negotiable</span>
						</div>
					</div>
				</div>
			<!--Add Property Block End------------->
			
			
			<!--Add Property Block Start: Photo ------------->
				<div class="add_property_block overflow">
					<div class="property_block_title">
						<h2>property photo</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>*upload photo</p>
						</div>
						
						<div class="add_property_field">
							<input type="file" name="adimg"/>
						</div>
					</div>
					
					<div class="action_button overflow">
						<button type="submit" name="submit_ad">submit property</button>
					</div>
				</div>
			<!--Add Property Block End------------->
			</form>
			</div>
		<!--Admin Content End------------->
		
		</div>
	</div>
</div>
<!--Add Property Section Start------------->


<!--Footer Section Start------------->		
<?php include"inc/footer.php";?>
<!--Footer Section End------------->