<?php 
include './db.php';
$objPDO = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
$objPDO->query('set names utf8');
$sql='select * from user_info';
$objStatement= $objPDO->prepare($sql);
$objStatement->execute();
$datauser = $objStatement->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <style>
       
    </style>
</head>
<body>

<hr>
    <?php 
   // var_dump($data);
   echo '<table  border=1>';
    foreach($datauser as $r)
    {
        ?>
        <tr>
            <td><?php echo $r->user_id ?></td>
            <td><?php echo $r->first_name ?></td>
            <td><?php echo $r->last_name ?></td>
            <td><?php echo $r->email ?></td>
            <td><?php echo $r->password ?></td>
            <td><?php echo $r->	address1 ?></td>
            <td>
                <a href="user_edit.php?user_id=<?php echo $r->user_id ?>">Sua</a>
            
            </td>
        </tr>
        <?php 
    }
    ?>
</body>
</html>