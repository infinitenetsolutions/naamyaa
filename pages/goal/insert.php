<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $categries_id = $_POST['Categries'];
    $ammount = $_POST['ammount'];
    echo  "<br>";

    $status = $_POST['status'];

    if ($name != null) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

      echo  $insert = "INSERT INTO `goal`(`name`, `goal_ammount`, `image`, `categories_name`, `status`) VALUES ('$name','$ammount','$imgData','$categries_id','$status')";
        $result = mysqli_query($connection, $insert);
        if ($result > 0) {

               
            echo '<script>
            window.location.replace("Event.php")
            </script>';
            echo "<p class='success'>Event Added successfully Refresh the page</p>";
        } else {
            echo "<p class='col'>data already exits</p>";
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Goal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Title</label>
                        <input name="name" type="text" id="defaultForm-email" class="form-control validate"
                            placeholder="Enter Caregorie Name">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Goal Title</label>
                        <select name="Categries" id="defaultForm-email" class="form-control validate"
                            placeholder="Enter Caregorie Name">
                            <option selected disabled>categories choose..</option>
                            <?php while ($cat_row = mysqli_fetch_array($cat_r)) { ?>
                            <option value="<?php echo $cat_row['name']; ?>"><?php echo $cat_row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">ammount</label>
                        <input name="ammount" type="text" id="defaultForm-email" class="form-control validate"
                            placeholder="Enter Caregorie Name">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Images</label>
                        <input name="image" type="file" id="defaultForm-email" class="form-control validate"
                            placeholder="Enter Caregorie Name">
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                            <option value='1'>Active</option>
                            <option value='0'>DeActive</option>

                        </select>
                    </div>
                    <?php echo $msg; ?>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Events</button>
                </div>
            </form>
        </div>
    </div>
</div>