<?php include 'index.php';
?>
<style>
    .wt {
        color: white;
    }

    tr:hover {
        background-image: linear-gradient(0deg, #FFF5B7,#00EAD3);
    }

    body {
  background-image: url("../page/images/bg.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
<div id="page-wrapper">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header b">&nbsp;</h1>
                <p></p>

                <form action="" method="post">

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa  fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            include "sessionCon.php";
                                            $query = "SELECT id FROM appointment ORDER BY id";
                                            $query_run = mysqli_query($conn, $query);
                                            $row = mysqli_num_rows($query_run);
                                            echo '<h4 class="huge"> ' . $row . '</h4>';
                                            ?>
                                            <div>Clients for a day</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <input type="date" class="form-control" name="option">
                            </div>
                           
                            <button style="padding: 20px 90px;"  class="btn btn-success" name="search">Search</button>
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

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" name="submit">Move</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </form>
                <?php
                $con = new mysqli('localhost', 'root', '', 'mydatabase');
                if (!$con) {
                    die(mysqli_error($con));
                }
                if (isset($_POST['search'])) {
                    $searchkey = $_POST['option'];
                    $sql = "Select * from `appointment`  where date like '%$searchkey%' ";
                } else {
                    $sql = "Select * from `appointment`  ORDER BY date ASC";
                    $searchkey = "";
                }
                $result = mysqli_query($con, $sql);
                ?>

            </div>
            <p></p>
            <div class="panel-body">
                <div class="panel-heading">
                </div>
                <p></p>


                <div style=" border: 4px solid #00EAD3;" class="table-responsive">
                    <table  id="table" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">ID</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Name</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Phone</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Location</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Date</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Time</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Appointment</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Price</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Status</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Action</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Feedback</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Reason for cancellation </th>
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
                                        $feedback = $row['feedback'];
                                        $reason = $row['reason'];
                                        $Color = "red";
                                        $Colorg = "green";
                                        if ($status == "Unpaid"||$status == "Cancelled") {
                                            $holder = '<div style="Color:' . $Color . '">' . $status . '</div>';
                                        } else {
                                            $holder = '<div style="Color:' . $Colorg . '">' . $status . '</div>';
                                        }
                                        if ($status == "Paid") {
                                            $PaidButton = '<button disabled  class="btn btn-success"><a class="wt" href="updateApp.php?updateAppid=' . $id . '">Done</a></button>';
                                        } else {
                                            $PaidButton = '<button  class="btn btn-success"><a class="wt" href="updateApp.php?updateAppid=' . $id . '">Done</a></button>';
                                        }
                                        $currentDateTime = $time;
                                        $newDateTime = date('h:i a', strtotime($currentDateTime));
                                        echo
                                        '<tr>
                                                            <th scope="row">' . $id . '</th>
                                                            <td>' . $name . '</td>
                                                            <td>' . $phone . '</td>
                                                            <td>' . $location . '</td>
                                                            <td>' . $date . '</td>
                                                            <td>' . $newDateTime . '</td>
                                                            <td>' . $servicerequest . '</td>
                                                            <td>' . $price . '</td>
                                                            <td>' . $holder . '</td>
                                                            
                                                            <td>
                                                            ' .  $PaidButton . '
                                                            <button type="button" data-toggle="modal" data-target="#myModal" name="edit" class="btn btn-warning">Reschedule</button>
                                                            <button class="btn btn-danger"><a class="wt" href="delete33.php?deleteid1=' . $id . '">Cancel</a></button>
                                                            </td>
                                                            <td>' . $feedback . '</td>
                                                            
                                                            <td>' . $reason  . '</td>
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
                                    document.getElementById("date").value = this.cells[4].innerHTML;
                                    document.getElementById("timeF").value = this.cells[5].innerHTML;

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


<?php
include "sessionCon.php";
if (isset($_POST['submit'])) {
    $name = $_POST['id'];
    if (empty($_POST['date']) || empty($_POST['time'])) {
        echo '<script>alert("Please Fill in the blank first")</script>';
    } else {
        mysqli_query($conn, "update `appointment` set date='$_POST[date]',time='$_POST[time]' where id=$name");
    }
?>
    <script>
        window.location = "appointment.php";
    </script>
<?php
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

