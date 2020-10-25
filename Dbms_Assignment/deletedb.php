<?php

include('dbconnection.php');
session_start();

$id = $_POST['s_id'];

$check = "SELECT * FROM sailor where SID=$id";
$id_check= mysqli_query($connect,$check);

if(mysqli_num_rows($id_check)>0){

    $delete = "DELETE from sailor WHERE SID=$id";

    $sql_delete = mysqli_query($connect,$delete);

    $_SESSION['message']="Record deleted successfully!";
    $_SESSION['msg_type']="success";
}else{
    $_SESSION['message']="ID does not exist. Please try again ";
    $_SESSION['msg_type']="danger";
}


header("Location: delete.php");

?>