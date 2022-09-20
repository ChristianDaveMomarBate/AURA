<?php

include 'sessionCon.php';
if (isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];
    $sql = "Delete from `services` where id=$id";
    echo '<script>alert("DELETED")</script>';
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo '<script>alert("Deleted")</script>';
        header('location:viewservices.php');
    }else 
    {
        die(mysqli_error($conn));
    }

}
 
?>