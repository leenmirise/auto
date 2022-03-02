<?php        
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "users";

        $con = mysqli_connect($host, $user, $pass) or die ("error con");
        mysqli_select_db($con, $db) or die ("error db");
?>