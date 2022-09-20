<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    
?>

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
<body >
<h1>sdsdsds</h1>
    <div id="wrapper" >
        <!-- Navigation -->
        <nav style= "font-weight:bold; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);"class="navbar navbar-inverse navbar-fixed-top " role="navigation">
            <div class="navbar-header">
                <a style= "color:black; font-weight:bold; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);"class="navbar-brand " href="appointment.php">AURA ONLINE APPOINTMENT SYSTEM </a>
            </div>

            <button style= "color:black; background-image:linear-gradient(0deg, #00EAD3,#FFF5B7);" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span style= "background-color:black;"class="icon-bar"></span>
                <span style= "background-color:black;"class="icon-bar"></span>
                <span style= "background-color:black;"class="icon-bar"></span>
            </button>
            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                        <i style= "color:black;" class="fa fa-user fa-fw"></i><b style= "color:black;" class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="register.php"><i class="fa fa-user fa-fw"></i> User Register</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
            <!-- Sidebar -->
            <div style= "font-weight:bold;  background-image:linear-gradient(180deg, #00EAD3,#FFF5B7);" class="navbar-default sidebar bg" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a  style="color:black;" href="appointment.php"><i class="fa fa-edit fa-fw"></i>Appointment</a>
                        </li>
                        <li>
                            <a  style="color:black;" href="addcategory.php"><i class="fa fa-folder-open fa-fw"></i><span class="fa arrow"></span>Category</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a style="color:black;" href="viewoffered.php">View Category</a>
                                </li>
                                <li>
                                    <a style="color:black;" href="addcategory.php">Add Category</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a style="color:black;" href="addservice.php"><i class="fa fa-wrench fa-fw"></i> <span class="fa arrow"></span>Services</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a style="color:black;" href="addservice.php">Add Services</a>
                                </li>
                                <li>
                                    <a style="color:black;" href="viewservices.php">View Services</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a style="color:black;" href="reports.php"><i class="fa fa-table fa-fw"></i> Administrator Info</a>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </nav>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/metisMenu.min.js"></script>
        <script src="../js/startmin.js"></script>
</body>

</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>