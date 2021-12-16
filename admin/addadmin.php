  <?php
session_start();
include("../db.php");


if(isset($_POST['btn_save']))
{
  $admin_username = $_POST['admin_username'];
  $admin_name=$_POST['admin_name'];
  $admin_email=$_POST['admin_email'];
  $admin_password=$_POST['admin_password'];


		
  mysqli_query($con,"insert into admin_info (admin_username,admin_name,admin_email,admin_password) values ('$admin_username','$admin_name','$admin_email','$admin_password')") or die ("query incorrect");
  header("location: adminlist.php");

mysqli_close($con);
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
                <h5 class="title">THÊM ADMIN</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Tên username admin</label>
                         <br/>
                        <input type="text" id="admin_username" required name="admin_username" class="form-control">
                      </div>
                    </div>   
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tên admin</label>
                         <br/>
                        <input type="text" id="admin_name" required name="admin_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email admin</label>
                         <br/>
                        <input type="text" id="admin_email" required name="admin_email" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password admin</label>
                         <br/>
                        <input type="text" id="admin_password" required name="admin_password" class="form-control">
                      </div>
                    </div>
               
              </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Thêm ADMIN</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
include "footer.php";
?>