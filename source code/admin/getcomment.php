<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php';  ?>


<?php require_once '../helpers/format.php'; ?>
<?php 
	$cs = new customer();
	$fm = new Format();
	
	if(!isset($_GET['comment_id']) || $_GET['comment_id'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $comment_id = $_GET['comment_id']; // Lấy catid trên host
      // hàm check delete Name khi submit lên
        $del_comment = $cs -> del_comment($comment_id);
    }
 ?>
<div class="grid_8">
	<div class="box round first grid">
		<h2>Bình luận</h2>  
		<?php 
                    if(isset($del_comment)){
                        echo $del_comment;
                    }
                 ?>    
		<div class="block"> 
			<form action="getcomment.php" method="post">
				<table class="data display datatable" id="example">					
					<thead>
						<tr>
							<th>No.</th>
							<th>Sản phẩm</th>
							<th>Tên khách hàng</th>
							<th>Bình luận</th>
							<th>Ngày gửi</th>
							<th>Xử lý</th>
						</tr>
					</thead>

					<tbody>
						<?php 
				
				$get_all_comment = $cs->get_all_comment();
				$i = 0;
				
				
					if($get_all_comment){
					
							while ($result = $get_all_comment->fetch_assoc()){
								$i++;
				 ?>
				 <tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['userName'] ?></a></td>
					<td><?php echo $result['comment'] ?></td>
					<td><?php echo $result['date'] ?></td>
					<td><a href="?comment_id=<?php echo $result['comment_id']?>">Xóa</a>
								|
						<a href="replycomment.php?comment_id=<?php echo $result['comment_id']?>&product_id=<?php echo $result['productId']?>">Trả lời</a>
						
				   </td>
				</tr>
				 <?php
				}
			}?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
<?php include 'inc/footer.php';?>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
