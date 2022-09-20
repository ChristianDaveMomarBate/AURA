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
        </div>
        <h1 class="page-header h1f">Add category</h1>
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
                            <form role="form" action="" name="formR" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <select class="form-control" name="category">
                                            <option>T-LOUNGE</option>
                                            <option>GRAND-ROYAL-SPA</option>
                                            <option>SKIN-BODY-CARE</option>
                                            <option>CHINGAI</option>
                                            <option>TROPICS</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Service" name="service">
                                    </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel-heading">
                                <input class="btn btn-danger btn-rounded btn-fw" type="reset" pla>
                                <button class="btn btn-primary" name="submit">Add category</button>
                                <p></p>
                            </div>
                            <div class="form-group">
                            </div>
                        </div>
                        <fieldset>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include "sessionCon.php";
if (isset($_POST['submit'])) {
    if (empty($_POST['service'])) {
        echo '<script>alert("Please Fill in the blank first")</script>';
    } else {
        mysqli_query($conn, "insert into category values(NULL,'$_POST[category]','$_POST[service]')");
        echo '<script>alert("Inserted")</script>';
        
    }
    ?>
    <script>
        window.location = "viewoffered.php";
    </script>
<?php

}
?>