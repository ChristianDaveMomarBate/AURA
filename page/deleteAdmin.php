<?php

include 'sessionCon.php';
if (isset($_GET['deleteidadmin']))
{
    $id = $_GET['deleteidadmin'];
    $sql = "Delete from `users` where id=$id";
    echo '<script>alert("DELETED")</script>';
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo '<script>alert("Deleted")</script>';
        header('location:reports.php');
    }else 
    {
        die(mysqli_error($conn));
    }

}
 
?>