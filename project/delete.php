<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `trip` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Deleted Successsfully";
        header('location:display.php');
    }
    else
    {
        die(mysqli_error($con));

    }

}
?>