
<?php
session_start();
if($_SERVER['SERVER_NAME']=="localhost"){

// session_start();
// localconnection
$connection=mysqli_connect("localhost","root","","Naamya_foundation");
}else{

// // server connection
$connection=mysqli_connect("localhost","naamyaafoundation_db","nSsiXPc3","naamyaafoundation_db");
}
?>