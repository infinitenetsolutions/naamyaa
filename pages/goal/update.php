<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `goal` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['name'];
        $image = $row['image'];
        $link = $row['goal_ammount'];


        $status = $row['status'];

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | DataTables</title>
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
                <div class="container">
                    <div class="row">
                        <div class="form-group col-sm-4 d-none">


                            <label for="exampleInputEmail1" class="form-label">Id</label>
                            <input disabled type="text" value="<?php echo $id; ?>" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" pattern="[A-Za-z0-9]+">

                        </div>
                        <div class="form-group col-sm-4">


                            <label for="exampleInputEmail1" class="form-label">name</label>
                            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="form-group col-sm-4">


                            <label for="exampleInputEmail1" class="form-label">link</label>
                            <input type="text" name="link" value="<?php echo $link; ?>" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>


                        <div class="form-group col-sm-4">


                            <label for="exampleInputEmail1" class="form-label">date</label>
                            <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">

                        </div>

                        <div class="form-group col-sm-4">
                            <label for="exampleFormControlSelect1">Select Status</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1">

                                <option value='1'>Active</option>
                                <option value='0'>DeActive</option>

                            </select>
                        </div>
                    </div>
                </div>


                <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                <h3><?php echo $msg; ?></h3>
            </form>

            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
                crossorigin="anonymous"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

</body>

</html>
<?php

    } else {
        header('location: ../../pages/achievement/achievement.php');
    }
} else {
    header('location: ../../pages/achievement/achievement.php');
}
if (isset($_POST['Submit'])) {
    $cat = simplename($_POST['name']);
    $ammount = $_POST['link'];


    $status = simplename($_POST['status']);
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `goal` SET `name`='$name',`goal_ammount`='$ammount',`status`='$status' WHERE `id`='$id'";
        $result1 = mysqli_query($connection, $update);




        if ($result1) {
            if (count($_FILES) > 0) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                    $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $sql = "UPDATE `goal` set `image`='$imgData' WHERE `id`='$id' ";
                    $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    if (isset($current_id)) {
                        echo "<script>
                            window.location.replace('../../pages/goal/Event.php')
                        </script>";
                    }
                }
            }


            echo "<script>
                            window.location.replace('../../pages/goal/Event.php')
                        </script>";
        } else {
            echo "<p class='col'>data already exits</p>";
        }
    } else {
        $msg = "Enter status in 1 (Active) & 0 (DeActive)";
        echo $msg;
    }
}
?>