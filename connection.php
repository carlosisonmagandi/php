<?php

//Fetching data from form
error_reporting(E_ALL);
ini_set('display_errors', '1');

//resolution
if(isset($_POST['submit'])){
    $name=$_POST['Name'];
    $age=$_POST['Age'];
    echo 'This is the Name:'.$name;
} else {
    echo "Form not submitted!";
}

$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'php_schema';

// Create a connection
$connection = mysqli_connect($host, $user, $password, $database);


// Check the connection
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Define the SQL query
$queryUser = "SELECT * FROM user_account";

// Execute the query
$sqlUser = mysqli_query($connection, $queryUser);

// Check for errors in the query
if (!$sqlUser) {
    die("Query failed: " . mysqli_error($connection));
}

// Display the results
while ($results = mysqli_fetch_array($sqlUser)) {
    echo '[Database] Name: ' . $results['name'] . '<br>';
    echo '[Database] Age: ' . $results['age'] . '<br>';
}

// Close the database connection
mysqli_close($connection);


//expect an error. to resolve, need to configure the inifile from the extracted folder. C:\Program Files\dev_tools\php-8.2.9-nts-Win32-vs16-x64

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="index.php">
        Name: <input type="text" name="Name"><br>
        Age: <input type="text" name="Age"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php if(isset($error)) { echo $error; } ?>
</body>
</html>