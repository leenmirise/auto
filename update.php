<?php
require("header.html");
?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "delo";

$con = mysqli_connect($host, $user, $pass) or die ("no connection"); 
mysqli_select_db($con, $db) or die("no db"); 


if(isset($_REQUEST["target_id"])){

if(isset($_REQUEST['send']))
{
    $target_id = $_REQUEST["target_id"];
    $name=$_REQUEST['delo'];
    $s = "UPDATE `delo` SET `name`='$name' WHERE `id` = ".$target_id;
    print($s);
    mysqli_query($con, $s);
    header('Location: /auto/indeex.php');
}

}
if (isset($_REQUEST['id']))
{
    
    $id = $_REQUEST['id'];
    $s = "select * from `delo` WHERE `id` = ".$id;
    $res = mysqli_query($con, $s);
    $asd = mysqli_fetch_row($res);

    print("<form>");
    print("<label>Название</label>");
    print('<input type="text" name="target_id" value="'.$asd[1].'">');
    print('<input type="submit" value="Принять" name="send" class="btn">');
    print('<input type="submit" value="Отмена" name="cancel" class="btn">');
    print("</form>");
}

if(isset($_REQUEST['cancel'])){
    header('Location: /auto/indeex.php');
}
?>

<?php
require("footer.html");
?>