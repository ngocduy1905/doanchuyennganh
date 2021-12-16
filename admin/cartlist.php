<?php
session_start();
include("../db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$id=$_GET['id'];
/*this is delet query*/
mysqli_query($con,"delete from cart where id='$id'")or die("query is incorrect...");
}

///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Cart List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr>
                          <th>ID</th>
                          <th>ID product</th>
                          <th>IP máy</th>
                          <th>ID user</th>
                          <th>Số lượng</th>
                      <tr>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select id,p_id,ip_add,user_id,qty from cart")or die ("query 1 incorrect.....");

                        $sql = "select *from cart";

                        $res = mysqli_query($con, $sql);

                        
                        
                          if($res== true) {

                          $count = mysqli_num_rows($res);

                          $sn = 1;

                          if($count >0) {

                            while($rows = mysqli_fetch_assoc($res)) {

                                $id = $rows['id'];
                                $p_id = $rows['p_id'];
                                $ip_add = $rows['ip_add'];
                                $user_id = $rows['user_id'];
                                $qty = $rows['qty'];
                          ?>
                          <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $p_id?></td>
                            <td><?php echo $ip_add?></td>
                            <td><?php echo $user_id?></td>
                            <td><?php echo $qty?></td>
                            <td>
                                <a class=' btn btn-danger' href="delete-cart.php?id=<?php echo $id?>">Delete</a>
                            </td>
                            <td>
                                <a class=' btn btn-success' href="update-cart.php?id=<?php echo $id?>">Update</a>
                            </td>
                          </tr>
                        <?php
                               }
                              } else {
    
                              }
                            }      
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"select brand_id, brand_title from brands");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="brandlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>