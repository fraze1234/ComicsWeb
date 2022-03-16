<?php

require('link.php');

function (array $data): void
{
    echo '<pre>' .print_r($data, 1) . '</pre>';
}

?>