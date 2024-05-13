document.addEventListener('DOMContentLoaded', function () {
    var registrationForm = document.getElementById('registrationForm');
    var saveAdditionalInfoBtn = document.getElementById('saveAdditionalInfoButton');



    registrationForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // Retrieve form values
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        // Retrieve other form values

        // Simulate server registration
        var registrationResult = simulateServerRegistration(firstName, lastName, /* other form values */);

        // Check if the server registration was successful
        if (registrationResult.success) {
            // If successful, create a user object
            var user = {
                firstName: firstName,
                lastName: lastName,
                // Add other properties
            };

            // Store user information in sessionStorage
            sessionStorage.setItem('currentUser', JSON.stringify(user));

            // Redirect to the dashboard page
            window.location.href = 'user-dashboard.html';
        } else {
            // Handle registration failure (show an error message, etc.)
            console.error('Server registration failed.');
        }
    });
});
