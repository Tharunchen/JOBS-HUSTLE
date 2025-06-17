document.getElementById('signUp').addEventListener('submit', function(event) {
    event.preventDefault();

    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match!');
    } else {
        alert('Registration Successful!');
        this.reset(); // Clear the form
    }
});