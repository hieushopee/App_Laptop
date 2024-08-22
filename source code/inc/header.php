<?php 
    include 'lib/session.php';
     Session::init();
 ?>
<?php
	include_once ('lib/database.php');
	include_once ('helpers/format.php');
	spl_autoload_register(function($className){include_once "classes/".$className.".php";});

	$db = new database();
	$fm = new format();
	$ct = new cart ();
	$us = new user();
	$cat =new category();
	$product = new product();
	$cs = new customer();
	$dir = new direct();
	
?>




<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE php>
<head>
<title>Shop Laptop</title>
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/><!-- JavaScript Bundle with Popper -->
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
  </script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo1.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="get">
				    	<input type="text" name="fsearch" value="Tìm kiếm sản phẩm" onfocus="this.value ='';" onblur="if (this.value == '') {this.value = 'Tìm kiếm sản phẩm';}"><input type="submit" name="search" value="Tìm kiếm">
				    </form>
			    </div>
				<a href="cart.php" title="View my shopping cart" rel="nofollow">
			    <div class="shopping_cart">
					
						<div class="cart">
						
								<span class="cart_title"></span>
								
								<span class="no_product">
									
									<?php
									$check_cart = $ct->check_cart();
									if ($check_cart)
									{
										$qty = session::get("qty");
										echo $qty;
									} 
									else
										echo 'Trống';
									?>
								</span>

							
						</div>
					
			      </div>
				  </a>
			      <?php
			      if(isset($_GET['id'])){
			      	$delcart = $ct->del_all_data_cart();
			      	Session::destroy();
			      }
			      ?>

		   <div class="login">
		   	<?php
			      $login_check = Session::get('customer_login');
			      if ($login_check == false)
			      {
			      	echo '<a href="login.php">Đăng nhập</a></div>';
			      }
			      else
			      	echo '<a href="?id='.Session::get('customer_id').'">Đăng xuất</a></div>';
			       ?>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div  class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="introduce.php">Giới thiệu</a></li>
	  <li><a href="products.php">Sản phẩm</a>
	  <ul>
		 <?php 
						$getall_category = $cat->show_category_fontend();
						if ($getall_category) {
							while ($result_allcat = $getall_category->fetch_assoc()) {

								
								?>
								<li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
								<?php 
							}
						}
						?>
		 </ul>
	  </li>	
	  <li><a href="cart.php">Giỏ hàng</a></li>
	  <li><a href="contact.php">Liên hệ</a> </li>
	  <?php
	  $login_check = Session::get('customer_login');
	  if($login_check==false)
	  {
	  	echo '';
	  }
	  else {
	  	echo '<li><a href="profile.php">Thông tin khách hàng</a> </li>';
	  	echo '<li><a href="orderdetails.php">Đơn hàng</a> </li>';
	  }
	  ?>

	  <div class="clear"></div>
	</ul>
</div>
