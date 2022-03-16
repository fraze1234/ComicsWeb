<?php   

setcookie('user', $user['login'], time() - 3600 * 24 * 10, "/");
    header('location: http://localhost/ComicsWeb/front/basic.php');

?>