<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class User{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	

/* User Sign Up Process*/
	
	public function UserRegistration($data){
		$FName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['fname']));
		
		$LName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['lname']));
		
		$UserName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['username']));
		
		$EMail = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
		
		$Cellno = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['cellno']));
		
		$Address = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['address']));
		
		$Password = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['password']));
		
		$CnfPassword = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['cnf_password']));
		
		$Level = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['level']));
		
		if(empty($FName) || empty($LName) || empty($UserName) || empty($EMail) || empty($Cellno) || empty($Address) || empty($Password) || empty($CnfPassword) || empty($Level)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
		}
		$mailquery = "SELECT * FROM tbl_user WHERE userEmail = '$EMail' LIMIT 1";
		$mailchk   = $this->db->select($mailquery);
		if($mailchk != false){
			$msg = "<div class='alert alert_danger'>Error! E-mail already exist</div>";
			return $msg;
		} elseif(strlen($UserName) < 3){
			$msg = "<div class='alert alert_danger'>Error! Username is too short</div>";
			return $msg;
		} elseif(!filter_var($EMail, FILTER_VALIDATE_EMAIL)){
			$msg = "<div class='alert alert_danger'>Error! Invalid email given</div>";
			return $msg;
		} elseif(strlen($Password) < 6){
			$msg = "<div class='alert alert_danger'>Error! Password is too short</div>";
			return $msg;
		} elseif($Password != $CnfPassword){
			$msg = "<div class='alert alert_danger'>Error! Please match password</div>";
			return $msg;
		} else{
			$Password = md5($Password);
			
			$query = "INSERT INTO tbl_user(firstName, lastName, userName, userEmail, cellNo, userAddress, userPass, confPass, userLevel) VALUES('$FName','$LName','$UserName','$EMail','$Cellno','$Address','$Password','$CnfPassword', '$Level')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				$msg = "<div class='alert alert_success'>Account created successfully</div>";
				return $msg;
			} else{
				$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
				return $msg;
			}
		}
	}


/* User Sign In Process*/
	
	public function UserLogin($data){
		$Email    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
		
		$Password = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['password']));
		
		if(empty($Email) || empty($Password)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
		} elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
			$msg = "<div class='alert alert_danger'>Error! Invalid email given</div>";
			return $msg;
		} else{
			$Password = md5($Password);
			
			$chkData = "SELECT * FROM tbl_user WHERE userEmail = '$Email' AND userPass = '$Password'";
			$result = $this->db->select($chkData);
			if($result != false){
				$value = $result->fetch_assoc();
				Session::set("userlogin", true);
				Session::set("userId", $value['userId']);
				Session::set("userFName", $value['firstName']);
				Session::set("userLName", $value['lastName']);
				Session::set("userImg", $value['userImg']);
				Session::set("userEmail", $value['userEmail']);
				Session::set("cellNo", $value['cellNo']);
				Session::set("phoneNo", $value['phoneNo']);
				Session::set("userAddress", $value['userAddress']);
				Session::set("userPass", $value['userPass']);
				Session::set("userLevel", $value['userLevel']);
				if($value['userLevel'] == 3){
					echo"<script>window.location='Admin/dashboard_agent.php'</script>";
				} elseif($value['userLevel'] == 2){
					echo"<script>window.location='Admin/dashboard_owner.php'</script>";
				} else{
					echo"<script>window.location='index.php'</script>";
				}
			} else{
				$msg = "<div class='alert alert_danger'>Email or Password not matched!</div>";
				return $msg;
			}
		}
	}
	

