function validatePassword(password) {
    // Regular expression for password (same as defined in the database)
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return passwordRegex.test(password);
}

// Function to validate email against regular expression
function validateEmail(email) {
    // Regular expression for email (same as defined in the database)
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
}

// Function to handle form submission
function validateForm() {
    // Retrieve form inputs
    var firstName = document.getElementById('first_name').value.trim();
    var lastName = document.getElementById('last_name').value.trim();
    var phoneNumber = document.getElementById('phone_number').value.trim();
    var password = document.getElementById('password').value.trim();
    var confirmPassword = document.getElementById('confirmPassword').value.trim();
    var email = document.getElementById('email').value.trim();
    var confirmEmail = document.getElementById('confirmEmail').value.trim();

    // Check if all required fields are filled
    if (!firstName || !lastName || !phoneNumber || !password || !confirmPassword || !email || !confirmEmail) {
        alert("All fields are required!");
        return false;
    }

    // Validate password
    if (!validatePassword(password)) {
        alert("Password must be at least 8 characters long, and include 1 uppercase, 1 lowercase, and 1 number.");
        return false;
    }

    // Check if password and confirm password match
    if (password !== confirmPassword) {
        alert("Password and Confirm Password do not match!");
        return false;
    }

    // Validate email
    if (!validateEmail(email)) {
        alert("Invalid email format!");
        return false;
    }

    // Check if email and confirm email match
    if (email !== confirmEmail) {
        alert("Email and Confirm Email do not match!");
        return false;
    }

    // Form validation passed, proceed with form submission
    return true;
}
