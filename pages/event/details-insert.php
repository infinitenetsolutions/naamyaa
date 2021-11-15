<?php
$msg = "";
$name = '';
$city = '';
$country = '';
$state = '';
$address = '';
$date = '';
include '../../AdminLogin/function.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
    $id = $_GET['id'];
    $select = "SELECT * FROM `Event` WHERE id='$id'";
    $result1 = mysqli_query($connection, $select);
    $result2 = mysqli_query($connection, $select);
    $rows = mysqli_fetch_array($result1);
    $name = $rows['name'];
    $address = $rows['address'];
    $city = $rows['city'];
    $state = $rows['state'];
    $country = $rows['country'];
    $date = $rows['date'];


    //here to start the insertion of images and details of the pages
    if (isset($_POST['add'])) {
        $title = $_POST['title'];

        $details1 = $_POST['details1'];

        $details2 = $_POST['details2'];

        $delete_event="DELETE FROM `event_details` WHERE `event_id`='$id'";
        $delete= mysqli_query($connection,$delete_event);

        echo  "<br>";

        $status = $_POST['status'];

        if ($name != null) {
        

            $insert = "INSERT INTO `event_details`(`title`, `details`, `details1`, `image1`, `image2`, `image3`, `event_id`) VALUES ('$title','$details1','$details2','','','','$id')";
            $result = mysqli_query($connection, $insert);
            if ($result > 0) {
                if (count($_FILES) > 0) {
                    if (is_uploaded_file($_FILES['image1']['tmp_name'])) {

                        $imgData = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
                        $sql = "UPDATE event_details set image1='$imgData'";
                        $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                        if (isset($current_id)) {
                            // echo "<p class='success'>Event Added successfully Refresh the page</p>";
                        }
                    }
                }
            }
            if ($result > 0) {
                if (count($_FILES) > 0) {
                    if (is_uploaded_file($_FILES['image2']['tmp_name'])) {

                        $imgData = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
                        $sql = "UPDATE event_details set image2='$imgData'";
                        $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                        if (isset($current_id)) {
                            echo "";
                        }
                    }
                }
            }
            if ($result > 0) {
                if (count($_FILES) > 0) {
                    if (is_uploaded_file($_FILES['image3']['tmp_name'])) {

                        $imgData = addslashes(file_get_contents($_FILES['image3']['tmp_name']));
                        $sql = "UPDATE event_details set image3='$imgData'";
                        $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                        if (isset($current_id)) {
                            echo "";
                        }
                    }
                }
            }
        }

        if ($result) {

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

            echo "<script>
            setTimeout(function() {
                window.location.replace('event-details.php?id=$id');

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


        $cat = " ";
        $status = " ";
        // } else {
        //     $msg = "Enter status in 1 (Active) & 0 (DeActtive)";
        // }

        //Api to retriving data

    }
?>

<div class="modal fade" id="insert-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Event Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">

                    <div class="container">
                        <div class="row">
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Event
                                    Name</label>
                                <select readonly value="<?php echo $name; ?>" type="text" id="defaultForm-email"
                                    class="form-control validate" placeholder="Enter Caregorie Name">
                                    <option selected disabled>Events name</option>
                                    <?php
                                while ($rows1 = mysqli_fetch_array($result2)) { ?>
                                    <option selected value=" <?php echo $rows1['name'] ?>"><?php echo $rows1['name']; ?>
                                    </option>

                                    <?php } ?>
                                </select>

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Title</label>
                                <input name="title" type="text" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div>

                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Title
                                    image</label>
                                <input name="image1" type="file" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div>
                            <!-- <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Details</label>
                                <textarea name="details1" type="text" id="defaultForm-email"
                                    class="form-control validate" placeholder="Enter Caregorie Name">

                            </textarea>
                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Title</label>
                                <input name="image2" type="file" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Title</label>
                                <input name="image3" type="file" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div> -->
                            <div class="form-group col-sm-4">
                                <label for="exampleFormControlSelect1">Select Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>DeActive</option>

                                </select>
                            </div>
                            <div class="md-form col-sm-12">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Details</label>
                                <textarea name="details2" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </textarea>
                            </div>

                        </div>
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
<?php } else {
    header("location:../../AdminLogin/super_Admin.php");
} ?>