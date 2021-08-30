<?php
include '../../connection.inc.php';
$cusrevie = 1;
if (isset($_GET['read']) && ($_GET['read'] != '')) {
    $id = $_GET['read'];
    $select_single_data = "SELECT * FROM `product` WHERE p_id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['p_id'];
        $name = $row['p_name'];
        $mrp = $row['p_mrp'];
        $color = $row['p_color'];
        $selling_price = $row['p_s_price'];
        $quantity = $row['p_quantity'];
        $short_desc = $row['p_short_desc'];
        $long_desc = $row['p_long_desc'];
        $general_specification = $row['p_general_sp'];
        $item_weith = $row['p_item_weigth'];
        $item_warraty = $row['p_item_warranty'];
        $extra_specification = $row['p_extra_sp'];


        $product_rationg = "SELECT * FROM `product_Rating` WHERE `pr_product_id`='$id'";
        $p_result = mysqli_query($connection, $product_rationg);
        $cusreview = mysqli_num_rows($p_result);



?>


        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>AdminLTE 3 | Read Mail</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Font Awesome -->
            <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
            <!-- Google Font: Source Sans Pro -->
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
            <link rel="stylesheet" href="../extra.css">
            <link rel="stylesheet" href="details.css">
        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                <!-- Navbar -->
                <?php include '../navfootersider/nav.php';
                include '../navfootersider/aside.php';
                ?>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                i
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Compose</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Compose</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <!-- Main content -->
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <!-- product -->
                        <div class="product-content product-wrap clearfix product-deatil">
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="product-image">
                                        <div id="myCarousel-2" class="carousel slide">
                                            <ol class="carousel-indicators">
                                                <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                                                <li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
                                                <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                                            </ol>
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block img-hw" src="photo-1523275335684-37898b6baf30.jpeg" alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-hw" src="photo-1523275335684-37898b6baf30.jpeg" alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-hw" src="photo-1523275335684-37898b6baf30.jpeg" alt="Second slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                                            <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                                    <h2 class="name">
                                        <?php echo $name; ?>
                                        <small>Product by <a href="javascript:void(0);">Adeline</a></small>
                                        <i class="fa fa-star fa-2x text-primary"></i>
                                        <i class="fa fa-star fa-2x text-primary"></i>
                                        <i class="fa fa-star fa-2x text-primary"></i>
                                        <i class="fa fa-star fa-2x text-primary"></i>
                                        <i class="fa fa-star fa-2x text-muted"></i>
                                        <span class="fa fa-2x">
                                            <h5>(<?php echo $cusreview;  ?>) Votes</h5>
                                        </span>
                                        <a href="javascript:void(0);"><?php echo $cusreview;  ?>customer reviews</a>
                                    </h2>
                                    <hr />


                                    <?php
                                    $value = $mrp - $selling_price;
                                    $offvalue = ($value / $mrp) * 100;
                                    ?>
                                    <h3 class="price-container">
                                        <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $selling_price ?>
                                        <small>*includes tax</small>
                                    </h3>
                                    <p style=" color:grey; opacity: 0.5;"> &#160; <strike><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $mrp;
                                                                                                                                        echo "  "; ?></strike> &#160; &#160; <span style=" color:green; opacity: 0.9;"> <?php echo $offvalue; ?>% off </span></p>
                                    <div class="product-configuration">

                                        <!-- Product Color -->
                                        <div class="product-color">
                                            <span>Color</span>

                                            <div class="color-choose">
                                                <div>
                                                    <input data-image="red" type="radio" id="red" name="color" value="red" checked="" class="active">
                                                    <label for="red"><span></span></label>
                                                </div>
                                                <div>
                                                    <input data-image="blue" type="radio" id="blue" name="color" value="blue" class="active">
                                                    <label for="blue"><span></span></label>
                                                </div>
                                                <div>
                                                    <input data-image="black" type="radio" id="black" name="color" value="black" class="active">
                                                    <label for="black"><span></span></label>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Cable Configuration -->

                                    </div>
                                    <hr />
                                    <div class="description description-tabs">
                                        <ul id="myTab" class="nav nav-pills">
                                            <li class="y-m active"><a href="#more-information" data-toggle="tab" class="no-margin">Product Description </a></li>
                                            <li class="y-m"><a href="#specifications" data-toggle="tab">Specifications</a></li>
                                            <li class="y-m"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div class="tab-pane fade active in" id="more-information">
                                                <br />
                                                <strong><?php echo $name; ?></strong>
                                                <p>
                                                    <?php echo $long_desc; ?>
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="specifications">
                                                <br />
                                                <dl class="">
                                                    <dt>General</dt>
                                                    <dd><?php echo $general_specification; ?></dd>

                                                    <br>
                                                    <dt>Special </dt>
                                                    <dd><?php echo $extra_specification; ?></dd>

                                                    <br>

                                                    <dt>Item weigth</dt>
                                                    <dd><?php echo $item_weith / 1000; ?> kg</dd>
                                                    <br />

                                                    <dt>Item warranty</dt>
                                                    <dd><?php echo $item_warraty; ?></dd>
                                                </dl>
                                            </div>
                                            <div class="tab-pane fade" id="reviews">
                                                <br />


                                                <div class="chat-body no-padding profile-message">
                                                    <? while ($pr_rows = mysqli_fetch_array($p_result)) {    ?>
                                                        <ul>



                                                            <li class="message">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="online" />
                                                                <span class="message-text">
                                                                    <?php echo $pr_rows['pr_cus_Name']; ?>
                                                                    <a href="javascript:void(0);" class="username">

                                                                        <span> <strong><?php echo $pr_rows['pr_title']; ?></strong></span>


                                                                        <span class="pull-right">
                                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                                        </span>
                                                                    </a>

                                                                    <p><?php echo $pr_rows['pr_long_desc']; ?></p>
                                                                </span>
                                                                <ul class="list-inline font-xs">
                                                                    <li>
                                                                        <a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> This was helpful (22)</a>
                                                                    </li>
                                                                    <li class="pull-right">
                                                                        <small class="text-muted pull-right ultra-light"> <?php echo $pr_rows['pr_date']; ?></small>
                                                                    </li>
                                                                </ul>
                                                                <span class="badge">Purchase Verified</span>
                                                            </li>
                                                            <br>

                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                </div>
                            </div>
                        </div>
                        <!-- end product -->
                    </div>


                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <?php
                include '../navfootersider/footer.php';
                ?>
                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->

            <!-- jQuery -->
            <script src="../../plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../../dist/js/demo.js"></script>
            <script src="details.js"></script>
        </body>

        </html>
<?php

    } else {
        header('location: ../../pages/product/product.php');
    }
} else {
    header('location: ../../pages/product/product.php');
}
?>