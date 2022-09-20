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

                <form role="form" action="" name="formR" method="post" enctype="multipart/form-data">
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
                                                                    <input class="form-control" type="hidden" hidden name="id" id="id">
                                                                    <label>Type</label>
                                                                    <select class="form-control" type="text" name="maincategory" id="maincategory">
                                                                        <option>T-LOUNGE</option>
                                                                        <option>GRAND-ROYAL-SPA</option>
                                                                        <option>SKIN-BODY-CARE</option>
                                                                        <option>CHINGAI</option>
                                                                        <option>TROPICS</option>
                                                                    </select>
                                                                    <label>Category Name</label>
                                                                    <input class="form-control" type="text" name="category" id="category">
                                                                    <label>Description</label>
                                                                    <input class="form-control" type="text" name="description" id="description">
                                                                    <label>Service name</label>
                                                                    <input class="form-control" type="text" name="servicename" id="servicename">
                                                                    <label>Price</label>
                                                                    <input class="form-control" type="number" name="price" id="price">
                                                                    <input class="form-control" disabled type="hidden" name="pt" id="pt">
                                                                    <label>Image</label>
                                                                    <input class="form-control" type="file" name="photo" id="photo">
                                                                    <img src="images/' . $image . '" width="50px;" height="50px;" style ="border-radius: 50%;" alt="Image" id="pt">
                                                                    </br>
                                                                    <label>Location</label>
                                                                    <input class="form-control" type="text" name="location" id="location">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" name="submit2">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>


                <?php
                include "sessionCon.php";
                if (isset($_POST['submit2'])) {

                    $name = $_POST['id'];
                    $ImageName = $_FILES['photo']['name'];
                    $fileElementName = 'photo';
                    $path = 'images/';
                    $location = $path . $_FILES['photo']['name'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], $location);

                    mysqli_query($conn, "update `services` set maincategory='$_POST[maincategory]',category='$_POST[category]',description='$_POST[description]',servicename='$_POST[servicename]',price='$_POST[price]',image='$ImageName',location='$_POST[location]' where id=$name");
                }
                ?>








                <?php
                $con = new mysqli('localhost', 'root', '', 'mydatabase');
                if (!$con) {
                    die(mysqli_error($con));
                }
                if (isset($_POST['search'])) {
                    $searchkey = $_POST['option'];
                    $sql = "Select * from `services` where maincategory like '%$searchkey%'";
                } else {
                    $sql = "Select * from `services`";
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


                <div  style=" border: 4px solid #FFF5B7;" class="table-responsive">
                    <table id="table" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">ID</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Type</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Category name</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Description</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Service name</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Price</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Image</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Location</th>
                                <th style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeU">
                                <?php
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $maincategory = $row['maincategory'];
                                        $category = $row['category'];
                                        $description = $row['description'];
                                        $servicename = $row['servicename'];
                                        $price = $row['price'];
                                        $image = $row['image'];
                                        $location = $row['location'];
                                        echo
                                        '<tr>
                                                            <th scope="row">' . $id . '</th>
                                                            <td>' . $maincategory . '</td>
                                                            <td>' . $category . '</td>
                                                            <td>' . $description . '</td>
                                                            <td>' . $servicename . '</td>
                                                            <td>' . $price . '</td>
                                                            <td><img src="images/' . $image . '" width="50px;" height="50px;" style ="border-radius: 50%;" alt="Image"></td>
                                                            <td>' . $location . '</td>
                                                            <td>
                                                            <button type="button" id="buttonq" class="btn btn-primary ">select</button>

                                                            <button class="btn btn-danger"><a class="wt" href="delete2.php?deleteid=' . $id . '">Delete</a></button>
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
                                    document.getElementById("maincategory").value = this.cells[1].innerHTML;
                                    document.getElementById("category").value = this.cells[2].innerHTML;
                                    document.getElementById("description").value = this.cells[3].innerHTML;
                                    document.getElementById("servicename").value = this.cells[4].innerHTML;
                                    document.getElementById("price").value = this.cells[5].innerHTML;
                                    document.getElementById("pt").value = this.cells[6].innerHTML;
                                    document.getElementById("location").value = this.cells[7].innerHTML;

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