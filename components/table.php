<table border = 1>
        <tr>
            <td class="nnn" hidden> Номер</td>
            <td class="nnn"> Дело</td>
            <td class="nnn"> Удалить</td>
            <td class="nnn"> Изменить</td>
            <td class="nnn"> Категория</td>
        </tr>
    <?php
        while($row = mysqli_fetch_row($res))
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
</table>