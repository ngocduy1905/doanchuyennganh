
<?php
    session_start();

    include("../db.php");

    $cat_id = $_GET['id'];

    $sql = "delete from categories where cat_id = $cat_id";

    $res = mysqli_query($con, $sql);

    if($res == true) {

        $_SESSION['delete'] = "Categories được xóa thành công!";

        header("location: categorieslist.php");

    } else {

        $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

        header("location:  categorieslist.php");

        
    }
?>