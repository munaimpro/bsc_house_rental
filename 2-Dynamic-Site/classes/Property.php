<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>
<?php
Class Property{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


/* Admin All property view process*/
	
	public function getAllProperty(){
		$query = "SELECT tbl_ad.*, tbl_category.catName FROM tbl_ad INNER JOIN tbl_category ON tbl_ad.catId = tbl_category.catId ORDER BY tbl_ad.adDate DESC";
		$result = $this->db->select($query);
		return $result;
	}


/* Home page property view process*/
	
	public function getAllPropertyByRange(){
		$query = "SELECT tbl_ad.*, tbl_category.catName FROM tbl_ad INNER JOIN tbl_category ON tbl_ad.catId = tbl_category.catId WHERE tbl_ad.adStatus = '1' ORDER BY tbl_ad.adDate DESC LIMIT 10";
		$result = $this->db->select($query);
		return $result;
	}
	
	
/* Property approve & publish process*/

	function approveProperty($approveId){
		$approveId = $this->fm->validation(mysqli_real_escape_string($this->db->link, $approveId));
		
		$query = "UPDATE tbl_ad
				  SET
				  adStatus = '1' WHERE
				  adId     = '$approveId'";
		$adupdate = $this->db->update($query);
		if($adupdate){
			$msg = "<div class='alert alert_success'>Ad approved successfully!</div>";
			return $msg;
		} else{
			$msg = "<div class='alert alert_success'>Something went wrong!</div>";
			return $msg;
		}
	}
	
	
/* View single property process*/
	
	public function getPropertyById($adId){
		$adId = $this->fm->validation(mysqli_real_escape_string($this->db->link, $adId));
		
		$query = "SELECT tbl_ad.*, tbl_user.firstName, tbl_user.lastName, tbl_category.catName FROM tbl_ad INNER JOIN tbl_user ON tbl_ad.userId = tbl_user.userId INNER JOIN tbl_category ON tbl_ad.catId = tbl_category.catId WHERE tbl_ad.adId = '$adId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	
/* View property image process*/
		
	public function getPropertyImage($adId){
		$adId = $this->fm->validation(mysqli_real_escape_string($this->db->link, $adId));
		
		$query = "SELECT * FROM tbl_adimg WHERE adId = '$adId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	
/*Property update process */
	
	public function propertyUpdate($adId, $data, $files){
		$adId = mysqli_real_escape_string($this->db->link, $this->fm->validation($adId));
		
		$adTitle = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adtitle']));
		
		$catId = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['catid']));
		
		$adDate = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['addate']));
		
		$builtYear = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['builtyear']));
		
		$adDetails = mysqli_real_escape_string($this->db->link, $data['addetails']);
		
		$adAddress = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adaddress']));
		
		$adArea = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adarea']));
		
		$adSize = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adsize']));
		
		$totalFloor = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalfloor']));
		
		$totalUnit = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalunit']));
		
		$totalRoom = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalroom']));
		
		$totalBed = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalbed']));
		
		$totalBath = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalbath']));
		
		$attachBath = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['attachbath']));
		
		$commonBath = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['commonbath']));
		
		$totalBalcony = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalbalcony']));
		
		$floorNo = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['floorno']));
		
		$floorType = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['floortype']));
		
		$prefferedRenter = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['prefferedrenter']));
		
		$liftElevetor = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['liftelevetor']));
		
		$adGenerator = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adgenerator']));
		
		$adWifi = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adwifi']));
		
		$carParking = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['carparking']));
		
		$openSpace = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['openspace']));
		
		$playGround = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['playground']));
		
		$ccTV = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['cctv']));
		
		$sGuard = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['sguard']));
		
		$rentType = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['renttype']));
		
		$adRent = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adrent']));
		
		$gasBill = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['gasbill']));
		
		$eBillType = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['ebilltype']));
		
		$electricBill = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['electricbill']));
		
		$sCharge = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['scharge']));
		
		if(isset($data['adnegotiable'])){
			$adNegotiable = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adnegotiable']));
		} else{
			$adNegotiable = "";
		}
		
		if(isset($files['adimg']['tmp_name'])){
			foreach($files['adimg']['tmp_name'] as $key => $value){
				$file_name = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['adimg']['name'][$key]));
			}
		}
		
		if(empty($adTitle) || empty($catId) || empty($adDate) || empty($builtYear) || empty($adDetails) || empty($adAddress) || empty($adArea) || empty($adSize) || empty($totalFloor) || empty($totalUnit) || empty($totalRoom) || empty($totalBed) || empty($totalBath) || empty($floorNo) || empty($floorType) || empty($prefferedRenter) || empty($liftElevetor) || empty($adGenerator) || empty($adWifi) || empty($carParking) || empty($openSpace) || empty($playGround) || empty($ccTV) || empty($sGuard) || empty($rentType) || empty($adRent) || empty($gasBill) || empty($eBillType) || empty($electricBill) || empty($sCharge)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
		} else{
			if(empty($file_name)){
				$query = "UPDATE tbl_ad
				  SET
				  adTitle      = '$adTitle',
				  catId        = '$catId',
				  adDate 	   = '$adDate',
				  builtYear    = '$builtYear',
				  adDetails    = '$adDetails',
				  adArea   	   = '$adArea',
				  adAddress    = '$adAddress',
				  adSize	   = '$adSize',
				  totalFloor   = '$totalFloor',
				  totalUnit    = '$totalUnit',
				  totalRoom    = '$totalRoom',
				  totalBed     = '$totalBed',
				  totalBath    = '$totalBath',
				  attachBath   = '$attachBath',
				  commonBath   = '$commonBath',
				  totalBelcony = '$totalBalcony',
				  floorNo 	   = '$floorNo',
				  floorType    = '$floorType',
				  prefferedRenter = '$prefferedRenter',
				  liftElevetor = '$liftElevetor',
				  adGenerator  = '$adGenerator',
				  adWifi 	   = '$adWifi',
				  carParking   = '$carParking',
				  openSpace    = '$openSpace',
				  playGround   = '$playGround',
				  ccTV   	   = '$ccTV',
				  sGuard   	   = '$sGuard',
				  rentType     = '$rentType',
				  adRent   	   = '$adRent',
				  gasBill      = '$gasBill',
				  electricBill = '$electricBill',
				  eBillType    = '$eBillType',
				  sCharge 	   = '$sCharge',
				  adNegotiable = '$adNegotiable' WHERE
				  adId   	   = '$adId'";
				$adupdate = $this->db->update($query);
				
				if($adupdate){
				$msg = "<div class='alert alert_success'>Ad updated successfully</div>";
				return $msg;
				} else{
					$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
					return $msg;
				}
			} else{
				foreach($files['adimg']['tmp_name'] as $key => $value){
					$file_name = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['adimg']['name'][$key]));
		
					$file_size = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['adimg']['size'][$key]));
				
					$file_temp = $files['adimg']['tmp_name'][$key];
		
					$permited = array('jpg', 'jpeg', 'png');
					$div = explode('.', $file_name);
					$file_ext = strtolower(end($div));
					$unique_image = $div[0].substr(md5(time()), 0, 5).'.'.$file_ext;
					$uploaded_image = "uploads/ad_image/".$unique_image;
			
					if(in_array($file_ext, $permited) === false){
						$msg = "<div class='alert alert_danger'>You can upload only:-".implode(', ', $permited)." type image</div>";
						return $msg;
					} else{
							move_uploaded_file($file_temp, "../".$uploaded_image);
								
							$insertimgquery = "INSERT INTO tbl_adimg(adId, adImg) VALUES('$adId', '$uploaded_image')";
							$adimginsert = $this->db->insert($insertimgquery);
						}
						
					}
				$query = "UPDATE tbl_ad
				  SET
				  adTitle      = '$adTitle',
				  catId        = '$catId',
				  adDate 	   = '$adDate',
				  builtYear    = '$builtYear',
				  adDetails    = '$adDetails',
				  adArea   	   = '$adArea',
				  adAddress    = '$adAddress',
				  adSize	   = '$adSize',
				  totalFloor   = '$totalFloor',
				  totalUnit    = '$totalUnit',
				  totalRoom    = '$totalRoom',
				  totalBed     = '$totalBed',
				  totalBath    = '$totalBath',
				  attachBath   = '$attachBath',
				  commonBath   = '$commonBath',
				  totalBelcony = '$totalBalcony',
				  floorNo 	   = '$floorNo',
				  floorType    = '$floorType',
				  prefferedRenter = '$prefferedRenter',
				  liftElevetor = '$liftElevetor',
				  adGenerator  = '$adGenerator',
				  adWifi 	   = '$adWifi',
				  carParking   = '$carParking',
				  openSpace    = '$openSpace',
				  playGround   = '$playGround',
				  ccTV   	   = '$ccTV',
				  sGuard   	   = '$sGuard',
				  rentType     = '$rentType',
				  adRent   	   = '$adRent',
				  gasBill      = '$gasBill',
				  electricBill = '$electricBill',
				  eBillType    = '$eBillType',
				  sCharge 	   = '$sCharge',
				  adNegotiable = '$adNegotiable' WHERE
				  adId   	   = '$adId'";
				$adupdate = $this->db->update($query);
				
				if($adupdate){
				$msg = "<div class='alert alert_success'>Ad updated successfully</div>";
				return $msg;
				} else{
					$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
					return $msg;
				}
				
			}
		}
	}
	

