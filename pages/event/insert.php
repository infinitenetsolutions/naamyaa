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
        if ($result) {

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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Events</h4>
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
                                <input name="name" type="text" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Event
                                    Categories</label>
                                <select name="Categries" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">
                                    <option selected disabled>categories choose..</option>
                                    <?php while ($cat_row = mysqli_fetch_array($cat_r)) { ?>
                                    <option value="<?php echo $cat_row['id']; ?>"><?php echo $cat_row['name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Event
                                    address</label>
                                <input name="address" type="text" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">country</label>
                                <select name="country" type="text" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">
                                    <option value="india" selected>india</option>
                                </select>

                            </div>

                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">State</label>
                                <select name="state" type="text" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">
                                    <?php
                            
                            // $api = "https://countriesnow.space/api/v0.1/countries/states";
                            // $json_data = file_get_contents($api);
                            //  $json_data;
                            // $data = json_decode($json_data);

                            // for ($j = 1; $j < 36; $j++) {
                            //     $state = $data->data[99]->states[$j]->name;
                            ?>
                                    <!-- <option value="<?php // echo $state; ?>"><?php // echo $state; ?></option><?php // } ?> -->
                                    <option selected disabled>- Select - </option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Ladakh">Ladakh</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                </select>

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email"> City </label>
                                <input name="city" type="text" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Event
                                    Date</label>
                                <input name="date" type="date" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">End Date</label>
                                <input name="enddate" type="date" id="defaultForm-email" class="form-control validate"
                                    placeholder="Enter Caregorie Name">

                            </div>



                            <div class="form-group">
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
                    <button name="add" class="btn btn-default">Add Events</button>
                </div>
            </form>
        </div>
    </div>
</div>