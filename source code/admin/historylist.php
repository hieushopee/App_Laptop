<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/cart.php';  ?>
<?php include '../classes/product.php';  ?>
<?php include '../classes/history.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pd = new product();
	$fm = new Format();
	$ht = new history();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy catid trên host
        $delProduct = $pd -> del_product($id); // hàm check delete Name khi submit lên
    }
 ?>
<div class="grid_8">
    <div class="box round first grid">
        <h2>Lịch sử bán hàng</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th style="cursor:pointer;">ID</th>
					<th style="cursor:pointer;">Tên sản phẩm</th>
				
					<th style="cursor:pointer;">Tên khách hàng</th>
					<th style="cursor:pointer;">Số lượng</th>
				
					<th style="cursor:pointer;">Tổng giá</th>
					<th style="cursor:pointer;">Ngày bán</th>

					
					
				</tr>
			</thead>
			<tbody>
				<?php 
				
				$htlist = $ht->get_history();
				$i = 0;
				
				
					if($htlist){
					
							while ($result = $htlist->fetch_assoc()){
								$i++;
									
									
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					
					<td><?php echo $result['productName'] ?></td>
					
					<td>
						
						<a href="customer.php?id=<?php echo $result['customer_id'] ?>"><?php echo $result['name'] ?></a>
					</td>
					<td>
						<?php echo $result['quantity'] ?>

					</td>
					<td>
						<?php echo $fm->format_currency($result['quantity']*$result['price']) ?>

					</td>
					<td>
						<?php echo $result['date'] ?>

					</td>
					
					
					
					
				</tr>
				<?php
							
						
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
