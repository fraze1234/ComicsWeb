<?php

require('link.php');



//передача всех данный с POST

if(isset($_POST['go']) )
{
    //проверки

    ///на пустоту
    $errors = array();
    session_start();

    $a = rand(1,20);
    $b = rand(1,20);
    $_SESSION['result'] = $a + $b;

    if(trim($_POST['login']) == '')
    {
        $errors[] = 'введите логин!';
    }
    if(trim($_POST['email']) == '')
    {
        $errors[] = 'введите email';
    }
    if($_POST['password'] == '')
    {
        $errors[] = 'введите пароли!';
    }
    if($_POST['password'] != $_POST['password2'])
    {
        $errors[] = 'повторный пароль не совпадает!';
    }

    /// проверки на количество символов

    if(mb_strlen($_POST['login']) < 3 ){
        $errors[] = 'не меньше 3 символов в логине ! ';
    }
    if(mb_strlen($_POST['password']) < 5 ){
        $errors[] = ' пароль должен содержать не меньше 5 символов  ';
    }

    ///проверка на созданый аккаунт

    $result = $link->query(" SELECT * FROM `comics` WHERE login = '{$_POST["login"]}' ;");
    $em = $link->query(" SELECT * FROM `comics` WHERE email = '{$_POST["email"]}' ;");

    $new = $em->fetch_assoc();
   
    $user = $result->fetch_assoc();

    if($user > 0)
    {
        $errors[] = 'пользователь с таким логином уже существует !';
    }
    if($new > 0)
    {
        $errors[] = 'пользователь с такой почтой  уже существует !';
    }

    

    

    //все хорощо
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
    <p> логин: <input type="text" name="login" value="<?php  ?>"></p>
    <p> введите email: <input type="text" name="email" value="<?php  ?>"></p>
    <p> пароль: <input type="password" name="password" ></p>
    <p>введите пароль еще раз <input type="password" name="password2"></p>
    <p><input type="submit" name="go" value="Создать акаунт"></p>
</form>

</body>
</html>






