<?php

require('link.php');

if(isset($_POST['go'])){

    $login = filter_var(trim($_POST['login']));
    $password = filter_var(trim($_POST['password']));
    
    $errors = array();

    //запрос данных в таблицу use
    $result = $link->query(" SELECT * FROM `comics` WHERE login = '$login' AND password = '$password';");
   
    $user = $result->fetch_assoc();
   
    //авторизация
    if($user == 0)
    {
        $errors[] = 'введен не верный логин или пароль';
    }elseif(empty($errors))
    {
        echo "вы успешно авторизовались ";

    }
    echo '<div class="errors">'.array_shift($errors).'</div>';
        echo '<br>';

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

<link rel="stylesheet" href="style.css">

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