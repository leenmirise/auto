<?php

require('bd2.php');

$id = $_REQUEST['id'];

$s="DELETE FROM `delo` WHERE `delo`.`id` = ".$id;

mysqli_query($con, $s);

header('Location: /auto/indeex.php');

?>