<?php
include'../lib/Session.php';
Session::chkSession();
include'../lib/Database.php';
include'../helpers/Format.php';

spl_autoload_register(function($class){
	include_once'../classes/'.$class.'.php';
});

$db  = new Database();
$fm  = new Format();
$usr = new User();
$cat = new Category();
$pro = new Property();
$sdt = new SiteDetails();
$ntf = new Notification();
$bk  = new Booking();
$ibx = new Inbox();
$db  = new Dashboard();

if(isset($_GET['action']) && $_GET['action'] == "logout"){
	session_destroy();
	echo"<script>window.location='../signin.php'</script>";
}
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="house rental system, system, house">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="author" content="Munaim Khan">
	<title>
		<?php echo $fm->title()." - ".TITLE; ?>
	</title>

<!--Fontawesome style sheet Start------------->
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/css/fontawesome.min.css"/>
	
	<!-- Fontawesome style cdn ---->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">
<!--Fontawesome style sheet End------------->	
	
<!--Data Table style sheet Start------------->
	<link rel="stylesheet" type="text/css" href="../css/datatable/jquery.datatable.min.css"/>
	
	<!-- Data Table style cdn ---->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
<!--Data Table style sheet End------------->
	<link rel="stylesheet" type="text/css" href="../mystyle.css"/>
</head>