/* User Password Update Process*/

	function updatePassword($data, $userId){
		$Oldpass = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['oldpass']));
		
		$Newpass = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['newpass']));
		
		$CnfPassword = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['cnf_password']));
		
		if(empty($Oldpass) || empty($Newpass) || empty($CnfPassword)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
		} elseif(strlen($Newpass) < 6){
			$msg = "<div class='alert alert_danger'>Error! Password is too short</div>";
			return $msg;
		}  elseif($Newpass != $CnfPassword){
			$msg = "<div class='alert alert_danger'>Error! Please match password</div>";
			return $msg;
		} else{
			$chkPassword = $this->checkPassword($Oldpass, $userId);
			if($chkPassword != true){
				$msg = "<div class='alert alert_danger'>Error! Password not matched or data not found</div>";
				return $msg;
			} else{
				$Newpass = md5($Newpass);
				$query = "UPDATE tbl_user
					  SET
					  userPass = '$Newpass',
					  confPass = '$CnfPassword' WHERE
					  userId   = '$userId'";
				$updated_row = $this->db->update($query);
				if($updated_row){
					$msg = "<div class='alert alert_success'>Password updated successfully</div>";
					return $msg;
				} else{
					$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
					return $msg;
				}
			}
		}
	}
	
	
	private function checkPassword($Oldpass, $userId){
		$Oldpass = md5($Oldpass);
		$query = "SELECT userPass FROM tbl_user WHERE userPass = '$Oldpass' AND userId = '$userId'";
		$result = $this->db->select($query);
		if($result){
			return true;
		} else{
			return false;
		}
	}
	
	
/* User Data Retrive Process*/
	
	public function getUserData($userId){
		$query = "SELECT * FROM tbl_user WHERE userId = '$userId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	
/* User Data Update Process*/
		
	public function userUpdate($data, $files, $userId){
		$FName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['fname']));
		
		$LName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['lname']));
		
		$UserName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['username']));
		
		$EMail = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
		
		$Cellno = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['cellno']));
		
		$Phone = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['phone']));
		
		$Address = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['address']));
		
		$file_name = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['image']['name']));
		
		$file_size = mysqli_real_escape_string($this->db->link, $this->fm->validation($files['image']['size']));
		
		$file_temp = $files['image']['tmp_name'];
		
		if(!empty($file_name)){
			$permited  = array('jpg', 'jpeg', 'png');
			
			$div 	  	    = explode('.', $file_name);
			$file_ext       = strtolower(end($div));
			$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
	
			if(empty($FName) || empty($LName) || empty($UserName) || empty($EMail) || empty($Cellno) || empty($Address)){
				$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
				return $msg;
			}
			$mailquery = "SELECT * FROM tbl_user WHERE userEmail = '$EMail' AND userId != '$userId' LIMIT 1";
			$mailchk   = $this->db->select($mailquery);
			
			if($mailchk != false){
			$msg = "<div class='alert alert_danger'>Error! E-mail already exist</div>";
			return $msg;
			} elseif(strlen($UserName) < 3){
				$msg = "<div class='alert alert_danger'>Error! Username is too short</div>";
				return $msg;
			} elseif(!filter_var($EMail, FILTER_VALIDATE_EMAIL)){
				$msg = "<div class='alert alert_danger'>Error! Invalid email given</div>";
				return $msg;
			} elseif (in_array($file_ext, $permited) === false) {
				$msg = "<div class='alert alert_danger'>You can upload only:-".implode(', ', $permited)." type image</div>";
				return $msg;
			} elseif ($file_size >1048567) {
				$msg = "<div class='alert alert_danger'>Image Size should be less then 1MB!</div>";
				return $msg;
			} else{
				move_uploaded_file($file_temp, "../".$uploaded_image);
				
				$query = "UPDATE tbl_user
						  SET
						  firstName   = '$FName',
						  lastName 	  = '$LName',
						  userName    = '$UserName',
						  userImg 	  = '$uploaded_image',
						  userEmail   = '$EMail',
						  cellNo   	  = '$Cellno',
						  phoneNo     = '$Phone',
						  userAddress = '$Address' WHERE
						  userId	  = '$userId'";
				$updated_row = $this->db->update($query);
				if($updated_row){
					$msg = "<div class='alert alert_success'>Profile updated successfully!</div>";
					return $msg;
				} else{
					$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
					return $msg;
				}
			}
		} else{
			if(empty($FName) || empty($LName) || empty($UserName) || empty($EMail) || empty($Cellno) || empty($Address)){
				$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
				return $msg;
			}
			$mailquery = "SELECT * FROM tbl_user WHERE userEmail = '$EMail' AND userId != '$userId' LIMIT 1";
			$mailchk   = $this->db->select($mailquery);
			
			if($mailchk != false){
			$msg = "<div class='alert alert_danger'>Error! E-mail already exist</div>";
			return $msg;
			} elseif(strlen($UserName) < 3){
				$msg = "<div class='alert alert_danger'>Error! Username is too short</div>";
				return $msg;
			} elseif(!filter_var($EMail, FILTER_VALIDATE_EMAIL)){
				$msg = "<div class='alert alert_danger'>Error! Invalid email given</div>";
				return $msg;
			} else{
				$query = "UPDATE tbl_user
						  SET
						  firstName   = '$FName',
						  lastName 	  = '$LName',
						  userName    = '$UserName',
						  userEmail   = '$EMail',
						  cellNo   	  = '$Cellno',
						  phoneNo     = '$Phone',
						  userAddress = '$Address' WHERE
						  userId	  = '$userId'";
				$updated_row = $this->db->update($query);
				if($updated_row){
					$msg = "<div class='alert alert_success'>Profile updated successfully!</div>";
					return $msg;
				} else{
					$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
					return $msg;
				}
			}
		}
	}
	
	
