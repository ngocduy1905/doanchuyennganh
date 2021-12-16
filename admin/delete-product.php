
<?php
    session_start();

    include("../db.php");

    $id = $_GET['id'];

    $sql = "delete from products where product_id = $id";

    $res = mysqli_query($con, $sql);

    if($res == true) {

        $_SESSION['delete'] = "Product được xóa thành công!";

        header("location: productlist.php");

    } else {

        $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

        header("location: productlist.php");

        
    }
?>