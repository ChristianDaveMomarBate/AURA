<?php

include 'sessionCon.php';
if (isset($_GET['deleteid4']))
{
    $id = $_GET['deleteid4'];
    $sql = "Delete from `appointment` where id=$id";
    echo '<script>alert("DELETED")</script>';
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header('location:clientloginpage.php');
    }else 
    {
        die(mysqli_error($conn));
    }

}
 
?>
