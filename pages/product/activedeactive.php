<?php
include '../../connection.inc.php';
if (isset($_GET['type']) && $_GET['type'] != '') {
	$type= $_GET['type'];
	if ($type == 'status') {
		$operation = $_GET['operation'];
		$id = $_GET['id'];
		if ($operation == 'active') {
			$status = '1';
		} else {
			$status = '0';
		}
		$update_status_sql = "update product set p_status='$status' where p_id='$id'";
		mysqli_query($connection, $update_status_sql);
        header('location:product.php');
	}}
    ?>