<?php
$title = "Изменить список дел";
require("components/header.php");
?>
<?php
require('bd2.php');
if(isset($_REQUEST['target_id'])){

if(isset($_REQUEST['send']))
{
    $target_id = $_REQUEST['target_id'];
    $name=$_REQUEST['delo'];
    $category = $_REQUEST['cat'];
    $stage = $_REQUEST['stage'];
    $s = "UPDATE `delo` SET `name`='$name' WHERE `id` = ".$target_id;
    mysqli_query($con, $s);
    $a = "UPDATE `delo` SET `category`='$category' WHERE `id` = ".$target_id;
    mysqli_query($con, $a);
    $b = "UPDATE `delo` SET `stage`='$stage' WHERE `id` = ".$target_id;
    mysqli_query($con, $b);
    header('Location: /auto/indeex.php');
}

}
if (isset($_REQUEST['id']))
{
    
    $id = $_REQUEST['id'];
    $s = "select * from `delo` WHERE `id` = ".$id;
    $res = mysqli_query($con, $s);
    $asd = mysqli_fetch_row($res);

    print('<form method="GET">');
    print('<div class="iz">');
    print("<label>Название</label>");
    print('<input hidden type="text" name="target_id" value="'.$id.'" >');
    print('<input type="text" class="in" name="delo" value="'.$asd[1].'">');
    print("<label>Категория</label>");
    print('<input type="text" class="in" name="cat" value="'.$asd[3].'">');
    print("<label>Выберите этап выполнения</label>");
    print('<select name="stage">');
    print('<option value="Сделано">Сделано</option>') ;  
    print('<option value="В процессе">В процессе</option>');
    print('<option value="В планах"selected>В планах</option>');
    print('</select>');

    print('<input type="submit" value="Принять" name="send" class="btn">');
    print('<input type="submit" value="Отмена" name="cancel" class="btn">');
    print('</div>');
    print("</form>");
}

if(isset($_REQUEST['cancel'])){
    header('Location: /auto/indeex.php');
}
?>

<?php
require("components/footer.php");
?>