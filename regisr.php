



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <a href="enter.php">Вход на сайт</a>
    </header>
    <nav>

    </nav>
    <main>
        <form>
            <div class="vvod">
                <label for="name">Логин:</label>
                <input type="text" id="name" placeholder="Придумайте себе имя пользователя" class="in" name="username" required>
                <label for="pass">Пароль:</label>
                <input type="password" id="pass" placeholder="Придумайте себе пароль" class="in" name="pass" required>
            </div>
            <div class="buttons">
                <input type="submit" value="Регистрация" class="bt" name="send" >
            </div>
        </form>
        
    </main>
    <footer>

    </footer>
</body>
</html>

<?php
    //session_start();
    //if(!empty($_SESSION["name"]))
    //{
        //header('Location: /auto/indeex.php');
    //}
    if(isset($_GET['send'])){
        require('bd1.php');

        $a = "select * from `users` where `username`='".$_REQUEST['username']."'";
        $res = mysqli_query($con, $a);
        $user1 = mysqli_fetch_assoc($res);

        if(empty($user1)){
            $name=$_REQUEST['username'];
            $pass=$_REQUEST['pass'];

            $s="INSERT INTO `users`(`id`, `username`, `password`) VALUES (NULL,'$name','$pass')";
            mysqli_query($con, $s) or die("ddd");

            //$_SESSION["login"] = $users["username"];
           // $_SESSION["password"] = $users["password"];
    
            header('Location: /auto/enter.php');
        }
        else{
            print('<div class="nepr">');
            print('<p> Проверьте правильность ввода логина и пароля </p>');
            print('</div>');
        }
    }
?>