
<?php
    session_start();

    include("../db.php");

    $brand_id = $_GET['id'];

    $sql1 = "select *from products where product_brand = $brand_id";

    $res1 = mysqli_query($con, $sql1);

    if($res1 == true)
    {
        $count = mysqli_num_rows($res1);

        if($count > 0){
            $_SESSION['delete'] = "Có khóa ngoại bên bảng product!";

            header("location: brandlist.php");

        }else {
            $sql = "delete from brands where brand_id = $brand_id";

            $res = mysqli_query($con, $sql);

            if($res == true) {

                $_SESSION['delete'] = "Brand được xóa thành công!";

                header("location: brandlist.php");

             } else {

                $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

                header("location: brandlist.php");

        
            }
        }
    }
?>