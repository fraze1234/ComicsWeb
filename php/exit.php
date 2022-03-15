<?php   

setcookie('user', $user['login'], time() - 3600 * 24 * 4, "/");
    header('location: auth.php');

?>