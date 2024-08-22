<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	* 
	*/
	class product
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_product($data,$files){
			
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$product_code = mysqli_real_escape_string($this->db->link, $data['product_code']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			

			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			$file_name2 = $_FILES['image2']['name'];
			$file_size2 = $_FILES['image2']['size'];
			$file_temp2 = $_FILES['image2']['tmp_name'];
			
			$div2 =explode('.', $file_name2);
			$file_ext2 = strtolower(end($div2));
			$unique_image2 = substr(md5(time()), 0,10).'.'.$file_ext2;
			$uploaded_image2 = "uploads/".$unique_image2;


			$file_name3 = $_FILES['image3']['name'];
			$file_size3 = $_FILES['image3']['size'];
			$file_temp3 = $_FILES['image3']['tmp_name'];
			
			$div3 =explode('.', $file_name3);
			$file_ext3 = strtolower(end($div3));
			$unique_image3 = substr(md5(time()), 0,10).'.'.$file_ext3;
			$uploaded_image3 = "uploads/".$unique_image3;


			$file_name4 = $_FILES['image4']['name'];
			$file_size4 = $_FILES['image4']['size'];
			$file_temp4 = $_FILES['image4']['tmp_name'];
			
			$div4 =explode('.', $file_name4);
			$file_ext4 = strtolower(end($div4));
			$unique_image4 = substr(md5(time()), 0,10).'.'.$file_ext4;
			$uploaded_image4 = "uploads/".$unique_image4;


			$file_name5 = $_FILES['image5']['name'];
			$file_size5 = $_FILES['image5']['size'];
			$file_temp5 = $_FILES['image5']['tmp_name'];
			
			$div5 =explode('.', $file_name5);
			$file_ext5 = strtolower(end($div5));
			$unique_image5 = substr(md5(time()), 0,10).'.'.$file_ext5;
			$uploaded_image5 = "uploads/".$unique_image5;

			if($product_code =='' || $productName == "" || $productQuantity == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" ){
				$alert = "<span class='error'>không được để trống</span>";
				return $alert;
			}else{
				//move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_product(productName,product_code,catId,productQuantity,product_remain,price,product_desc,type,image,image2,image3,image4,image5) VALUES('$productName','$product_code','$category','$productQuantity','$productQuantity','$price','$product_desc','$type','$file_name','$file_name2','$file_name3','$file_name4','$file_name5'); ";
				//Thêm ảnh dùng biến $unique_image
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>đã được thêm thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>thêm không thành công</span>";
					return $alert;
				}

				}
			}


		public function insert_slider($data,$files)
		{
			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sliderName=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					
					$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Slider Added Successfully</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Slider Added NOT Success</span>";
						return $alert;
					}
				}
				
				
			}

		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_product_warehouse(){
			$query = 
			"SELECT tbl_product.*, tbl_warehouse.*

			 FROM tbl_product INNER JOIN tbl_warehouse ON tbl_product.productId = tbl_warehouse.productId
								
			 order by tbl_warehouse.sl_ngaynhap desc ";

		
			$result = $this->db->select($query);
			return $result;
		}
		public function show_product()
		{
			$query = 
			"SELECT tbl_product.*, tbl_category.catName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								
			 order by tbl_product.productId desc ";

			// $query = "SELECT * FROM tbl_product order by productId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id)
		{
			$query = "DELETE FROM tbl_slider where sliderId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Slider Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Slider Deleted Not Success</span>";
				return $alert;
			}
		}
		public function update_quantity_product($data,$files,$id){
			$product_more_quantity = mysqli_real_escape_string($this->db->link, $data['product_more_quantity']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			
			if($product_more_quantity == ""){

				$alert = "<span class='error'>Không được để trống</span>";
				return $alert; 
			}else{
					$sl_truocnhap = $productQuantity;
					$qty_total = $product_more_quantity + $productQuantity;
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_product SET
					
					productQuantity = '$qty_total'
					WHERE productId = '$id'";
					
					}
					$query_warehouse = "INSERT INTO tbl_warehouse(productId,sl_nhap,sl_truocnhap) VALUES('$id','$product_more_quantity','$sl_truocnhap') ";
					$result_insert = $this->db->insert($query_warehouse);
					$result = $this->db->update($query);

					if($result){
						$alert = "<span class='success'>Thêm số lượng thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm số lượng không thành công</span>";
						return $alert;
					}
				
		}
		public function update_product($data,$files,$id){
	
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$product_code = mysqli_real_escape_string($this->db->link, $data['product_code']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($product_code == "" || $productName=="" || $productQuantity==""  || $category=="" || $product_desc=="" || $price=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{

				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_product SET 
					productName ='$productName',
					catId = '$category',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					price = '$price',
					product_desc = '$product_desc',
					image = '$unique_image',
					type = '$type'

					 WHERE productId = '$id' ";
					}
					else {
						$query = "UPDATE tbl_product SET 
					productName ='$productName',
					catId = '$category',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					price = '$price',
					product_desc = '$product_desc',
					type = '$type'

					 WHERE productId = '$id' ";
					}
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>đã cập nhật thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>chưa được cập nhật </span>";
					return $alert;
				}
				
			}

		}
		public function del_product($id)
		{
			$query = "DELETE FROM tbl_product where productId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Product Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Product Deleted Not Success</span>";
				return $alert;
			}
		}
		public function del_wlist($proid,$customer_id)
		{
			$query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id' ";
			$result = $this->db->delete($query);
			return $result;
		}
		public function getproductbyId($id)
		{
			$query = "SELECT * FROM tbl_product where productId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}		
		//Kết thúc Backend

		public function getproduct_featheread()
		{
			$query = "SELECT * FROM tbl_product where type = '1' order by productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproduct_new()
		{
			$query = "SELECT * FROM tbl_product order by productId desc LIMIT 100 ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_details($id)
		{
			$query = 
			"SELECT tbl_product.*, tbl_category.catName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								
			 WHERE tbl_product.productId = '$id'
			 ";

			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestDell()
		{
			$query = "SELECT * FROM tbl_product where brandId = '10' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getLastestHuawei()
		{
			$query = "SELECT * FROM tbl_product where brandId = '8' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getLastestApple()
		{
			$query = "SELECT * FROM tbl_product where brandId = '7' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getLastestSamsum()
		{
			$query = "SELECT * FROM tbl_product where brandId = '6' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;	
		}
		public function get_compare($customer_id)
		{
			$query = "SELECT * FROM tbl_compare where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;	
		}
		public function get_wishlist($customer_id)
		{
			$query = "SELECT * FROM tbl_wishlist where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertCompare($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_compare = $this->db->select($check_compare);

			if($result_check_compare){
				$msg = "<span class='error'>Sản phẩm đã được thêm vào so sánh</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_compare = $this->db->insert($query_insert);

			if($insert_compare){
						$alert = "<span class='success'>Thêm sản phẩm vào so sánh thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm sản phẩm vào so sánh thất bại</span>";
						return $alert;
					}
			}

		}
		public function insertWishlist($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "<span class='error'>Product Added to Wishlist</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span class='success'>Thêm sản phẩm vào wishlist thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm sản phẩm vào wishlist thất bại</span>";
						return $alert;
					}
			}
		}
		public function update_product_remain ($id){
			$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			$qty = $result["productQuantity"] ;
			$sold = $result["product_soldout"] ;
			$product_remain = $qty - $sold ;
			$query_update = "UPDATE tbl_product
			 SET product_remain='$product_remain' 
			 WHERE productId ='$id' ";
			$result_update = $this->db->update($query_update);
		}
		public function show_product_remain ($id){
			$query_show = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result_show = $this->db->select($query_show);
			return $result_show;
	}
	public function search_product($str){
		$query = "SELECT * FROM tbl_product WHERE LOWER (productName) LIKE '%$str%'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproduct_soldout_best()
		{
			$query = "SELECT * FROM tbl_product order by product_soldout desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;
		}
}
 ?>