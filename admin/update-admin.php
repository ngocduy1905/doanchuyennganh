  <?php

include("../db.php");

$admin_id = $_GET['id'];

$sql = "select *from admin_info where admin_id= $admin_id";

$res = mysqli_query($con, $sql);

if($res == true) {

    $count =  mysqli_num_rows($res);

    if($count == 1) {

      $rows = mysqli_fetch_assoc($res);
      $admin_username = $rows['admin_username'];
      $admin_name = $rows['admin_name'];
      $admin_email = $rows['admin_email'];


    } else {
      header("location: update-admin.php");
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
                <h5 class="title">UPDATE ADMIN</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Tên username admin</label>
                         <br/>
                        <input type="text" id="admin_username" required name="admin_username" value="<?php echo $admin_username?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tên admin</label>
                         <br/>
                        <input type="text" id="admin_name" required name="admin_name" value="<?php echo $admin_name?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email admin</label>
                         <br/>
                        <input type="text" id="admin_email" required name="admin_email" class="form-control" value="<?php echo $admin_email?>">
                      </div>
                    </div>
              </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" >
                  <button type="submit" id="btn-save" name="submit" required class="btn btn-fill btn-primary" value="Update Admin">UPDATE ADMIN</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
<?php
 
if(isset($_POST['submit'])) {
      $admin_id = $_POST['admin_id'];
      $admin_username = $_POST['admin_username'];
      $admin_name = $_POST['admin_name'];
      $admin_email = $_POST['admin_email'];

      $sql = "UPDATE admin_info SET admin_username = '$admin_username',
      admin_name = '$admin_name',
      admin_email = '$admin_email'
      WHERE admin_id= '$admin_id'";

      $res = mysqli_query($con, $sql);

      if($res == true ) {

        header('location:adminlist.php');

        $_SESSION['update']="Admin được cập nhật thành công!";
        

        
      } else {
        $_SESSION['update'] = "Admin được cập nhật không thành công!";

        header('location:adminlist.php');
      }
    }
  ?>
  <?php
include "footer.php";
?>