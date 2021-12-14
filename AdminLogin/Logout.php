<?php
include './BackEnd/connection.inc.php';
session_destroy();
header('location:super_Admin.php');
?>