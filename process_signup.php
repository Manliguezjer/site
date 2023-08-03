<?php
// PHP code to handle form submission and database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Database connection parameters
  $servername = "localhost";
  $username = "root";
  $password_db = "";
  $database = "benefciary";

  // Create a new MySQLi instance
  $conn = new mysqli($servername, $username, $password_db, $database);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL statement to insert the data
  $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();

  // Close the statement and connection
  $stmt->close();
  $conn->close();

  // Redirect to a success page or perform any other actions
  header("Location: success.html");
  exit();
}
?>
