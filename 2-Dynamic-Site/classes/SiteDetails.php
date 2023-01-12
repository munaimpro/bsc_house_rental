<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class SiteDetails{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	

/*Site Details view process*/
	
	function getSiteDetails(){
		$query = "SELECT * FROM tbl_sitedetails";
		return $result = $this->db->select($query);
	}
	

/*Check Site Logo Existance*/
	
	private function chkLogoExist(){
		$query = "SELECT siteLogo FROM tbl_sitedetails WHERE id = '1'";
		$result = $this->db->select($query);
		if($result){
			$exist = $result->fetch_assoc();
			if(empty($exist['siteLogo'])){
				return false;
			} else{
				return true;
			}
		}
	}
	
	
/*Site Details update process*/
	
	public function updateDetails($data, $files){
		$title = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['title']));
		
		$slogan = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['slogan']));
		
		$file_name = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['logo']['name']));
		
		$file_size = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['logo']['size']));
		
		$file_temp = $files['logo']['tmp_name'];
		
		$permited  = array('jpg', 'jpeg', 'png');
		$div 	  	    = explode('.', $file_name);
		$file_ext       = strtolower(end($div));
		$uploaded_image = "uploads/site_logo/".$file_name;
		
		$chklogo = $this->chkLogoExist();
		
		if(empty($title) && empty($slogan) && empty($file_name)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
		} elseif($chklogo == true){
			if(empty($title)){
				$msg = "<div class='alert alert_danger'>Error! Site details required</div>";
				return $msg;
			} else{
				if(!empty($file_name)){
					if ($file_size >1048567) {
						$msg = "<div class='alert alert_danger'>Image Size should be less then 1MB!</div>";
						return $msg;
					} elseif (in_array($file_ext, $permited) === false) {
						$msg = "<div class='alert alert_danger'>You can upload only:-".implode(', ', $permited)." type image</div>";
						return $msg;
					} else{
						move_uploaded_file($file_temp, "../".$uploaded_image);
					
						$query = "UPDATE tbl_sitedetails
						  SET
						  siteTitle  = '$title',
						  siteSlogan = '$slogan',
						  siteLogo   = '$uploaded_image' WHERE
						  id		 = '1'";
						$updDetails = $this->db->update($query);
						if($updDetails){
							$msg = "<div class='alert alert_success'>Site details updated successfuly</div>";
							return $msg;
						} else{
							$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
							return $msg;
						}
					}
				} else{
					$query = "UPDATE tbl_sitedetails
						  SET
						  siteTitle  = '$title',
						  siteSlogan = '$slogan' WHERE
						  id		 = '1'";
					$updDetails = $this->db->update($query);
					if($updDetails){
						$msg = "<div class='alert alert_success'>Site details updated successfuly</div>";
						return $msg;
					} else{
						$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
						return $msg;
					}
				}
			}
		} else{
			if(empty($title) || empty($file_name)){
				$msg = "<div class='alert alert_danger'>Error! Site details required</div>";
				return $msg;
			} elseif ($file_size >1048567) {
				$msg = "<div class='alert alert_danger'>Image Size should be less then 1MB!</div>";
				return $msg;
			} elseif (in_array($file_ext, $permited) === false) {
				$msg = "<div class='alert alert_danger'>You can upload only:-".implode(', ', $permited)." type image</div>";
				return $msg;
			} else{
				move_uploaded_file($file_temp, "../".$uploaded_image);
				
				$query = "UPDATE tbl_sitedetails
					  SET
					  siteTitle  = '$title',
					  siteSlogan = '$slogan',
					  siteLogo   = '$uploaded_image' WHERE
					  id		 = '1'";
				$updDetails = $this->db->update($query);
				if($updDetails){
					$msg = "<div class='alert alert_success'>Site details updated successfuly</div>";
					return $msg;
				} else{
					$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
					return $msg;
				}
			}
		}
	}
	

/*Copyright view process*/
	
	function getCopyright(){
		$query = "SELECT * FROM tbl_copyright";
		return $result = $this->db->select($query);
	}
	
	
/*Copyright update process*/
		
	public function UpdateCopyright($data){
		$copyright = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['copyright']));
		
		if(empty($copyright)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
		} else{
			$query = "UPDATE tbl_copyright
					  SET
					  copyrightText = '$copyright' WHERE
					  id			= '1'";
			$update_row = $this->db->update($query);
			if($update_row){
				$msg = "<div class='alert alert_success'>Copyright updated successfuly</div>";
				return $msg;
			} else{
				$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
				return $msg;
			}
		}
	}
	
}
?>