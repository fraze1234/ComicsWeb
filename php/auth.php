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
    echo '<div style = "color: red" >'.array_shift($errors).'</div>';
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
<body>
<form method="POST">
    <p>  <input type="text" name="login" placeholder="введите логин"></p>
    <p>  <input type="password" name="password" placeholder="введите пароль"></p>
    <p><input type="submit" name="go" value="авторизоваться "></p>
</form>
<a href="http://localhost/ComicsWeb/php/index.php" style="text-decoration: none; color:green; "><h2>нету аккаунта ?</h2></a>
</body>
</html>