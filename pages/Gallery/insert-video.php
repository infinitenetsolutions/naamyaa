<?php
$msg = "";
$cat = " ";
$status = " ";
include '../../AdminLogin/function.inc.php';

$desc=' ' ;
if (isset($_POST['add'])) {
    $link = str_replace('watch?v=','embed/',$_POST['link']);
    $desc = $_POST['description'];
    $status = $_POST['status'];
    if ($cat != null) {
        $sql = "INSERT INTO `videogallery`(`link`, `description`,`status`) VALUES ('$link','$desc','$status')";

        $current_id = mysqli_query($connection, $sql);
        if ($current_id) {
            echo '<script>
                    window.location.replace("videogallery.php")
                    </script>';
        } else {
            echo "<p class='col'>data already exits</p>";
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
                    <h4 class="modal-title w-100 font-weight-bold">Videos Gallery</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">

                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Video link</sub>
                        <input name="link" type="text" class="form-control" id="exampleFormControlSelect1"                        
                        placeholder="ENter Video Link">

                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Description</sub>
                        <textarea name="description" class="form-control" id="exampleFormControlSelect1"
                        placeholder="Enter Description">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Select Status</sub>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                            <option value='1'>Active</option>
                            <option value='0'>Deactive</option>

                        </select>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Video Images</button>
                </div>
            </form>
        </div>
    </div>
</div>