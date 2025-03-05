<?php
// Database credentials
$host = "localhost"; // Usually "localhost"
$username = "u368301774_ritesh"; // Replace with your Hostinger DB username
$password = "Riteshsqlwithtravelpla@123"; // Replace with your Hostinger DB password
$dbname = "yu368301774_clients"; // Replace with your database name

// Email settings
$to_email = "mohit@trawelplayhospitality.com"; // Replace with your Hostinger email
$subject = "New Lead";

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO submissions (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    // Prepare email content
    $email_message = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";

    // Send email notification
    mail($to_email, $subject, $email_message);

    echo "<script>alert('Thank you! Your message has been submitted.'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>