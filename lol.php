<?php

$con = mysqli_connect('localhost', 'faizfms_db', 'NMm8C5YY', 'faizfms_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql = "SELECT  DISTINCT branch_location,client_id,branch_name FROM tbl_assets";
$query = mysqli_query($con, $sql);



$conn_db = mysqli_connect('localhost', 'faizfms_inventory_new', 'xf9BXgmP', 'faizfms_inventory_new');
$itemcategory = "SELECT DISTINCT in_categoryid,in_category_name FROM in_category_master";
$itemresult = mysqli_query($conn_db, $itemcategory);

//if ($conn_db->connect_error) {
//  echo "<script>
//alert('Something went wrong please try again!!!');
//location.replace('add_change_item_view.php');
// </script>";
//}

?>







<!doctype html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Faiz Facilities Management System | Add Change Item View</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="../../../images/logo.png">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">

    <link rel="stylesheet" href="../../../css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../css/font-awesome.min.css">

    <link rel="stylesheet" href="../../../css/owl.carousel.css">
    <link rel="stylesheet" href="../../../css/owl.theme.css">
    <link rel="stylesheet" href="../../../css/owl.transitions.css">

    <link rel="stylesheet" href="../../../css/animate.css">

    <link rel="stylesheet" href="../../../css/normalize.css">

    <link rel="stylesheet" href="../../../css/meanmenu.min.css">

    <link rel="stylesheet" href="../../../css/main.css">

    <link rel="stylesheet" href="../../../css/morrisjs/morris.css">

    <link rel="stylesheet" href="../../../css/scrollbar/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="../../../css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../../../css/metisMenu/metisMenu-vertical.css">

    <link rel="stylesheet" href="../../../css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../../../css/calendar/fullcalendar.print.min.css">

    <link rel="stylesheet" href="../../../css/editor/select2.css">
    <link rel="stylesheet" href="../../../css/editor/datetimepicker.css">
    <link rel="stylesheet" href="../../../css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="../../../css/editor/x-editor-style.css">

    <link rel="stylesheet" href="../../../css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../../../css/data-table/bootstrap-editable.css">

    <link rel="stylesheet" href="../../../style.css">

    <link rel="stylesheet" href="../../../css/responsive.css">

    <script src="../../../js/vendor/modernizr-2.8.3.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
</head>

<body>
    <div class="left-sidebar-pro">
        <?php echo $sidebar; ?>
    </div>

    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="#" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <?php echo $header;  ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="<?php echo base_url(); ?>admin/main/dashboard">Dashboard<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Company") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                        echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                    } ?> data-toggle="collapse" data-target="#Charts" href="#">Company<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url(); ?>admin/Company/company_view">Company Details</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Company/bank_acc_view">Manage Bank Acc</a></li>
                                            </ul>
                                        </li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Service") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                        echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                    } ?> data-toggle="collapse" data-target="#Charts" href="#">Service<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url(); ?>admin/Service/service_view">Manage Services</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Service/manage_hsncode">HSN/SAC</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Service/manage_uom">UOM</a></li>
                                            </ul>
                                        </li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Billing & PO") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                            } ?> data-toggle="collapse" data-target="#Charts" href="#">Billing & PO<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url(); ?>admin/Service/add_billing_view">E-billing</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Service/add_purchase_order_view">PO Management</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Service/manage_purchase_order">Manage PO</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Service/paymentTerms_view">Payment Terms</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Service/billing_reports_view">Billing Reports</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Service/bill_payments_view">Manage Bills</a></li>
                                                <!-- <li><a href="<?php echo base_url(); ?>admin/Service/expense_view">Expenses Reports</a></li> -->
                                            </ul>
                                        </li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Clients") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                        echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                    } ?> data-toggle="collapse" data-target="#Charts" href="#">Clients<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url(); ?>admin/Client/clients_list">Manage Clients</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Branch/branch_view">Manage Branches</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Branch/asset_view">Manage Assets</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Branch/change_item_details">Change Item Details</a></li>
                                            </ul>
                                        </li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Vendors") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                        echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                    } ?> data-toggle="collapse" data-target="#Charts" href="#">Vendors<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url(); ?>admin/Vendor/vendor_view">Manage Vendors</a></li>
                                            </ul>
                                        </li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Payroll") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                        echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                    } ?> data-toggle="collapse" data-target="#Charts" href="#">Payroll<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url(); ?>admin/Department/department_view">Manage Departments</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Designation/designation_view">Manage Designations</a></li>
                                            </ul>
                                        </li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Employees") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                            echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                        } ?> data-toggle="collapse" data-target="#Charts" href="#">Employees<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url(); ?>admin/Employee/add_employee_view">Add Employee</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Employee/employee_view">Manage Employees</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Attendance/attendance_view">Daily Attendance</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/Attendance/manage_attendance">Manage Attendance</a></li>
                                                <li><a href="<?php echo base_url(); ?>RMS/attendance.php">Attendance Reports</a></li>
                                            </ul>
                                        </li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Complaints") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                            echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                        } ?> data-toggle="collapse" data-target="#Charts" href="#">Complaints<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url(); ?>admin/Ticket/ticket_view">Complaints Received</a></li>
                                            </ul>
                                        </li>
                                        <li <?php $flag = 0;
                                            $autority = $this->session->userdata('permission');
                                            if (isset($autority)) {
                                                $allAutority = explode(",", $autority);
                                                for ($i = 0; $i < count($allAutority); $i++) {
                                                    if ($allAutority[$i] == "Inventory") {
                                                        $flag++;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0) {
                                                    echo "style='display:none;'";
                                                }
                                            } ?>><a <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                            echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                        } ?> data-toggle="collapse" data-target="#Charts" href="<?php echo base_url(); ?>inventory" target="_blank">Inventory<span <?php if ($flag == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo "style='display:none;'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?> class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->session->flashdata('msg'); ?>

        <div class="single-product-tab-area mg-tb-15">

            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-plus" aria-hidden="true"></i> Add Change Item Details </a></li>

                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <form id="TypeValidation" class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                        <div class="product-tab-list tab-pane fade active in" id="description">

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="review-content-section">
                                                        <label>Branch Name</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <?php
                                                            $conn = mysqli_connect('localhost', 'faizfms_db', 'NMm8C5YY', 'faizfms_db');
                                                            $sel = "SELECT * from `tbl_branch` INNER JOIN `tbl_clients` ON `tbl_branch`.`client_id` = `tbl_clients`.`id` WHERE `tbl_branch`.`id`= '" . $branch_item['id'] . "'";

                                                            $run = mysqli_query($conn, $sel);
                                                            $result = mysqli_fetch_assoc($run);
                                                            ?>
                                                            <input type="hidden" class="form-control" name="client_id" value="<?php echo $result['client_id'] ?>">
                                                            <input  type="text" required class="form-control" name="" value="<?php echo $result['client_name'] ?>" readonly>

                                                        </div>

                                                        <label>Branch Location</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" name="branch_name" value="<?php echo $branch_item['branch_name'] ?>" readonly>
                                                        </div>


                                                        <label>Technician Name</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <input id="tech" type="text" required class="form-control" name="technician_name" value="">
                                                        </div>


                                                        <label>Vendor Bought From</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <input id="vender" type="text" required class="form-control" name="vendor_bought_from" value="">
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="review-content-section">


                                                        <label>R & M Month</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <input id="rm&month" type="text" required class="form-control" name="rm_month" value="">
                                                        </div>


                                                        <label>Sol ID</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <input id="sol" type="text" required class="form-control" name="sol_id" value="">
                                                        </div>


                                                        <label>Contact No.</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <input id="contact" type="text" class="form-control" name="contact_no" value="">
                                                        </div>


                                                        <label>Address</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <textarea class="form-control" name="address"></textarea>
                                                        </div>

                                                        <label>Amount</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                            <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            <input id="amount" type="text" class="form-control" name="amount" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <form name="add_name" method="" action="/add-more-post">-->

                                            <div class="table-responsive" style="overflow-x:auto;">
                                                <table class="table table-bordered" id="dynamic_field" style="overflow-y:auto; width: 75%;">

                                                    <tr>
                                                        <th data-field="S.NO" data-sortable="true" rowspan="2">S.NO</th>
                                                        <th data-field="Item Category" data-sortable="true" rowspan="2">Item Category</th>
                                                        <th data-field="Item Name" data-sortable="true" rowspan="2">Item Name</th>
                                                        <th data-field="QTY" data-sortable="true" rowspan="2">QTY</th>
                                                        <th data-field="Fitted Location" data-sortable="true" rowspan="2">Fitted Location</th>
                                                        <th data-field="Serial No." data-sortable="true" rowspan="2">Serial No.</th>
                                                        <th data-field="Model No." data-sortable="true" rowspan="2">Model No.</th>
                                                        <th data-field="Barcode" data-sortable="true" rowspan="2">Barcode</th>
                                                        <th data-field="Date Of Installation" data-sortable="true" rowspan="2">Date Of Installation</th>
                                                        <th data-field="Warranty Upto" data-sortable="true" rowspan="2">Warranty Upto</th>
                                                        <th data-field="Service Mode" data-sortable="true" rowspan="2">Service Mode</th>
                                                        <th data-field="Description" data-sortable="true" rowspan="2">Description</th>
                                                        <th data-field="Pending Issue/Issue Observed" data-sortable="true" rowspan="2">Pending Issue/Issue Observed</th>



                                                        <th>Actions</th>
                                                    </tr>

                                                    <tr></tr>

                                                    <tr>
                                                        <td width="10%"><input type="text" id="slno1" value="1" readonly class="form-control" style="border:none;width:50px!important;" /></td>
                                                        <td width="20%">

                                                            <select name="item_category" class="form-control">
                                                                <option value="">--- Select Category ---</option>
                                                                <?php
                                                                // $query
                                                                $itemcategory = "SELECT *  FROM in_category_master";
                                                                //fetch
                                                                $itemresult = mysqli_query($conn_db, $itemcategory);
                                                                // while
                                                                while ($value = mysqli_fetch_assoc($itemresult)) {

                                                                ?>
                                                                    <option value="<?php echo $value["in_categoryid"]; ?>"> <?php echo $value["in_category_name"]; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>

                                                        </td>

                                                        <td width="20%"><input type="text" name="item_name[]" id="item_name" placeholder="" class="form-control" style="width:150px!important;" /></td>
                                                        <td width="20%"><input type="text" name="qty[]" id="" placeholder="" class="form-control" style="width:50px!important;" /></td>

                                                        <td width="20%">
                                                            <input list="browsers" name="fitted_location[]" class="form-control" style="width:110px!important;">
                                                            <datalist id='browsers'>
                                                                <option value="">Select Fitted Location</option>
                                                                <?php

                                                                foreach ($asset_item as $value) {
                                                                    if ($value->client_id == $branch_item['client_id'] && $value->branch_name == $branch_item['branch_name']  && $value->branch_location != '') {

                                                                ?>
                                                                        <option value="<?php echo $value->branch_location; ?>"><?php echo $value->branch_location; ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </td>
                                                        <td width="20%"><input type="text" name="serial_no[]" id="serial_no" placeholder="" class="form-control" style="width:130px!important;" /></td>
                                                        <td width="10%"><input type="text" name="model_no[]" id="model_no" placeholder="" class="form-control" style="width:110px!important;" /></td>
                                                        <td width="10%"><input type="text" name="barcode[]" id="barcode" placeholder="" class="form-control" style="width:110px!important;" /></td>
                                                        <td width="10%"><input type="date" name="date_of_installation[]" id="date_of_installation" placeholder="" class="form-control" style="" /></td>
                                                        <td width="10%"><input type="date" name="warranty_upto[]" id="warranty_upto" placeholder="" class="form-control" style="" /></td>

                                                        <td width="20%">
                                                            <select name="service_mode[]" class="form-control" style="width:110px!important;">
                                                                <option value="Repair">Repair</option>
                                                                <option value="Replace">Replace</option>
                                                                <option value="Pending">Pending</option>
                                                            </select>
                                                        </td>
                                                        <td width="10%"><textarea name="description[]" id="description" placeholder="" class="form-control" /></textarea></td>
                                                        <td width="10%"><input type="text" name="pending_issue[]" id="pending_issue" placeholder="" class="form-control" style="" /></td>

                                                        <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>


                                                    </tr>
                                                </table>
                                                <!--<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                                            </div>

                                            <!--</form>  -->



                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                        <button type="button" id="billing_form_id" onclick="hidebutton()" class="btn btn-info">Add</button>
                                                        <div id="billing_form_error_section"></div>
                                                        <!--<button type="button" class="btn btn-warning waves-effect waves-light">Discard
</button>-->
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="pro-edt-img">
                                                            <img src="img/new-product/5-small.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="product-edt-pix-wrap">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">TT</span>
                                                                        <input type="text" class="form-control" placeholder="Label Name">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-radio">
                                                                                <form>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Small Image
                                                                                        </label>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="product-edt-remove">
                                                                                <button type="button" class="btn btn-danger waves-effect waves-light">Remove
                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="pro-edt-img">
                                                            <img src="img/new-product/6-small.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="product-edt-pix-wrap">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">TT</span>
                                                                        <input type="text" class="form-control" placeholder="Label Name">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-radio">
                                                                                <form>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Small Image
                                                                                        </label>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="product-edt-remove">
                                                                                <button type="button" class="btn btn-danger waves-effect waves-light">Remove
                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="pro-edt-img">
                                                            <img src="img/new-product/7-small.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="product-edt-pix-wrap">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">TT</span>
                                                                        <input type="text" class="form-control" placeholder="Label Name">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-radio">
                                                                                <form>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Largest Image
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Medium Image
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="radio radiofill">
                                                                                        <label>
                                                                                            <input type="radio" name="radio"><i class="helper"></i>Small Image
                                                                                        </label>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="product-edt-remove">
                                                                                <button type="button" class="btn btn-danger waves-effect waves-light">Remove
                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="card-block">
                                                    <div class="text-muted f-w-400">
                                                        <p>No reviews yet.</p>
                                                    </div>
                                                    <div class="m-t-10">
                                                        <div class="txt-primary f-18 f-w-600">
                                                            <p>Your Rating</p>
                                                        </div>
                                                        <div class="stars stars-example-css detail-stars">
                                                            <div class="review-rating">
                                                                <fieldset class="rating">
                                                                    <input type="radio" id="star5" name="rating" value="5">
                                                                    <label class="full" for="star5"></label>
                                                                    <input type="radio" id="star4half" name="rating" value="4 and a half">
                                                                    <label class="half" for="star4half"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4">
                                                                    <label class="full" for="star4"></label>
                                                                    <input type="radio" id="star3half" name="rating" value="3 and a half">
                                                                    <label class="half" for="star3half"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3">
                                                                    <label class="full" for="star3"></label>
                                                                    <input type="radio" id="star2half" name="rating" value="2 and a half">
                                                                    <label class="half" for="star2half"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2">
                                                                    <label class="full" for="star2"></label>
                                                                    <input type="radio" id="star1half" name="rating" value="1 and a half">
                                                                    <label class="half" for="star1half"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1">
                                                                    <label class="full" for="star1"></label>
                                                                    <input type="radio" id="starhalf" name="rating" value="half">
                                                                    <label class="half" for="starhalf"></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mg-b-15 mg-t-15">
                                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="User Name">
                                                    </div>
                                                    <div class="input-group mg-b-15">
                                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Last Name">
                                                    </div>
                                                    <div class="input-group mg-b-15">
                                                        <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="form-group review-pro-edt">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php echo $footer; ?>
    </div>

    <script src="../../../js/vendor/jquery-1.11.3.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/bootstrap.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/wow.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/jquery-price-slider.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/jquery.meanmenu.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/owl.carousel.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/jquery.sticky.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/jquery.scrollUp.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/scrollbar/jquery.mCustomScrollbar.concat.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/scrollbar/mCustomScrollbar-active.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/metisMenu/metisMenu.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/metisMenu/metisMenu-active.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/data-table/bootstrap-table.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/data-table/tableExport.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/data-table/data-table-active.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/data-table/bootstrap-table-editable.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/data-table/bootstrap-editable.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/data-table/bootstrap-table-resizable.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/data-table/colResizable-1.5.source.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/data-table/bootstrap-table-export.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/editable/jquery.mockjax.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/editable/mock-active.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/editable/select2.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/editable/moment.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/editable/bootstrap-datetimepicker.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/editable/bootstrap-editable.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/editable/xediable-active.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/chart/jquery.peity.min.js" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script src="../../../js/peity/peity-active.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/tab.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/plugins.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script src="../../../js/main.js" type="ac64c699268bb52d938f506f-text/javascript"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="ac64c699268bb52d938f506f-text/javascript"></script>
    <script type="ac64c699268bb52d938f506f-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');


        $(function() {
document.getElementById('amount').value

            $('#billing_form_id').click(function() {
            
                $.ajax({
                    url: '../../../insertChangeItem.php',
                    type: 'POST',
                    data: $('#TypeValidation').serializeArray(),
                    success: function(result) {
                        $('#response_form').remove();
                        $('#TypeValidation')[0].reset();
                        $('#billing_form_error_section').append('<p id = "response_form">' + result + '</p>');
                    }

                });

            });

        });



        $(document).ready(function() {
            var i = 1;

            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added" ><td><input type="text" id="slno' + i + '" value="' + i + '" readonly class="form-control" style="border:none;" /></td><td>' +
                    '<select name="item_category" class="form-control"><option value="">Select Category</option>' +
                    '<?php $itemresult = mysqli_query($conn_db, $itemcategory); ?>' +
                    '<?php while ($value = mysqli_fetch_array($itemresult)) { ?>' +
                    '<?php  ?>' +
                    '<?php   ?>' +
                    '<option value="<?php echo $value["in_categoryid"];  ?>"> ' +
                    '<?php echo $value["in_category_name"];  ?>' +
                    '</option> ' +
                    '<?php  } ?> ' +
                    '</select></td><td>' +
                    '<input type="text" name="item_name[]" placeholder="" class="form-control" /></td><td>' +
                    '<input type="text" name="qty[]" placeholder="" class="form-control" /></td><td>' +
                    '<input list="browsers" name="fitted_location[]" class="form-control" style="width:110px!important;"><datalist  id="browsers"><option value="">Select Fitted Location</option>' +
                    '<?php while ($row = mysqli_fetch_array($query)) { ?>' +
                    '<?php  ?>' +
                    '<?php  ?>' +
                    '<option value="<?php echo $row["branch_location"];  ?>" >' +
                    '<?php echo $row["branch_location"];  ?>' +
                    '</option> ' +
                    '<?php  } ?>' +
                    '</datalist></td><td>' +
                    '<input type="text" name="serial_no[]" placeholder="" class="form-control" /></td><td>' +
                    '<input type="text" name="model_no[]" placeholder="" class="form-control" /></td><td>' +
                    '<input type="text" name="barcode[]" placeholder="" class="form-control" /></td><td>' +
                    '<input type="date" name="date_of_installation[]" id="date_of_installation" placeholder="" class="form-control" /></td><td>' +
                    '<input type="date" name="warranty_upto[]" id="warranty_upto" placeholder="" class="form-control" /></td><td>' +
                    '<select name="service_mode[]"  id="service_mode" class="form-control"><option value="Repair">Repair</option><option value="Replace">Replace</option><option value="Pending">Pending</option></td><td>' +
                    '<textarea name="description[]" id="description" placeholder="" class="form-control" /></textarea></td><td>' +
                    '<input type="text" name="pending_issue[]" id="pending_issue" placeholder="" class="form-control" /></td><td>' +
                    '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>'
                );

            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
    </script>
    <script src="../../../client_login_css/js/rocket-loader.min.js" data-cf-settings="ac64c699268bb52d938f506f-|49" defer=""></script>
</body>



<script type="text/javascript">
    function setFormValidation(id) {
        $(id).validate({
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                $(element).closest('.form-check').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(element).closest('.form-check').removeClass('has-error').addClass('has-success');
            },
            errorPlacement: function(error, element) {
                $(element).closest('.form-group').append(error).addClass('has-error');
            },
        });
    }

    $(document).ready(function() {
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });

    function hidebutton() {
        document.getElementById('billing_form_id').style.display = 'none';
    }
</script>






</html>