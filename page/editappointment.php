<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>AURA Appointment System</title>

	<link rel="stylesheet" href="style.css" />
	<script type="text/javascript" src="index.js"></script>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/metisMenu.min.css" rel="stylesheet">
	<link href="../css/timeline.css" rel="stylesheet">
	<link href="../css/startmin.css" rel="stylesheet">
	<link href="../css/morris.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
	<style>
		.wt {
			color: white;
		}

		tr:hover {
			background-color: #82ccdd;
		}

		.bg {
			color: #FFF;
			background: transparent;
			border: none;
		}

		.bk {
			color: black;
		}

		.rd {
			color: yellow;
		}

		.red {
			color: red;
		}
	</style>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="clientloginpage.php">AURA ONLINE APPOINTMENT SYSTEM</a>

			&nbsp;
			&nbsp;
			&nbsp;
		</div>
	</nav>
	<form action="" method="post">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header h1f">MY APPOINTMENT</h1>
						<div class="row">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<p>CLIENT NAME : <input disabled type="text" name="Cname" id="Cname" class="bg rd "></p>
								</div>
								<div class="panel-body">
									<p>YOU HAVE SET APPOINTMENT IN THIS SERVICE :<input disabled type="text" name="Cinfo" id="Cinfo" class="bg bk red"></p>
									<p>WITH A PRICE OF : <input disabled type="text" name="Cprice" id="Cprice" class="bg bk red"></p>
								</div>
								<div class="panel-footer">
									<p>LOCATION : <input disabled type="text" name="Clocation" id="Clocation" class="bg bk red"></p>
									<p>DATE : SCHEDULED<input disabled type="text" name="Cdate" id="Cdate" class="bg bk red"></p>
									<p>TIME : SCHEDULED<input disabled type="text" name="Ctime" id="Ctime" class="bg bk red"></p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">Update schedule</h4>
											</div>
											<div class="modal-body">

												<div class="col-lg-12">
													<div class="panel-body">
														<div class="row">
															<div class="col-lg-6">
																<div class="form-group">
																	<!-- <input class="form-control" placeholder="Category" name="category">
                                                                    <p></p>-->
																	<input class="form-control" type="hidden" name="id" id="id">
																	<label>Date scheduled</label>
																	<input class="form-control" type="date" name="date" id="date">
																	<label>Time scheduled</label>
																	<input disabled class="form-control" type="text" name="timeF" id="timeF">
																	<input class="form-control" type="time" name="time" id="time">
																	<label>Feedback</label>
																	<textarea id="feedback" name="feedback" rows="4" cols="50"></textarea>
																
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button class="btn btn-primary" name="move">Move</button>
												</div>
											</div>
										</div>
									</div>
								</div>

								</div>

								<div class="col-lg-6">
								<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">Reason</h4>
											</div>
											<div class="modal-body">

												<div class="col-lg-12">
													<div class="panel-body">
														<div class="row">
															<div class="col-lg-6">
																<div class="form-group">
																	<!-- <input class="form-control" placeholder="Category" name="category">
                                                                    <p></p>-->
																	<textarea id="reason" name="reason" rows="4" cols="50" placeholder="If cancelled give reason "></textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button class="btn btn-primary"  id="cancel"  name="cancel">Confirm</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>
								</form>
	
	<?php
	$user1 = $_POST['uname'];
	$phone = $_POST['phone'];
	$con = new mysqli('localhost', 'root', '', 'mydatabase');
	if (!$con) {
		die(mysqli_error($con));
	}
	$sql = "Select * from `appointment` where name like '$user1' and phone like '$phone'; ";
	$searchkey = "";
	$result = mysqli_query($con, $sql);
	?>

	</div>
	<p></p>
	<div class="panel-body">
		<div class="panel-heading">
		</div>
		<p></p>
		<div class="table-responsive">
			<table id="table" class="table table-bordered ">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Location</th>
						<th>Date</th>
						<th>Time</th>
						<th>Appointment</th>
						<th>Price</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr class="gradeU">
						<?php
						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$id = $row['id'];
								$name = $row['name'];
								$phone = $row['phone'];
								$location = $row['location'];
								$date = $row['date'];
								$time = $row['time'];
								$servicerequest = $row['servicerequest'];
								$price = $row['price'];
								$status = $row['status'];
								$Color = "red";
								$Colorg = "green";
								if ($status == "Unpaid") {
									$holder = '<div style="Color:' . $Color . '">' . $status . '</div>';
								} else {
									$holder = '<div style="Color:' . $Colorg . '">' . $status . '</div>';
								}
								if ($status == "Paid") {
									$PaidButton = '<button disabled  class="btn btn-success"><a class="wt" href="updateApp.php?updateAppid=' . $id . '">Pay</a></button>';
								} else {
									$PaidButton = '<button  class="btn btn-success"><a class="wt" href="updateApp.php?updateAppid=' . $id . '">Pay</a></button>';
								}
								$currentDateTime = $time;
								$newDateTime = date('h:i a', strtotime($currentDateTime));
								echo
								'<tr>
                                                            <th scope="row">' . $id . '</th>
                                                            <td>' . $name . '</td>
															<td>' . $location . '</td>
                                                            <td>' . $date . '</td>
                                                            <td>' . $newDateTime . '</td>
                                                            <td>' . $servicerequest . '</td>
                                                            <td>' . $price . '</td>
                                                            <td>' . $holder . '</td>
                                                            <td>
                                                            <button type="button" data-toggle="modal" data-target="#myModal" name="edit" class="btn btn-warning">Reschedule</button>
															<button type="button" data-toggle="modal" data-target="#myModal2" name="edit" class="btn btn-danger">Cancel</button>
                                                           
                                                            </td>
                                                        
                                                        </tr>';
							}
						}
						?>
					</tr>
				</tbody>
				<script>
					var table = document.getElementById('table');

					for (var i = 1; i < table.rows.length; i++) {
						table.rows[i].onclick = function() {
							document.getElementById("id").value = this.cells[0].innerHTML;
							document.getElementById("Cname").value = this.cells[1].innerHTML;
							document.getElementById("Clocation").value = this.cells[2].innerHTML;
							document.getElementById("date").value = this.cells[3].innerHTML;
							document.getElementById("timeF").value = this.cells[4].innerHTML;
							document.getElementById("Cinfo").value = this.cells[5].innerHTML;
							document.getElementById("Cprice").value = this.cells[6].innerHTML;
							document.getElementById("Cdate").value = this.cells[3].innerHTML;
							document.getElementById("Ctime").value = this.cells[4].innerHTML;
						};
					}
				</script>
			</table>
		</div>
		<!-- /.table-responsive -->
	</div>
	<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
	</div>
	<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->



	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/metisMenu.min.js"></script>
	<script src="../js/startmin.js"></script>

