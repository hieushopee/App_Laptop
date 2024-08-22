<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/session.php');
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class user
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function change_pass_admin ($data){
			$passold = mysqli_real_escape_string($this->db->link, ($data['passold']));
			$passnew = mysqli_real_escape_string($this->db->link, ($data['passnew'])); 
			if($passold == "" || $passnew == "")
			{
				$alert = "không được để trống";
				return $alert;
			}
			else {
				$passOld = md5($passold);
				$passNew = md5($passnew);
				$query = "SELECT * FROM tbl_admin WHERE adminpass='$passOld'";
				$result_check = $this->db->select($query);
				if($result_check==false){
					$alert = "Mât khẩu sai hoặc mục đang để trống,làm ơn nhập lại";
				return $alert;
				}
				$query1 = "UPDATE tbl_admin SET adminpass='$passNew' WHERE adminpass ='$passOld'";
				$result = $this->db->insert($query1);
				if($result){
						$alert = "<span class='success'>Đã cập nhật thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Cập nhật không thành công</span>";
						return $alert;
				}
			}
		}
		public function insert_comment_admin ($comment,$admin_name,$comment_id,$product_id){
			$admin_name = mysqli_real_escape_string($this->db->link, $admin_name);
			$comment_id = mysqli_real_escape_string($this->db->link, $comment_id);
			$comment = mysqli_real_escape_string($this->db->link, $comment);
			$product_id = mysqli_real_escape_string($this->db->link, $product_id);
			if($comment == ""){
				$alert = "<span class='error'>không được để trống</span>";
				return $alert;
			}
			else
			{ 
				$query = "INSERT INTO tbl_comment(userName,productId,comment,type,reply) VALUES ('$admin_name','$product_id','$comment','1','$comment_id') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Gửi bình luận thành công</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Gửi bình luận thất bại</span>";
						
						return $alert;
					}
		}
	}
	public function get_comment($comment_id)
		{
			$query = "SELECT * FROM tbl_comment,tbl_admin where tbl_comment.user_id = tbl_admin.adminId and tbl_comment.comment_id = '$comment_id'";
			$result = $this->db->select($query);
			return $result;

		}

			

}
 ?>