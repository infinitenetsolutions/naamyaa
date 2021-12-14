<?php
$msg = "";
$cat = " ";
$status = " ";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $desc = $_POST['description'];
    $link = $_POST['link'];
    $status = $_POST['status'];



        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {

                $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

                $sql = "INSERT INTO `Gallery`(`photos`, `description`,`link`, `Gallery_type`, `status`) VALUES ('{$imgData}','{$desc}','$link','photos','{$status}')";

                $current_id = mysqli_query($connection, $sql);

                if ($current_id) {

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
        }
    }

?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Photos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3 row">

                    <div class="form-group col-sm-4">
                        <label class="a-color" for="exampleFormControlSelect1">Images</label>
                        <input name="userImage" type="file" accept="image/*" class="form-control" id="exampleFormControlSelect1">


                    </div>

                    <div class="form-group col-sm-4">
                        <label class="a-color" for="exampleFormControlSelect1">Link(Optional)</label>
                        <input name="link" type="text" class="form-control" id="exampleFormControlSelect1">


                    </div>
                    <div class="form-group col-sm-4">
                        <label class="a-color" for="exampleFormControlSelect1">Select Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                            <option value='1'>Active</option>
                            <option value='0'>DeActive</option>

                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="a-color" for="exampleFormControlSelect1">Enter Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Description">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Photos </button>
                </div>
            </form>
        </div>
    </div>
</div>