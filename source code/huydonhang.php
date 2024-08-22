<?php
// /* Kết nối máy chủ MySQL. Máy chủ có cài đặt mặc định (user là 'root' và không có mật khẩu) */
// $conn = mysqli_connect("localhost", "21IT188", "vinh", "doancoso2");
// // Kiểm tra kết nối
// if($conn === false){
//     die("ERROR: Không thể kết nối. " . mysqli_connect_error());
// }
 
// // Làm sạch dữ liệu đầu vào để đảm bảo an toàn
// if(isset($_GET['orderId'])){
//     $id = $_GET['orderId'];
// }
// // Thực thi câu lệnh insert
// $sql = "DELETE FROM tbl_order WHERE orderId = '$id'";
// if(mysqli_query($conn, $sql)){
//     echo "Thêm bản ghi thành công.";
// } else{
//     echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
// }
 
// // Close connection
// mysqli_close($conn);
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $conn = mysqli_connect("localhost", "21it136", "hieu", "doancoso2");
    mysqli_query($conn, "DELETE FROM `tbl_order` WHERE orderId = '$delete_id'");
    header('location:orderdetails.php');
}

?>
?>
