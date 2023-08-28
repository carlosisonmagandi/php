<?php
//variable
$name= 'Carlo';
$age=23;

//use dot to concat variable
echo "Name: $name <br>";
echo 'Age:'.$age. '<br>'; 

//identify data types
var_dump(1.00);

//constant 
define('Message', 'Thank you for watching');
echo '<br>';
echo Message;
echo '<br>';

//operators (+ - / * %<modulo>)
echo 5+5;
echo '<br>';

//functions
function showMessage($message){
    return "Your message: $message";
}
echo showMessage('This is the message');
echo '<br>';

//Arrays
$array1 =['honda','toyota','suzuki'];
$array2= array('index'=>'apple','mango','pineapple');

echo $array1[1];//toyota
echo '<br>';
echo $array2[0]; //mango
echo '<br>';
echo $array2['index']; //apple
echo '<br>';
print_r($array1);//checking of index
echo '<br>';

//conditions
$val= 1;
    //if else
    if($val==1){
        echo 'correct';
        echo '<br>';
    }
    else{
        'incorrect';
        echo '<br>';
    }; //correct but if ===, the value will incorrect because of type

    echo $val == '1' ? 'Correct!' : 'Incorrect!';// ternary operator or conditional expression
    echo'<br>';

    //switch
    switch($val){
        case 1:
            echo 'one'; break;
        case 2:
            echo 'two';break;
        default:
            echo 'none';
    }

//Loops
$counter= 1;
    //while
    while($counter <=5){
        echo '<br>';
        echo 'Counter'.$counter.'<br>';
        $counter++;
    }
    //for
    for($c=1; $c<=5; $c++){
        echo 'Counter'. $c.'<br>';
    }


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

$host = "localhost";
$user = "root";
$password = "root";
$database = "php_schema";

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