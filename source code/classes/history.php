<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class history{
        private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
        public function insert_history($cusid,$proid,$qty){
			$query = "INSERT INTO tbl_history(customer_id,productId,quantity) VALUES($cusid,$proid,$qty)";
			$result = $this->db->insert($query);			
        }
		public function get_history(){
			$query = "SELECT * FROM tbl_history, tbl_product, tbl_customer WHERE tbl_history.productId = tbl_product.productId and tbl_history.customer_id = tbl_customer.customer_id";
			$result = $this->db->select($query);
			return $result;
		}
    }