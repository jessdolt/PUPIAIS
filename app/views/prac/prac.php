<?php
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b9e84a4bdcd7c6";
$password = "2891ffd3";
$dbname ='heroku_ec03275637a73ae';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_print($row);
  }
} else {
  echo "0 results";
}
$conn->close();


?>