<?php
    $mysqli=new mysqli('127.0.0.1','root','','test');

    if($mysqli->connect_error){
        echo "Неудается подключится к бд";
    } else {
        $mysqli->set_charset("utf8");
    }
?>