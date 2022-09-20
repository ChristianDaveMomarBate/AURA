<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>AURA Appointment System</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/metisMenu.min.css" rel="stylesheet">
    <link href="../css/timeline.css" rel="stylesheet">
    <link href="../css/startmin.css" rel="stylesheet">
    <link href="../css/morris.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="firstpage.php">AURA ONLINE APPOINTMENT SYSTEM </a>
                &nbsp;
                &nbsp;
                &nbsp;
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Register Client </h3>
                            <p></p>
                            <a href="clientloginpage.php">
                                <h3 class="panel-title">Back</h3>
                            </a>
                        </div>
                        <style>
                            .wt {
                                color: white;
                            }
                        </style>
                        <div class="panel-body">
                            <form role="form" action="" name="formR" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Complete Name" name="name" type="text" autofocus>
                                    </div>
                                    <p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp POSITION</p>
                                    <div class="form-group">
                                        <select name="position" class="form-control form-control-lg" id="exampleFormControlSelect2">
                                            <option>Client</option>
                                        </select>
                                    </div>
                                    <input class="btn btn-danger btn-rounded btn-fw" type="reset" pla>
                                    <button class="btn btn-primary" name="submit">Submit</button>
                                </fieldset>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/startmin.js"></script>

</body>

<?php
include "sessionCon.php";
if (isset($_POST['submit'])) {
    if (empty($_POST['password']) || empty($_POST['name'])) {
        echo '<script>alert("Please Fill in the blank first")</script>';
    } else {
        mysqli_query($conn, "insert into cuser values(NULL,'$_POST[password]','$_POST[name]','$_POST[position]')");
        echo '<script>alert("You are registered please log in ")</script>';
        echo '<script>
        window.location = "clientloginpage.php";
    </script>';
    }
}
?>


</html>