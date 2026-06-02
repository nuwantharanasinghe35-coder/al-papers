<?php
// ========== DATABASE CONNECTION ==========
$servername = "localhost";
$username = "root";
$password = "ube_mysql_password_eka";  // MySQL install karaddi dunna password eka danna
$database = "my_website_db";
$port = 3306;

// Connection eka hadanawa
$conn = new mysqli($servername, $username, $password, $database, $port);

// Connection check karanawa
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Database connected!"; // Test karanna ona nam me // ain karapan
// =========================================
?>

<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AL Papers - Past Papers & Marking Schemes</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #f5f5f5; 
            color: #333;
        }
        .header {
            background: #2c3e50;
            color: white;
            padding: 1rem 0;
            text-align: center;
        }
        .nav {
            background: #34495e;
            padding: 1rem;
            text-align: center;
        }
        .nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .nav a:hover { background: #2c3e50; }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        .subjects {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 2rem;
        }
        .subject-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: 0.3s;
        }
        .subject-card:hover { transform: translateY(-5px); }
        .subject-card a {
            text-decoration: none;
            color: #2c3e50;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .db-status {
            background: #27ae60;
            color: white;
            padding: 10px;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="db-status">
        <?php 
        if ($conn->ping()) {
            echo "✅ Database Connected: my_website_db";
        }
        ?>
    </div>

    <div class="header">
        <h1>AL Papers</h1>
        <p>A/L Past Papers & Marking Schemes</p>
    </div>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
        <a href="physics.html">Physics</a>
        <a href="chemistry.html">Chemistry</a>
        <a href="biology.html">Biology</a>
    </div>

    <div class="container">
        <h2>Select Subject</h2>
        <div class="subjects">
            <div class="subject-card">
                <a href="physics.html">Physics</a>
                <p>භෞතික විද්‍යාව</p>
            </div>
            <div class="subject-card">
                <a href="chemistry.html">Chemistry</a>
                <p>රසායන විද්‍යාව</p>
            </div>
            <div class="subject-card">
                <a href="biology.html">Biology</a>
                <p>ජීව විද්‍යාව</p>
            </div>
            <div class="subject-card">
                <a href="sinhala.html">Sinhala</a>
                <p>සිංහල</p>
            </div>
        </div>

        <?php
        // Database eken data ganna example ekak
        // Ube 'papers' kiyala table ekak haduwama meka wada karai
        /*
        $sql = "SELECT COUNT(*) as total FROM papers";
        $result = $conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            echo "<p style='text-align:center; margin-top:2rem;'>Total Papers in Database: " . $row['total'] . "</p>";
        }
        */
        ?>
    </div>

    <?php
    // Connection eka close karanawa
    $conn->close();
    ?>
</body>
</html>
