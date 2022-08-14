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

//create table
try {
    $sql = "CREATE TABLE s_peoples (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30), age INTEGER,city VARCHAR(50));";
    $conn->exec($sql);
    // echo "Table s_peoples has been created";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
//insert people in db (once)
// try {
//     $sql = "INSERT INTO s_peoples (name, age) VALUES  ('Sam', 33),  ('Bob', 34),  ('Alice', 32)";
//     $conn->exec($sql);
//     echo 'yes';
// } catch (PDOException $e) {
//     echo "Database error: " . $e->getMessage();
// }