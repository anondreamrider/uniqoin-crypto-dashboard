<?php
// Establish a database connection (replace these with your actual database credentials)
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "uniqoin";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    $errors = array();
    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<script type='text/javascript'>alert('Invalid email address.')</script>");
    }

    // Check the email address from the database
    $sql = "SELECT * FROM `subscribers` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount>0) {
    array_push($errors,"<script type='text/javascript'>alert('You are already subscribed.')</script>");
    }

    if (count($errors)>0) {
    foreach ($errors as  $error) {
        echo "$error";
    }
    }
    else{
    // Insert the email address into the database
    $sql = "INSERT INTO `subscribers` (email) VALUES ( ? )";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        echo "<script type='text/javascript'>alert('Subscription successful! Thank you for subscribing.')</script>";
    }
    else{
        die("Something went wrong");
    }
    }
    echo '<script type="text/javascript">';
    echo 'setTimeout(function(){ window.location.href = "./../../index.html"; }, 2);';
    echo '</script>';
    
}



// Close the database connection
$conn->close();


?>
