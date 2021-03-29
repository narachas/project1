<?php
$mysqli = new mysqli('localhost', 'root', '', 'wx');
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}

$sql = "SELECT * from metar";
if (!$result = $mysqli->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

if ($result->num_rows === 0) {
    echo "We could not find a match for ID $aid, sorry about that. Please try again.";
    exit;
}

$actor = $result->fetch_assoc();
$sql = "SELECT * from metar";
if (!$result = $mysqli->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
    exit;
}
else
{
	echo "Returned rows are: " . $result -> num_rows;
}
echo "<ul>\n";
while ($actor = $result->fetch_assoc()) {
    echo $actor['ttt'] . ' ' . $actor['tdd'];
}
echo "</ul>\n";
$result->free();
$mysqli->close();
?>
