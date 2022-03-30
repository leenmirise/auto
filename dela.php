<?php
session_start();
require('bd2.php');
$id=$_SESSION["id"];
$s1 = "select * from delo where `id_user` = $id and `stage` like 'Сделано'";
$s2 = "select * from delo where `id_user` = $id and `stage` like 'В процессе'";
$s3 = "select * from delo where `id_user` = $id and `stage` like 'В планах'";

if (!empty($_SESSION["name"]))
{
    if(isset($_REQUEST['sub_exit']))
    {
        session_unset();
        session_destroy();
        Header("Location:enter.php");
    }

?>


<main>
    <form>
        <div class="exit">
            <input type="submit" name="sub_exit" class="btn" value="Выйти">
        </div>
        <?php 
            print('<h1>Выполненные дела</h1>');
            $res = mysqli_query($con, $s1);
            require("components/table.php");
            print('<h1>Дела в процессе</h1>');
            $res = mysqli_query($con, $s2);
            require("components/table.php");
            print('<h1>Запланированные дела</h1>');
            $res = mysqli_query($con, $s3);
            require("components/table.php"); 
        ?>
    </form>
</main>

<?php
    }
    else{
        Header("Location: enter.php");
        print('aaa');
    }
?>