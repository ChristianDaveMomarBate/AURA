<style>
    .ct {
        text-align: center;
    }

    .re {
        color: red;
    }
</style>
<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "mydatabase");

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_quantity'        =>    $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("You already added this item")</script>';
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_GET["id"],
            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_quantity'        =>    $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="TROPclientspage.php"</script>';
            }
        }
    }
}
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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

    <form role="form" action="" name="formR" method="post">
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand">AURA ONLINE APPOINTMENT SYSTEM</a>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">

                            <form role="form" action="" name="formR" method="post">
                                <div class="panel-heading">
                                    <a href="../page/establishment.php">
                                        <h3 class="panel-title">Back</h3>
                                    </a>
                                </div>
                                <p></p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary ct" name="submit">Submit Appointment</button>
                                <p></p>
                                <h6 class="re"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PLEASE SELECT 1 ORDER AT A TIME </h6>
                                <div class="form-group">
                                    <input class="form-control" name="date" type="date">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="time" type="time">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ENTER FULL NAME " name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="PHONE NUMBER" name="phone" type="number" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="LOCATION" name="location" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="status" name="status" type="hidden" value="Unpaid">
                                </div>
                                <div class="form-group">
                                </div>


                                <?php
                                if (!empty($_SESSION["shopping_cart"])) {
                                    $total = 0;
                                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                ?>
                                        <!-- <a><?php #echo $values["item_name"]; 
                                                ?></a>-->
                                        <td align="right"><input type="hidden" class="form-control" id="" name="servicerequest" value=" <?php echo $values["item_name"]; ?>"></td>
                                    <?php
                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    }
                                    ?>
                                    <tr>
                                        <td align="right"><input type="hidden" class="form-control" id="" name="price" value=" ₱ <?php echo number_format($total, 2); ?>"></td>

                                    </tr>
                                <?php
                                }
                                ?>
                                
                                <?php
                                include "sessionCon.php";
                                if (isset($_POST['submit'])) {
                                    $date1 = mysqli_real_escape_string($conn, $_POST['date']);
                                    $time2 = mysqli_real_escape_string($conn, $_POST['time']);
                                    $sql = "select * from appointment where date = '$date1' and time = '$time2' ";
                                    $result = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($result);

                                    if ($count > 0) {
                                        echo '<script>alert("You can`t appoint to this schedule due to date and time inputed is  already been booked by other please select other date and time")</script>';
                                        $conn->close();
                                    } else {
                                      echo($quers);
                                      mysqli_query($conn, "insert into appointment values(NULL,'$_POST[name]','$_POST[phone]','$_POST[location]','$_POST[date]','$_POST[time]','$_POST[servicerequest]','$_POST[price]','$_POST[status]','','')");
                                      echo '<script>alert("Appointment booked at Date : '.$date1.'    Time: '.$time2.' check this from edit appointment panel")</script>';
                                        echo ' <script>
                                        window.location = "../page/establishment.php";
                                    </script>';
                                    }
                                }
                                ?>

                                <div style="clear:both"></div>
                                <br />
                                <h3 class="ct">Order Details</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Service name</th>
                                            <th>People</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                        if (!empty($_SESSION["shopping_cart"])) {
                                            $total = 0;
                                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $values["item_name"]; ?></td>
                                                    <td><?php echo $values["item_quantity"]; ?></td>
                                                    <td>₱ <?php echo $values["item_price"]; ?></td>
                                                    <td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                                    <td><a href="TROPclientspage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                                </tr>
                                            <?php
                                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="3" align="right">Total</td>
                                                <td align="right"> ₱<?php echo number_format($total, 2); ?></td>
                                                <td></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </table>

                                </div>
                                <br />
                            </form>
                            <div class="container">
                                <?php
                              $holder = "TROPICS" ;
                              $query = "SELECT * FROM services where maincategory like '%$holder%' ORDER BY id ASC";
                                $result = mysqli_query($connect, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                        <form method="post" action="TROPclientspage.php?action=add&id=<?php echo $row["id"]; ?>">
                                            <div class="col-md-4">
                                                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                                                    <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

                                                    <h4 class="text-info"><?php echo $row["servicename"]; ?></h4>

                                                    <h4 class="text-danger">₱ <?php echo $row["price"]; ?></h4>

                                                    <h4 class="text-info"><?php echo $row["description"]; ?></h4>
                                                    <input type="number" name="quantity" value="1" placeholder="No. of people to appoint" class="form-control" />

                                                    <input type="hidden" name="hidden_name" value="<?php echo $row["servicename"]; ?>" />

                                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-primary" value="Add appointment" />

                                                </div>
                                        </form>
                            </div>
                    <?php
                                    }
                                }

                    ?>
                        </div>
                    </div>
                    <br />

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
