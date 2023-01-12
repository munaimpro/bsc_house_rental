<!--Banner Section Start------------->	
	​<div class="banner">  
		<div><img src="images/banner.jpg" style="width:100%; height:500px">
			<div class="centered"><h1>find your home</h1>
			<form class="searchform" action="property_list.php" method="POST">
				<table>
					<tr>
						<td>
							<input type="text" name="adarea" placeholder="Search Area"/>
						</td>
						<td>
							<select class="select" name="catid">
								<option value="">property type</option>
							<?php
								$getSC = $src->getSearchCat();
								if($getSC){
									while($sc = $getSC->fetch_assoc()){ ?>	
								<option value="<?php echo $sc['catId'];?>"><?php echo $sc['catName'];?></option>
							<?php } } ?>	
							</select>
						</td>
						<td>
							<select class="select" name="price">
								<option value="">price</option>
								<option value="10-">Below 10,000</option>
								<option value="10">10,000 - 20,000</option>
								<option value="20">20,000 - 30,000</option>
								<option value="30">30,000 - 40,000</option>
								<option value="40">40,000 - 50,000</option>
								<option value="50+">50,000+</option>
							</select>
						</td>
						<td>
							<select class="select" name="totalbed">
								<option value="">bedroom</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="3+">3+</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td colspan="5">
							<button type="submit" class="btn_success" name="adSearch"><i class="fa-solid fa-magnifying-glass"></i><span>find</span></button>
						</td>
					</tr>
				</table>
			</form>
			</div>
		</div>
	</div>
<!--Banner Section End------------->