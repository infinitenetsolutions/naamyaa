<?php
include '../../connection.inc.php';

if (isset($_GET['read']) && ($_GET['read'] != '')) {
  $id = $_GET['read'];
  $select_single_data = "SELECT * FROM `Contact` WHERE id=$id";
  $result = mysqli_query($connection, $select_single_data);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $name = $row['name'];

    $email = $row['email'];
    $query = $row['about'];
    $date = $row['date'];


?>


    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>AdminLTE 3 | Read Mail</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <link rel="stylesheet" href="../extra.css">
    </head>

    <body class="hold-transition sidebar-mini">
      <div class="wrapper">
        <!-- Navbar -->
        <?php include '../navfootersider/nav.php';
        include '../navfootersider/aside.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        i
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Compose</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Compose</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <a href="read-mail.php" class="btn btn-primary btn-block mb-3"><i class="fas fa-arrow-left"></i> Back to Contact</a>

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Folders</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>

                    <!-- /.card-body -->
                  </div>
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
                      <h3 class="card-title">Read Mail</h3>

                      <div class="card-tools">
                        <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <div class="mailbox-read-info">
                        <h5>Message Subject Is Placed Here</h5>
                        <h6><?php echo $email; ?>
                          <span class="mailbox-read-time float-right"><?php echo $date; ?></span>
                        </h6>
                      </div>
                      <!-- /.mailbox-read-info -->
                      <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                          <td> <a href="delete.php?delete=<?php echo $id; ?>" class="btn btn-default btn-sm"> <i class="far fa-trash-alt"></i></a>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                              <i class="fas fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                              <i class="fas fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                          <i class="fas fa-print"></i></button>
                      </div>
                      <!-- /.mailbox-controls -->
                      <div class="mailbox-read-message">
                        Name <p class="bold"><?php echo $name; ?></p>

                        <p><?php echo $query;  ?></p>

                        <p>Thanks,<br>
                        <p class="bold"><?php echo $name;  ?></p>
                      </div>
                      <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <div class="float-right">
                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                      </div>
                      <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                      <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <!-- /.card-footer -->
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
        <?php
        include '../navfootersider/footer.php';
        ?>
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
      <!-- AdminLTE App -->
      <script src="../../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
    </body>

    </html>
<?php

  } else {
    header('location: ../../pages/contact/contact.php');
  }
} else {
  header('location: ../../pages/contact/contact.php');
}
?>