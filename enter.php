
<?php
    if(isset($_GET['send'])){
        header('Location: /auto/regisr.php');
    }  
    
    if(isset($_GET['send2'])){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "users";

        $con = mysqli_connect($host, $user, $pass) or die ("error con");
        mysqli_select_db($con, $db) or die ("error db");


        $a = "select * from `users` where `username`='".$_REQUEST['name']."' and `password`='".$_REQUEST['pass']."'";
        $res = mysqli_query($con, $a);
        $user = mysqli_fetch_assoc($res);

        if(empty($user)){
            ?><script>alert('Проверьте правильность ввода логина и пароля')</script><?php
        }
        else{
            header('Location: /auto/index.php');
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Вход</title>
</head>
<body>
    <header>

    </header>
    <nav>

    </nav>
    <main>
        <form action="#">
            <div class="vvod">
                <label for="name">Username:</label>
                <input type="text" id="name" placeholder="Enter your user name" class="in" name="name">
                <label for="pass">Password:</label>
                <input type="password" id="pass" placeholder="Enter your password" class="in" name="pass">
            </div>
            <div class="buttons">
                <input type="submit" value="Вход" class="bt" name="send2">
                <input type="submit" value="Регистрация" class="bt" name="send"> 
            </div>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>

