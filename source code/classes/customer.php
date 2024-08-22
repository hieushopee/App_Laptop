<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_customer($date)
		{
			$name = mysqli_real_escape_string($this->db->link, $date['name']);
			$city = mysqli_real_escape_string($this->db->link, $date['city']);
			$zipcode = mysqli_real_escape_string($this->db->link, $date['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $date['email']);
			$address = mysqli_real_escape_string($this->db->link, $date['address']);
			$country = mysqli_real_escape_string($this->db->link, $date['country']);
			$phone = mysqli_real_escape_string($this->db->link, $date['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($date['password']));

			if($this->check_valid_email($email)==false){
				$alert = "<span class='error'>email không hợp lệ</span>";
				return $alert;
			}

			if($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == ""){
				$alert = "<span class='error'>không được để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if ($result_check) {
					$alert = "<span class='error'>email đã tồn tại </span>";
					return $alert;
				}else {
					$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES ('$name','$city','$zipcode','$email','$address','$country','$phone','$password') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Tạo tài khoản thành công</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Tạo chưa thành công</span>";
						return $alert;
					}
				}
			}
		}
		public function login_customer($date)
		{
			$email = mysqli_real_escape_string($this->db->link, $date['email']);
			$password = mysqli_real_escape_string($this->db->link, md5($date['password']));
			if($email == '' || $password == ''){
				$alert = "<span class='error'>Không được để trống</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
				$result_check = $this->db->select($check_login);
				if ($result_check != false) {
					$value = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['customer_id']);
					Session::set('customer_name', $value['name']);
					header('Location:order.php');
				}else {
					$alert = "<span class='error'>Tài khoản hoặc mật khẩu không đúng</span>";
					return $alert;
				}
			}
		}
		public function show_customers($id)
		{
			$query = "SELECT * FROM tbl_customer WHERE customer_id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_customers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			
			if($name=="" || $zipcode=="" || $address=="" || $phone ==""||$city ==""){
				$alert = "<span class='error'>Không được để trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',address='$address',phone='$phone',city='$city' WHERE customer_id ='$id'";
				$result = $this->db->update($query);
				if($result){
						$alert = "<span class='success'>Đã cập nhật thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Cập nhật không thành công</span>";
						return $alert;
				}
				
			}
		}
		public function insert_comment_customer ($data,$proid,$customer_name){
			$proid = mysqli_real_escape_string($this->db->link, $proid);
			$customer_name = mysqli_real_escape_string($this->db->link, $customer_name);
			$comment = mysqli_real_escape_string($this->db->link, $data['comment']);
			if($comment == ""){
				$alert = "<span class='error'>không được để trống</span>";
				return $alert;
			}
			else
			{ 
				$query = "INSERT INTO tbl_comment(userName,productId,comment,type,reply) VALUES ('$customer_name','$proid','$comment',0,0) ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Gửi bình luận thành công</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Bạn phải đăng nhập để gửi bình luận</span>";
						
						return $alert;
					}
		}
	}
	public function insert_reply_customer ($data,$proid,$customer_name){
		$proid = mysqli_real_escape_string($this->db->link, $proid);
		$customer_name = mysqli_real_escape_string($this->db->link, $customer_name);
		$comment = mysqli_real_escape_string($this->db->link, $data['comment']);
		$comment_id = mysqli_real_escape_string($this->db->link, $data['comment_id']);
		if($comment == ""){
			$alert = "<span class='error'>không được để trống</span>";
			return $alert;
		}
		else
		{ 
			$query = "INSERT INTO tbl_comment(userName,productId,comment,type,reply) VALUES ('$customer_name','$proid','$comment',0,'$comment_id') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Gửi bình luận thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Bạn phải đăng nhập để gửi bình luận</span>";
					
					return $alert;
				}
	}
}
		public function get_comment($proid)
		{
			$query = "SELECT * FROM tbl_comment WHERE productId = $proid and reply=0 order by comment_id desc";
			$result = $this->db->select($query);
			return $result;

		}
		public function get_all_comment()
		{
			$query = "SELECT * FROM tbl_comment,tbl_product where tbl_comment.productId = tbl_product.productId and reply =0 order by comment_id desc";
			$result = $this->db->select($query);
			return $result;

		}
		public function del_comment($comment_id)
		{
			$query = "DELETE FROM tbl_comment where comment_id = '$comment_id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Đã xóa</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>xóa không thành công</span>";
				return $alert;
			}
		}
		public function get_reply_comment($comment_id)
		{
			$query = "SELECT * FROM tbl_comment where  tbl_comment.reply = '$comment_id'";
			$result = $this->db->select($query);
			return $result;

		}

		public function change_pass($data,$id){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$oldpass = mysqli_real_escape_string($this->db->link, md5($data['oldpass']));
			$newpass1 = mysqli_real_escape_string($this->db->link, $data['newpass1']);
			$newpass2 = mysqli_real_escape_string($this->db->link, $data['newpass2']);
			if($oldpass == "" || $newpass1 == "" || $newpass2 == ""){
				$alert = "<span class='error'>Không được để trống</span>";
				return $alert;
			}
			else{
				$get_customers = $this->show_customers($id);
				$result = $get_customers->fetch_assoc();
				$realpass = $result['password'];
				if(strcmp($oldpass,$realpass)==0){
					if(strcmp($newpass1,$newpass2)==0){
						$newpass = md5($newpass1);
						$query = "UPDATE tbl_customer SET password = '$newpass' WHERE customer_id ='$id'";
						$result = $this->db->update($query);
						if($result){
							$alert = "<span class='success'>Đổi mật khẩu thành công</span>";
							return $alert;
						}else {
							$alert = "<span class='error'>Đổi mật khẩu thất bại</span>";
							return $alert;
						}
					}
					else{
						$alert = "<span class='error'>Mật khẩu mới không trùng khớp</span>";
						return $alert;
					}
				}
				else{
					$alert = "<span class='error'>Mật khẩu cũ không đúng</span>";
					return $alert;
				}
			}
		}
		public function check_valid_email($email){
			if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)){
				return true; 
			}
            else{
				return false;
			}
		}

	}
 ?>