/* Property submit process*/
	
	public function propertyInsert($data, $files){
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation(Session::get("userId")));
		
		$adTitle = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adtitle']));
		
		$catId = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['catid']));
		
		$adDate = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['addate']));
		
		$builtYear = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['builtyear']));
		
		$adDetails = mysqli_real_escape_string($this->db->link, $data['addetails']);
		
		$adAddress = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adaddress']));
		
		$adArea = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adarea']));
		
		$adSize = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adsize']));
		
		$totalFloor = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalfloor']));
		
		$totalUnit = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalunit']));
		
		$totalRoom = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalroom']));
		
		$totalBed = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalbed']));
		
		$totalBath = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalbath']));
		
		$attachBath = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['attachbath']));
		
		$commonBath = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['commonbath']));
		
		$totalBalcony = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalbalcony']));
		
		$floorNo = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['floorno']));
		
		$floorType = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['floortype']));
		
		$prefferedRenter = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['prefferedrenter']));
		
		$liftElevetor = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['liftelevetor']));
		
		$adGenerator = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adgenerator']));
		
		$adWifi = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adwifi']));
		
		$carParking = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['carparking']));
		
		$openSpace = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['openspace']));
		
		$playGround = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['playground']));
		
		$ccTV = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['cctv']));
		
		$sGuard = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['sguard']));
		
		$rentType = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['renttype']));
		
		$adRent = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adrent']));
		
		$gasBill = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['gasbill']));
		
		$eBillType = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['ebilltype']));
		
		$electricBill = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['electricbill']));
		
		$sCharge = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['scharge']));
		
		if(isset($data['adnegotiable'])){
			$adNegotiable = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adnegotiable']));
		} else{
			$adNegotiable = "";
		}
		
		$file_name = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['adimg']['name']));
		
		$file_size = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['adimg']['size']));
				
		$file_temp = $files['adimg']['tmp_name'];
		
		if(!empty($file_name)){
			$permited = array('jpg', 'jpeg', 'png');
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/ad_image/".$unique_image;
		}
		
		if(empty($adTitle) || empty($catId) || empty($adDate) || empty($builtYear) || empty($adDetails) || empty($adAddress) || empty($adArea) || empty($adSize) || empty($totalFloor) || empty($totalUnit) || empty($totalRoom) || empty($totalBed) || empty($totalBath) || empty($floorNo) || empty($floorType) || empty($prefferedRenter) || empty($liftElevetor) || empty($adGenerator) || empty($adWifi) || empty($carParking) || empty($openSpace) || empty($playGround) || empty($ccTV) || empty($sGuard) || empty($rentType) || empty($adRent) || empty($gasBill) || empty($eBillType) || empty($electricBill) || empty($sCharge) || empty($file_name)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
			
		} else{
			move_uploaded_file($file_temp, "../".$uploaded_image);
								
			$query = "INSERT INTO tbl_ad(adTitle, adImg, catId, adDate, builtYear, adDetails, adArea, adAddress, adSize, totalFloor, totalUnit, totalRoom, totalBed, totalBath, attachBath, commonBath, totalBelcony, floorNo, floorType, prefferedRenter, liftElevetor, adGenerator, adWifi, carParking, openSpace, playGround, ccTV, sGuard, rentType, adRent, gasBill, electricBill, eBillType, sCharge, adNegotiable, userId) VALUES('$adTitle', '$uploaded_image', '$catId', '$adDate', '$builtYear', '$adDetails', '$adArea', '$adAddress', '$adSize', '$totalFloor', '$totalUnit', '$totalRoom', '$totalBed', '$totalBath', '$attachBath', '$commonBath', '$totalBalcony', '$floorNo', '$floorType', '$prefferedRenter', '$liftElevetor', '$adGenerator', '$adWifi', '$carParking', '$openSpace', '$playGround', '$ccTV', '$sGuard', '$rentType', '$adRent', '$gasBill', '$electricBill', '$eBillType', '$sCharge', '$adNegotiable', '$userId')";
			$result = $this->db->insert($query);
			if($result){
			$msg = "<div class='alert alert_success'>Ad submited successfully!</div>";
			return $msg;
			} else{
				$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
				return $msg;
			}
		}
	}
	
	
