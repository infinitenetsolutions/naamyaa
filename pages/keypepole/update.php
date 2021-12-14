<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `keypepole` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $department = $row['Categries'];
        $address = $row['address'];
        $post = $row['post'];
        $description = $row['description'];
        $priority = $row['priority'];

        $date = $row['date'];
        $image = $row['image'];
        $status = $row['status'];

        $categories = "SELECT * FROM `categories`";
        $cat_r = mysqli_query($connection, $categories);

        if (isset($_POST['Submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $post = $_POST['post'];
            $priority = $_POST['priority'];
            $categories = $_POST['Categries'];
            $description = $_POST['description'];
            $date = date('Y-m-y');

            $update = "UPDATE `keypepole` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address',`Categries`='$categories',`post`='$post',`description`='$description',`priority`='$priority',`date`='$date',`status`='$status' WHERE `id`='$id'";
            $result1 = mysqli_query($connection, $update);




            if ($result1) {
                if (!empty($_FILES['image']['tmp_name'])) {

                    $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $sql = "UPDATE `keypepole` set `image`='$imgData' WHERE `id`='$id' ";
                    $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                }


                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> Your Data Successfully Added into the Database
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';

                echo "<script>
                    setTimeout(function() {
                        window.location.replace('pepole.php');
        
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
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="card p-4">
                            <div class="container">
                                <div class="row">

                                    <div class="md-form col-sm-4 mt-3">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
                                        <input value="<?php echo $name ?>" name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                                    </div>
                                    <div class="md-form col-sm-4 mt-3">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Event Categories</label>
                                        <select name="Categries" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">
                                            <option value="<?php echo $department ?>"><?php echo $department ?></option>
                                            <?php while ($cat_row = mysqli_fetch_array($cat_r)) { ?>
                                                <option value=" <?php echo $cat_row['name']; ?>"><?php echo $cat_row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="md-form col-sm-4 mt-3">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">email</label>
                                        <input value="<?php echo $email ?>" name="email" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Email id">

                                    </div>
                                    <div class="md-form col-sm-4 mt-3">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">phone</label>
                                        <input value="<?php echo $phone ?>" name="phone" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Phone number">

                                    </div>
                                    <div class="md-form col-sm-4 mt-3">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">address</label>
                                        <input value="<?php echo $address ?>" name="address" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Address Name">

                                    </div>
                                    <div class="md-form col-sm-4 mt-3">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email"> post </label>
                                        <input value="<?php echo $post ?>" name="post" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Post">

                                    </div>
                                    <div class="md-form col-sm-4 mt-3">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">image</label>
                                        <input value="<?php echo $name ?>" name="image" type="file" id="defaultForm-email" accept="image/*" class="form-control validate" placeholder="Enter Caregorie Name">

                                    </div>
                                    <div class="form-group col-sm-2 mt-3">
                                        <label for="exampleFormControlSelect1">priority</label>
                                        <select name="priority" class="form-control" id="exampleFormControlSelect1">
                                            <option value='<?php echo $priority ?>'><?php echo $priority ?></option>

                                            <option value='high'>High</option>
                                            <option value='medium'>medium</option>
                                            <option value='low'>low</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-2 mt-3">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                                            <option value='1'>Active</option>
                                            <option value='0'>DeActive</option>

                                        </select>
                                    </div>
                                    <div class="md-form col-sm-4 mt-3">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Description</label>
                                        <textarea name="description" id="defaultForm-email" class="form-control validate">
<?php echo $description; ?>


                        </textarea>

                                    </div>
                                </div>
                            </div>
                            <?php echo $msg; ?>

                            <div class="modal-footer d-flex justify-content-center">
                                <button name="Submit" class="btn btn-primary">update Volunteer</button>
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
        header('location: ../../pages/achievement/achievement.php');
    }
} else {
    header('location: ../../pages/achievement/achievement.php');
}

?>