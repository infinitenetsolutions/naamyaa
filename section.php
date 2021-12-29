<?php


if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {

    $total_donation = "SELECT SUM(goal_ammount) as total FROM donation where 1";
    $totaluser = "SELECT * FROM `volunteer` WHERE 1";
    $uniquevisiter = "SELECT SUM(goal_ammount) FROM goal";
    $events = "SELECT * FROM `Event` WHERE 1";


    $total_donation_result = mysqli_query($connection, $total_donation);
    $uniquevisiter = mysqli_query($connection, $uniquevisiter);
    $totaluser = mysqli_query($connection, $totaluser);

    $result_events = mysqli_query($connection, $events);

?>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">

                            <h3>₹ <?php echo mysqli_fetch_array($total_donation_result)['total']  ?></h3>

                            <p> Total Donation</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <a href="./pages/donation/Event.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($totaluser)  ?></h3>

                            <p> Total Volunteer</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="./pages/user-master/user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($result_events);  ?></h3>

                            <p>Total Events</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-week"></i>
                        </div>
                        <a href="./pages/event/Event.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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