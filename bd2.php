<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="delo";
    
    $con = mysqli_connect($host, $user, $pass) or die ("no connection");
    mysqli_select_db($con, $db) or die ("no db");
?>