<?php

require('link.php');



//передача всех данный с POST

if(isset($_POST['go']) )
{
    //проверки

    
    $errors = array();
   
    ///проверка логина

    if(trim($_POST['login']) == '')
    {
        $errors[] = 'введите логин!';
    }

    if(mb_strlen($_POST['login']) < 3 )
    {
        $errors[] = 'не меньше 3 символов в логине ! ';
    }

    $result = $link->query(" SELECT * FROM `comics` WHERE login = '{$_POST["login"]}' ;");
    $user = $result->fetch_assoc();

    if($user > 0)
    {
        $errors[] = 'пользователь с таким логином уже существует !';
    }

    //
    ///проверка логина
    //

    if(trim($_POST['email']) == '')
    {
        $errors[] = 'введите email';
    }

    $em = $link->query(" SELECT * FROM `comics` WHERE email = '{$_POST["email"]}' ;");
    $new = $em->fetch_assoc();
    
    if($new > 0)
    {
        $errors[] = 'пользователь с такой почтой  уже существует !';
    }

    //
    ///проверка пароля 
    //

    if($_POST['password'] == '')
    {
        $errors[] = 'введите пароли!';
    }
    if($_POST['password'] != $_POST['password2'])
    {
        $errors[] = 'повторный пароль не совпадает!';
    }

    if(mb_strlen($_POST['password']) < 5 ){
        $errors[] = ' пароль должен содержать не меньше 5 символов  ';
    }

    ////
    //все хорошо

    if(empty($errors)){
        
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $q = "INSERT INTO `Comics` (`id`, `login`, `Email`, `password`) VALUES (NULL, '$login', '$email', '$password');";
        mysqli_query($link, $q);
        
        

    }else{
        echo '<div style = "color: red" >'.array_shift($errors).'</div>';
        echo '<br>';
    }
    
};

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>регистрация</title>
</head>
<body>

<form method="POST" >
    <p> логин: <input type="text" name="login" value=""></p>
    <p> введите email: <input type="text" name="email" value=""></p>
    <p> пароль: <input type="password" name="password" ></p>
    <p>введите пароль еще раз <input type="password" name="password2"></p>
    <p><input type="submit" name="go" value="Создать акаунт"></p>
</form>

</body>
</html>






