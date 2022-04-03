
<?php

require('C:\Server\Apache24\htdocs\ComicsWeb\register\link.php');

if(isset($_POST['go'])){
   $name = $_FILES['images']['name'];
   $tmp_name = $_FILES['images']['tmp_name'];

   move_uploaded_file($tmp_name , "images/product_images/" . $name);

   $title = $_POST['title'];
   $desk = $_POST['desk']; 
   $price = $_POST['price'];

   echo '<img src="images/product_images/'.$name.'">';

   $q = "INSERT INTO `products` (`filename`, `title`, `desk`, `price`) VALUES ('{$name}', '{$title}', '{$desk}', {$price} ) ";
   mysqli_query($link, $q);


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>добавление товаров</title>

    <link href="reg.css" rel="stylesheet">

</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <p>  <input type="text" name="title" placeholder="введите название" class="input"></p>
        <p>  <input type="text" name="desk" placeholder="введите описание" class="input"></p>
        <p>  <input type="text" name="price" placeholder="цена" class="input"></p>
        <input type="file" name="images" placeholder="обложка">
        <p><input type="submit" name="go" value="добавить" class="button"></p>
    </form>
</body>
</html>