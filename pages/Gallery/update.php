<?php


$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];
    $type = $_GET['type'];

    $select_single_data = "SELECT * FROM `Gallery` WHERE `id`=$id";

    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];

        $image = $row['photos'];
        $link = $row['link'];
        $date = $row['date'];
        $description = $row['description'];
        $status = $row['status'];

?>


        <!doctype html>
        <html lang="en">


        <?php include '../navfootersider/updatenav.php'; ?>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data">
                            <div class="card p-2">
                                <div class="row">


                                    <div class="mb-3 col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Link</label>
                                        <input type="text" name="link" value="<?php echo $link; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Image</label>
                                      <div class="row">
                                          <div class="col-sm-6">
                                          <input type="file" accept="image/*" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                          </div>
                                          <div class="col-sm-6">
                                          <img <?php echo '<img class="mini" src="data:image/jpeg;base64,' . base64_encode($image) . '"/>'; ?>

                                              </div>
                                      </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Select Status</label>
                                            <select name="status" class="form-control" id="exampleFormControlSelect1">

                                                <option value='1'>Active</option>
                                                <option value='0'>Deactive</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="exampleInputEmail1" class="form-label">Description</label>
                                        <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                       <?php echo $description; ?> </textarea>
                                    </div>


                                    <div class="mb-3 col-md-8">
                                        <label for="exampleInputEmail1" class="form-label"> </label>
                                        <button type="submit" name="Submit" class="btn btn-primary p-2">Submit</button>
                                        <h3><?php echo $msg; ?></h3>
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>

        </section>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>

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
        header('location: ../../pages/Gallery/mediagallery.php');
    }
} else {
    header('location: ../../pages/Gallery/mediagallery.php');
}
if (isset($_POST['Submit'])) {

    $link = $_POST['link'];
    $description = $_POST['description'];

    $status = simplename($_POST['status']);

    $update = "UPDATE `Gallery` SET `description`='$description',`link`='$link',`status`='$status' WHERE  id=$id";
    $result1 = mysqli_query($connection, $update);


    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {

            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE Gallery set `photos`='$imgData' WHERE `id`='$id' ";
            $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
        }
    }

    if ($result1 && $type == 'media') {


        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

        echo "<script>
            setTimeout(function() {
                window.location.replace('mediagallery.php');

              }, 1000);

        </script>";
    } elseif ($result1 && $type == 'video') {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

        echo "<script>
            setTimeout(function() {
                window.location.replace('photosgallery.php');

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