<?php

if(isset($_GET['delete'])){
    include '../../connection.inc.php';
$id=$_GET['delete'];
$delete="delete from keypepole where id=$id";
$result=mysqli_query($connection,$delete);
if($result){
    header('location:pepole.php');
}
else{
    echo "data not deleted here";
}
}
?>