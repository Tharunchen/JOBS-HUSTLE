<?php
// Database connection details
$host = "localhost"; // Server name
$username = "root"; // Database username (default for XAMPP is 'root')
$password = ""; // Database password (default for XAMPP is empty)
$dbname = "job_portal"; // Database name

// Create a connection
$conn = new mysqli("localhost", "root", "", "job_portal");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
    $email = $conn->real_escape_string($_POST['email']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data
    $sql = "INSERT INTO user (first_name, last_name, phone_number,email, dob, password)
            VALUES ('$firstName', '$lastName', '$phoneNumber', '$email' ,'$dob','$hashedPassword')";

    // Execute the query
    if ($conn->query($sql) == TRUE) 
    {
         header("location:logins.html");
            } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close the connection
    $conn->close();
}
?>