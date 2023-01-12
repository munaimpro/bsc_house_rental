<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
Class Notification{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	
/*Send client message process*/
		
	public function notificationInsert($adId, $ownerId, $renterId, $data){
		$adId = mysqli_real_escape_string($this->db->link, $this->fm->validation($adId));
		
		$ownerId = mysqli_real_escape_string($this->db->link, $this->fm->validation($ownerId));
		
		$renterId = mysqli_real_escape_string($this->db->link, $this->fm->validation($renterId));
		
		$notfName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
		
		$notfEmail = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
		
		$notfPhone = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['phone']));
		
		$notfAddress = Session::get("userAddress");
		
		$notfMsg = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['message']));
		
		$notfAddress = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['address']));
		
		if(empty($adId) || empty($ownerId) || empty($renterId)){
			$msg = "<div class='alert alert_danger'>Error! Something went wrong</div>";
			return $msg;
		} elseif(!filter_var($notfEmail, FILTER_VALIDATE_EMAIL)){
			$msg = "<div class='alert alert_danger'>Error! Invalid email given</div>";
			return $msg;
		} else{
			$query = "INSERT INTO tbl_notification(notfName, notfEmail, notfPhone, notfAddress, notfMsg, renterId, ownerId, adId) VALUES('$notfName', '$notfEmail', '$notfPhone', '$notfAddress', '$notfMsg', '$renterId', '$ownerId', '$adId')";
			$notifinsert = $this->db->insert($query);
			if($notifinsert){
				$msg = "<div class='alert alert_success'>Message Sent</div>";
				return $msg;
			} else{
				$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
				return $msg;
			}
		}
	}
	

/*View notification process*/
	
	public function getAllNotification(){
		$query = "SELECT tbl_notification.*, tbl_ad.adImg FROM tbl_notification 
		INNER JOIN tbl_ad ON tbl_notification.adId = tbl_ad.adId 
		ORDER BY notfDate DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	
/*View new notification process*/
		
	public function getNewNotification(){
		$query = "SELECT * FROM tbl_notification WHERE notfStatus = '0'";
		$result = $this->db->select($query);
		return $result;
	}


/*Delete notification process*/
	
	public function delNotificationById($ntfId){
		$ntfId = mysqli_real_escape_string($this->db->link, $this->fm->validation($ntfId));
		
		$query = "DELETE FROM tbl_notification WHERE notfId = '$ntfId'";
		$deldata = $this->db->delete($query);
		if($deldata){
			$msg = "<div class='alert alert_success'>Notification deleted successfully!</div>";
			return $msg;
		} else{
			$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
			return $msg;
		}
	}


/*View single notification process*/
		
	public function getNotificationById($nftMsg){
		$nftMsg = mysqli_real_escape_string($this->db->link, $this->fm->validation($nftMsg));
		
		$query = "SELECT * FROM tbl_notification WHERE notfId = '$nftMsg'";
		return $result = $this->db->select($query);
	}
	
	
/*Update new notification process*/
	
	function updateNotifStatus(){
		$query = "UPDATE tbl_notification
				  SET
				  notfStatus = '1' WHERE
				  notfStatus = '0'";
		return $updated_row = $this->db->update($query);
	}
	
	
}
?>