/*Property image delete process */

	function deleteAdImage($delImg){
		$delImg = mysqli_real_escape_string($this->db->link, $this->fm->validation($delImg));
		
		$query = "DELETE FROM tbl_adimg WHERE imgId = '$delImg'";
		$deldata = $this->db->delete($query);
		if($deldata){
			$msg = "<div class='alert alert_success'>Ad image deleted successfully!</div>";
			return $msg;
		} else{
			$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
			return $msg;
		}
	}
	
	
/*Property removal process*/
	
	public function deletePropertyById($delAdId){
		$delAdId = $this->fm->validation(mysqli_real_escape_string($this->db->link, $delAdId));
		
		$query = "DELETE FROM tbl_ad WHERE adId = '$delAdId'";
		$deldata = $this->db->delete($query);
		if($deldata){
			$msg = "<div class='alert alert_success'>Ad deleted successfully!</div>";
			return $msg;
		} else{
			$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
			return $msg;
		}
	}
	
	
/*View individual property process*/
		
	public function propertyByUser($userId){
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation($userId));
		
		$query = "SELECT tbl_ad.*, tbl_category.catName FROM tbl_ad INNER JOIN tbl_category ON tbl_ad.catId = tbl_category.catId WHERE tbl_ad.userId = '$userId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	
