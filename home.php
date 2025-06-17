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
    <title>home</title>
    <link rel="stylesheet" href="css/style.css">
   
    <style>
        body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  margin:0;
  padding:0;
  height: 100%;
  background-image: url('https://c4.wallpaperflare.com/wallpaper/86/1017/75/spot-texture-background-surface-wallpaper-preview.jpg');
  background-size: cover;
  background-position: right;
  background-repeat: no-repeat;
  opacity:100; /* Sets the transparency of the background */
  z-index: -1; /* Keeps it behind all content */
  pointer-events: none; /* Ensures it doesn’t interfere with other elements */
}
      
        label {
            text-align: left;
        }
        header{
            border: auto;
            background-color:skyblue;
            margin: 0;
            padding: 0;

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
        .message {
            text-align: center;
            margin: 20px;
            font-size: 1.2rem;
            color: #d32f2f;
        }
        a:hover{
            color:black;
            background:linear-gradient(to right,white,skyblue);
            border: 1px solid;
            margin: auto;
            padding: 5px;
        }
        button{
            cursor: pointer;
            color:black;
            background:linear-gradient(to left,skyblue,white);

        }
        button:hover{ 
            color:black;
            background:linear-gradient(to left ,white,skyblue);
        }
        
    </style>
</head>
<body>
    <div>
    <center>    
    <header>
        <div class="logo-container">
            <span class="brand-name">JOBS HUSTLE</span>
        </div>
        <nav class="navbar">
           
            <a href="about.html" style="color:black; font-weight: bolder;">About</a>&nbsp;&nbsp;
            <a href="resume.php" style="color: black; font-weight: bolder;">Resumes</a>&nbsp;&nbsp;
            <a href="logins.html" style="color:black; font-weight: bolder;">Account</a>&nbsp;&nbsp;
            <a href="http://localhost/jobss/jobposting.php" style="color:black; font-weight: bolder;  ">Post_Jobs</a></button></h3>
            <a href="logins.html" style="color:black; font-weight: bolder;  ">Log_Out</a></button></h3>
        </nav>
    </header><br><br>
    
    <section>
        <form  method="POST" action="">
        <p><h3>Find Your Next Job </h3></p>
        <label for="job title" >Job Title  <br></label>
        <input type="text" id="name" name="input1"><br><br>

        <label for="name" style="text-align:left;">Location</label><br>
        <input type="text" id="location" name="input2"><br><br>

        <button type="submit">Search Now</button>
    </form>
    </section>
</div>
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
                        <td><button><a href="logins.html" style="color:black; font-weight: bolder;">Apply</a></button></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (!empty($message)): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>
    <br><br>&nbsp;
    <footer >
        
        <p> 2024 @!!!!!. Built by MNNT</p>
    
      </footer>
</center>
</body>
</html>