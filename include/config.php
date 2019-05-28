<?php

$dsn = "mysql:host=localhost;dbname=elfertblog_v2.0";
$user = "root";
$pass = "";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

try{

    $conn = new PDO($dsn,$user,$pass,$options);

} catch (Exception $e){

    echo '<h3>Failed To Connect To MySQL : { ' . $e->getMessage() . ' }</h3>';

}