<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server hostname
$username = "username"; // Change this to your database username
$password = "password"; // Change this to your database password
$dbname = "your_database"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$dateOfBirth = $_POST['dateOfBirth'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare SQL statement to insert data into database
$sql = "INSERT INTO registration (first_name, last_name, gender, date_of_birth, email, phone) VALUES (?, ?, ?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $firstName, $lastName, $gender, $dateOfBirth, $email, $phone);

// Execute the prepared statement
if ($stmt->execute()) {
    // Registration successful
    echo "Registration successful!";
} else {
    // Registration failed
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