/*View recent property process*/
		
	public function recentProperty(){
		$query = "SELECT adId, adTitle, adDate, adImg FROM tbl_ad WHERE adStatus = '1' ORDER BY adDate DESC LIMIT 3";
		$result = $this->db->select($query);
		return $result;
	}	
	
	
/*Get wishlist process*/
		
	public function getWishlist(){
		$query = "SELECT * FROM tbl_wishlist";
		$result = $this->db->select($query);
		return $result;
	}	

	
/*Ad search process */

	function getFilterAd($data){
		$adArea = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adarea']));
		
		$catId = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['catid']));
		
		$totalBed = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['totalbed']));
		
		$price = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['price']));
		
	/*=============QUERY SHORTCUT==============*/	
		$where = '';
		$status = " AND tbl_ad.adStatus = '1'";
		
		$area =  " tbl_ad.adArea LIKE '%$adArea%'";
		
		$category = " tbl_ad.catId = $catId";
		
		$bed_range1 = " tbl_ad.totalBed = $totalBed";
		$bed_range2 = " tbl_ad.totalBed > 3";
		
		$priceL10   = " tbl_ad.adRent < 10000";
		$price10_20 = " tbl_ad.adRent BETWEEN 10000 AND 20000";
		$price20_30 = " tbl_ad.adRent BETWEEN 20000 AND 30000";
		$price30_40 = " tbl_ad.adRent BETWEEN 30000 AND 40000";
		$price40_50 = " tbl_ad.adRent BETWEEN 40000 AND 50000";
		$priceG50   = " tbl_ad.adRent >= 50000";
	/*=============QUERY SHORTCUT==============*/
	
	/*==========Filter By AREA============*/	
		if(!empty($adArea)){
			$where = " WHERE".$area;
		}
	/*==========Filter By TYPE============*/
		if(!empty($catId)){
			$where = " WHERE".$category;
		}
	/*==========Filter By BED============*/
		if(!empty($totalBed)){
			if($totalBed != '3+'){
				$where = " WHERE".$bed_range1;
			} else{
				$where = " WHERE".$bed_range2;
			}
		}
	/*==========Filter By PRICE============*/
		if(!empty($price)){
			if($price == '10-'){
				$where = " WHERE".$priceL10;
			} elseif($price == '10'){
				$where = " WHERE".$price10_20;
			} elseif($price == '20'){
				$where = " WHERE".$price20_30;
			} elseif($price == '30'){
				$where = " WHERE".$price30_40;
			} elseif($price == '40'){
				$where = " WHERE".$price40_50;
			} else{
				$where = " WHERE".$priceG50;
			}
		}
		
	/*==========Filter By AREA & TYPE============*/
		if(!empty($adArea) && !empty($catId)){
			$where = " WHERE".$area." AND".$category;
		}
		
	/*==========Filter By AREA & BED============*/
		if(!empty($adArea) && !empty($totalBed)){
			if($totalBed != '3+'){
				$where = " WHERE".$area." AND".$bed_range1;
			} else{
				$where = " WHERE".$area." AND".$bed_range2;
			}
		}
		
	/*==========Filter By AREA & PRICE============*/
		if(!empty($adArea) && !empty($price)){
			if($price == '10-'){
				$where = " WHERE".$area." AND".$priceL10;
			} elseif($price == '10'){
				$where = " WHERE".$area." AND".$price10_20;
			} elseif($price == '20'){
				$where = " WHERE".$area." AND".$price20_30;
			} elseif($price == '30'){
				$where = " WHERE".$area." AND".$price30_40;
			} elseif($price == '40'){
				$where = " WHERE".$area." AND".$price40_50;
			} else{
				$where = " WHERE".$area." AND".$priceG50;
			}
		}
		
	/*==========Filter By TYPE & BED============*/
		if(!empty($catId) && !empty($totalBed)){
			if($totalBed != '3+'){
				$where = " WHERE".$category." AND".$bed_range1;
			} else{
				$where = " WHERE".$category." AND".$bed_range2;
			}
		}
		
	/*==========Filter By TYPE & PRICE============*/
		if(!empty($catId) && !empty($price)){
			if($price == '10-'){
				$where = " WHERE".$category." AND".$priceL10;
			} elseif($price == '10'){
				$where = " WHERE".$category." AND".$price10_20;
			} elseif($price == '20'){
				$where = " WHERE".$category." AND".$price20_30;
			} elseif($price == '30'){
				$where = " WHERE".$category." AND".$price30_40;
			} elseif($price == '40'){
				$where = " WHERE".$category." AND".$price40_50;
			} else{
				$where = " WHERE".$category." AND".$priceG50;
			}
		}
		
	/*==========Filter By BED & PRICE============*/
		if(!empty($totalBed) && !empty($price)){
			if($totalBed != '3+'){
				if($price == '10-'){
					$where = " WHERE".$bed_range1." AND".$priceL10;
				} elseif($price == '10'){
					$where = " WHERE".$bed_range1." AND".$price10_20;
				} elseif($price == '20'){
					$where = " WHERE".$bed_range1." AND".$price20_30;
				} elseif($price == '30'){
					$where = " WHERE".$bed_range1." AND".$price30_40;
				} elseif($price == '40'){
					$where = " WHERE".$bed_range1." AND".$price40_50;
				} else{
					$where = " WHERE".$bed_range1." AND".$priceG50;
				}
				
			} else{
				if($price == '10-'){
					$where = " WHERE".$bed_range2." AND".$priceL10;
				} elseif($price == '10'){
					$where = " WHERE".$bed_range2." AND".$price10_20;
				} elseif($price == '20'){
					$where = " WHERE".$bed_range2." AND".$price20_30;
				} elseif($price == '30'){
					$where = " WHERE".$bed_range2." AND".$price30_40;
				} elseif($price == '40'){
					$where = " WHERE".$bed_range2." AND".$price40_50;
				} else{
					$where = " WHERE".$bed_range2." AND".$priceG50;
				}
			}
		}
	
	/*=========Filter By AREA & TYPE & BED===========*/
		if(!empty($adArea) && !empty($catId) && !empty($totalBed)){
			if($totalBed != '3+'){
				$where = " WHERE".$area." AND".$category." AND".$bed_range1;
			} else{
				$where = " WHERE".$area." AND".$category." AND".$bed_range2;
			}
		}
		
	/*=======Filter By AREA & TYPE & PRICE========*/
		if(!empty($adArea) && !empty($catId) && !empty($price)){
			if($price == '10-'){
				$where = " WHERE".$area." AND".$category." AND".$priceL10;
			} elseif($price == '10'){
				$where = " WHERE".$area." AND".$category." AND".$price10_20;
			} elseif($price == '20'){
				$where = " WHERE".$area." AND".$category." AND".$price20_30;
			} elseif($price == '30'){
				$where = " WHERE".$area." AND".$category." AND".$price30_40;
			} elseif($price == '40'){
				$where = " WHERE".$area." AND".$category." AND".$price40_50;
			} else{
				$where = " WHERE".$area." AND".$category." AND".$priceG50;
			}
		}
		
	/*=======Filter By AREA & BED & PRICE========*/
		if(!empty($adArea) && !empty($totalBed) && !empty($price)){
			if($totalBed != '3+'){
				if($price == '10-'){
					$where = " WHERE".$area." AND".$bed_range1." AND".$priceL10;
				} elseif($price == '10'){
					$where = " WHERE".$area." AND".$bed_range1." AND".$price10_20;
				} elseif($price == '20'){
					$where = " WHERE".$area." AND".$bed_range1." AND".$price20_30;
				} elseif($price == '30'){
					$where = " WHERE".$area." AND".$bed_range1." AND".$price30_40;
				} elseif($price == '40'){
					$where = " WHERE".$area." AND".$bed_range1." AND".$price40_50;
				} else{
					$where = " WHERE".$area." AND".$bed_range1." AND".$priceG50;
				}
			} else{
				if($price == '10-'){
					$where = " WHERE".$area." AND".$bed_range2." AND".$priceL10;
				} elseif($price == '10'){
					$where = " WHERE".$area." AND".$bed_range2." AND".$price10_20;
				} elseif($price == '20'){
					$where = " WHERE".$area." AND".$bed_range2." AND".$price20_30;
				} elseif($price == '30'){
					$where = " WHERE".$area." AND".$bed_range2." AND".$price30_40;
				} elseif($price == '40'){
					$where = " WHERE".$area." AND".$bed_range2." AND".$price40_50;
				} else{
					$where = " WHERE".$area." AND".$bed_range2." AND".$priceG50;
				}
			}
		}
		
	/*=======Filter By TYPE & BED & PRICE========*/
		if(!empty($catId) && !empty($totalBed) && !empty($price)){
			if($totalBed != '3+'){
				if($price == '10-'){
					$where = " WHERE".$category." AND".$bed_range1." AND".$priceL10;
				} elseif($price == '10'){
					$where = " WHERE".$category." AND".$bed_range1." AND".$price10_20;
				} elseif($price == '20'){
					$where = " WHERE".$category." AND".$bed_range1." AND".$price20_30;
				} elseif($price == '30'){
					$where = " WHERE".$category." AND".$bed_range1." AND".$price30_40;
				} elseif($price == '40'){
					$where = " WHERE".$category." AND".$bed_range1." AND".$price40_50;
				} else{
					$where = " WHERE".$category." AND".$bed_range1." AND".$priceG50;
				}
			} else{
				if($price == '10-'){
					$where = " WHERE".$category." AND".$bed_range2." AND".$priceL10;
				} elseif($price == '10'){
					$where = " WHERE".$category." AND".$bed_range2." AND".$price10_20;
				} elseif($price == '20'){
					$where = " WHERE".$category." AND".$bed_range2." AND".$price20_30;
				} elseif($price == '30'){
					$where = " WHERE".$category." AND".$bed_range2." AND".$price30_40;
				} elseif($price == '40'){
					$where = " WHERE".$category." AND".$bed_range2." AND".$price40_50;
				} else{
					$where = " WHERE".$category." AND".$bed_range2." AND".$priceG50;
				}
			}
		}
		
	/*=====Filter By AREA & TYPE & BED & PRICE=======*/
		if(!empty($adArea) && !empty($catId) && !empty($totalBed) && !empty($price)){
			if($totalBed != '3+'){
				if($price == '10-'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range1." AND".$priceL10;
				} elseif($price == '10'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range1." AND".$price10_20;
				} elseif($price == '20'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range1." AND".$price20_30;
				} elseif($price == '30'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range1." AND".$price30_40;
				} elseif($price == '40'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range1." AND".$price40_50;
				} else{
					$where = " WHERE".$area." AND".$category." AND".$bed_range1." AND".$priceG50;
				}
			} else{
				if($price == '10-'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range2." AND".$priceL10;
				} elseif($price == '10'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range2." AND".$price10_20;
				} elseif($price == '20'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range2." AND".$price20_30;
				} elseif($price == '30'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range2." AND".$price30_40;
				} elseif($price == '40'){
					$where = " WHERE".$area." AND".$category." AND".$bed_range2." AND".$price40_50;
				} else{
					$where = " WHERE".$area." AND".$category." AND".$bed_range2." AND".$priceG50;
				}
			}
		}
		
		$query = "SELECT tbl_ad.*, tbl_category.catName FROM tbl_ad INNER JOIN tbl_category ON tbl_category.catId = tbl_ad.catId".$where.$status;
		$result = $this->db->select($query);
		return $result;
	}
	
	
