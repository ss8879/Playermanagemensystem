<?php
$mysqli = new mysqli('localhost', 'root', '', 'addbutton');

if ($mysqli->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $playerType = $_POST['playerType'];
    $BatsmanType = $_POST['BatsmanType'];
    $BowlerType = $_POST['BowlerType'];
    $totalwickets = $_POST['totalWickets'];
    $totalruns = $_POST['totalRuns'];
    $wicketkeeper = $_POST['wicketkeeper'];
    $query = "INSERT INTO playerdetails (name, number, age, dob, playerType, BatsmanType, BowlerType, totalwickets, totalruns, wicketkeeper)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssssssss', $name, $number, $age, $dob, $playerType, $BatsmanType, $BowlerType, $totalwickets, $totalruns, $wicketkeeper);

    if ($stmt->execute()) {
        header("location: w1.html");
    } else {
        die('Error : (' . $mysqli->errno . ')' . $mysqli->error);
    }

    $stmt->close();
}

$mysqli->close();
?>
