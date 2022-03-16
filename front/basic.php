<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComicsLab</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="main.css" rel="stylesheet">
</head>
<body>
    <header>  
        <img class="img" src="images/111.png" alt="" class="logo_header">
        <nav class="nav_header">
                <a href="href.html" class="navi">Купить комиксы</a>
                <a  href="#" class="navi">О нас</a>
                <a  href="#" class="navi">Соц.сети</a>
        </nav>
        
        <nav class="nav_button">
        <?php

        if(isset($_COOKIE['user']) == ''):
            
        ?>
            <a href="http://localhost/ComicsWeb/php/index.php" class="button1">регистрация</a>
            <a href="http://localhost/ComicsWeb/php/auth.php" class="button2">войти</a>
        <?php endif; ?>
        <?php

        if(isset($_COOKIE['user']) > ''):
            
        ?>
            <a href="http://localhost/ComicsWeb/php/exit.php" class="button1">выйти </a>
        <?php endif; ?>
        </nav>
       
        

    </header>

    <div class="content">
        <div><img src="images/ced8adf6b73e208d5fdb0a9bc4037b21--beautiful-boys-beautiful-artwork.jpg"></div>
    </div>
    </header>


    <footer></footer>

</body>
</html>