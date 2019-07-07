<?php
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'test');
    if($mysqli->connect_error){
        echo "error";
    } else {
        $mysqli->set_charset("UTF-8");
    }

?>