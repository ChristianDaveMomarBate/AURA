<?php
$hostname="localhost";
$username="root";
$dbname="mydatabase";
$password="";
$conn=mysqli_connect($hostname,$username,$password,$dbname) or die ("Connection Failed");

if (isset($_POST) & !empty ($_POST))
{
    
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $username2 = mysqli_real_escape_string($conn,$_POST['username2']);




    $sql = "select * from appointment where date = '$username' and time = '$username2' ";

    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result );

    if($count>0){
        echo '<div style="color:red;">This Schedule is not available please choose another date and time</div>';
       
    }else{
       
        echo '<div style="color:red;">This Schedule is available save to database</div>';
    }
}


?>