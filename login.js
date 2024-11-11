document.addEventListener('DOMContentLoaded', () => {
    // Handle sign up
    document.getElementById('signup-btn').addEventListener('click', () => {
        const username = document.getElementById('signup-username').value.trim();
        const email = document.getElementById('signup-email').value.trim();
        const telephone = document.getElementById('signup-telephone').value.trim();
        const address = document.getElementById('signup-address').value.trim();
        const password = document.getElementById('signup-password').value.trim();

        if (username && email && telephone && address && password) {
            localStorage.setItem('user', JSON.stringify({
                username: username,
                email: email,
                telephone: telephone,
                address: address,
                password: password
            }));
            alert("Sign-up successful! You can now log in.");
            // Switch to login form
            showLoginForm();
        } else {
            alert("Please fill in all fields.");
        }
    });

    // Handle login
    document.getElementById('login-btn').addEventListener('click', () => {
        const email = document.getElementById('login-email').value.trim();
        const password = document.getElementById('login-password').value.trim();

        const user = JSON.parse(localStorage.getItem('user'));

        if (user && user.email === email && user.password === password) {
            alert("Login successful!");
            window.location.href = "index.html"; // Redirect to the dashboard page
        } else {
            alert("Invalid email or password. Please try again.");
        }
    });
});

// Switch to Signup Form
function showSignupForm() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('signup-form').style.display = 'block';
}

// Switch to Login Form
function showLoginForm() {
    document.getElementById('signup-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
}
