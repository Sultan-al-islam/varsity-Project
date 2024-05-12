<?php

$con=new mysqli('localhost:5111', 'root','','vtrip');

if(!$con){
  
die(mysqli_error($con));
}

 
?>