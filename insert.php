<?php
require('bd2.php');
$s = "select * from delo ";
$res = mysqli_query($con, $s);


if(isset($_GET['send'])){
    session_start();
    $delo=$_REQUEST['delo'];
    $id=$_SESSION['id'];
    $cat = $_GET['categ'];
    $stage = $_GET['stage'];

    $sen="INSERT INTO `delo`(`id`, `name`, `id_user`, `category`, `stage`) VALUES (NULL,'$delo', '$id', '$cat', '$stage')";
    mysqli_query($con, $sen) or die("ddd");
    header('Location: /auto/indeex.php');
}
if(isset($_GET['exit'])){
    header('Location: /auto/indeex.php');
}
?>
<form method="GET">
    <div class="vvod">
        <label for="delo">Введите новое дело:</label>
        <input type="text" name="delo" id="delo" class="in" >
        <input type="submit" name="send" class="btn" value="Принять">
        <input type="submit" name="exit" class="btn" value="Выйти">
    </div>
    <select name="categ">Укажите категорию
        <option value="Готовка">Еда</option>
        <option value="Уборка">Уборка</option>
        <option value="Учёба"selected>Учёба</option>
        <option value="Спорт">Спорт</option>
        <option value="Отдых">Отдых</option>
        <option value="Работа">Работа</option>
        <option value="Другое">Остальное</option>
    </select>
    <select name="stage">Укажите этап выполнения
        <option value="Сделано">Сделано</option>
        <option value="В процессе">В процессе</option>
        <option value="В планах"selected>В планах</option>
    </select>
</form>
