<?php

include 'sessionCon.php';
if (isset($_GET['updateAppid']))
{
    $id = $_GET['updateAppid'];
    $sql = "UPDATE `appointment` SET `status`='Paid' where id=$id";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo '<script>alert("Deleted")</script>';
        header('location:appointment.php');
    }else 
    {
        die(mysqli_error($conn));
    }

}
 
?>