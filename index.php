<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotel Booking System | Book Your Stay</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="JS/script.js" defer></script>
</head>
<body>

  <header>
    <h1>Hotel Booking System</h1>
    <p>Khan-Tech Integrated Services</p>
  </header>

  <main>
    <form action="book.php" method="POST" class="booking-form">
      <h2>Reserve Your Stay</h2>
      
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" placeholder="John Doe" required />

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="email@example.com" required />

      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone" placeholder="+1234567890" required />

      <label for="hotel">Select Hotel:</label>
      <select id="hotel" name="hotel" required>
        <option value="">-- Choose a Hotel --</option>
        <option value="Grand Palace">Grand Palace</option>
        <option value="Sea View Resort">Sea View Resort</option>
        <option value="City Lights Inn">City Lights Inn</option>
        <option value="Mountain Stay">Mountain Stay</option>
      </select>

      <label for="checkin">Check-In Date:</label>
      <input type="date" id="checkin" name="checkin" required />

      <label for="checkout">Check-Out Date:</label>
      <input type="date" id="checkout" name="checkout" required />

      <label for="num_guests">Number of Guests (1-10):</label> 
      <input type="number" id="num_guests" name="num_guests" min="1" max="10" required />

      <label for="room_type">Room Type:</label>
      <select id="room_type" name="room_type" required>
        <option value="Standard">Standard</option>
        <option value="Deluxe">Deluxe</option>
        <option value="Suite">Suite</option>
      </select>

      <label for="requests">Special Requests:</label>
      <textarea id="requests" name="requests" placeholder="Any special requirements?"></textarea>

      <button type="submit">Complete Booking</button>
      
      <a href="view_bookings.php" class="admin-link">View All Bookings (Admin)</a>
    </form>
  </main>

  <footer>
    <p>&copy; 2025 Khan-Tech Hotel Booking System | Built with HTML, CSS, JS, PHP, SQL</p>
  </footer>

</body>
</html>