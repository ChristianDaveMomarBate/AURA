
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
    .wt {
        text-align: center;

    }

    .whte {
        color: dark;
    }

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

        
        <form role="form" action="" name="formR" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title wt">Select Action</h3>
                                <a href="firstpage.php">
                                    <h3 class="panel-title wt" >Back</h3>
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="panel-body">
                            <?php
                            #$user = $_POST['username'];
                            ?>
                            <!--<input type="hidden" name="echsname" value="<?php #echo ($user); ?>">-->
                            <fieldset>
                                <p></p>
                                <div class="form-group">
                                    <!-- <button class="btn btn-success" name="login">SDADADAD</button>-->
                                    <h5 class="wt">
                                        <a class="btn btn-block btn-info" style="color: black;" href="clientloginpage.php">EDIT APPOINTMENT</a>
                                        <p></p>
                                        <a class="btn btn-block btn-info" style="color: black;" href="../page/establishment.php">BOOK APPOINTMENT</a>
                                    </h5>
                            </fieldset>
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
