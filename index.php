<?php
$insert = false;

// Set connection variables
$server = "localhost";
$username = "root";
$password = "";

// Create a database connection
$con = mysqli_connect($server, $username, $password);

// Check for connection success
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database and table if they don't exist
$sql = "CREATE DATABASE IF NOT EXISTS `register_db1`";
$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `register_db1`.`register1` (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `age` INT(3) NOT NULL,
    `gender` VARCHAR(10) NOT NULL,
    `phone` VARCHAR(15) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `education` VARCHAR(50) NOT NULL,
    `college` VARCHAR(100) NOT NULL
)";
$con->query($sql);

// Handle form submission
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $college = $_POST['college'];

    $sql = "INSERT INTO `register_db1`.`register1` (`name`, `age`, `gender`, `phone`, `email`, `education`, `college`)
            VALUES ('$name', '$age', '$gender', '$phone', '$email', '$education', '$college')";

    if ($con->query($sql) === true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="container">
        <h1 class="head">Registration Form</h1><br>

        <p class="para">Enter your details & Submit The Form</p><br>

        <form action="index.php" method="post">
            <div class="name">
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
            </div>

            <div class="age">
                <label for="age">Age</label><br>
                <input type="number" name="age" id="age" placeholder="Enter Your Age" required>
            </div>
            
            <div class="gender">
                <label for="gender">Gender</label><br>
                <input type="radio" name="gender" value="male"> Male &nbsp;
                <input type="radio" name="gender" value="female"> Female &nbsp;
                <input type="radio" name="gender" value="female"> Other

            </div>
            
            <div class="phone">
                <label for="phone">Phone No.</label><br>
                <input type="tel" name="phone" id="phone" placeholder="Enter Your Phone No." required>
            </div>

            <div class="email">
                <label for="email">Email-Id</label><br>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <div class="education"><br>
                <label for="education">Education</label><br>
                <input type="radio" name="education" value="11th"> 11th<br>
                <input type="radio" name="education" value="12th"> 12th<br>
                <input type="radio" name="education" value="graduation"> Graduation<br>
                <input type="radio" name="education" value="postgraduation"> Post Graduation<br>
                <input type="radio" name="education" value="phd"> PHD<br>
                <input type="radio" name="education" value="other"> Other: <input type="text" name="education_other">
            </div>

            <div class="college">
                <label for="college">College</label><br>
                <input type="text" name="college" id="college" placeholder="College Name" required>
            </div>

            <div class="button">
                <button type="submit" class="btn">Submit</button>
                <button type="reset" class="reset">Clear Form</button>
            </div>
        </form>

    <?php
    if ($insert == true) {
        echo "<p class='submitmsg'>!!Thanks for submitting your form!!</p>";
    }
    ?>
        <!-- Link to view data -->
        <p><a href="view_data.php">View Submitted Data</a></p>
    </div>

</body>

</html>

<?php
$con->close();
?>
