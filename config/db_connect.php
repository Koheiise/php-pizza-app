<?php

  // Connect to DB
  $conn = mysqli_connect('localhost', 'php_pizza', 'qwertyqwerty', 'php_pizza');

  // Check the connection
  if (!$conn) {
    echo "Connection Error: " . mysqli_connect_error();
  }
  
?>