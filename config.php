<?php
$host = 'localhost';
$dbname = 'sql_test';
$username = 'sql_test';
$password = 'sql_test';
$conn;
//connect
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "Connected to $dbname at $host is ok.";
} catch (PDOException $error) {
    die("Could not connect to the database $dbname :" . $error->getMessage());
}

//debug func
function debug($data)
{
    echo '<br>';
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    echo '<br>';
}