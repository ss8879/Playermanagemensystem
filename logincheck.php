<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "studb";
$tbl_name = "Login";
$mysqli = new mysqli($host, $username, $password, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$myusername = $_POST['uname'];
$mypassword = $_POST['pwd'];
$sql = "SELECT * FROM $tbl_name WHERE uname = '$myusername' AND pwd = '$mypassword'";
$result = $mysqli->query($sql);
if ($result->num_rows == 1) {
    header("Location: w1.html");
} else {
    echo "<h2>Login Failed!!!</h2>";
}
$mysqli->close();
?>
