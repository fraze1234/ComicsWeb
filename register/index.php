<?php

require('link.php');





if(isset($_POST['go']) )
{
    //проверки

    
    $errors = array();

    //
    ///проверка логина
    //

    $result = $link->query(" SELECT * FROM `comics` WHERE login = '{$_POST["login"]}' ;");
    $user = $result->fetch_assoc();

    if(trim($_POST['login']) == '')
    {
        $errors[] = 'введите логин!';
        
        
    }

    if(mb_strlen($_POST['login']) < 3 )
    {
        $errors[] = 'не меньше 3 символов в логине ! ';
        
    }

    if($user > 0)
    {
        $errors[] = 'пользователь с таким логином уже существует !';
       
    }

    //
    ///проверка email
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

        setcookie('user', $login, time()  + 3600 * 24 * 4, "/");

        $q = "INSERT INTO `Comics` (`id`, `login`, `Email`, `password`) VALUES (NULL, '$login', '$email', '$password');";
        mysqli_query($link, $q);
        
        header('location: http://localhost/ComicsWeb/front/basic.php');

    }else{
        echo '<div class = "errors" >'.array_shift($errors).'</div>';
        echo '<br>';
        $red = "red";
    }
        
};

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>регистрация</title>
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="stylesheet" href="reg.css">
<body>

<?php

if(isset($_COOKIE['user']) == ''):
    
?>
<div class="reg">
<form method="POST" >
    <p> <input type="text" name="login" value="" placeholder="введите логин" class="input"></p>
    <p> <input type="text" name="email" placeholder="введите email" class="input"></p>
    <p> <input type="password" name="password" placeholder="введите пароль" class="input"></p>
    <p> <input type="password" name="password2" placeholder="введите пароль второй раз" class="input"></p>
    <p> <input type="submit" name="go" value="Создать аккаунт" class="button"></p>
</form>
</div>
<?php else: ?>


<?php endif;

    
?>
</body>
</html>






