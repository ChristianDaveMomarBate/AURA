<?php

include 'sessionCon.php';
if (isset($_GET['deleteid1']))
{
    $id = $_GET['deleteid1'];
    $sql = "update `appointment` SET status ='Cancelled' where id=$id";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo '<script>alert("Cancelled")</script>';
        header('location:appointment.php');
    }else 
    {
        die(mysqli_error($conn));
    }

}
 
?>