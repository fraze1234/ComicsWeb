
<?php

require('C:\Server\Apache24\htdocs\ComicsWeb\php\link.php');

session_start();

if (isset($_SESSION['cart_number']))

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>купить</title>
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="main.css" rel="stylesheet">


<body>
    <form method="POST"  >
        <img src="123.jpg" alt="">

        <button class="inCorsin" name="">добавить в корзину</button>

        <img src="123.jpg" alt="">
        <button class="inCorsin">добавить в корзину</button>
    </form> 
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="script.js"></script>
</html>