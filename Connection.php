<?php
    $hostName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName   = 'FitnessCompanion';
    $con = mysqli_connect($hostName, $userName,$password,$dbName)or die("Connect failed". $con -> error);
?>

