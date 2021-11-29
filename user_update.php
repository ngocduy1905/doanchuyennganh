<?php 
include './db.php';
$objPDO = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
$objPDO->query('set names utf8');
$a = isset($_POST['user_id'])?$_POST['user_id']:'';
$b = isset($_POST['first_name'])?$_POST['first_name']:'';
$c = isset($_POST['last_name'])?$_POST['last_name']:'';
$d = isset($_POST['email'])?$_POST['email']:'';
$e = isset($_POST['password'])?$_POST['password']:'';
$f = isset($_POST['address1'])?$_POST['address1']:'';


$sql="update user_info set first_name=?, last_name=?, email=?, password=?, address1=? 
                    where user_id=?  ";
$m =[$b, $c, $d, $e, $f];
$objStatement= $objPDO->prepare($sql);
$objStatement->execute($m);
$n = $objStatement->rowCount();

header('location:index');