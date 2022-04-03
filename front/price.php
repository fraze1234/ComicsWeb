
<?php

require('C:\Server\Apache24\htdocs\ComicsWeb\register\link.php');

$ast = 'SELECT `filename`, `title`, `id`, `price` FROM `products` ';
$res = mysqli_query($link, $ast);
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);

foreach ($products as $product){
}

if(isset($_POST['plus'])){

    echo 'добавлено';
    
    session_start();

    foreach ($products as $product){
        $ast = "SELECT * FROM `products` WHERE title = '{$product['title']}' ";
        $res = mysqli_query($link, $ast);
        $pro = mysqli_fetch_all($res, MYSQLI_ASSOC);
        echo '<pre>';
        var_dump($pro);
        echo '</pre>';
     }
    

    
}



if(isset($_POST['go'])){ 

    session_start();
     $name = $_POST['gl'];

    $ast = "SELECT * FROM `products` WHERE title = '{$name}' ";
    $res = mysqli_query($link, $ast);
    $products = mysqli_fetch_all($res, MYSQLI_ASSOC);

    if ($products > 0) {

        
         $_SESSION["TRUE"] = true;        

    }elseif ($products == 0){
        
       

        echo '<div class="errors">товар не найден !</div>';
        

    }
    
}


?>
<style >

.glob{
    width: 100%;
    padding: 0px 0px 0px 125px;
    margin: 0px 0px 10px 0px;
}
.search{
    font-size: 25px;
}
.but{
    background: #fff;
    color: #000;
    border-radius: 3px;
    border: 1px solid black;
    height: 34px;
    font-size: 17px;
    padding: 10px 5px 10px 5px;
    text-decoration: none;
    transition: 0.3s linear;
}
.but:hover{
    color: #fff; 
    background: rgb(14, 14, 14); 
}
.price{
    height: 500;
    width: 100%;
    padding: 0px 0px 0px 120px;

}

.buy{
    width: 300px;
    height: 350px;
    display: inline-block;
    background-color: #191919;
    margin: 5px ;
    box-shadow: 1px 1px 1px 2px #464646;

}
.title {
    font-size: 25PX;
    color: #fff;
    text-align: center;
    margin: 10px 0px 0px 0px;

}
.price2{
    font-size: 20PX;
    color: #fff;
    text-align: center;
    margin: 0px 0px 10px 0px;
}
.imges {
    height: 200px;
    width: 200px;
    display: inline-block;
    margin: 20px 0px 20px 50px;

}
.plus {
    text-decoration: none;
    color: #fff;
    font-size: 20px;
    margin: 0px 40px 10px 57px;
    transition: 0.5s;
    background-color: #191919;
    border: 1px solid #fff;
    padding: 3px;
    border-radius: 3px;

}  
.plus:hover{
    box-shadow: 1px 1px 1px 4px #464646;
}



</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>купить</title>
</head>


<link href="main.css" rel="stylesheet">



<body>
    <header>  
        <img class="img" src="images/111.png" alt="" class="logo_header">
        <nav class="nav_header">
                <a href="http://localhost/ComicsWeb/front/price.php" class="navi">Купить комиксы</a>
                <a  href="#" class="navi">О нас</a>
                <a  href="#" class="navi">Соц.сети</a>
        </nav>
        
        <nav class="nav_button">
    </header>    

    <div class="glob">
        
        <form method="POST" >
            <input type="search" name="gl" class="search" placeholder="найти комикс">
            <input type="submit" name="go" class="but" value="найти">
        </form>

    </div>
<div class = "price">
  <?php
    if(empty($_SESSION["TRUE"]) ):
    foreach ($products as $product){

        echo '<div class = "buy">';
        echo '<h1 class = "title">' . $product['title'] .'</h1>';
        echo '<a href="#"><img src="images/product_images/'. $product['filename'].'" alt="" class = "imges"></a>';
        echo '<h2 class = "price2"> ' . $product['price'] .' руб</h2>';
        echo '<form method="POST">';
        echo '<input type="submit"  class = "plus" name = "plus" value = "добавить в корзину">';
        echo '</from>';
        echo '</div>';

    }    
   
    endif;

    #вывод товара по запросу
    if(isset($_POST['go'])){
    if($_SESSION['TRUE'] == true):
        $ad = "SELECT * FROM `products` WHERE  title = '{$_POST['gl']}';" ;
        $ad2 = mysqli_query($link, $ad);
        $pro = mysqli_fetch_all($ad2, MYSQLI_ASSOC);
       

       foreach($pro as $p){

            echo '<div class = "buy">';
            echo '<h1 class = "title">' . $p['title'] .'</h1>';
            echo '<a href="#"><img src="images/product_images/'. $p['filename'] .'" alt="" class = "imges"></a>';
            echo '<h2 class = "price2"> ' . $p['price'] .' руб</h2>';
            echo '<form method="POST">';
            echo '<input type="submit"  class = "plus" name = "plus" value = "добавить в корзину">';
            echo '</from>';
            echo '</div>';
       }
    endif;
}
?> 

</div>
    <?php

    if (isset($_COOKIE['user']) == ''):
    
    ?>
    <br>
    <a href="http://localhost/ComicsWeb/front/new_products.php" class="button1"> добавить товар </a>
    <?php endif; ?>
       




</body>

</html>