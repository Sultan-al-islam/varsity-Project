<?php
include'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compitible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud Operation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>

<body>
  <div class="container">
    <button class="btn btn-primary my-5"><a href="index.php" class="text-light">Add Students </a>
    </button>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">SL No.</th>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Section</th>
          <th scope="col">Age</th>
          <th scope="col">Gender</th>
          <th scope="col">E-mail</th>
          <th scope="col">Phone</th>
          <th scope="col">Other</th>
          <th scope="col">Operation</th>
        

        </tr>
      </thead>
      <tbody>
        <?php
        $sql="select * from `trip`";
        $result=mysqli_query($con,$sql);

        if($result){
         
        while($row=mysqli_fetch_assoc($result)){
         
          $ID  =  $row['ID'];
          $uni_id = $row['uni_id'];
          $name = $row['name'];
          $Department=$row['Department'];
          $Batch = $row['Batch'];
          $Section = $row['Section'];
          $age = $row['age'];
          $gender = $row['gender'];
          $email = $row['email'];
          $phone = $row['phone'];
          $desc = $row['desc'];
      
          echo '<tr>
      <th scope="row">'.$ID.'</th>
      <td>'.$uni_id.'</td>
      <td>'.$name.'</td>
      <td>'.$Department.'</td>
      <td>'.$Batch.'</td>
      <td>'.$Section.'</td>
      <td>'.$age.'</td>
      <td>'.$gender.'</td>
      <td>'.$email.'</td>
      <td>'.$phone.'</td>
      <td>'.$desc.'</td>
      <td>
  <button class="btn btn-primary"><a href="update.php?updateid='.$ID.'"class="text-light">Update</a></button>
  <button class="btn btn-danger"><a href="delete.php?deleteid='.$ID.'"class="text-light">Delete</a></button>
</td>

    </tr>';


        }
        }


?>



     
      </tbody>
    </table>
  </div>

</body>

</html>