<?php

    $link = mysqli_connect('localhost', 'root', 'root0902', 'Users');
    if(!$link){
        exit('ошибка подключения'. mysqli_connect_error());
    }else{
        echo "успешно!";
    }



?>