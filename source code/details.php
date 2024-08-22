<?php 
include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	if(Session::get('customer_id')== null && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitcomment']) || isset($_POST['submitreply'])){
		echo "<span class='error'>Bạn phải đăng nhập để gửi bình luận!</span>";
	}
	else{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitcomment'])){
			// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
			$proid = $_GET['proid'];
			$customer_id = Session::get('customer_id');
			$get_cs_name = $cs->show_customers($customer_id);
			$resultt = $get_cs_name->fetch_assoc();
			$customer_name = $resultt['name'];
			$insert_comment = $cs->insert_comment_customer($_POST,$proid,$customer_name); 
			// header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
			   // exit();
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitreply'])){
			// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
			$proid = $_GET['proid'];
			$customer_id = Session::get('customer_id');
			$get_cs_name = $cs->show_customers($customer_id);
			$resultt = $get_cs_name->fetch_assoc();
			$customer_name = $resultt['name'];
			$insert_reply_comment = $cs->insert_reply_customer($_POST,$proid,$customer_name); 
			// header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
			   // exit();
		}
	}
?>
<?php 
if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
	echo "<script> window.location = '404.php' </script>";

}else {
        $id = $_GET['proid']; // Lấy productid trên host
    }
    
	$customer_id = Session::get('customer_id'); // 


	?>
	<div class="main">
		<div class="content">
			<div class="section group">
				<?php 
				$get_product_details = $product->get_details($id);
				if ($get_product_details) {
					while ($result_details = $get_product_details->fetch_assoc()) {
    				# code...

						?>
						<div class="cont-desc span_1_of_2">				
							<div class="grid images_3_of_2">
								<section class="slider">
								<div class="flexslider">
									<ul class="slides">
										<li><img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" style="max-height:450px;"/></li>
										<li><img src="admin/uploads/<?php echo $result_details['image2'] ?>" alt="" style="max-height:450px;"/></li>
										<li><img src="admin/uploads/<?php echo $result_details['image3'] ?>" alt="" style="max-height:450px;"/></li>
										<li><img src="admin/uploads/<?php echo $result_details['image4'] ?>" alt="" style="max-height:450px;"/></li>
										<li><img src="admin/uploads/<?php echo $result_details['image5'] ?>" alt="" style="max-height:450px;"/></li>
				    				</ul>
				 				</div>
								</section>
							</div>
							<div class="desc span_3_of_2">
								<h2><?php echo $result_details['productName'] ?> </h2>
								<br><br>				
								<div class="price">
									<p>Giá: <span><?php echo $fm->format_currency($result_details['price'])."đ" ?></span></p>
									<p>Category: <span><?php echo $result_details['catName'] ?></span></p>
								</div>
								<div class="add-cart">
									<form action="" method="post">
										<input type="number" class="buyfield" name="quantity" value="1" min="1" />

										<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
										<?php
										if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
											$quantity = $_POST['quantity'];
											$update_product_remain = $product->update_product_remain($id);
											$show_product_remain = $product ->show_product_remain($id)->fetch_assoc();		
											$product_remain = $show_product_remain['product_remain'];
											if ($quantity <= $product_remain)
											{
												$Addtocart= $ct ->add_to_cart($id,$quantity);
											}				
											else echo '<span style="color:red; font-size:18px;">Không đủ hàng</span>';
										}  
										?>
									</form>
									<?php
									if(isset($Addtocart)) 
									{
										echo '<span style="color:red; font-size:18px;">Sản phẩm đã được bạn thêm vào giỏ hàng</span>';
									}
									?>


								</div>
								
								<div class="add-cart">
									<div class="button_details">
									</div>
									<div class="clear"></div>
								</div>
								
								
							</div>
							
							<div class="product-desc">
								<br>
								<h2>Chi tiết sản phẩm</h2>
								<p><?php echo $result_details['product_desc'] ?></p>
							</div>
							<?php 
						}
					}
					?>		
					
					<div class="product-desc">
						<h2>Bình luận</h2>
						<?php
						
						if(isset($insert_comment)) 
						{
							echo $insert_comment;
						}
						
					?>
						<table>
						<form action="" method="POST">
							<tr>
								<td style="color: gray;"><textarea name="comment" id="" cols="130" rows="5" placeholder="Gửi bình luận tại đây" style="resize: none; border-radius: 5px;"></textarea></td>
							
								<td style="vertical-align: middle; text-align: center;"><input type="submit" class="buysubmit" name="submitcomment" value="Gửi" style="vertical-align: middle;"/></td>
							</tr>
						</form>
						</table>
						<table style="padding: 50px;">
							
						<?php 
				
						$commentlist = $cs->get_comment($_GET['proid']);
									
						if($commentlist){					
							while ($result = $commentlist->fetch_assoc()){									
									
				 		?>
						 <tr style="border-spacing: 20px; max-height: 200px;">
							 <td><?php echo '<span style="font-weight: 500;">'.$result['userName'].'</span><br><span style="color: gray; font-size: 12px">'.$result['date'].'</span>'?></td>
							 <td>&emsp;&emsp;</td>
							 <td style="background: #F5F5F5; border-radius: 7px; padding-right: 30px; padding-bottom: 10px; overflow: auto; width: 500px;"><?php echo $result['comment']?></td>
							 <td></td>
						 </tr>
							<?php
								$get_reply_comment = $cs->get_reply_comment($result['comment_id']);
								if($get_reply_comment){
									while ($result2 = $get_reply_comment->fetch_assoc()){									
										
										?>
										<tr><td><p></p></td></tr>
										
							<tr style="border-spacing: 20px;">
							<td></td>
							 <td><?php if($result2['type']==1){
								 echo '<span style="font-weight: 500; color : red;">☆'.$result2['userName'].'</span><br><span style="color: gray; font-size: 12px">'.$result2['date'].'</span>';
								 }else{
									echo '<span style="font-weight: 500;">'.$result2['userName'].'</span><br><span style="color: gray; font-size: 12px">'.$result2['date'].'</span>';
								 }

								 ?>
							</td>
							 <td style="background: #F5F5F5; border-radius: 7px; padding-right: 0px; padding-bottom: 10px;"><?php echo $result2['comment']?></td>
							 
						 	</tr>
							 <?php
									}
									?>
									<tr>
										
										<td colspan="4" style="text-align: right;"><button class='replybtn buysubmit'>Trả lời</button><br>
										<form action="" method="post">
											<input type="hidden" name="comment_id" value="<?php echo $result['comment_id']?>">
										<div class='replyform'></div> 
										</form>													
									</tr>
									
							<?php
								}
								
							 ?>
						 <tr><td><p></p></td></tr>
						 <?php
							if($get_reply_comment== false){
								?>
								<tr>
								<td colspan="4" style="text-align: right;"><button class='replybtn buysubmit'>Trả lời</button><br>
										<form action="" method="post">
											<input type="hidden" name="comment_id" value="<?php echo $result['comment_id']?>">
										<div class='replyform'></div> 
										</form>													
									</tr>
						<?php
							}
						
						}
					}
				
			
					?>
						</table>
					</div>
				

				</div>

				<div class="rightsidebar span_3_of_1">
					<h2>Danh Mục</h2>
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

				</div>
			</div>
		</div>
		
		<?php
		include 'inc/footer.php';
		?>
<script>
	var varHtml = "<textarea name='comment' style='resize: none; border-radius: 5px; width : 450px'></textarea>   <input type='submit' class ='buysubmit' name='submitreply'/>";
					

	var allElements = document.body.getElementsByClassName("replybtn");

	var addCommentField = function() {
  	for (var i = 0; allElements.length > i; i++) {
    if (allElements[i] === this) {
      console.log("this " + i);

      if (document.getElementsByClassName("replyform")[i].innerHTML.length === 0) {
        document.getElementsByClassName("replyform")[i].innerHTML = varHtml;
    }

    }
  	}
	};


	for (var i = 0; i < allElements.length; i++) {
  		allElements[i].addEventListener('click', addCommentField, false);
	}
</script>
		