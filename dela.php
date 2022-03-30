<?php
session_start();
require('bd2.php');
$id=$_SESSION["id"];
$s1 = "select * from delo where `id_user` = $id and `stage` like 'Сделано'";
$s2 = "select * from delo where `id_user` = $id and `stage` like 'В процессе'";
$s3 = "select * from delo where `id_user` = $id and `stage` like 'В планах'";
$res1 = mysqli_query($con, $s1);
$res2 = mysqli_query($con, $s2);
$res3 = mysqli_query($con, $s3);

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
        <table border = 1>
        <tr>
            <td class="nnn" hidden> Номер</td>
            <td class="nnn"> Дело</td>
            <td class="nnn"> Удалить</td>
            <td class="nnn"> Изменить</td>
            <td class="nnn"> Категория</td>
        </tr>
    <?php
        while($row = mysqli_fetch_row($res1))
        {
            print("<tr>");
            print("<td hidden>$row[0]</td>");
            print("<td >$row[1]</td>");
            print("<td ><a href='delete.php?id=".$row[0]."'><img src='images/delete.png'></td>");
            print("<td ><a href='update.php?id=".$row[0]."'><img src='images/pen.png'></td>");
            print("<td >$row[3]</td>");
            print("</tr>");
        }

    ?>
        <table border = 1>
            <tr>
                <td class="nnn" hidden> Номер</td>
                <td class="nnn"> Дело</td>
                <td class="nnn"> Удалить</td>
                <td class="nnn"> Изменить</td>
                <td class="nnn"> Категория</td>
            </tr>
            <?php
        while($row = mysqli_fetch_row($res2))
        {
            print("<tr>");
            print("<td hidden>$row[0]</td>");
            print("<td >$row[1]</td>");
            print("<td ><a href='delete.php?id=".$row[0]."'><img src='images/delete.png'></td>");
            print("<td ><a href='update.php?id=".$row[0]."'><img src='images/pen.png'></td>");
            print("<td >$row[3]</td>");
            print("</tr>");
        }

    ?>
    
    <table border = 1>
            <tr>
                <td class="nnn" hidden> Номер</td>
                <td class="nnn"> Дело</td>
                <td class="nnn"> Удалить</td>
                <td class="nnn"> Изменить</td>
                <td class="nnn"> Категория</td>
            </tr>
            <?php
        while($row = mysqli_fetch_row($res3))
        {
            print("<tr>");
            print("<td hidden>$row[0]</td>");
            print("<td >$row[1]</td>");
            print("<td ><a href='delete.php?id=".$row[0]."'><img src='images/delete.png'></td>");
            print("<td ><a href='update.php?id=".$row[0]."'><img src='images/pen.png'></td>");
            print("<td >$row[3]</td>");
            print("</tr>");
        }

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