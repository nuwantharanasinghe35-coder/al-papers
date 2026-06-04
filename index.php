<?php
// 1. Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_papers_db";

// 2. Connection eka hadanawa
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Connection check karanawa
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Papers tika database eken gannawa - Year eka adu wena pilivelata
$sql = "SELECT id, subject, year, medium, paper_type, file_path FROM papers ORDER BY year DESC, subject ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A/L Past Papers</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #f0f2f5; 
            padding: 20px; 
        }
        .container { 
            max-width: 1000px; 
            margin: 0 auto; 
            background: white; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
        }
        h1 { 
            text-align: center; 
            color: #1a73e8; 
            margin-bottom: 30px; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th { 
            background: #1a73e8; 
            color: white; 
            padding: 14px; 
            text-align: left; 
        }
        td { 
            padding: 12px; 
            border-bottom: 1px solid #e0e0e0; 
        }
        tr:hover { background: #f8f9fa; }
        .btn { 
            padding: 8px 16px; 
            text-decoration: none; 
            border-radius: 5px; 
            font-size: 14px; 
            font-weight: 500;
            margin-right: 5px;
        }
        .btn-view { 
            background: #34a853; 
            color: white; 
        }
        .btn-download { 
            background: #ea4335; 
            color: white; 
        }
        .btn:hover { opacity: 0.8; }
        .no-data { 
            text-align: center; 
            padding: 40px; 
            color: #5f6368; 
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>A/L Past Papers - Sinhala Medium</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Subject</th>
                    <th>Medium</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Data thiyenawanam loop karala pennanawa
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><strong>" . $row["year"] . "</strong></td>";
                        echo "<td>" . $row["subject"] . "</td>";
                        echo "<td>" . $row["medium"] . "</td>";
                        echo "<td>" . $row["paper_type"] . "</td>";
                        echo "<td>";
                        echo "<a href='" . $row["file_path"] . "' target='_blank' class='btn btn-view'>View</a>";
                        echo "<a href='" . $row["file_path"] . "' download class='btn btn-download'>Download</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='no-data'>Thama papers add karala na</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
