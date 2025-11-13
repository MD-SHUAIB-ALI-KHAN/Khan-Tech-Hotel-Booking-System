// JS/script.js - Client-Side Form Validation

document.addEventListener('DOMContentLoaded', () => {
    console.log("Hotel booking form loaded successfully. JS connected!");

    const bookingForm = document.querySelector('.booking-form');
    
    if (bookingForm) {
        bookingForm.addEventListener('submit', (event) => {
            
            const checkinDate = new Date(bookingForm.checkin.value);
            const checkoutDate = new Date(bookingForm.checkout.value);
            const num_guests = parseInt(bookingForm.num_guests.value, 10);
            
            // Basic date check to ensure future dates
            const today = new Date();
            today.setHours(0, 0, 0, 0); 
            
            if (checkinDate < today) {
                alert('❌ Check-In Date cannot be in the past!');
                event.preventDefault(); 
                return;
            }

            // 1. Check-in/Check-out Date Logic
            if (checkinDate >= checkoutDate) {
                alert('❌ Check-Out Date must be after the Check-In Date!');
                event.preventDefault(); 
                return;
            }

            // 2. Guests Check
            if (num_guests < 1 || num_guests > 10) {
                 alert('❌ Please enter a valid number of guests (1 to 10).');
                event.preventDefault(); 
                return;
            }
        });
    }
});