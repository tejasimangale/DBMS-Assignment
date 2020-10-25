<?php

$server    = "localhost";
$username  = "root";
$password  = "";
$database  = "assignment";

try{
    $connect = mysqli_connect($server, $username, $password, $database);
    
}catch(Exception $error_msg){
    echo $error_msg->getMessage();
}

?>