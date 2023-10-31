<?php
extract($_POST);
$mysqli = new mysqli('localhost', 'root', '', 'studb');
if ($mysqli->connect_errno > 0) {
    die('Unable to connect to the database: ' . $mysqli->connect_error);
}
$query = "INSERT INTO login (uname, pwd, regno, mailid, mobile) VALUES ('$uname', '$pwd', '$regno', '$mailid', '$mobile')";
$insert_row = $mysqli->query($query);
if ($insert_row) {
    header("location: logincheck.html");
} else {
    die('Error: (' . $mysqli->errno . ') ' . $mysqli->error);
}
$mysqli->close();
?>
