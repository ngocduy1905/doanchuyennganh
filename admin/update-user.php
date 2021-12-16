  <?php
session_start();

include("../db.php");

$user_id = $_GET['id'];

$sql = "select *from user_info where user_id= $user_id";

$res = mysqli_query($con, $sql);

if($res == true) {

    $count =  mysqli_num_rows($res);

    if($count == 1) {

      $rows = mysqli_fetch_assoc($res);
      $first_name = $rows['first_name'];
      $last_name = $rows['last_name'];
      $email = $rows['email'];
      $mobile = $rows['mobile'];
      $address1 = $rows['address1'];
      $address2 = $rows['address2'];


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
                <h5 class="title">UPDATE USER</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Tên người dùng</label>
                         <br/>
                        <input type="text" id="first_name" required name="first_name" value="<?php echo $first_name?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Họ người dùng</label>
                         <br/>
                        <input type="text" id="last_name" required name="last_name" value="<?php echo $last_name?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email người dùng</label>
                         <br/>
                        <input type="text" id="email" required name="email" class="form-control" value="<?php echo $email?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Số điện thoại người dùng</label>
                         <br/>
                        <input type="text" id="mobile" required name="mobile" class="form-control" value="<?php echo $mobile?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Địa chỉ 1</label>
                         <br/>
                        <input type="text" id="address1" required name="address1" class="form-control" value="<?php echo $address1?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Địa chỉ 2</label>
                         <br/>
                        <input type="text" id="address2" required name="address2" class="form-control" value="<?php echo $address2?>">
                      </div>
                    </div>
              </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <input type="hidden" name="user_id" value="<?php echo $user_id ?>" >
                  <button type="submit" id="btn-save" name="submit" required class="btn btn-fill btn-primary" value="Update User">UPDATE USER</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
<?php
 
if(isset($_POST['submit'])) {
      $user_id = $_POST['user_id'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $address1 = $_POST['address1'];
      $address2 = $_POST['address2'];

      $sql = "UPDATE user_info SET first_name = '$first_name',last_name = '$last_name',email = '$email', mobile = '$mobile', address1 = '$address1',address2 = '$address2' WHERE user_id = '$user_id'";

      $res = mysqli_query($con, $sql);

      if($res == true ) {

        header('location: userlist.php');

        $_SESSION['update']="User được cập nhật thành công!";
        

        
      } else {
        $_SESSION['update'] = "User được cập nhật không thành công!";

        header('location: update-user.php');
      }
    }
  ?>
  <?php
include "footer.php";
?>