<?php
// book.php - Securely handles POST request and inserts data

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Get and sanitize data
    $name         = trim($_POST['name']);
    $email        = trim($_POST['email']);
    $phone        = trim($_POST['phone']);
    $hotel        = $_POST['hotel'];
    $checkin      = $_POST['checkin'];
    $checkout     = $_POST['checkout'];
    $num_guests   = (int)$_POST['num_guests']; // Consistent name
    $room_type    = $_POST['room_type'];
    $requests     = trim($_POST['requests']); 

    // 2. Prepare the SQL statement using placeholders (?)
    $sql = "INSERT INTO bookings (name, email, phone, hotel, checkin, checkout, num_guests, room_type, special_requests)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("❌ System Error: Could not prepare booking statement: " . $conn->error);
    }

    // 3. Bind parameters (s=string, i=integer)
    // s s s s s s i s s (8 strings, 1 integer)
    $stmt->bind_param("ssssssiss", 
        $name, 
        $email, 
        $phone, 
        $hotel, 
        $checkin, 
        $checkout, 
        $num_guests, 
        $room_type, 
        $requests 
    );

    // 4. Execute the statement
    if ($stmt->execute()) {
        $last_id = $stmt->insert_id;
        echo "<script>alert('✅ Booking successful! Your reference ID is: #BKG{$last_id}'); window.location.href='index.php';</script>";
    } else {
        echo "❌ Database Error: Could not complete booking. Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: index.php');
    exit;
}
?>