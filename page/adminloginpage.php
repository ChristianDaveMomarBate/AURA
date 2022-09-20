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

<style>
        body {
      background-image: linear-gradient(0deg, #FFF5B7,#00EAD3);
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="">AURA ONLINE APPOINTMENT SYSTEM</a>
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
                            <a href="firstpage.php">
                                <p></p>
                                <h3 class="panel-title">Back</h3>
                            </a>
                        </div>
                        <style>
                            .rd {
                                color: red;
                                text-align: center;
                            }
                        </style>
                        <div class="panel-body">
                            <form action="login.php" method="post">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="rd"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                                <input class="form-control" type="text" name="uname" placeholder="User Name"><br>
                                <input class="form-control" type="password" name="password" placeholder="Password"><br>
                                <button class="btn btn-primary" type="submit">Login</button>
                                <div class="text-center mt-4 font-weight-light">
                                    Forgot password? <a href="mailto:AURA_email.com?subject = Feedback&body = Message" class="text-primary">Request</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/metisMenu.min.js"></script>
        <script src="../js/startmin.js"></script>
</body>







</html>