<?php
session_start();
include 'dbh.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


$sql = "INSERT INTO user (username, pwd, email) 
VALUES ('$username', '$password', '$email')";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM user WHERE username = '$username' AND pwd = '$password'";
$result1 = $conn->query($sql1);

    
if (!$row = $result1->fetch_assoc()){
    echo "Your username or password is incorrect!";
}
else {
	$_SESSION['id'] = $row['id'];
}

header("location: preference.html");

?>
