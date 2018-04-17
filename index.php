<?php
$connection = mysqli_connect("localhost", "root", "", "sample");

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

/* Select queries return a resultset */
$school_key = 1;
if (isset($_GET['school_key'])) {
    $school_key = $_GET['school_key'];
}

$query = "SELECT * FROM student WHERE school_key = " . $school_key . ";";
var_dump($query);
$result = $connection->query($query);
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        echo $row['name'];
        echo '<br>';
    }
    $result->close();
}
mysqli_close($connection);
?>