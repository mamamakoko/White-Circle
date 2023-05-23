function submitForm(event) {
    event.preventDefault(); // Prevent form submission

    // Get the values from the form
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Perform validation or further processing
    // For example, you can send the form data to a server using AJAX

    // Reset the form
    document.getElementById('signinForm').reset();
}
