<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `Event` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['name'];
        $date = $row['date'];
        $enddate = $row['enddate'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $country = $row['country'];

        $status = $row['status'];
        if (isset($_POST['Submit'])) {
            $name = simplename($_POST['name']);

            $date    = $_POST['date'];
            $enddate = $_POST['enddate'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $country = $_POST['country'];
            $status = simplename($_POST['status']);

            $update = "UPDATE `Event` SET `name`='$name',`date`='$date',`enddate`='$enddate',`address`='$address',`city`='$city',`state`='$state',`country`='$country',`status`='$status' WHERE  id=$id";
            $result1 = mysqli_query($connection, $update);
            if ($result1) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> Your Data Successfully Added into the Database
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';

                echo "<script>
                    setTimeout(function() {
                        window.location.replace('Event.php');
        
                      }, 1000);
        
                </script>";
            } else {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong>  ' . $connection->error . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            }
        }
?>


        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Naamyaa Foundation</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Font Awesome -->
            <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- DataTables -->
            <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
            <!-- Google Font: Source Sans Pro -->
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
            <!-- Exta css by dev -->
            <link rel="stylesheet" href="../extra.css">
        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                <!-- Navbar -->
                <?php
                include '../navfootersider/nav.php';
                include '../navfootersider/aside.php';
                ?>
                <!-- end navbar -->
                <!-- Main Sidebar Container -->




                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Update</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Update</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->

                    </section>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card p-4">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-sm-4 d-none">


                                        <label for="exampleInputEmail1" class="form-label">Id</label>
                                        <input disabled type="text" value="<?php echo $id; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" pattern="[A-Za-z0-9]+">

                                    </div>
                                    <div class="form-group col-sm-4">


                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>

                                    <div class="form-group col-sm-4">


                                        <label for="exampleInputEmail1" class="form-label">Date</label>
                                        <input type="date" name="date" value="<?php echo $date; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="form-group col-sm-4">


                                        <label for="exampleInputEmail1" class="form-label">End Date</label>
                                        <input type="date" name="enddate" value="<?php echo $enddate; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="form-group col-sm-4">


                                        <label for="exampleInputEmail1" class="form-label">Address</label>
                                        <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="form-group col-sm-4">


                                        <label for="exampleInputEmail1" class="form-label">City</label>
                                        <input type="text" name="city" value="<?php echo $city; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="md-form col-sm-4">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">State</label>
                                        <select name="state" type="text" id="defaultForm-email" class="form-control validate">
                                            <option selected value="<?php echo $state; ?>"><?php echo $state; ?></option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Ladakh">Ladakh</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                        </select>

                                    </div>
                                    <div class="form-group col-sm-4">


                                        <label for="exampleInputEmail1" class="form-label">Country</label>
                                        <input type="text" name="country" value="<?php echo $country; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Status</label>
                                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                                            <option value='1'>Active</option>
                                            <option value='0'>DeActive</option>

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"></label>
                                        <button type="submit" name="Submit" class="btn btn-primary centre p-2">Submit</button>
                                        <h3><?php echo $msg; ?></h3>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </form>

                    <!-- Optional JavaScript; choose one of the two! -->

                    <!-- Option 1: Bootstrap Bundle with Popper -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

                    <!-- jQuery -->
                    <script src="../../plugins/jquery/jquery.min.js"></script>
                    <!-- Bootstrap 4 -->
                    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <!-- DataTables -->
                    <script src="../../plugins/datatables/jquery.dataTables.js"></script>
                    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
                    <!-- AdminLTE App -->
                    <script src="../../dist/js/adminlte.min.js"></script>
                    <!-- AdminLTE for demo purposes -->
                    <script src="../../dist/js/demo.js"></script>
                    <!-- page script -->
                    <script>
                        $(function() {
                            $("#example1").DataTable();
                            $('#example2').DataTable({
                                "paging": true,
                                "lengthChange": false,
                                "searching": false,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                            });
                        });
                    </script>

        </body>

        </html>
<?php

    } else {
        header('location: ../../pages/event/Event.php');
    }
} else {
    header('location: ../../pages/event/Event.php');
}

?>