/* View owner list Process*/
	
	function getAllOwner(){
		$query = "SELECT * FROM tbl_user WHERE userLevel = 2";
		$result = $this->db->select($query);
		return $result;
	}
	

/* Delete owner Process*/
		
	function delUserById($delUserId){
		$delUserId = mysqli_real_escape_string($this->db->link, $this->fm->validation($delUserId));
		
		$query = "DELETE FROM tbl_user WHERE userId = '$delUserId'";
		$deldata = $this->db->delete($query);
		if($deldata){
			$msg = "<div class='alert alert_success'>User deleted successfully!</div>";
			return $msg;
		} else{
			$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
			return $msg;
		}
	}
	
	
	private function chkUserExist($userName, $userEmail){
		$query = "SELECT * FROM tbl_user WHERE userName = '$userName' AND userEmail = '$userEmail'";
		$result = $this->db->select($query);
		if($result){
			return true;
		} else{
			return false;
		}
	}
	
	
/*User data retrive process */

	function retrivePassword($data){
		$userName = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['username']));
		
		$userEmail = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
		
		if(empty($userName) || empty($userEmail)){
			$msg = "<div class='alert alert_danger'>Error! Fields must not be empty</div>";
			return $msg;
		} elseif(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
			$msg = "<div class='alert alert_danger'>Error! Invalid email given</div>";
			return $msg;
		} else{
			$chkUser = $this->chkUserExist($userName, $userEmail);
			if($chkUser != true){
				$msg = "<div class='alert alert_danger'>Error! Data not found. Please sign up now</div>";
				return $msg;
			} else{
				$query = "SELECT * FROM tbl_user WHERE userEmail = '$userEmail'";
				$userdata = $this->db->select($query);
				if($userdata){
					while($value = $userdata->fetch_assoc()){
						$userid   = $value['userId'];
						$username = $value['userName'];
						$usermail = $value['userEmail'];
					}
					
					$text = substr($usermail, 0, 3);
					$rand = rand(1000, 9999);
					$newpass = $text.$rand;
					$password = md5($newpass);
					
					$updquery = "UPDATE tbl_user
								 SET
								 userPass = '$password' WHERE
								 userId   = '$userid'";
					$updated_row = $this->db->update($updquery);
					if($updated_row){
						$to   = $userEmail;
						$from = "houserental@gmail.com";
						$headers = "From: $from\n";
						$headers .= 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset= iso-8859-1' . "\r\n";
						$subject = "Rental House password recovery";
						$message = "Your username is - ".$username." and password is - ".$newpass.". Please visit system to login.";
						
						$sendmail = mail($to, $subject, $message, $headers);
						
						if($sendmail){
							$msg = "<div class='alert alert_success'>Thanks a lot! Please check your email for new password</div>";
							return $msg;
						} else{
							$msg = "<div class='alert alert_danger'>Something went wrong!</div>";
							return $msg;
						}
					}
				}
			}
		}
	}
	
	
/*View new owner process */

	function getNewOwner(){
		$query = "SELECT * FROM tbl_user WHERE userLevel = '2' AND userStatus = '0'";
		$result = $this->db->select($query);
		return $result;
	}

	
/*Update new owner process*/
	
	function updateUserStatus(){
		$query = "UPDATE tbl_user
				  SET
				  userStatus = '1' WHERE
				  userStatus = '0' AND
				  userLevel  = '2'";
		return $updated_row = $this->db->update($query);
	}
	
	
}
?>