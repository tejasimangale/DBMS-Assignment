<?php

include('dbconnection.php');
session_start();

$id = $_POST['s_id'];
$name = $_POST['sname'];
$rank = $_POST['srank'];
$age = $_POST['sage'];


$check = "SELECT * FROM sailor where SID=$id";
$id_check= mysqli_query($connect,$check);

if(mysqli_num_rows($id_check)>0){
    $_SESSION['message']="ID already exists. Please enter a different id";
    $_SESSION['msg_type']="warning";
    header("Location: insert.php");
}


$insert = "INSERT INTO sailor (SID,SNAME,RATING,AGE) VALUES ('$id','$name','$rank','$age')";

$sql_insert = mysqli_query($connect,$insert);

if($sql_insert){
    $_SESSION['message']="Record inserted successfully!";
    $_SESSION['msg_type']="success";
}

header("Location: insert.php");

?>