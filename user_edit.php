<?php 
include './db.php';
$objPDO = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
$objPDO->query('set names utf8');
$sql='select * from user_info';
$objStatement= $objPDO->prepare($sql);
$objStatement->execute();
$datauser = $objStatement->fetchAll(PDO::FETCH_OBJ);

$m = isset($_GET['user_id'])?$_GET['user_id']:'';
if ($m =='')
{
    header('location:index.php');exit;
}

    $sql="select * from user_info  where user_id= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    $data1 = $objStatement->fetch(PDO::FETCH_OBJ);
    ?>
    <form action="user_update.php" method='post' entype='multipart/form-data'>
        ma: <input type="text" name='user_id' value='<?php echo $data1->user_id ?>' readonly> <br>
        first_name: <input type="text" name='first_name' value='<?php echo $data1->first_name ?>'> <br>
        last_name: <input type="text" name='last_name' value='<?php echo $data1->last_name ?>'> <br>
        email: <input type="email" name='email' value='<?php echo $data1->email ?>'> <br>
        password: <input type="text" name='password' value='<?php echo $data1->password ?>'> <br>
        address1: <input type="text" name='address1' value='<?php echo $data1->address1 ?>'> <br>
        
        <input type="submit" value="update">
    
    </form>