<body>
<!--Header Section Start------------->
	<div class="top_header overflow">
		<div class="top_left col overflow">
			<div class="logoimg overflow">
				<img src="../images/logo.jpg" alt="logo"/>
			</div>
			<div class="top_header_list overflow">
				<ul>
					<li>
						<p>
							<i class="fa-solid fa-phone"></i><span>Phone: +8801734530981</span>
						</p>
					</li>
					<li>
						<p>
							<i class="fa-solid fa-envelope"></i>
							</i><span>Email: info@rentinghome.com</span>
						</p>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="col top_right overflow">
		<?php
			if(Session::get("userlogin") == true){ ?>
					
			<div class="userimg overflow">
				<?php
					if(empty(Session::get("userImg"))){ ?>
					<img src="../images/avater.png"/>
				<?php } else{ ?>
					<img src="../<?php echo Session::get("userImg");?>"/>
				<?php } ?>
			</div>
			<div class="users_name">
				<p><?php echo Session::get("userFName")." ".Session::get("userLName");?></p>
			</div>
		<?php } ?>
		</div>
	</div>
	
	<!--Agent nav----------->
	<?php
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path, '.php');
	
		if(Session::get("userLevel") == 3){
	?>
	<nav class="topnav admin_nav topnav_admin" id="navList">
		<div class="topnav_bars" onclick="togglebtn()">
			<i class="fa-solid fa-bars"></i>
		</div>
		<ul>
			<li><a href="dashboard_agent.php" <?php if($title == "dashboard_agent"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-signal"></i><span>dashboard</span></a></li>
			
			<li onclick="togglebtn_sitedetails()">
				<a class="responsive_caret" <?php if($title == "site_details" || $title == "copyright"){ ?> id="active_admin" <?php } ?>><span>site details</span><i class="fa-solid fa-caret-down"></i></a>
				<div class="property_dropdown overflow" id="sitedetailsNav">
				<ul>
					<li><a href="site_details.php"><i class="fa-solid fa-gear"></i><span>site details</span></a></li>
					
					<li><a href="copyright.php"><i class="fa-solid fa-copyright"></i><span>copyright</span></a></li>
				</ul>
				</div>
			</li>
			
			<li onclick="togglebtn_category()">
				<a class="responsive_caret" <?php if($title == "category_list" || $title == "add_category"){ ?> id="active_admin" <?php } ?>><span>category</span><i class="fa-solid fa-caret-down"></i></a>
				<div class="property_dropdown overflow" id="categoryNav">
				<ul>
					<li><a href="category_list.php"><i class="fa-solid fa-list"></i><span>category list</span></a></li>
					
					<li><a href="add_category.php"><i class="fa-solid fa-plus"></i><span>add category</span></a></li>
				</ul>
				</div>
			</li>
			
			<li><a href="property_list_admin.php" <?php if($title == "property_list_admin"){ ?> id="active_admin" <?php } ?>><i class="fa-brands fa-accusoft"></i><span>property list</span></a></li>
			
			<li><a href="owner_list.php" <?php if($title == "owner_list"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-user-group"></i><span>owner list</span>
				<?php
					$getUsr = $usr->getNewOwner();
					if($getUsr){
						$unseen_usr = mysqli_num_rows($getUsr);
						if($unseen_usr != 0){ 
				?>	
					<span class="row_number">
						<?php echo $unseen_usr; ?>
					</span>
				<?php } } ?>
			</a></li>
			
			<li><a href="notification.php" <?php if($title == "notification"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-bell"></i><span>notification</span>
				<?php
					$getNtf = $ntf->getNewNotification();
					if($getNtf){
						$unseen_notif = mysqli_num_rows($getNtf);
						if($unseen_notif != 0){ 
				?>	
					<span class="row_number">
						<?php echo $unseen_notif; ?>
					</span>
				<?php } } ?>
			</a></li>
			
			<li><a href="booking_list.php" <?php if($title == "booking_list"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-house-circle-check"></i><span>booking list</span></a></li>
			
			<li><a href="inbox.php" <?php if($title == "inbox"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-inbox"></i><span>inbox</span>
				<?php
					$getMsg = $ibx->getNewMessage();
					if($getMsg){
						$unseen_msg = mysqli_num_rows($getMsg);
						if($unseen_msg != 0){ 
				?>	
					<span class="row_number">
						<?php echo $unseen_msg; ?>
					</span>
				<?php } } ?>
			</a></li>
			
			
			<li onclick="togglebtn_personalize()">
				<a class="responsive_caret" <?php if($title == "profile"){ ?> id="active_admin" <?php } ?>><span>personalize</span><i class="fa-solid fa-caret-down"></i></a>
				<div class="property_dropdown overflow" id="personalizeNav">
				<ul>
					<li><a href="profile.php?userid=<?php echo Session::get("userId");?>"><i class="fa-solid fa-address-card"></i><span>your profile</span></a></li>
					
					<li><a href="../changepassword.php?userid=<?php echo Session::get("userId");?>"><i class="fa fa-key"></i><span>change password</span></a></li>
				</ul>
				</div>
			</li>
			
			<li class="backtosite"><a href="../index.php"><i class="fa-solid fa-arrow-right-to-bracket"></i><span>back to site</span></a></li>
		</ul>
	</nav>
	<?php } ?>
	
	<?php
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path, '.php');
		
		if(Session::get("userLevel") == 2){
	?>
	<!--Owner nav------------>
	<nav class="topnav admin_nav topnav_admin" id="navList">
		<div class="topnav_bars" onclick="togglebtn()">
			<i class="fa-solid fa-bars"></i>
		</div>
		<ul>
			<li><a href="dashboard_owner.php" <?php if($title == "dashboard_owner"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-signal"></i><span>dashboard</span></a></li>
			
			<li onclick="togglebtn_sitedetails()">
				<a class="responsive_caret" <?php if($title == "add_property" || $title == "property_by_owner"){ ?> id="active_admin" <?php } ?>><span>property details</span><i class="fa-solid fa-caret-down"></i></a>
				<div class="property_dropdown overflow" id="sitedetailsNav">
				<ul>
					<li><a href="add_property.php"><i class="fa-brands fa-buffer"></i><span>post property</span></a></li>
					
					<li><a href="property_by_owner.php?userid=<?php echo Session::get("userId");?>"><i class="fa-brands fa-accusoft"></i><span>your property</span></a></li>
				</ul>
				</div>
			</li>
			
			<li><a href="booking_list_owner.php?userid=<?php echo Session::get("userId");?>" <?php if($title == "booking_list_owner"){ ?> id="active_admin" <?php } ?>><i class="fa-solid fa-house-circle-check"></i><span>booking list</span>
				<?php
					$userId = Session::get("userId");
					$getBooking = $bk->getNewBooking($userId);
					if($getBooking){
						$unseen_book = mysqli_num_rows($getBooking);
						if($unseen_book != 0){ 
				?>	
					<span style="margin-left:0" class="row_number">
						<?php echo $unseen_book; ?>
					</span>
				<?php } } ?>
			</a></li>
			
			<li onclick="togglebtn_personalize()">
				<a class="responsive_caret" <?php if($title == "profile"){ ?> id="active_admin" <?php } ?>><span>personalize</span><i class="fa-solid fa-caret-down"></i></a>
				<div class="property_dropdown overflow" id="personalizeNav">
				<ul>
					<li><a href="profile.php?userid=<?php echo Session::get("userId");?>"><i class="fa-solid fa-address-card"></i><span>your profile</span></a></li>
					
					<li><a href="../changepassword.php?userid=<?php echo Session::get("userId");?>"><i class="fa fa-key"></i><span>change password</span></a></li>
				</ul>
				</div>
			</li>
			
			<li class="backtosite"><a href="../index.php"><i class="fa-solid fa-arrow-right-to-bracket"></i><span>back to site</span></a></li>
		</ul>
	</nav>
	<?php } ?>
<!--Header Section End------------->