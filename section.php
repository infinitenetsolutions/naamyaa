<?php


if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {

    $totalorder = "SELECT * FROM `user_order_history` WHERE 1";
    $totaluser = "SELECT * FROM `volunteer` WHERE 1";
    $uniquevisiter = "SELECT SUM(goal_ammount) FROM goal";
  
    $totaluser = mysqli_query($connection, $totaluser);
    $totalorder = mysqli_query($connection, $totalorder);
    $uniquevisiter=mysqli_query($connection,$uniquevisiter);

?>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php //echo mysqli_num_rows($totalorder); ?></h3>
                            <h3><?php echo mysqli_num_rows($totaluser); ?></h3>                            

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($totaluser);  ?></h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="./pages/user-master/user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>₹ <?php echo mysqli_fetch_array($uniquevisiter)['SUM(goal_ammount)']; ?></h3>

                            <p>Total Goal</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="./pages/goal/Event.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
           
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<?php } else {
    header('location:./AdminLogin/super_Admin.php');
} ?>