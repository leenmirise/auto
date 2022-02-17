<?php

$host="localhost";
$user="root";
$pass="";
$db="delo";

$con = mysqli_connect($host, $user, $pass) or die ("no connection");
mysqli_select_db($con, $db) or die ("no db");
$s = "select * from delo";
$res = mysqli_query($con, $s);

?>


<main>
    <form>
        <div class="vvod">
            <label for="delo">Введите новое дело:</label>
            <input type="text" name="delo" id="delo" class="in" required>
            <input type="submit" name="send" class="btn" value="Принять">
        </div>
    </form>

    <table border = 1>
        <tr>
            <td> Номер</td>
            <td> Дело</td>
            <td> Изменить</td>
            <td> Удалить</td>
        </tr>
    <?php

        while($row = mysqli_fetch_row($res))
        {
            print("<tr>");
            print("<td>$row[0]</td>");
            print("<td>$row[1]</td>");
            print("<td><a href='delete.php?id=".$row[0]."'>delete</td>");
            print("<td><a href='update.php?id=".$row[0]."'>update</td>");
            print("</tr>");
        }

    ?>

</main>

<?php
    if(isset($_GET['send'])){
        $delo=$_REQUEST['delo'];

        $s="INSERT INTO `delo`(`id`, `name`) VALUES (NULL,'$delo')";
        mysqli_query($con, $s) or die("ddd");
    
        header('Location: /auto/indeex.php');
    }
?>