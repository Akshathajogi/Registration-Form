<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "register_db1";

// Create a connection to the database
$con = mysqli_connect($server, $username, $password, $database);

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch data from the table
$sql = "SELECT * FROM `register1`";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
    <style>
        /* Inline CSS for quick reference */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(254, 229, 229);
            color: #333;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        th, td {
            border: 1px solid rgb(243, 206, 206);
            padding: 12px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            font-size: 20px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Submitted Registrations</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Education</th>
                    <th>College</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are rows in the result
                if ($result->num_rows > 0) {
                    // Loop through and display each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['age']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['education']}</td>
                                <td>{$row['college']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <p><a href="index.php">Back to Form</a></p>
    </div>
</body>

</html>

<?php
// Close the database connection
$con->close();
?>
