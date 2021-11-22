<?php
session_start();

include("../db.php");

$cat_id = $_GET['id'];

$sql = "select *from categories where cat_id= $cat_id";

$res = mysqli_query($con, $sql);

if($res == true) {

    $count =  mysqli_num_rows($res);

    if($count == 1) {

      $rows = mysqli_fetch_assoc($res);
      $cat_title = $rows['cat_title'];


    } else {
      header("location: update-categories.php");
    }

   

} 


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">UPDATE CATEGORIES</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên loại sản phẩm</label>
                            <br/>
                            <input type="text" id="cat_title" required name="cat_title" value="<?php echo $cat_title?>" class="form-control">
                        </div>
                        </div>
                    
                
                    </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <input type="hidden" name="cat_id" value="<?php echo $cat_id ?>" >
                  <button type="submit" id="btn-save" name="submit" required class="btn btn-fill btn-primary" value="Update Categories">UPDATE CATEGORIES</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
<?php
 
if(isset($_POST['submit'])) {
      $cat_id = $_POST['cat_id'];
      $cat_title = $_POST['cat_title'];
     
      $sql = "UPDATE categories SET cat_title = '$cat_title' WHERE cat_id = '$cat_id'";

      $res = mysqli_query($con, $sql);

      if($res == true ) {

        header('location: categorieslist.php');

        $_SESSION['update']="Categories được cập nhật thành công!";
        

        
      } else {
        $_SESSION['update'] = "Categories được cập nhật không thành công!";

        header('location: update-categories.php');
      }
    }
  ?>
  <?php
include "footer.php";
?>