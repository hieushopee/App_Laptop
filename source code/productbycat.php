<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
     
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['catid']; // Lấy catid trên host
    }
    // gọi class category
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    //     $catName = $_POST['catName'];
    //     $updateCat = $cat -> update_category($catName,$id); // hàm check catName khi submit lên
    // }
    
  ?>
  <style>
 	.images_1_of_4 .button a {
 	padding: 10px;
  
    background: #602D8D;
    color: #fff;
	
 	}
 </style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php 
	      	$name_cat = $cat->get_name_by_cat($id);
	      	if ($name_cat) {
	      		while ($result_name = $name_cat->fetch_assoc()) {
	      			# code...
	      		
	      	 ?>
    		<div class="heading">
    		<h3>Danh mục: <?php echo $result_name['catName'] ; ?></h3>
    		</div>
    		<?php 
				}
	      	}
			?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      	$productbycat = $cat->get_product_by_cat($id);
	      	if ($productbycat) {
	      		while ($result = $productbycat->fetch_assoc()) {
	      			# code...
	      		
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php <?php echo $result_sold['productId']?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 
					 <p><span class="price"><?php echo $fm->format_currency($result['price']).'đ' ?></span>
					 <?php 
							if($result['productQuantity']==0){
								echo '<span style="color: red; font-size:15px">(HẾT HÀNG)</span>';
							}
						 ?>					
					</p>
					<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>&qty=<?php echo $result['productQuantity']?>&sold=<?php echo $result['product_soldout']?>&product_remain=<?php echo $result['product_remain']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
	      	}else {
	      		echo "Danh mục này hiện chưa có sản phẩm";
	      	}
				 ?>
			</div>

	
	
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>