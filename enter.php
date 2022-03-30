<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Вход</title>
</head>
<body class="light">
    <header>
        <a href="regisr.php">Регистрация на сайте</a>
    </header>
    <nav>
        
    </nav>
    <main>
        <form method="post">
            <div class="vvod">
                <label for="name">Логин:</label>
                <input type="text" id="name" placeholder="Введите свой логин" class="in" name="name" required>
                <label for="pass">Пароль:</label>
                <input type="password" id="pass" placeholder="Введите свой пароль" class="in" name="pass" required>
            </div>
            <div class="buttons">
                <input type="submit" value="Вход" class="bt" name="send2">
            </div>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>


<?php
    session_start();
    if(!empty($_SESSION["name"]))
    {
        header('Location: /auto/indeex.php');
    }

    if(isset($_POST['send2'])){
        require('bd1.php');

        $a = "select * from `users` where `username`='".$_REQUEST['name']."' and `password`='".$_REQUEST['pass']."'";
        $res = mysqli_query($con, $a);
        $user1 = mysqli_fetch_assoc($res);

        if(empty($user1)){
            print('<div class="nepr">');
            print('<p> Проверьте правильность ввода логина и пароля </p>');
            print('</div>');
        }
        else{
            $_SESSION["name"] = $user1["username"];
            $_SESSION["pass"] = $user1["pass"];
            $_SESSION["id"] = $user1["id"];
            header('Location: /auto/indeex.php');
        }
    } 
?>
