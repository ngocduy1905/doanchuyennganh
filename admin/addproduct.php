  <?php
session_start();
include("../db.php");


if(isset($_POST['btn_save']))
{
$product_name=$_POST['product_name'];//ten sản phẩm
$details=$_POST['details'];//Mô tả sản phẩm
$price=$_POST['price'];//giá sản phẩm
//$c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];//Loại sản phẩm (1:quần áo ,2:quần áo nữ , 3:quần áo nam ,4:quần áo trẻ em)
$brand=$_POST['brand'];//thương hiệu sản phẩm
$tags=$_POST['tags'];//Từ khóa để tìm kiếm

//them
$product_color=$_POST['product_color'];//màu sắc sản phẩm
$product_size=$_POST['product_size'];//kích thước sản phẩm
$product_quantity=$_POST['product_quantity'];//số lượng sản phẩm
$product_made_in=$_POST['product_made_in'];//sản xuất bởi
$product_import_date=$_POST['product_import_date'];//ngày nhập

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
		
mysqli_query($con,"insert into products (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords,product_color,product_size,product_quantity,product_made_in,product_import_date) values ('$product_type','$brand','$product_name','$price','$details','$pic_name','$tags','$product_color','$product_size','$product_quantity','$product_made_in','$product_import_date')") or die ("query incorrect");

 header("location: sumit_form.php?success=1");
}

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
                <h5 class="title">THÊM SẢN PHẨM</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tiều đề sản phẩm</label>
                         <br/>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Thêm hình ảnh sản phẩm</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>GIÁ sản phẩm</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Màu sắc sản phẩm</label>
                        <input type="text" id="product_color" name="product_color" required class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Kích thước sản phẩm</label>
                        <input type="text" id="product_size" name="product_size" required class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>số lượng sản phẩm</label>
                        <input type="number" id="product_quantity" name="product_quantity" required="[1-6]" class="form-control">
                      </div>
                    </div>
                    
                  </div>
                 
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">THÊM SẢN PHẨM</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Loại sản phẩm (1:quần áo |2:quần áo nữ | 3:quần áo nam | 4:áo khoác nam | 5:áo vest nam | 6:áo sơ mi nam | 7:áo thun nam)</label>
                        <br/>
                        <input type="number" id="product_type" name="product_type" required="[1-6]" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Thương hiệu sản phẩm (1: gucci , 2:chanel , 3:mango )</label>
                        <input type="number" id="brand" name="brand" required class="form-control">
                      </div>
                    </div>                 
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Từ khóa để tìm kiếm</label>
                        <input type="text" id="tags" name="tags" required class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nhập khẩu bởi</label>
                        <input type="text" id="product_made_in" name="product_made_in" required class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Ngày nhập</label>
                        <input type="date" id="product_import_date" name="product_import_date" required="[1-6]" class="form-control">
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Thêm sản phẩm</button>
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