<?php
$msg = "";
$cat = '';

$status = " ";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {

    $cat = $_POST['cat'];
    echo $cat;
    $name = $_POST['name'];
    $mrp = $_POST['mrp'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $color = $_POST['color'];
    $p_general_sp = $_POST['p_general_sp'];
    $p_item_weigth = $_POST['p_item_weigth'];
    $p_item_warranty = $_POST['p_item_warranty'];
    $p_size = $_POST['p_size'];
    $p_origin_country = $_POST['p_origin_country'];
    $p_shop_fee = $_POST['p_shop_fee'];
    $p_extra_sp = $_POST['p_extra_sp'];
    $p_short_desc = $_POST['p_short_desc'];
    $p_long_desc = $_POST['p_long_desc'];
    $p_mete_title = $_POST['p_mete_title'];
    $p_meta_desc = $_POST['p_meta_desc'];
    $p_meta_keyword = $_POST['p_meta_keyword'];
    $status = $_POST['status'];


    if ($cat != '') {
        $insert_p = "INSERT INTO `product`(`p_name`, `p_mrp`, `p_s_price`, `p_quantity`, `p_color`, `p_general_sp`, `p_item_weigth`, `p_item_warranty`, `p_size`, `p_origin_country`, `p_shop_fee`, `p_extra_sp`, `p_short_desc`, `p_long_desc`, `p_mete_title`, `p_meta_desc`, `p_meta_keyword`, `p_status`, `p_categries_id`) VALUES ('$name','$mrp','$price','$qty','$color','$p_general_sp','$p_item_weigth','$p_item_warranty','$p_size','$p_origin_country','$p_shop_fee','$p_extra_sp','$p_short_desc','$p_long_desc','$p_mete_title','$p_meta_desc','$p_meta_keyword','$status','$cat')";
        $p_result = mysqli_query($connection, $insert_p);
        if ($p_result) {

            echo "<script>
window.location.replace('uploadimages.php');
</script>";
            echo "<p class='success'>Categorie Added successfully Refresh the page</p>";
        } else {
            echo "<p class='col'>data already exits</p>";
        }
    } else {
        echo '<script>
            alter("please select the Categories");
            </script>';
    }
}

// $selectid="SELECT * FROM `catagries_images` WHERE 1";



$select1 = "SELECT * FROM `categories`";
$result2 = mysqli_query($connection, $select1);


?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <sub class="a-color" data-error="wrong" data-success="right" for="defaultForm-email">Product Name</sub>
                        <select name="cat"  class="form-control validate" placeholder="Enter Caregorie Name">
                            <option selected disabled>Choose Categries..</option>
                            <?php

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row = mysqli_fetch_array($result2)) {

                            ?>
                                    <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>

                            <?php }
                            } ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Name</sub>
                        <input name="name" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">MRP</sub>
                        <input name="mrp" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Price MRP">


                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Selling Price</sub>
                        <input name="price" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Real price">


                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Quantity</sub>
                        <input name="qty" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter number of product ">


                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Color</sub>
                        <input name="color" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Number of product color ">
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Product General specification</sub>
                        <input name="p_general_sp" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter General information of the product  ">
                    </div>

                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Product weight</sub>
                        <input name="p_item_weigth" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Product weight in gram">
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Item Warranty</sub>
                        <input name="p_item_warranty" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Warranty or no">
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Product Size </sub>
                        <input name="p_size" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter the size of the product in inch ">
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Origin Country</sub>
                        <input name="p_origin_country" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter the country of the product ">
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Shopping fee </sub>
                        <input name="p_shop_fee" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Shopping fee of the product or no ">
                    </div>

                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Extra specification </sub>
                        <input name="p_extra_sp" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter some extra Specification">
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Short Description</sub>
                        <input name="p_short_desc" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter short Descrition of the product">
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Long Description</sub>
                        <textarea name="p_long_desc" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Long Description of the product"></textarea>
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Product meta title</sub>
                        <input name="p_mete_title" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Meta title of the product ">
                    </div>

                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Extra meta Description </sub>
                        <input name="p_meta_desc" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter meta Descrtption of the product">
                    </div>
                    <div class="form-group">
                        <sub class="a-color" for="exampleFormControlSelect1">Enter keyword of the product </sub>
                        <input name="p_meta_keyword" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Keyword of the product">
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
                    <button name="add" class="btn btn-default">Add Product Images</button>
                </div>
            </form>
        </div>
    </div>
</div>