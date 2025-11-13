<?php
// view_bookings.php - Displays all bookings from the database
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel | View All Bookings</title>
  <link rel="stylesheet" href="CSS/style.css">
  <style>
    /* Admin View Specific Styles */
    body {
      background: #f4f7f6; 
      font-family: 'Poppins', sans-serif;
      color: #333;
      display: block; 
    }
    header { background: #333; color: white; }
    h2 { text-align: center; margin: 30px 0 20px; color: #1a73e8; }
    table { width: 95%; margin: 20px auto; border-collapse: collapse; background: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; }
    th, td { padding: 12px 8px; border: 1px solid #eee; text-align: left; font-size: 14px; }
    th { background: #1a73e8; color: white; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px; }
    tr:nth-child(even) { background: #f9f9f9; }
    tr:hover { background: #eef5ff; }
    .back-link { display: block; width: 200px; text-align: center; margin: 20px auto 30px; text-decoration: none; color: white; background: #1a73e8; padding: 10px 15px; border-radius: 5px; transition: background 0.3s; }
    .back-link:hover { background: #155bb5; }
    footer { margin-top: 50px; }
  </style>
</head>
<body>
    <header>
        <h1>Booking System Admin View</h1>
    </header>

    <h2>All Hotel Bookings</h2>
    <a href="index.php" class="back-link">⬅ Back to Booking Form</a>

    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Hotel</th>
        <th>Room Type</th>
        <th>Check-In</th>
        <th>Check-Out</th>
        <th>No. of Guests</th> <th>Special Requests</th> <th>Date Booked</th>
      </tr>

      <?php
      // SELECT statement uses new, clean column names
      $sql = "SELECT id, name, email, phone, hotel, room_type, checkin, checkout, num_guests, special_requests, booking_date FROM bookings ORDER BY booking_date DESC";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"]. "</td>";
          echo "<td>" . htmlspecialchars($row["name"]). "</td>";
          echo "<td>" . htmlspecialchars($row["email"]). "</td>";
          echo "<td>" . htmlspecialchars($row["phone"]). "</td>";
          echo "<td>" . htmlspecialchars($row["hotel"]). "</td>";
          echo "<td>" . htmlspecialchars($row["room_type"]). "</td>";
          echo "<td>" . $row["checkin"]. "</td>";
          echo "<td>" . $row["checkout"]. "</td>";
          echo "<td>" . $row["num_guests"]. "</td>"; // Uses num_guests
          // Limit request size for table view
          echo "<td>" . htmlspecialchars(substr($row["special_requests"], 0, 30)) . (strlen($row["special_requests"]) > 30 ? '...' : '') . "</td>"; // Uses special_requests
          echo "<td>" . $row["booking_date"]. "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='11'>No bookings found 😢. Submit a test booking first!</td></tr>";
      }
      $conn->close();
      ?>
    </table>
    <footer>
        <p>&copy; 2025 Khan-Tech Hotel Booking System | Data Retrieval Panel</p>
    </footer>
</body>
</html>