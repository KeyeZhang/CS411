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


$sql_player = "INSERT INTO Favorite_player (Players_Name, Users_ID) 
VALUES
('$player1', '$id'),
('$player2', '$id'),
('$player3', '$id');";
mysqli_query($conn, $sql_player);


$sql_team = "INSERT INTO Favorite_team (Teams_Name, Users_ID) 
VALUES 
('$team1', '$id'),
('$team2', '$id'),
('$team3', '$id');";
mysqli_query($conn,$sql_team);

header("location: index.html");

?>
