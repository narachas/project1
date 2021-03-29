<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT dte,utc,ddd,vis,ff,ttt from metar ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["dte"]. " - Date: " . $row["utc"]. " <-UTC" . $row["ddd"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?> 