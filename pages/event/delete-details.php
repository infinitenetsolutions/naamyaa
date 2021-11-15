<?php

if(isset($_GET['delete'])){
    include '../../connection.inc.php';
$id=$_GET['delete'];
echo $delete="DELETE FROM `event_details` WHERE  `event_id`='$id'";
$result=mysqli_query($connection,$delete);
if($result){
    header('location:Event.php');
}
else{
    echo "data not deleted here";
}
}
?>