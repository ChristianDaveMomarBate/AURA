<?php

include 'sessionCon.php';
if (isset($_GET['deleteid3']))
{
    $id = $_GET['deleteid3'];
    $sql = "UPDATE `appointment` SET `status`='Cancelled' where id=$id";
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