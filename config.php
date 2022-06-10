<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbn = 'examinationsystem';
    $con = mysqli_connect($host,$user,$pass,$dbn);
    mysqli_set_charset($con, 'utf8');
?>