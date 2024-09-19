<?php
include 'db_connection.php';

$conn = OpenConn();

if (isset($_GET['user_id']))
{
    $user_id = $_GET ['customer_id'];

    $sql = "DELETE FROM 'user_account' WHERE 'user_id' = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo 'Deleted Successfully!';
        header("location : admin.php");
    }
    else {
        echo 'Error';
    }
}