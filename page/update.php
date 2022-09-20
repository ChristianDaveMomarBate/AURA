<?php
include 'sessionCon.php';

if (isset($_GET['updateid'])) {
	$id = $_GET['updateid'];
	$sql = "update `appointment` set date='$_POST[date]',time='$_POST[time]' where id=$id";
	echo '<script>alert("Updated")</script>';
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header('location:clientloginpage.php');
	} else {
		die(mysqli_error($conn));
	}
}

?>



