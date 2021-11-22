
<?php
    session_start();

    include("../db.php");

    $brand_id = $_GET['id'];

    $sql = "delete from brands where brand_id = $brand_id";

    $res = mysqli_query($con, $sql);

    if($res == true) {

        $_SESSION['delete'] = "Brand được xóa thành công!";

        header("location: brandlist.php");

    } else {

        $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

        header("location: brandlist.php");

        
    }
?>