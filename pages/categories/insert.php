<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $name = $_POST['name'];
   
    echo  "<br>";

    $status = $_POST['status'];

    if ($name != null) {

        $insert = "INSERT INTO `categories`(`name`,`status`) VALUES ('$name','$status')";
        $result = mysqli_query($connection, $insert);
        if ($result) {

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

            echo "<script>
            setTimeout(function() {
                window.location.replace('categories.php');

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
    $cat = " ";
    $status = " ";
    // } else {
    //     $msg = "Enter status in 1 (Active) & 0 (DeActtive)";
    // }
    //Api to retriving data
}

?>
<div class="modal fade " id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <form action="" method="POST">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Categories</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="container">
                        <div class="row">
                            <div class="md-form col-sm-6 ">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">categories
                                    Name</label>
                                <input name="name" type="text" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Categories Name">

                            </div>



                            <div class="form-group col-sm-6">
                                <label for="exampleFormControlSelect1">Select Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>DeActive</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <?php echo $msg; ?>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Categories</button>
                </div>
            </form>
        </div>
    </div>
</div>