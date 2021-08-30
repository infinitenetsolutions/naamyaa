<?php
session_start();
$connection=mysqli_connect("localhost","naamyaafoundation_db","nSsiXPc3","naamyaafoundation_db");
if($connection){
    // echo"Connection Establish successfully";
}
else{
    echo"Somthing is error";
}

?>