<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = new mysqli('localhost', 'root', '', 'addbutton');

if ($mysqli->connect_errno > 0) {
    die('Unable to connect to the database [' . $mysqli->connect_error . ']');
}

if (isset($_POST['name1']) && isset($_POST['number1'])) {
    $name1 = $_POST['name1'];
    $number1 = $_POST['number1'];
    $query = "SELECT * FROM playerdetails WHERE name = ? AND number = ?";
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
        die('Error in query preparation: ' . $mysqli->error);
    }

    $stmt->bind_param('ss', $name1, $number1);

    if (!$stmt->execute()) {
        die('Error in query execution: ' . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $player = $result->fetch_assoc();
        echo "<div class='player-details' id='player-details'>";
        echo "<span id='details'>Player details:</span><br>";
        echo "<label for='name'>Name:</label> <span id='name'>" . $player['name'] . "</span><br>";
        echo "<label for='number'>Number:</label> <span id='number'>" . $player['number'] . "</span><br>";
        echo "<label for='age'>Age:</label> <span id='age'>" . $player['age'] . "</span><br>";
        echo "<label for='dob'>Date of Birth:</label> <span id='dob'>" . $player['dob'] . "</span><br>";
        echo "<label for='playerType'>Player Type:</label> <span id='playerType'>" . $player['playerType'] . "</span><br>";
        echo "<label for='BatsmanType'>Batsman Type:</label> <span id='BatsmanType'>" . $player['BatsmanType'] . "</span><br>";
        echo "<label for='BowlerType'>Bowler Type:</label> <span id='BowlerType'>" . $player['BowlerType'] . "</span><br>";
        echo "<label for='totalWickets'>Total Wickets:</label> <span id='totalWickets'>" . $player['totalWickets'] . "</span><br>";
        echo "<label for='totalRuns'>Total Runs:</label> <span id='totalRuns'>" . $player['totalRuns'] . "</span><br>";
        echo "<label for='wicketkeeper'>WicketKeeper:</label> <span id='wicketkeeper'>" . $player['wicketkeeper'] . "</span><br>";
        
        echo "</div>";
        
    } else {
        echo "<script>alert('No player found.')</script>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: aqua;
        }
        .player-details {
            position:absolute;
            top:150px;
            left:35%;
            width: 450px;
            height: 450px;
            box-shadow: 0 0 5px 0 rgba(0,0,0,0.3);
            background: #fff;
            border-radius:15px;
            font-size: large;
            margin-bottom: 15px;
        }
        #details {
    font-size: large;
    font-weight: bold; 
    position:relative;
    top:15px;
    margin-left:10px;
}

label {
    position:relative;
    display: inline-block;
    width: 150px; 
    text-align: left;
    margin-right: 10px; 
    margin-bottom: 15px;
    margin-left: 10px;
    top:30px;
}
span {
    position:relative;
    display: inline-block;
    text-align: right;
    top:30px;
}
#close{
    position:absolute;
    left:95%;
    margin: 10px 0;
    padding:15px;
    background-color:white;
    border-color: white;
    border:0px solid;
    color:#7e7f85;
    font-size: 20px;
}
    </style>
</head>
<body>
    <a href="w1.html">
<button type="button" id="close">X</button>
</a>
</body>
</html>
