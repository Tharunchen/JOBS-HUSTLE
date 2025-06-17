<?php
// Database Connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'job_portal';
$conn = new mysqli('localhost', 'root', '', 'job_portal');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $position =$conn->real_escape_string($_POST['position']);
    $resume_path =$conn->real_escape_string($_POST['resume_path']);
    
    $query = "INSERT INTO application (name, email, position,resume_path) VALUES ('$name', '$email', '$position', '$resume_path')";
    $conn->query($query);
}

// Fetch Data Sorted by Date Descending
$result = $conn->query("SELECT * FROM application ORDER BY applied_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <title>Job Entry Portal</title>
    <link rel="stylesheet" href="style.css">
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
      /* General Styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
  line-height: 1.6;
  background-color: #f5f5f5;
}

header {
  background: linear-gradient(to right, #4a90e2, #56ccf2);
  color: white;
  text-align: center;
  margin: auto;
  padding: 1px;
  border: auto;
  height:auto;
  text-decoration: none;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}


header h1 {
  margin: 0;
  font-size: 2rem;
}

.navbar a {
  color: white;
  text-decoration: none;
  margin: 0 10px;
  font-size: 1.2rem;
}
.footer {
  background-color: skyblue;
  color: black;
  text-align: center;
  padding: 4px;
  position: static;
  bottom: 0;
  height: 2%;
  width: 100%;
  height: fit-content;
}

.navbar a:hover {
  color: #ffd700;
}

/* Form Styles */
form {
  background: white;
  padding: 20px;
  margin: 20px auto;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  max-width: 500px;
}

form input, form textarea, form button {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 1rem;
}

form input:focus, form textarea:focus, form button:focus {
  border-color: #56ccf2;
  outline: none;
}

form button {
  background: linear-gradient(to right, #4a90e2, #56ccf2);
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: transform 0.3s ease;
}

form button:hover {
  background: linear-gradient(to right, #56ccf2, #4a90e2);
}

/* Job Listings */
.job-listings {
  max-width: 1200px;
  margin: 20px auto;
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

.job-card {
  background: white;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 15px;
  width: 300px;
  text-align: center;
  transition: transform 0.3s ease;
}

.job-card:hover {
  transform: translateY(-5px);
}

.job-card h2 {
  font-size: 1.5rem;
  margin: 10px 0;
  color: #4a90e2;
}

.job-card p {
  margin: 5px 0;
  font-size: 1rem;
}

.job-actions a {
  text-decoration: none;
  display: inline-block;
  margin: 10px;
}

.job-actions i {
  font-size: 2rem;
  transition: transform 0.3s ease;
}

        label {
            text-align: left;
        }

        
        .h11{
            background-color:skyblue;
            padding: 1px;
            position: static;
            text-decoration: none;
            width:30%;

        }
        i:hover{
            transform:scale(1.2);

        }
        a:hover{
            color:black;
            transform:scale(1.2);            
            margin: 0;
            padding: 2px;
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
        input[type="textarea"]{
            height: 20%;
        }
        </style>
</head>
<body>
    
    <center>
    <header>
        <h1>Job Hustle</h1>
        <nav class="navbar">
          <a href="http://localhost/project1/" ><i class="fa fa-home" style="font-size:30px; color:black;"></i></a>
          <a href="http://localhost/jobss/jobposting.php" style="color:black;background:white;border:1px solid font-weight: bolder;  ">Post_Jobs</a></button></h3>

        </nav>
    </header><br>
    <div class="job-listing">
        <div class="inputt">
        <h1 class="h11">Resume Entry Portal</h1>
        <!-- Input Form -->
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
            <input type="position" id="position" name="position" placeholder="position" required>
            <input type="url" id="resume_path" name="resume_path" placeholder="Resume's URL" required>

            <button type="submit">Post</button>
        </form>
    </div>
        
        <!-- Job Listings -->
        <h2 class="h11">Resume Listed</h2>
        <div class="job-listings">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="job-card">
                    <h2 style="color:#1c6dd0;"><?php echo htmlspecialchars($row['name']); ?></h2>
                    <h4><?php echo htmlspecialchars($row['email']); ?></h4>
                    <h4><?php echo htmlspecialchars($row['position']); ?></h4>
                    <h4><a href="<?php echo htmlspecialchars($row['resume_path']); ?>">Resume</a></h4> 
                    <small>Posted on: <?php echo $row['applied_at']; ?></small>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

<footer class="footer">
    
    <p> 2024 @!!!!!. Built by MNNT</p>

  </footer>
</center>

    <script src="script.js"></script>
</body>
</html>

<?php $conn->close(); ?>