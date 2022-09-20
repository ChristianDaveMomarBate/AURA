<?php include 'index.php';
?>
<style>
    .wt {
        color: white;
    }
    tr:hover {
        background-color: #82ccdd;
    }
    .bg 
    {
        background-color: #F0FFF1;
    }
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">&nbsp;</h1>
                <p></p>

                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <input type="text"  name ="option" class="form-control" placeholder="SEARCH BY NAME">
                            </div>
                            <p></p>
                            <div class="col-lg-6">
                                <button class="btn btn-success" name="search">Search</button>
                                <button type="button" data-toggle="modal" data-target="#myModal" name="edit" class="btn btn-info">Edit
                                    <i class="fa  fa-edit fa-fw"></i>
                                </button>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Edit information</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="col-lg-12">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <!-- <input class="form-control" placeholder="Category" name="category">
                                                                    <p></p>-->
                                                                    <input class="form-control" type="hidden" hidden name="id" id="id"><br><br>
                                                                    <label>USERNAME: </label>
                                                                    <input class="form-control" type="text" name="user_name" id="user_name"><br><br>
                                                                    <label>EMAIL: </label>
                                                                    <input class="form-control" type="text" name="email" id="email"><br><br>
                                                                    <label>PHONE: </label>
                                                                    <input class="form-control" type="text" name="phone" id="phone"><br><br>
                                                                    <label>PASSWORD: </label>
                                                                    <input class="form-control" type="text" name="password" id="password"><br><br>
                                                                    <input class="form-control" type="hidden" name="position" id="position"><br><br>
                                                                    <label>COMPLETE NAME: </label>
                                                                    <input class="form-control" type="text" name="name" id="name"><br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" name="submit">Submit</button>
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
                    $sql = "Select * from `users` where name like '%$searchkey%'";
                } else {
                    $sql = "Select * from `users`";
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
                    <table id="table" class="table table-bordered " id="dataTables-example">
                        <thead>
                            <tr>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">ID</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Username</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Email</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Phone number</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Password</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Position</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Name</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeU">
                                <?php
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $user_name = $row['user_name'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $password = $row['password'];
                                        $position = $row['position'];
                                        $name = $row['name'];
                                        echo
                                        '<tr>
                                                            <th scope="row">' . $id . '</th>
                                                            <td>' . $user_name . '</td>
                                                            <td>' . $email . '</td>
                                                            <td>' . $phone . '</td>
                                                            <td>' . $password . '</td>
                                                            <td>' . $position . '</td>
                                                            <td>' . $name . '</td>
                                                            <td>
                                                            <button type="button" id="buttonq" class="btn btn-primary ">select</button>
                                                            <button class="btn btn-danger"><a class="wt" href="deleteadmin.php?deleteidadmin=' . $id . '">Delete</a></button>
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
                                    document.getElementById("user_name").value = this.cells[1].innerHTML;
                                    document.getElementById("email").value = this.cells[2].innerHTML;
                                    document.getElementById("phone").value = this.cells[3].innerHTML;
                                    document.getElementById("password").value = this.cells[4].innerHTML;
                                    document.getElementById("position").value = this.cells[5].innerHTML;
                                    document.getElementById("name").value = this.cells[6].innerHTML;
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
    if (empty($_POST['user_name']) || empty($_POST['email']) || empty($_POST['phone'] || empty($_POST['password']) || empty($_POST['admin'])|| empty($_POST['name']))) {
        echo '<script>alert("Please Fill in the blank first")</script>';
    } else {
        mysqli_query($conn, "update `users` set user_name='$_POST[user_name]',email='$_POST[email]',phone='$_POST[phone]',password='$_POST[password]',position='$_POST[position]',name='$_POST[name]' where id=$name");
    }
?>
    <script>
        window.location = "reports.php";
    </script>
<?php
}
?>