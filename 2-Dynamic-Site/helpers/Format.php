<?php
	class Format{
		public function formatDate($date){
			return date('F j, Y', strtotime($date));
		}
		
		public function textShorten($text, $limit = 400){
			$text = $text." ";
			$text = substr($text, 0, $limit);
			$text = substr($text, 0, strrpos($text, ' '));
			$text = $text.".....";
			return $text;
		}
		
		public function validation($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		public function title(){
			$path = $_SERVER['SCRIPT_FILENAME'];
			$title = basename($path, '.php');
			
			if($title == 'changepassword'){
				$title = 'update password';
			} elseif($title == 'forgotpass'){
				$title = 'retrive password';
			} elseif($title == 'help_support'){
				$title = 'help & support';
			} elseif($title == 'index'){
				$title = 'home';
			} elseif($title == 'property_by_cat'){
				$title = 'ad category';
			} elseif($title == 'property_details'){
				$title = 'ad details';
			} elseif($title == 'property_list'){
				$title = 'ad';
			} elseif($title == 'signin'){
				$title = 'sign in';
			} elseif($title == 'signup'){
				$title = 'sign up';
			} elseif($title == 'wishlist'){
				$title = 'wish list';
			} elseif($title == 'add_category'){
				$title = 'add category';
			} elseif($title == 'add_property'){
				$title = 'submit ad';
			} elseif($title == 'booking_list'){
				$title = 'bookings';
			} elseif($title == 'booking_list_owner'){
				$title = 'all booking';
			} elseif($title == 'category_list'){
				$title = 'category';
			} elseif($title == 'copyright'){
				$title = 'copyright';
			} elseif($title == 'dashboard_agent'){
				$title = 'dashboard';
			} elseif($title == 'dashboard_owner'){
				$title = 'dashboard';
			} elseif($title == 'editcategory'){
				$title = 'update category';
			} elseif($title == 'editproperty'){
				$title = 'update ad';
			}  elseif($title == 'inbox'){
				$title = 'messages';
			}  elseif($title == 'notification'){
				$title = 'ad notification';
			}  elseif($title == 'owner_list'){
				$title = 'owners';
			}  elseif($title == 'profile'){
				$title = 'user profile';
			}  elseif($title == 'property_booking'){
				$title = 'ad booking';
			}   elseif($title == 'property_by_owner'){
				$title = 'individual ad';
			}   elseif($title == 'property_list_admin'){
				$title = 'all ad';
			}   elseif($title == 'replymessage'){
				$title = 'reply message';
			}   elseif($title == 'site_details'){
				$title = 'our details';
			}   elseif($title == 'view_booking'){
				$title = 'booking details';
			} else{
				$title = 'view message';
			}
			
			return $title = ucwords($title);
		}
	}
?>