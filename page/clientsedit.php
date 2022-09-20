<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AURA Appointment System</title>

    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="index.js"></script>



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
                <a class="navbar-brand" href="">AURA ONLINE APPOINTMENT SYSTEM</a>

                &nbsp;
                &nbsp;
                &nbsp;
            </div>
        </nav>
        <form action="editappointment.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Find my appointment </h3>
                            </div>
                            <div class="panel-heading">
                                <a href="firstpage.php">
                                    <h3 class="panel-title">Back</h3>
                                </a>
                            </div>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Enter Your Name" />
                                    </div>
                                    <input class="btn btn-success" type="submit" onclick="handleSubmit()" />
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/metisMenu.min.js"></script>
        <script src="../js/startmin.js"></script>

</body>




</html>