/*Ad Pagination process */

	function getPropertyRows(){
		$query = "SELECT * FROM tbl_ad WHERE adStatus = '1'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}
	
	
/*View poperty by pagination process*/

	public function getPropertyByPage($start_from, $per_page){
		$query = "SELECT tbl_ad.*, tbl_category.catName FROM tbl_ad INNER JOIN tbl_category ON tbl_ad.catId = tbl_category.catId WHERE tbl_ad.adStatus = '1' ORDER BY tbl_ad.adDate DESC LIMIT $start_from, $per_page";
		$result = $this->db->select($query);
		return $result;
	}
	
	
/*View property by category process */
	
	public function getAdByCategory($start_from, $per_page, $catId){
		$catId = mysqli_real_escape_string($this->db->link, $catId);
		
		$query = "SELECT tbl_ad.*, tbl_category.catName FROM tbl_ad INNER JOIN tbl_category ON tbl_ad.catId = tbl_category.catId WHERE tbl_ad.catId = '$catId' AND tbl_ad.adStatus = '1' ORDER BY tbl_ad.adDate LIMIT $start_from, $per_page";
		$result = $this->db->select($query);
		return $result;
	}
	
	
	public function addToWishlist($wlistId, $loginId){
		$wlistId = mysqli_real_escape_string($this->db->link, $this->fm->validation($wlistId));
		
		$loginId = mysqli_real_escape_string($this->db->link, $this->fm->validation($loginId));
		
		$query = "SELECT * FROM tbl_ad WHERE adId = '$wlistId'";
		$result = $this->db->select($query)->fetch_assoc();
		
		if($result){
			$adId     = $result['adId'];
			$catId    = $result['catId'];
			$adStatus = $result['adStatus'];
			
			$chkquery = "SELECT * FROM tbl_wishlist WHERE adId='$adId' AND userId = '$loginId'";
			$chkWlist = $this->db->select($chkquery);
			if($chkWlist){
				$msg = "<div class='alert alert_danger' style='margin-top:1em;'>Already added!</div>";
				return $msg;
			} else{
				$query = "INSERT INTO tbl_wishlist(adId, catId, userId, adStatus) VALUES('$adId', '$catId', '$loginId', '$adStatus')";
				$wishlist = $this->db->insert($query);
				if($wishlist){
					$msg = "<div class='alert alert_success' style='margin-top:1em;'>Added to wishlist</div>";
					return $msg;
					header("Location:wishlist.php");
				} else{
					$msg = "<div class='alert alert_danger' style='margin-top:1em;'>Something went wrong!</span>";
					return $msg;
				}
			}
		}
	}
	
	
/*View individual wishlist process */
	
	public function getWlistAdById($userId, $start_from, $per_page){
		$userId = mysqli_real_escape_string($this->db->link, $userId);
		
		$query = "SELECT tbl_wishlist.*, tbl_ad.* , tbl_category.catName FROM tbl_wishlist INNER JOIN tbl_ad ON tbl_wishlist.adId = tbl_ad.adId INNER JOIN tbl_category ON tbl_wishlist.catId = tbl_category.catId WHERE tbl_wishlist.userId = '$userId' ORDER BY tbl_wishlist.wlistId DESC LIMIT $start_from, $per_page";
		$result = $this->db->select($query);
		return $result;
	}
	

/*Delete wishlist ad process */
	
	public function delWishlistData($userId, $delWlistId){
		$userId = mysqli_real_escape_string($this->db->link, $userId);
		
		$delWlistId = mysqli_real_escape_string($this->db->link, $delWlistId);
		
		$query = "DELETE FROM tbl_wishlist WHERE wlistId = '$delWlistId' AND userId = '$userId'";
		$result = $this->db->delete($query);
		return $result;
	}
}
?>