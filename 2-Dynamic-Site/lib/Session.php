<?php
class Session{
	
	public static function init(){
		if(version_compare(phpversion(), '5.4.0', '<')){
			if(session_id == ''){
				session_start();
			}
		} else{
			if(session_status() == PHP_SESSION_NONE){
				session_start();
			}
		}
	}
	
	public static function set($key, $val){
		$_SESSION[$key] = $val;
	}
	
	public static function get($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		} else{
			return false;
		}
	}
	
	public static function chkSession(){
		self::init();
		if(self::get("userlogin") == false){
			self::destroy();
			header("location:../signin.php");
		}
	}
	
	public static function chkLogin(){
		self::init();
		if(self::get("userlogin") == true){
			echo"<script>window.location='index.php'</script>";
		}
	}
	
	public function destroy(){
		session_destroy();
		echo"<script>window.location='signin.php'</script>";
	}
}
?>