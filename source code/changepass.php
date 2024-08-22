<?php 
include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php 
$login_check = Session::get('customer_login');
if ($login_check==false) {
    header('Location:login.php');
}
?>
<?php 
	// if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
 //        echo "<script> window.location = '404.php' </script>";

 //    }else {
 //        $id = $_GET['proid']; // Lấy productid trên host
 //    }
$id = Session::get('customer_id');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $ChangePass = $cs -> change_pass($_POST, $id); // hàm check catName khi submit lên
    } 
    ?>
    <div class="main">
        <div class="content">
           <div class="section group">
              <div class="content_top">
                  <div class="heading">
                      <h3>đổi mật khẩu của bạn</h3>
                  </div>
                  <div class="clear"></div>
              </div>
              <form action="" method="post">
               <table class="tblone">
                
                <tr>
                    <?php 
                    if (isset($ChangePass)) {
                        echo '<td colspan="3">'.$ChangePass.'</td>';
                    }
                    ?>
                
                </tr>
                     <tr>
                         <td>Mật khẩu cũ</td>
                         <td>:</td>

                         <td><input type="password" name="oldpass"></td>
                     </tr>
                     <tr>
                         <td>Mật khẩu mới</td>
                         <td>:</td>
                         <td><input type="password" name="newpass1"></td>
                         
                     </tr>
                     <tr>
                         <td>Nhập lại mật khẩu</td>
                         <td>:</td>
                         <td><input type="password" name="newpass2"></td>
                         
                     </tr>
                     <tr>
                        <td colspan="3"><input type="submit" name="save" value="Lưu lại" class="grey" ></td>
                    </tr>
                    
                    
                
           
        </table>
    </form>

</div>	
</div>

<?php 
include 'inc/footer.php';
?>