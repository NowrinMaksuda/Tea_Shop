<?php
include "config.php"; // Database connection

if (isset($_POST['submit']) || $_SERVER['REQUEST_METHOD'] === 'POST') {
  // Input sanitize
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $item = mysqli_real_escape_string($conn, $_POST['item']);
  $quantity = intval($_POST['quantity']);
  $discount = mysqli_real_escape_string($conn, $_POST['discount']);

  // Insert query
  $sql = "INSERT INTO orders (name, email, item, quantity, discount) 
            VALUES ('$name', '$email', '$item', $quantity, '$discount')";

  if ($conn->query($sql) === TRUE) {
    echo "<span style='color:green;'>Your order has been placed successfully!</span>";
  } else {
    echo "<span style='color:red;'>Error: " . $conn->error . "</span>";
  }
}
