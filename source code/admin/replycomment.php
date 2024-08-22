<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/user.php';  ?>
<?php
    // gọi class category
    $user = new user(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $comment = $_POST['comment'];
        $comment_id =$_GET['comment_id'];
        $product_id = $_GET['product_id'];
        $adminId = Session::get('adminName');
        $insert_comment_admin = $user -> insert_comment_admin($comment,$adminId,$comment_id,$product_id); // hàm check catName khi submit lên
    }
  ?>
        <div class="grid_8">
            <div class="box round first grid">
                <h2>Trả lời bình luận</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($insert_comment_admin)){
                        echo $insert_comment_admin;
                    }
                 ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td style="text-align: center;">
                            <textarea name="comment" id="" cols="130" rows="5" placeholder="Gửi bình luận tại đây" style="resize: none; border-radius: 5px;"></textarea>
                            </td>
                        </tr>
						<tr> 
                            <td style="text-align: center;">
                                <input type="submit" name="submit" Value="Gửi" style="background: #202124; color: rgb(232, 234, 237);"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>