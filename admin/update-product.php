<?php
session_start();

include("../db.php");

$product_id = $_GET['id'];

$sql = "select *from products where product_id= $product_id";

$res = mysqli_query($con, $sql);

if($res == true) {

    $count =  mysqli_num_rows($res);

    if($count == 1) {

      $rows = mysqli_fetch_assoc($res);
      $product_title = $rows['product_title'];
      $product_price = $rows['product_price'];
      $product_desc = $rows['product_desc'];
      $product_image = $rows['product_image'];
      $product_keywords = $rows['product_keywords'];
      $product_color = $rows['product_color'];
      $product_size = $rows['product_size'];
      $product_quantity = $rows['product_quantity'];
      $product_made_in = $rows['product_made_in'];
      $product_import_date = $rows['product_import_date'];
     

    } else {
      header("location: update-product.php");
    }

   

} 


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="update-product.php" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">UPDATE PRODUCT</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $product_title?>" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Giá</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $product_price?>" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo  $product_desc?>" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Hình</label>
                            <br/>
                            <img src='../product_images/<?php echo $product_image;?>' style='width:50px; height:50px; border:groove #000'  class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Từ khóa</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $product_keywords?>" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Màu</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $product_color?>" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Size</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $product_size?>" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Số lượng</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $product_quantity?>" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sản xuất</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $product_made_in?>" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ngày thêm</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $product_import_date?>" class="form-control">
                        </div>
                        </div>
                    </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <input type="hidden" name="brand_id" value="<?php echo $product_id ?>" >
                  <button type="submit" id="btn-save" name="submit" required class="btn btn-fill btn-primary" value="Update Brands">UPDATE PRODUCTS</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
<?php
 
if(isset($_POST['submit'])) {
      $brand_id = $_POST['brand_id'];
      $brand_title = $_POST['brand_title'];
     
      $sql = "UPDATE brands SET brand_title = '$brand_title' WHERE brand_id = '$brand_id'";

      $res = mysqli_query($con, $sql);

      if($res == true ) {

        header('location: brandlist.php');

        $_SESSION['update']="Brand được cập nhật thành công!";
        

        
      } else {
        $_SESSION['update'] = "Brand được cập nhật không thành công!";

        header('location: update-brand.php');
      }
    }
  ?>
  <?php
include "footer.php";
?>