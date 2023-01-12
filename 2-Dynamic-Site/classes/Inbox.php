<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
Class Inbox{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function notificationInsert($data){
		$brandName = mysqli_real_escape_string($this->db->link, $this->fm->validation($brandName));
		
		if(empty($brandName)){
			$msg = "Brand name must not be empty!";
			return $msg;
		} else{
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$brandinsert = $this->db->insert($query);
			if($brandinsert){
				$msg = "<span class='success'>Brand inserted successfully!</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Brand not inserted</span>";
				return $msg;
			}
		}
	}
	

/*View message list process*/
	
	public function getAllMessage(){
		$query = "SELECT * FROM tbl_message ORDER BY msgDate DESC";
		$result = $this->db->select($query);
		return $result;
	}


/*Delete message process*/
	
	public function delMessageById($msgId){
		$msgId = mysqli_real_escape_string($this->db->link, $this->fm->validation($msgId));
		
		$query = "DELETE FROM tbl_message WHERE msgId = '$msgId'";
		$deldata = $this->db->delete($query);
		if($deldata){
			$msg = "<div class='alert alert_success'>Message deleted successfully!</div>";
			return $msg;
		} else{
			$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
			return $msg;
		}
	}


/*View single message process*/
		
	public function getMessageById($msgId){
		$msgId = mysqli_real_escape_string($this->db->link, $this->fm->validation($msgId));
		
		$query = "SELECT * FROM tbl_message WHERE msgId = '$msgId'";
		return $result = $this->db->select($query);
	}
	
	
/*Reply message process */

	function replyMessage($to, $from, $subject, $msg){
		$to      = mysqli_real_escape_string($this->db->link, $this->fm->validation($to));
		
		$from    = mysqli_real_escape_string($this->db->link, $this->fm->validation($to));
		
		$subject = mysqli_real_escape_string($this->db->link, $this->fm->validation($to));
		
		$msg 	 = mysqli_real_escape_string($this->db->link, $this->fm->validation($to));
		
		$headers = "From: $from\n";
		
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		
		$headers .= 'Content-type: text/html; charset= iso-8859-1' . "\r\n";
		
		if(empty($to) || empty($from) || empty($subject) || empty($msg)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
		} else{
			$sendmail = mail($to, $subject, $msg, $headers);
			if($sendmail){
				$msg = "<div class='alert alert_success'>Message sent successfully</div>";
				return $msg;
			} else{
				$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
				return $msg;
			}
		}
	}
	

/*View new message process*/
		
	public function getNewMessage(){
		$query = "SELECT * FROM tbl_message WHERE msgStatus = '0'";
		$result = $this->db->select($query);
		return $result;
	}

	
/*Update new message process*/
	
	function updateMsgStatus(){
		$query = "UPDATE tbl_message
				  SET
				  msgStatus = '1' WHERE
				  msgStatus = '0'";
		return $updated_row = $this->db->update($query);
	}
	
	
/*Send message process */
	
	function sendMessage($data){
		$msgName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
		
		$msgEmail = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
		
		$msgPhone = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['phone']));
		
		$msgText = $data['message'];
		
		if(!filter_var($msgEmail, FILTER_VALIDATE_EMAIL)){
			$msg = "<div class='alert alert_danger style='margin-top:1em'>Error! Invalid email given</div>";
			return $msg;
		} else{
			$query = "INSERT INTO tbl_message(msgName, msgEmail, msgPhone, msgText) VALUES('$msgName', '$msgEmail', '$msgPhone', '$msgText')";
			$result = $this->db->insert($query);
			if($result){
				$msg = "<div class='alert alert_success' style='margin-top:1em'>Message sent</div>";
				return $msg;
			} else{
				$msg = "<div class='alert alert_danger style='margin-top:1em'>Error! Something went wrong</div>";
				return $msg;
			}
		}
	}
}
?>