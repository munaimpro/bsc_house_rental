<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
Class Dashboard{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


/*View total ads */
	
	function getAllAd(){
		$query = "SELECT * FROM tbl_ad";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
		
	}


/*View pending ads */
	
	function pendingAd(){
		$query = "SELECT * FROM tbl_ad WHERE adStatus = '0'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
		
	}


/*View published ads */
	
	function publishedAd(){
		$query = "SELECT * FROM tbl_ad WHERE adStatus = '1'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}


/*View booked ads */
	
	function angagedAd(){
		$query = "SELECT * FROM tbl_ad WHERE adStatus = '2'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}


/*View total category */
	
	function getAllCat(){
		$query = "SELECT * FROM tbl_category";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}


/*View total user */
	
	function getAllUser(){
		$query = "SELECT * FROM tbl_user";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}


/*View total owner */
	
	function getAllOwner(){
		$query = "SELECT * FROM tbl_user WHERE userLevel = 2";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}
	

/*View total tenant */
	
	function getAllTenant(){
		$query = "SELECT * FROM tbl_user WHERE userLevel = '1'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}


/*View total notification */
	
	function getAllNotification(){
		$query = "SELECT * FROM tbl_notification";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}
	
	
	
	
/*View total individual ads */
	
	function getAllAdById($userId){
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation($userId));
		
		$query = "SELECT * FROM tbl_ad WHERE userId = '$userId'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
		
	}


/*View pending individual ads */
	
	function pendingAdById($userId){
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation($userId));
		
		$query = "SELECT * FROM tbl_ad WHERE adStatus = '0' AND userId = '$userId'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
		
	}


/*View published individual ads */
	
	function publishedAdById($userId){
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation($userId));
		
		$query = "SELECT * FROM tbl_ad WHERE adStatus = '1' AND userId = '$userId'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}


/*View booked individual ads */
	
	function angagedAdById($userId){
		$userId = mysqli_real_escape_string($this->db->link, $this->fm->validation($userId));
		
		$query = "SELECT * FROM tbl_ad WHERE adStatus = '2' AND userId = '$userId'";
		$result = $this->db->select($query);
		if($result){
			return mysqli_num_rows($result);
		}
	}

	
}
?>