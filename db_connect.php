<?php
// db_connect.php - Database Connection Module

// Enable detailed error reporting and exceptions
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db"; 

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {
    die("❌ Database Connection Error: Please ensure XAMPP MySQL is running and the database 'hotel_db' is created.");
}
?>