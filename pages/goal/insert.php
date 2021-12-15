<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $categries_id = $_POST['Categries'];
    $ammount = $_POST['ammount'];


    $status = $_POST['status'];

    if ($name != null) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

         $insert = "INSERT INTO `goal`(`name`, `goal_ammount`, `image`, `categories_name`, `status`) VALUES ('$name','$ammount','$imgData','$categries_id','$status')";
        $result = mysqli_query($connection, $insert);
        if ($result > 0) {

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

    // } else {
    //     $msg = "Enter status in 1 (Active) & 0 (DeActtive)";
    // }

    //Api to retriving data

}
$categrie = "SELECT * FROM `categories`";
$cat_r = mysqli_query($connection, $categrie);
?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">



                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Goal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="container">
                        <div class="row">
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Title</label>
                                <input name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Title">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Categories</label>
                                <select name="Categries" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">
                                    <option selected disabled>categories choose..</option>
                                    <?php while ($cat_row = mysqli_fetch_array($cat_r)) { ?>
                                        <option value="<?php echo $cat_row['name']; ?>"><?php echo $cat_row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Amount</label>
                                <input name="ammount" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Amount">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Images</label>
                                <input name="image" type="file" id="defaultForm-email" class="form-control validate">
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>Deactive</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <?php echo $msg; ?>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Goal</button>
                </div>
            </form>
        </div>
    </div>
</div>