<?php

if (isset($_GET['del-photos'])) {
    include '../../connection.inc.php';
    $id = $_GET['del-photos'];
    $delete = "DELETE FROM `Gallery` WHERE `id`=$id && `Gallery_type`='photos'";
    $result = mysqli_query($connection, $delete);
    if ($result) {
        header('location:photosgallery.php');
    } else {
        echo "data not deleted here";
    }
}
if (isset($_GET['del-media'])) {
    include '../../connection.inc.php';
    $id = $_GET['del-media'];
    $delete = "DELETE FROM `Gallery` WHERE `id`=$id && `Gallery_type`='media'";
    $result = mysqli_query($connection, $delete);
    if ($result) {

        header('location:mediagallery.php');
    } else {
        echo "data not deleted here";
    }
}
if (isset($_GET['del-videos'])) {
    include '../../connection.inc.php';
    $id = $_GET['del-videos'];
    $delete = "DELETE FROM `videogallery` WHERE id=$id";
    $result = mysqli_query($connection, $delete);
    if ($result) {
        header('location:videogallery.php');
    } else {
        echo "data not deleted here";
    }
}
