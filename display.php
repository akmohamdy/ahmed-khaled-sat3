<?php 
session_start();

$infos=$_SESSION['myfile'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
    <?php foreach($infos as $key=>$value){ ?>
        <li><?php echo "$key: $value";?></li>
    <?php }?>
    </ul>
</body>
</html>