
<?php
$servername = "localhost";
$username = "slinggro_pandiyan";
$password = "$wKa-1YmwXs%";
$dbname = "slinggro_pandiyan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_image";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "Name: " . $row["image_name"]. " - P.Name: " . $row["ProductName"]. " " . $row["price"]. "<br>";
    // echo $row;
    echo json_encode($row);
  }
} else {
  echo "0 results";
}
$conn->close();
?>