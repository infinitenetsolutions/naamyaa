<?php
$msg = "";
$cat = " ";
$status = " ";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $desc = $_POST['description'];
    $status = $_POST['status'];
    if ($cat != null) {



        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {

                $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

                $sql = "INSERT INTO `Gallery`(`photos`, `description`, `Gallery_type`, `status`) VALUES ('{$imgData}','{$desc}','photos','{$status}')";

                $current_id = mysqli_query($connection, $sql); 
                if (isset($current_id)) {
                    // header("Location: listImages.php");
                }
                if ($current_id) {

                    echo '<script>
                    window.location.replace("photosgallery.php")
                    </script>';
                } else {
                    echo "<p class='col'>data already exits</p>";
                }
            }
        }
    }
}
// $selectid="SELECT * FROM `catagries_images` WHERE 1";



$select1 = "SELECT * FROM `categories`";
$result2 = mysqli_query($connection, $select1);


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
                    
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Image</sub>
                        <input name="userImage" type="file" class="form-control" id="exampleFormControlSelect1">


                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">description</sub>
                        <textarea name="description" class="form-control" id="exampleFormControlSelect1">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Select Status</sub>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                            <option value='1'>Active</option>
                            <option value='0'>DeActive</option>

                        </select>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Images</button>
                </div>
            </form>
        </div>
    </div>
</div>