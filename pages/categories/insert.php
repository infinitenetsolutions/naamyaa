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
        if ($result > 0) {
            echo '<script>
            window.location.replace("categories.php")
            </script>';
            echo "<p class='success'>categories Added successfully Refresh the page</p>";
        } else {
            echo "<p class='col'>data already exits</p>";
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


<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Categories</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">categories Name</label>
                        <input name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

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
                    <button name="add" class="btn btn-default">Add categoriess</button>
                </div>
            </form>
        </div>
    </div>
</div>