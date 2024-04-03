<?php
// Establish connection using PDO
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "crud_database"; // Your database name

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Query to retrieve data
$stmt = $connection->query("SELECT * FROM users");

// Fetch data as associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Loop through the data
foreach ($users as $user) {
    // Access user data like $user['column_name']
    // echo $user['name'];
}
?>

