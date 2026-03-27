<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'multistep_db');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Collect data from POST
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$barangay = $_POST['barangay'];
$municipality = $_POST['municipality'];
$province = $_POST['province'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert into DB
$sql = "INSERT INTO users 
(first_name, last_name, email, phone, barangay, municipality, province, username, password)
VALUES ('$first', '$last', '$email', '$phone', '$barangay', '$municipality', '$province', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>