<?php

require('link.php');

if(isset($_POST['go'])){

    $login = filter_var(trim($_POST['login']));
    $password = filter_var(trim($_POST['password']));
    
    $errors = array();
    $a = true;

    //запрос данных в таблицу use
    $result = $link->query(" SELECT * FROM `comics` WHERE login = '$login' AND password = '$password';");
   
    $user = $result->fetch_assoc();
    
    //админка

    if($login == 'A1dmens455' && $password = 'typeComicsLab' ){
        setcookie('Admin', $a,  time()  + 3600 * 24 * 4, "/");
        echo "привет админ !";
        $a = false;
        header('location: http://localhost/ComicsWeb/front/basic.php');
    }
   
    //авторизация
    if($a = true){
        if($user == 0)
        {
            $errors[] = 'введен не верный логин или пароль';
            echo '<div class="errors">'.array_shift($errors).'</div>';
            echo '<br>';
            
        }
        if($user > 0)
        {
            
            setcookie('user', $login, time()  + 3600 * 24 * 4, "/");
            header('location: http://localhost/ComicsWeb/front/basic.php');
        }

    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="stylesheet" href="reg.css">

<body>

<div class="reg">
<form method="POST">
    <p>  <input type="text" name="login" placeholder="введите логин" class="input"></p>
    <p>  <input type="password" name="password" placeholder="введите пароль" class="input"></p>
    <p><input type="submit" name="go" value="авторизоваться " class="button"></p>
</form>
    <a href="http://localhost/ComicsWeb/php/index.php"  class="sal">создать аккаунт</a>
</div>

</body>
</html>