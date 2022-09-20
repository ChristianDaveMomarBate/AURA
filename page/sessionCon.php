<?php 
$conn=mysqli_connect("localhost","root","") or die(mysqli_error($conn)); 
mysqli_select_db($conn,"mydatabase") or die(mysqli_error($conn));
?>