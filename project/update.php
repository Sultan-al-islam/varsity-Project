<?php
include 'connect.php';

// Get the ID from the URL and sanitize it
$ID = filter_input(INPUT_GET, 'updateid', FILTER_SANITIZE_NUMBER_INT);

if (!$ID) {
    die("Invalid ID provided.");
}

// Fetch the existing data from the database
$sql = "SELECT * FROM `trip` WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $ID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

// Check if data exists for the provided ID
if (!$row) {
    die("No record found with the specified ID.");
}

// Initialize form values
$uni_id = $row['uni_id'];
$name = $row['name'];
$Department = $row['Department'];
$Batch = $row['Batch'];
$Section = $row['Section'];
$age = $row['age'];
$gender = $row['gender'];
$email = $row['email'];
$phone = $row['phone'];
$desc = $row['desc'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form data
    $uni_id = filter_input(INPUT_POST, 'uni_id', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $Department = filter_input(INPUT_POST, 'Department', FILTER_SANITIZE_STRING);
    $Batch = filter_input(INPUT_POST, 'Batch', FILTER_SANITIZE_STRING);
    $Section = filter_input(INPUT_POST, 'Section', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);

    // Prepare the update statement
    $sql = "UPDATE `trip` SET 
            uni_id = ?, 
            name = ?, 
            Department = ?, 
            Batch = ?, 
            Section = ?, 
            age = ?, 
            gender = ?, 
            email = ?, 
            phone = ?, 
            `desc` = ? 
            WHERE id = ?";
    
    // Create prepared statement
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters and data types
    mysqli_stmt_bind_param($stmt, "ssssisssssi",
        $uni_id,
        $name,
        $Department,
        $Batch,
        $Section,
        $age,
        $gender,
        $email,
        $phone,
        $desc,
        $ID
    );

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Check if update was successful
    if ($result) {
        header('Location: display.php'); // Redirect to display page if successful
        exit();
    } else {
        die("Error updating record: " . mysqli_stmt_error($stmt));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Trip Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Update Trip Form</h1>
        <p>Update your details to confirm your participation in the trip</p>
        
        <form method="POST">
            <input type="text" name="uni_id" id="uni_id" value="<?php echo htmlspecialchars($uni_id); ?>" placeholder="Enter your UniID" required>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your name" required>
            <input type="text" name="Department" id="Department" value="<?php echo htmlspecialchars($Department); ?>" placeholder="Enter your department name" required>
            <input type="text" name="Batch" id="Batch" value="<?php echo htmlspecialchars($Batch); ?>" placeholder="Enter your batch" required>
            <input type="text" name="Section" id="Section" value="<?php echo htmlspecialchars($Section); ?>" placeholder="Enter your section" required>
            <input type="number" name="age" id="age" value="<?php echo htmlspecialchars($age); ?>" placeholder="Enter your age" required>
            <input type="text" name="gender" id="gender" value="<?php echo htmlspecialchars($gender); ?>" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email" required>
            <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder="Enter your phone number" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here" required><?php echo htmlspecialchars($desc); ?></textarea>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
