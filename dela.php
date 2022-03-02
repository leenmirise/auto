<?php

require('bd2.php');
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
        
        <table border = 1>
        <tr>
            <td class="nnn"> Номер</td>
            <td class="nnn"> Дело</td>
            <td class="nnn"> Удалить</td>
            <td class="nnn"> Изменить</td>
        </tr>
    <?php
        while($row = mysqli_fetch_row($res))
        {
            print("<tr>");
            print("<td >$row[0]</td>");
            print("<td >$row[1]</td>");
            print("<td ><a href='delete.php?id=".$row[0]."'><img src='images/delete.png'></td>");
            print("<td ><a href='update.php?id=".$row[0]."'><img src='images/pen.png'></td>");
            print("</tr>");
        }

    ?>
    </form>
</main>

<?php
    if(isset($_GET['send'])){
        $delo=$_REQUEST['delo'];

        $s="INSERT INTO `delo`(`id`, `name`) VALUES (NULL,'$delo')";
        mysqli_query($con, $s) or die("ddd");
    
        header('Location: /auto/indeex.php');
    }
?>