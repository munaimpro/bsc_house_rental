<?php
	include'lib/Session.php';
	Session::init();
	include'lib/Database.php';
	include'helpers/Format.php';

	spl_autoload_register(function($class){
		include_once'classes/'.$class.'.php';
	});

	$db  = new Database();
	$fm  = new Format();
	$usr = new User();
	$pro = new Property();
	$cat = new Category();
	$ibx = new Inbox();
	$ntf = new Notification();
	$src = new Search();
	$bk  = new Booking();
	
	if(isset($_GET['action']) && $_GET['action'] == "logout"){
		Session::destroy();
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
	<link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/fontawesome/css/fontawesome.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">
<!--Fontawesome style sheet End------------->

<!--Slick slider style sheet Start---------->
	<link rel="stylesheet" href="css/slickslider/slick_slider.min.css"/>
	<link rel="stylesheet" href="css/slickslider/slick.min.css"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--Slick slider style sheet End---------->

<!--Main style sheet Start---------->
	<link rel="stylesheet" type="text/css" href="mystyle.css"/>
</head>

<body>
<!--Header Section Start------------->
	<div class="top_header overflow">
		<div class="top_left col overflow">
			<div class="logoimg overflow">
				<img src="images/logo.jpg" alt="logo"/>
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
					<img src="images/avater.png"/>
				<?php } else{ ?>
					<img src="<?php echo Session::get("userImg");?>"/>
				<?php } ?>
			</div>
			<div class="users_name">
				<p><?php echo Session::get("userFName")." ".Session::get("userLName");?></p>
			</div>
		<?php } ?>
		</div>
	</div>
	
	<?php
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path, '.php');
	?>
	<nav class="topnav" id="navList">
	<div class="topnav_bars" onclick="togglebtn()">
		<i class="fa-solid fa-bars"></i>
	</div>
	  <ul>
		<li>
			<a href="index.php" <?php if($title == "index"){ ?> id="active" <?php } ?>>home</a>
		</li>
		<li>
			<a href="property_list.php" <?php if($title == "property_list"){ ?> id="active" <?php } ?>>property list</a>
		</li>
	<?php
		if((Session::get("userlogin") != true) || (Session::get("userlogin") == true && Session::get("userLevel") == 2)){
	?>
		<li>
			<a href="Admin/add_property.php">add property</a>
		</li>
	<?php } ?>
	<?php
		if(Session::get("userlogin") == true){
			$getWlist = $pro->getWishlist();
			if($getWlist){
				$i = 0;
				while($wlist = $getWlist->fetch_assoc()){ $i++;
					if(($wlist['userId'] == Session::get("userId")) && ($i <= 2)){
	?>	
		<li>
			<a href="wishlist.php" <?php if($title == "wishlist"){ ?> id="active" <?php } ?>>wishlist</a>
		</li>
	<?php } } } } ?>
	
		<li>
			<a href="help_support.php" <?php if($title == "help_support"){ ?> id="active" <?php } ?>>help & support</a>
		</li>
		
	<?php
		if(Session::get("userlogin") == true){
			if((Session::get("userLevel") == 2) || (Session::get("userLevel") == 3)){
	?>
		<li onclick="togglebtn_dashboard()">
			<a class="responsive_caret"><span>dashboard</span><i class="fa-solid fa-caret-down"></i></a>
		<!--Owner nav------------->
		<?php if(Session::get("userLevel") == 2){ ?>
			<div class="property_dropdown overflow" id="dashboardNav">
				<ul>
					<li><a href="Admin/dashboard_owner.php"><i class="fa-solid fa-chart-line"></i><span>dashboard</span></a></li>
					
					<li><a href="Admin/add_property.php"><i class="fa-brands fa-buffer"></i><span>post property</span></a></li>
					
					<li><a href="Admin/property_by_owner.php?userid=<?php echo Session::get("userId");?>"><i class="fa-brands fa-accusoft"></i><span>your property</span></a></li>
					
					<li><a href="Admin/booking_list_owner.php?userid=<?php echo Session::get("userId");?>"><i class="fa-solid fa-house-circle-check"></i><span>booking list</span>
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
					
					<li><a href="Admin/profile.php?userid=<?php echo Session::get("userId");?>"><i class="fa-solid fa-address-card"></i><span>your profile</span></a></li>
					
					<li><a href="changepassword.php?userid=<?php echo Session::get("userId");?>" <?php if($title == "changepassword"){ ?> id="cl_active" <?php } ?>><i class="fa fa-key"></i><span>change password</span></a></li>
				</ul>
			</div>
		<?php } ?>

		<?php if(Session::get("userLevel") == 3){ ?>
		<!--Admin nav------------->
			<div class="property_dropdown overflow" id="dashboardNav">
				<ul>
					<li><a href="Admin/dashboard_agent.php"><i class="fa-solid fa-chart-line"></i><span>dashboard</span></a></li>
					
					<li><a href="Admin/site_details.php"><i class="fa-solid fa-gear"></i><span>site details</span></a></li>
					
					<li><a href="Admin/copyright.php"><i class="fa-solid fa-copyright"></i><span>copyright</span></a></li>
					
					<li><a href="Admin/property_list_admin.php"><i class="fa-brands fa-accusoft"></i><span>property list</span></a></li>
					
					<li><a href="Admin/category_list.php"><i class="fa-solid fa-list"></i><span>category list</span></a></li>
					
					<li><a href="Admin/add_category.php"><i class="fa-solid fa-square-plus"></i><span>add category</span></a></li>
					
					<li><a href="Admin/owner_list.php"><i class="fa-solid fa-user-group"></i><span>owner list</span></a></li>
					
					<li><a href="Admin/notification.php"><i class="fa-solid fa-bell"></i><span>notification</span>
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
					
					<li><a href="Admin/booking_list.php"><i class="fa-solid fa-house-circle-check"></i><span>booking list</span></a></li>
					
					<li><a href="Admin/inbox.php"><i class="fa-solid fa-inbox"></i><span>inbox</span>
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
					
					<li><a href="Admin/profile.php?userid=<?php echo Session::get("userId");?>"><i class="fa-solid fa-address-card"></i><span>your profile</span></a></li>
					
					<li><a href="changepassword.php?userid=<?php echo Session::get("userId");?>" <?php if($title == "changepassword"){ ?> id="cl_active" <?php } ?>><i class="fa fa-key"></i><span>change password</span></a></li>
				</ul>
			</div>
		<?php } ?>
		
		</li>
	<?php } else{ ?>
		<li onclick="togglebtn_dashboard()">
			<a class="responsive_caret"><span>settings</span><i class="fa-solid fa-caret-down"></i></a>
			<div class="property_dropdown overflow" id="dashboardNav">
				<ul>
					<li><a href="Admin/profile.php?userid=<?php echo Session::get("userId");?>"><i class="fa-solid fa-address-card"></i><span>your profile</span></a></li>
					
					<li><a href="changepassword.php?userid=<?php echo Session::get("userId");?>" <?php if($title == "changepassword"){ ?> id="cl_active" <?php } ?>><i class="fa fa-key"></i><span>change password</span></a></li>
				</ul>
			</div>
		</li>
	<?php } } ?>
	<?php
		if(Session::get("userlogin") == true){
	?>
		<li>
			<a href="?action=logout">sign out</a>
		</li>
	<?php } else{ ?>
		<li>
			<a href="signin.php" <?php if($title == "signin"){ ?> id="active" <?php } ?>>sign in</a>
		</li>
	<?php } ?>
	  </ul>
	</nav>
<!--Header Section End------------->