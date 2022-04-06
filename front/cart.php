<?php
require('C:\Server\Apache24\htdocs\ComicsWeb\register\link.php');

session_start();

$products = $_SESSION['cart'];

foreach($products as $product){
	echo '<div class = "buy">';
	echo '<h1 class = "title">' . $product['title'] .'</h1>';
	echo '<a href="#"><img src="images/product_images/'. $product['filename'].'" alt="" class = "imges"></a>';
	echo '<h2 class = "price2"> ' . $product['price'] .' руб</h2>';
	echo '</div>';
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	

</body>
</html>