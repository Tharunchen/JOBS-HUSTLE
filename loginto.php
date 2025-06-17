<?php
// Start a session
session_start();

// Database configuration
$host = "localhost";
$username = "root";
$password = ""; // Your database password
$database = "job_portal"; // Replace with your database name

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'job_portal');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Redirect to job listings page
            header("Location: http://localhost/project1/jobsearch.php");
            exit();
        } else {
            // Incorrect password
            echo "invalid password";
             }
    } else {
        // Email not found
        echo "invalid password";
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>