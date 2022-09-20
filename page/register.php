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
                <a class="navbar-brand" href="appointment.php">AURA ONLINE APPOINTMENT SYSTEM </a>
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
                            <h3 class="panel-title">Register user </h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" name="formR" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Mobile number" name="phone" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>

                                    <p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp POSITION</p>
                                    <div class="form-group">
                                        <select name="admin" class="form-control form-control-lg" id="exampleFormControlSelect2">
                                            <option>Administrator</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Fullname" name="name" type="text" autofocus>
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
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['phone'] || empty($_POST['password']) || empty($_POST['admin'])|| empty($_POST['name']))) {
        echo '<script>alert("Please Fill in the blank first")</script>';
    } else {
        mysqli_query($conn, "insert into users values(NULL,'$_POST[username]','$_POST[email]','$_POST[phone]','$_POST[password]','$_POST[admin]','$_POST[name]')");
        echo '  <script>
  window.location = "appointment.php";
</script>';
    }
}
?>



</html>