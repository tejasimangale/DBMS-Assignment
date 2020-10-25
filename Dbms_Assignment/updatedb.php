<?php

include('dbconnection.php');
session_start();

$s_id='';
$s_name='';
$s_rating='';
$s_age='';
$sid = 0;

if(isset($_GET['edit'])){
    $id= $_GET['edit'];

    $to_update = "SELECT * FROM sailor WHERE SID=$id";

    $sql_to_update = mysqli_query($connect,$to_update);

    if($sql_to_update){
        $result = mysqli_fetch_assoc($sql_to_update);
        $s_id = $result['SID'];
        $s_name = $result['SNAME'];
        $s_rating = $result['RATING'];
        $s_age = $result['AGE'];
    }
    
}

if(isset($_POST['update'])){
    $s_id = $_POST['s_id'];
    $s_name = $_POST['sname'];
    $s_rating = $_POST['srank'];
    $s_age = $_POST['sage'];
    
    $update = "UPDATE sailor SET SNAME='$s_name', RATING='$s_rating', AGE='$s_age' WHERE SID='$s_id'";

    $sql_update = mysqli_query($connect,$update);

    if($sql_update){
        $_SESSION['message']="Record updated successfully!";
        $_SESSION['msg_type']="success";
    }else{
        $_SESSION['message']="Oops something went wrong :(";
        $_SESSION['msg_type']="danger";
    }

    header("Location: update.php");
}
?>
