<?php
include '../../connection.inc.php';

$id=$_GET['id'];
if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
  $select = "SELECT * FROM `Event`";
  $result1 = mysqli_query($connection, $select);

  $select_event = "SELECT * FROM `event_details` WHERE `event_id`='$id'" ;
  $result_event = mysqli_query($connection, $select_event);
  $event_data=mysqli_fetch_array($result_event);
  $titlt=$event_data['title'];
  $details=$event_data['details1'];
  $image1=$event_data['image1'];



?>
<!DOCTYPE html>
<html>

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
              <h1>Event</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Event</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Event of The Product</h3>
                  <br>
                  <br>
                  <a href="" class="btn btn-primary text-center" data-toggle="modal" data-target="#insert-details">Add
                    new item
                  </a>
                  <a href="" class="btn btn-warning text-center" data-toggle="modal" data-target="#insert-details">
                    Update
                  </a>
                  <br>

                </div>
                <!-- /.card-header -->
                <?php
 include 'details-insert.php';
                 
                  // include 'update.php';
                  ?>


                <section class="content">

                  <div class="container-fluid">

                    <div class="row">
                      <div class="col-md-3">
                        <a href="Event.php" class="btn btn-primary btn-block mb-3">Back to Event</a>


                        <!-- /.card -->
                        <div class="card">

                          <!-- /.card-header -->

                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->

                      <div class="col-md-9">

                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title"> Events Details </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">

                            <?php if($titlt!=''){ ?>


                            <div class="mailbox-read-message">
                              <h1 class="text-center"><?php echo $titlt ?></h1>
                              <br>
                              <div class="text-center ml-5 mr-5 ">
                                <?php echo '<img class="img-fluid" src="data:image/jpeg;base64,' . base64_encode($image1) . '"/>'; ?>
                              </div>
                              <p><?php echo $details ?></p>



                            </div>
                            <?php
                      }
                      else{
                        ?>
                            <h1 class="text-center">Data Not Availble</h1>
                            <?php
                      }
                      ?>
                            <!-- /.mailbox-read-message -->
                          </div>
                          <!-- /.card-body -->
                          <hr>

                          <!-- /.card-footer -->
                          <div class="card-footer">

                            <a href="delete-details.php?delete=<?php echo $id ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                              Delete</a>
                            <!-- <a class="btn btn-warning" data-toggle="modal" data-target="#insert-details1">
                              Update</a> -->
                          </div>

                          <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                      </div>

                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include '../navfootersider/footer.php';   ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

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
  <script src="../../ckeditor/ckeditor.js"></script>
  <!-- page script -->
  <script>
    $(function () {
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
  header('location:./AdminLogin/super_Admin.php');
}
?>
<script type="text/javascript">
  // Initialize CKEditor
  //CKEDITOR.inline( 'short_desc' );

  CKEDITOR.replace('details2', {

    width: "100%",
    height: "150px"

  });
</script>