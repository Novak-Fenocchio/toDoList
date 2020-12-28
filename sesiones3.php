<?php
    include_once 'conection.php';
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$usuario = 'novak';
$sql = "SELECT * FROM tasks WHERE user='$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["nameTask"]. " " . $row["task"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();