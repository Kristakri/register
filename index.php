<?php
    include_once('stat.php');
    include('bd.php');
    $stat = new Stat($mysqli);
    $status = $stat->insertData();
    if ($status){
        echo "no error";
    } else {
        echo "Error";
    }
?>