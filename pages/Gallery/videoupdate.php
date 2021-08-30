<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `videogallery` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
    
        $link = $row['link'];
        $date = $row['date'];
        $description = $row['description'];
        $status = $row['status'];

?>


        <!doctype html>
        <html lang="en">

       <?php include '../navfootersider/updatenav.php'; ?>
            <form method="post" enctype="multipart/form-data">

                <div class="mb-3">


                    <label for="exampleInputEmail1" class="form-label">Id</label>
                    <input disabled type="text" value="<?php echo $id; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" pattern="[A-Za-z0-9]+">

                </div>
                
                <div class="mb-3">


                    <label for="exampleInputEmail1" class="form-label">link</label>
                    <input type="text" name="link" value="<?php echo $link; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
               
                <div class="mb-3">


                    <label for="exampleInputEmail1" class="form-label">description</label>
                    <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo $description; ?> </textarea>
                </div>
            

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">

                        <option value='1'>Active</option>
                        <option value='0'>DeActive</option>

                    </select>
                </div>
                <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                <h3><?php echo $msg; ?></h3>
            </form>

            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

        </body>

        </html>
<?php

    } else {
        header('location: ../../pages/Gallery/videogallery.php');
    }
} else {
    header('location: ../../pages/Gallery/videogallery.php');
}
if (isset($_POST['Submit'])) {

    $link =  $link = str_replace('watch?v=','embed/',$_POST['link']);;

    $description = $_POST['description'];

    $status = simplename($_POST['status']);
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `videogallery` SET `link`='$link',`description`='$description',`status`='$status' WHERE  id=$id";
        $result1 = mysqli_query($connection, $update);




        if ($result1) {

           
            echo "<script>
                            window.location.replace('../../pages/Gallery/videogallery.php')
                        </script>";
        } else {
            echo "<p class='col'>data already exits</p>";
        }
    } else {
        $msg = "Enter status in 1 (Active) & 0 (DeActive)";
        echo $msg;
    }
}
?>