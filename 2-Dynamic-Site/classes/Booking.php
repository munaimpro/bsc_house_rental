<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
Class Booking{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	
/*Book Property process*/
	
	public function bookProperty($renterId, $ownerId, $adId, $nftId, $data){
		$adId = mysqli_real_escape_string($this->db->link, $this->fm->validation($adId));
		
		$renterId = mysqli_real_escape_string($this->db->link, $this->fm->validation($renterId));
		
		$ownerId = mysqli_real_escape_string($this->db->link, $this->fm->validation($ownerId));
		
		$nftId = mysqli_real_escape_string($this->db->link, $this->fm->validation($nftId));
		
		$renterName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['rname']));
		
		$renterMail = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['rmail']));
		
		$renterPhone = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['rphone']));
		
		$renterAddress = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['raddress']));
		
		$rentType = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['renttype']));
		
		$adRent = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['adrent']));
		
		$gasBill = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['gasbill']));
		
		$electricBill = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['electricbill']));
		
		$sCharge = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['scharge']));
		
		if(empty($adId) || empty($renterId) || empty($ownerId) || empty($nftId) || empty($renterName) || empty($renterMail) || empty($renterPhone) || empty($renterAddress) || empty($rentType) || empty($adRent) || empty($gasBill) || empty($electricBill) || empty($sCharge)){
			$msg = "<div class='alert alert_danger'>Error! Field must not be empty</div>";
			return $msg;
		} else{
			$query = "INSERT INTO tbl_booking(adId, renterId, renterName, renterMail, renterPhone, renterAddress, ownerId, rentType, adRent, gasBill, electricBill, sCharge) VALUES('$adId', '$renterId', '$renterName', '$renterMail', '$renterPhone', '$renterAddress', '$ownerId', '$rentType', '$adRent', '$gasBill', '$electricBill', '$sCharge')";
			$booked = $this->db->insert($query);
			
			if($booked){
				$updquery = "UPDATE tbl_ad
							 SET
							 adStatus = '2' WHERE
							 adId	  = '$adId'";
				$updstatus = $this->db->update($updquery);
				
				if($updstatus){
					$delquery = "DELETE FROM tbl_notification WHERE notfId = '$nftId' AND adId = '$adId'";
					$delnotf = $this->db->delete($delquery);
				}
			}
			
			if($booked && $updstatus && $delnotf){
				return $msg = "<div class='alert alert_success'>Property booked successfuly!</div>";
			} else{
				return $msg = "<div class='alert alert_danger'>Something went wrong!</div>";
			}
		}
	}


/*Cancel booking process */

	function cancelBooking($renterId, $ownerId, $adId){
		$adId = mysqli_real_escape_string($this->db->link, $this->fm->validation($adId));
		
		$renterId = mysqli_real_escape_string($this->db->link, $this->fm->validation($renterId));
		
		$ownerId = mysqli_real_escape_string($this->db->link, $this->fm->validation($ownerId));
		
		if(empty($adId) || empty($renterId) || empty($ownerId)){
			$msg = "<div class='alert alert_danger'>Error! Data not found</div>";
			return $msg;
		} else{
			$delquery = "DELETE FROM tbl_booking WHERE adId = '$adId' AND renterId = '$renterId' AND ownerId = '$ownerId'";
			$delbooking = $this->db->delete($delquery);
			
			if($delbooking){
				$updquery = "UPDATE tbl_ad
							 SET
							 adStatus = '1' WHERE
							 adId	  = '$adId' AND
							 userId	  = '$ownerId'";
				$updstatus = $this->db->update($updquery);
			}
			
			if($delbooking && $updstatus){
				return $msg = "<div class='alert alert_success'>Booking canceled successfuly!</div>";
			} else{
				return $msg = "<div class='alert alert_danger'>Something went wrong!</div>";
			}
		}
	}
	
	
/*View Booked Property process */
	
	function getBookedPropertyById($adId, $renterId, $ownerId){
		$adId = mysqli_real_escape_string($this->db->link, $this->fm->validation($adId));
		
		$renterId = mysqli_real_escape_string($this->db->link, $this->fm->validation($renterId));
		
		$ownerId = mysqli_real_escape_string($this->db->link, $this->fm->validation($ownerId));
		
		$query = "SELECT rentType, adRent, gasBill, electricBill, sCharge FROM tbl_booking
		WHERE renterId = '$renterId' AND ownerId = '$ownerId' AND adId = '$adId'";
		return $result = $this->db->select($query);
	}
	
	
/*View rentar information process (Before booking)*/
		
	public function getRenterInfo($renterId, $nftId){
		$renterId = mysqli_real_escape_string($this->db->link, $this->fm->validation($renterId));
		
		$nftId = mysqli_real_escape_string($this->db->link, $this->fm->validation($nftId));
		
		$query = "SELECT * FROM tbl_notification
		WHERE renterId = '$renterId' AND notfId = '$nftId'";
		return $result = $this->db->select($query);
	}

	
/*View owner information process*/
		
	public function getOwnerInfo($ownerId){
		$ownerId = mysqli_real_escape_string($this->db->link, $this->fm->validation($ownerId));
		
		$query = "SELECT * FROM tbl_user
		WHERE userId = '$ownerId'";
		return $result = $this->db->select($query);
	}
	
	
/*View booking list process*/
		
	public function getBookingList(){		
		$query = "SELECT tbl_booking.*, tbl_ad.adId, tbl_ad.adTitle, tbl_ad.adImg, tbl_ad.catId, tbl_category.catName FROM tbl_booking INNER JOIN tbl_ad ON tbl_booking.adId = tbl_ad.adId INNER JOIN tbl_category ON tbl_ad.catId = tbl_category.catId";
		return $result = $this->db->select($query);
	}


/*View booking renter details process*/
	
	function getBookingRenter($renterId, $ownerId, $adId){
		$renterId = mysqli_real_escape_string($this->db->link, $this->fm->validation($renterId));
		
		$ownerId = mysqli_real_escape_string($this->db->link, $this->fm->validation($ownerId));
		
		$adId = mysqli_real_escape_string($this->db->link, $this->fm->validation($adId));
		
		$query = "SELECT renterName, renterMail, renterPhone, renterAddress FROM tbl_booking WHERE adId = '$adId' AND renterId = '$renterId' AND ownerId = '$ownerId'";
		return $result = $this->db->select($query);
	}
	
	
/*View individual booking list process*/
		
	public function getBookingListById($userId){	
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation($userId));
			
		$query = "SELECT tbl_booking.*, tbl_ad.adId, tbl_ad.adTitle, tbl_ad.adImg, tbl_ad.catId, tbl_category.catName FROM tbl_booking INNER JOIN tbl_ad ON tbl_booking.adId = tbl_ad.adId INNER JOIN tbl_category ON tbl_ad.catId = tbl_category.catId WHERE tbl_booking.ownerId = '$userId'";
		return $result = $this->db->select($query);
	}
	

/*View new booking process*/
		
	public function getNewBooking($userId){
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation($userId));
		
		$query = "SELECT * FROM tbl_booking WHERE ownerId = '$userId' AND bookingStatus = '0'";
		$result = $this->db->select($query);
		return $result;
	}

	
/*Update new booking process*/
	
	function updateBookingStatus($userId){
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation($userId));
		
		$query = "UPDATE tbl_booking
				  SET
				  bookingStatus = '1' WHERE
				  bookingStatus = '0' AND
				  ownerId		= '$userId'";
		return $updated_row = $this->db->update($query);
	}
	
		
}
?>