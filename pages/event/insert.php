<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $date = $_POST['date'];
    $categries_id = $_POST['Categries'];
    $end_date = $_POST['enddate'];
    echo  "<br>";

    $status = $_POST['status'];

    if ($name != null) {


        $insert = "INSERT INTO `Event`(`name`, `date`,`enddate`, `address`, `city`, `state`, `country`,`categories_id`,`status`) VALUES ('$name','$date','$end_date','$address','$city','$state','$country','$categries_id','$status')";
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
            <form action="" method="POST">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Categories</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Event Name</label>
                        <input name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Event Categories</label>
                        <select name="Categries" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">
                            <option selected disabled>categories choose..</option>
                            <?php while ($cat_row = mysqli_fetch_array($cat_r)) { ?>
                                <option value="<?php echo $cat_row['id']; ?>"><?php echo $cat_row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                 
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Event address</label>
                        <input name="address" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">country</label>
                        <select name="country" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">
                            <option value="india" selected>india</option>
                        </select>

                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">State</label>
                        <select name="state" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">
                            <?php $api = "https://countriesnow.space/api/v0.1/countries/states";
                            // $json_data = file_get_contents($api);
                            // echo $json_data;
                            // $data = json_decode($json_data);

                            for ($j = 1; $j < 36; $j++) {
                                $state = $data->data[99]->states[$j]->name;
                            ?>
                                <option value="<?php echo $state; ?>"><?php echo $state; ?></option><?php } ?>
                        </select>

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email"> City </label>
                        <input name="city" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Event Date</label>
                        <input name="date" type="date" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">End Date</label>
                        <input name="enddate" type="date" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

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