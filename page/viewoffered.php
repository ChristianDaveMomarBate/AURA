<?php include 'index.php';
?>
<style>
    .wt {
        color: white;
    }
    tr:hover {
        background-color: #82ccdd;
    }
    body {
  background-image: url("../page/images/bg.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
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
                                <select class="form-control" name="option">
                                    <option>T-LOUNGE</option>
                                    <option>GRAND-ROYAL-SPA</option>
                                    <option>SKIN-BODY-CARE</option>
                                    <option>CHINGAI</option>
                                    <option>TROPICS</option>
                                </select>
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
                                                                    <label>Type</label>
                                                                    <select class="form-control" type="text" name="category" id="category">
                                                                        <option>T-LOUNGE</option>
                                                                        <option>GRAND-ROYAL-SPA</option>
                                                                        <option>SKIN-BODY-CARE</option>
                                                                        <option>CHINGAI</option>
                                                                        <option>TROPICS</option>
                                                                    </select>
                                                                    <label>Category</label>
                                                                    <input class="form-control" type="text" name="services" id="services"><br><br>
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
                    $sql = "Select * from `category` where category like '%$searchkey%'";
                } else {
                    $sql = "Select * from `category`";
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


                <div style=" border: 3px solid #00EAD3;" class="table-responsive">
                    <table id="table" class="table table-bordered " id="dataTables-example">
                        <thead>
                            <tr>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">ID</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Type</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Category name</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeU">
                                <?php
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $category = $row['category'];
                                        $services = $row['services'];
                                        echo
                                        '<tr>
                                                            <th scope="row">' . $id . '</th>
                                                            <td>' . $category . '</td>
                                                            <td>' . $services . '</td>
                                                            <td>
                                                            <button type="button" id="buttonq" class="btn btn-primary ">select</button>

                                                            <button class="btn btn-danger"><a class="wt" href="delete.php?deleteid=' . $id . '">Delete</a></button>
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
                                    document.getElementById("category").value = this.cells[1].innerHTML;
                                    document.getElementById("services").value = this.cells[2].innerHTML;
                                    document.getElementById("id").value = this.cells[0].innerHTML;
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
    if (empty($_POST['services'])) {
        echo '<script>alert("Please Fill in the blank first")</script>';
    } else {
        mysqli_query($conn, "update `category` set category='$_POST[category]',services='$_POST[services]'where id=$name");
    }
?>
    <script>
        window.location = "viewoffered.php";
    </script>
<?php
}
?>