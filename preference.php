<?php
session_start();
include 'dbh.php';

$team1 = $_POST['fteam1'];
$team2 = $_POST['fteam2'];
$team3 = $_POST['fteam3'];
$player1 = $_POST['fplayer1'];
$player2 = $_POST['fplayer2'];
$player3 = $_POST['fplayer3'];
$id = $_SESSION['id'];

$sql_player = "INSERT INTO Favirote_player (Players_Name, Users_ID) 
VALUES ('$player1', '$id')";
$sql_player .= "INSERT INTO Favirote_player (Players_Name, Users_ID) 
VALUES ('$player2', '$id')";
$sql_player .= "INSERT INTO Favirote_player (Players_Name, Users_ID) 
VALUES ('$player3', '$id')";
$result_player = $conn->query($sql_player);

$sql_team = "INSERT INTO Favirote_team (Teams_Name, Users_ID) 
VALUES ('$team1', '$id')";
$sql_team = "INSERT INTO Favirote_team (Teams_Name, Users_ID) 
VALUES ('$team2', '$id')";
$sql_team = "INSERT INTO Favirote_team (Teams_Name, Users_ID) 
VALUES ('$team3', '$id')";
$result_team = $conn->query($sql_team);


header("location: index.html");

?>
