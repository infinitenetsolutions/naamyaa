<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $post = $_POST['post'];
    $priority = $_POST['priority'];
    $categries = $_POST['Categries'];
    $description = $_POST['description'];
    echo  "<br>";

    $status = $_POST['status'];

    if ($name != null) {


        $insert = "INSERT INTO `keypepole`(`name`, `email`, `phone`, `address`, `Categries`, `post`, `description`, `image`, `priority`, `status`)  VALUES ('$name','$email','$phone','$address','$categries','$post','$description','NULL','$priority','$status')";
        $result = mysqli_query($connection, $insert);
        if ($result > 0) {
            if (count($_FILES) > 0) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                    $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $sql = "UPDATE keypepole set image='$imgData' WHERE `email`='$email' ";
                    $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    if (isset($current_id)) {
                        echo '<script>
                        window.location.replace("pepole.php")
                        </script>';
                    }
                }
            }

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
                    <h4 class="modal-title w-100 font-weight-bold">Categories</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
                        <input name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Event Categories</label>
                        <select name="Categries" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">
                            <option selected disabled>categories choose..</option>
                            <?php while ($cat_row = mysqli_fetch_array($cat_r)) { ?>
                                <option value=" <?php echo $cat_row['name']; ?>"><?php echo $cat_row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">email</label>
                        <input name="email" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Email id">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">phone</label>
                        <input name="phone" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Phone number">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">address</label>
                        <input name="address" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Address Name">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email"> post </label>
                        <input name="post" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Post">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">image</label>
                        <input name="image" type="file" id="defaultForm-email" accept="image/*" class="form-control validate" placeholder="Enter Caregorie Name">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select priority</label>
                        <select name="priority" class="form-control" id="exampleFormControlSelect1">

                            <option value='high'>High</option>
                            <option value='medium'>medium</option>
                            <option value='low'>low</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                            <option value='1'>Active</option>
                            <option value='0'>DeActive</option>

                        </select>
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Description</label>
                        <textarea name="description" id="defaultForm-email" class="form-control validate">



                        </textarea>

                    </div>
                    <?php echo $msg; ?>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Pepole</button>
                </div>
            </form>
        </div>
    </div>
</div>