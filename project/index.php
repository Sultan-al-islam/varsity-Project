<?php
include 'connect.php';
if(isset($_POST['submit'])){
    
    $uni_id = $_POST['uni_id'];
    $name = $_POST['name'];
    $Department=$_POST['Department'];
    $Batch = $_POST['Batch'];
    $Section = $_POST['Section'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

   
    
    $sql = "INSERT INTO `trip` (`uni_id`,`name`,`Department`,`Batch`,`Section`,`age`,`gender`, `email`, `phone`, `desc`) VALUES ('$uni_id','$name','$Department','$Batch','$Section', '$age', '$gender', '$email', '$phone', '$desc');";
   
    $result=mysqli_query($con,$sql);
    if($result)
    {
        //  echo "Data inserted sussecfully";
          header('location:display.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img class="bg" src="bg.jpg" alt="MU">
    <div class="container">
        <h1>Welcome to Metropolitan University Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        
        <form method="post">
            <input type="text" name="uni_id" id="uni_id" placeholder="Enter your Univarsiry ID">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="Department" id="Department" placeholder="Enter your Department Name">
            <input type="text" name="Batch" id="Batch" placeholder="Enter your Batch">
            <input type="text" name="Section" id="Section" placeholder="Enter your Section">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    
    
</body>
</html>
