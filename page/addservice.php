<?php include 'index.php'; ?>
<style>
    .h1f {
        text-align: center;
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
                <p class="page-header"></p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <h1 class="page-header h1f">Add services</h1>
        <!-- /.row -->
        <div class="panel-heading">
            <a href="appointment.php">
                <h3 class="panel-title">Back</h3>
            </a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="" name="formR" method="post"  enctype="multipart/form-data">
                                <fieldset>
                                    <p></p>
                                    <button class="btn btn-primary  btn-xs" name="sel">Select category</button>

                                    <p></p>
                                    <div class="form-group">
                                        <select class="form-control" name="select" id="select" onchange="getval(this);">
                                            <option disabled selected>SELECT TYPE</option>
                                            <option>T-LOUNGE</option>
                                            <option>GRAND-ROYAL-SPA</option>
                                            <option>SKIN-BODY-CARE</option>
                                            <option>CHINGAI</option>
                                            <option>TROPICS</option>
                                            <option>SAMPLE-ES</option>
                                        </select>

                                    </div>
                                    <p></p>
                                    <div class="form-group">
                                        <select class="form-control" name="category" id="selectBox">
                                            <option disabled selected>Category from database</option>
                                            <?php
                                            include "sessionCon.php";
                                            if (isset($_POST['sel'])) {
                                                $searchkey = $_POST['select'];
                                                $sql = "Select * from `category` where category like '%$searchkey%'";
                                                $result = mysqli_query($conn, $sql);
                                                $row = mysqli_num_rows($result);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo ("<option value='" . $row['services'] . "'>" . $row['services'] . "</option>");
                                                }
                                                echo '<td><input class="text" type="hidden" id="" name="txtLogin" value="' . $searchkey . '"></td>';
                                            } else {
                                                $sql = "Select * from `category`";
                                                $searchkey = "";
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Description" name="description" type="text">
                                        <input class="form-control" placeholder="Service name" name="servicename" type="text">
                                        <input class="form-control" placeholder="Price" name="price" type="number">

                                        <label>Choose image</label>

                                        <input type="file" name="photo">

                                        <input class="form-control" placeholder="Location" name="location" type="text">
                                        
                                    </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <div class="panel-heading">
                                <input type="reset" class="btn btn-danger btn-rounded btn-fw">
                                <button class="btn btn-primary" name="submit">Add services</button>
                                <p></p>
                            </div>
                            <div class="form-group">
                            </div>
                        </div>

                        <fieldset>
                            </form>

                            <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->

                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
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


    $ImageName = $_FILES['photo']['name'];
    $fileElementName = 'photo';
    $path = 'images/'; 
    $location = $path . $_FILES['photo']['name']; 
    move_uploaded_file($_FILES['photo']['tmp_name'], $location); 

    if (empty($_POST['description']) || empty($_POST['category']) || empty($_POST['servicename']) || empty($_POST['price'])) {
        echo '<script>alert("Please Fill in the blank first")</script>';
    } else {

        mysqli_query($conn, "insert into services values(NULL,'$_POST[txtLogin]','$_POST[category]','$_POST[description]','$_POST[servicename]','$_POST[price]','$ImageName','$_POST[location]')");
        echo '<script>alert("Inserted")</script>';
    }
?>
    <script>
        // window.location = "viewservices.php";
    </script>
<?php
}
?>