</body>

</html>




<?php
include "sessionCon.php";
if (isset($_POST['move'])) {
	$date1 = mysqli_real_escape_string($conn, $_POST['date']);
	$time2 = mysqli_real_escape_string($conn, $_POST['time']);
	$sql = "select * from appointment where date = '$date1' and time = '$time2' ";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	$name = $_POST['id'];

	if ($count > 0) {
		echo '<script>alert("You can`t appoint to this schedule due to date and time inputed is  already been booked by other please select other date and time")</script>';
		echo ' <script>
		window.location = "clientloginpage.php";
                                    </script>';
		$conn->close();
	} else {
		if (empty($_POST['date']) || empty($_POST['time'])) {
			echo '<script>alert("Please Fill in the blank first")</script>';
			echo ' <script>
		window.location = "clientloginpage.php";
                                    </script>';
		} else {
		mysqli_query($conn, "update `appointment` set date='$_POST[date]',time='$_POST[time]',feedback='$_POST[feedback]' where id=$name");
		echo '<script>alert("Successfully Reschedule")</script>';
		echo ' <script>
		window.location = "clientloginpage.php";
                                    </script>';
		}
	}
}
?>


<?php
include "sessionCon.php";
if (isset($_POST['cancel'])) {
	$name = $_POST['id'];
	$sql = "UPDATE `appointment` SET `status`='Cancelled',`reason`='$_POST[reason]'  where id=$name";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo '<script>alert("Updated")</script>';
        echo ' <script>
		window.location = "clientloginpage.php";
                                    </script>';
    }else 
    {
        die(mysqli_error($conn));
    }
}

?>


