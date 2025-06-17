<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "job_portal";

// Create connection
$conn = new mysqli("localhost", "root", "", "job_portal");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$results = [];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input1 = $conn->real_escape_string($_POST['input1']);
    $input2 = $conn->real_escape_string($_POST['input2']);

    // Query the database
    $sql = "SELECT * FROM jobs WHERE title LIKE '%$input1%' AND location LIKE '%$input2%'";
    $queryResult = $conn->query($sql);

    // Fetch matching records
    if ($queryResult->num_rows > 0) {
        while ($row = $queryResult->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        $message = "No records found matching your criteria.";
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Search Records</title>
    <style>
        body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image:url('https://wallpaper.dog/large/11032595.png');
  background-size: cover;
  background-position: right;
  background-repeat: no-repeat;
  opacity:100; /* Sets the transparency of the background */
  z-index: -1; /* Keeps it behind all content */
  pointer-events: none; /* Ensures it doesn’t interfere with other elements */
}
        body {
            font-family: Arial, sans-serif;
            margin: 0%;
            padding: 20px;
            background-color: #f0f8ff; /* Light blue background */
            color: #333;
        }
        header {
    display: flex;
    justify-content: space-between;
    background: linear-gradient(to right, #4a90e2, #56ccf2);
    color: black;
    font-size:25px;
    padding: 20px;
    text-align: center;
  }
  
  
        form {
            margin: 20px 0;
            text-align: center;
        }
        form input {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        form button {
            background-color: #4682b4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        form button:hover {
            background-color: #315f7d;
        }
        table {
            resize: vertical;
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        table th {
            background-color: #4682b4;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f0f8ff;
        }
        a:hover{
            color:black;
            background:linear-gradient(to right,white,skyblue);
            border: 1px solid;
            margin: auto;
            padding: 5px;
        }
        .message {
            text-align: center;
            margin: 20px;
            font-size: 1.2rem;
            color: #d32f2f;
        }
        footer {
    background-color: skyblue;
    color: black;
    text-align: center;
    padding: 1em 0;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 4%;
  }
  .navbar{
    font-size:25px;
    box-sizing:border-box;
    width:15%;
    height:30px;
    border-radius:10px;
    display:inline-flex;
    background-color:linear-gradient(to left,skyblue,white);
    color:white;
  }
  .navbar:hover{
    background-color:linear-gradient(to left,white,skyblue);
    cursor: pointer;
    color:black;

  }
  .head{
    width:50%;
    font-size:40px;
  }
    </style>
</head>
<body>
    <header>Job Hustle
        <nav class="navbar">
    <a href="logins.html" style="color:black;font-weight: bolder; ">Log Out</a><br><br>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://localhost/project1/" style="color:black; font-weight: bolder; ">Home</a>
</nav>
    </header><center>
    <h2 class="head">Job Search</h2></center>
    <form method="POST" action="">
        <input type="text" name="input1" placeholder="Enter Title" required>
        <input type="text" name="input2" placeholder="Loction" required>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($results)): ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Amount</th>
                    <th>Duration</th>
                    <th>Description</th>
                    <th>Application</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['location']) ?></td>
                        <td><?= htmlspecialchars($row['amount']) ?></td>
                        <td><?= htmlspecialchars($row['dnum']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td><button><a href=" resume.php" style="color:black; font-weight: bolder;">Apply</a></button></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (!empty($message)): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>
    <footer>
        
        <p> 2024 @!!!!!. Built by MNNT</p>
    
      </footer>
</body>
</html>