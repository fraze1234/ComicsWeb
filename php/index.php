<?php

include('reg.php');

if (isset($_REQUEST['go'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    if(!$login || !$password){
        $error = 'заполните поля ввода !';
    }
    if(!$error) {
        $query = "INSERT INTO `Users` (`id`, `login`, `password` ) VALUES (NULL, '$login', '$password');";
        mysqli_query($link, $query);
        echo "вы создали аккаунт";
    }else{
        echo $error; 
        exit; 
    }

};



?>
<html>
<head>
    <meta charset="UTF-8">
    <title>регистрация</title>
</head>
<body>
    
<form method="POST">
    <p> логин: <input type="text" name="login"></p>
    <p> пароль: <input type="text" name="password"></p>
    <p><input type="submit" name="go" value="Создать акаунт"></p>
</form>

</body>
</html>