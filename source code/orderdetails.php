<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';

 ?>
 <?php 	
   if(isset($_GET['delete'])){
		$delete_id = $_GET['delete'];
        $conn = mysqli_connect("localhost", "21it136", "hieu", "doancoso2");
		mysqli_query($conn, "DELETE FROM `tbl_order` WHERE orderId = '$delete_id'");
		header('location:orderdetails.php');
	}
	?>
<?php
 //    if(isset($_GET['cartid'])){
 //        $cartid = $_GET['cartid']; 
 //        $delcart = $ct->del_product_cart($cartid);
 //    }
        
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
 //        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 //        $cartId = $_POST['cartId'];
 //        $quantity = $_POST['quantity'];
 //        $update_quantity_Cart = $ct -> update_quantity_Cart($cartId, $quantity); // hàm check catName khi submit lên
 //    	if ($quantity <= 0) {
 //    		$delcart = $ct->del_product_cart($cartId);
 //    	}
 //    } 
 ?>
<?php 
	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
 ?>
 <?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Chi tiết đơn hàng</h2>

						<table class="tblone" >
							<tr>
								<th width="0%">STT</th>
								<th width="18%">Tên sản phẩm</th>
								<th width="15%">Hình ảnh</th>
								<th width="10%">Giá</th>
								<th width="10%">Số lượng</th>
								<th width="14%">Ngày</th>
								<th width="10%">Trạng thái</th>
								<th width="14%">Xử lý</th>
								<th width="10%">Hủy đơn</th>
							</tr>
							<?php
							// $customer_id = Session::get('customer_id');  
							// $get_cart_ordered = $ct->get_cart_ordered($customer_id);
							// if($get_cart_ordered){
							// 	$i=0;
							// 	$qty = 0;
							// 	while ($result = $get_cart_ordered->fetch_assoc()) {
							// 	$i++;
							$conn = mysqli_connect("localhost", "21it136", "hieu", "doancoso2");

							$select_cart = mysqli_query($conn, "SELECT * FROM `tbl_order`");
							$i = 0;
							while ($result=mysqli_fetch_assoc($select_cart)) {
								$i++;
							 ?>
							<tr>
								<td><center><?php echo $i; ?></center></td>
								<td><center><?php echo $result['productName'] ?></center></td>
								<td><center><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" width="100px"/></center></td>
								<td><center><?php echo $fm->format_currency($result['price']).'' ?></center></td>
								<td><center><?php echo $result['quantity'] ?></center></td>
								<td><center><?php echo $fm->formatDate($result['date_order'])  ?></center></td>
								<td><center>
								<?php 
									if ($result['status'] == '0') {
										echo "Đang chờ xử lý";
									}elseif($result['status'] == 1) {
								?>
								<span>Đã gửi hàng</span>
								
								<?php

									}elseif($result['status'] == 2){
										echo 'Đã nhận';
									}
								 ?>	

								</center></td>
								<?php 
								if ($result['status'] == '0') {
								 ?>

								<td><center><?php echo 'Chờ xác nhận'; ?></center></td>
								
								<td><for65m action="orderdetails.php" method="get">
									<!-- <input type="submit" name="huydonhang" value="hủy"> -->
									<a href="huydonhang.php?delete=<?php echo $result['orderId']; ?>"><center> Hủy </center></a>
								</for65m>
								</td>
								 <?php 
								 }elseif($result['status']==1) {
								 ?>	
								 <td>
								 	<a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Đã được xác nhận(click vào đây nếu đã nhận hàng)</a>
								 </td>
								 <?php 
								}else{
								  ?>
								  
								<td><center><?php echo 'Đã nhận'; ?><center></td>
								<?php 
								}
								 ?>
							</tr>
							<?php 							
								}
							
							 ?>
	
						</table>
						
					</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
