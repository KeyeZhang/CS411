<?php
session_start();
include "dbh.php";
$username = $_POST['username'];
$email = $_POST['email'];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

//query old username, email and password
$id = $_SESSION['id'];
$sql1 = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$password_old = $row["pwd"];
$email_old = $row["email"];
$username_old = $row["username"];
mysqli_free_result($result);

//check whether whether user has changed username/email/password or not
if($username == $username_old){
	echo "You did not change your username!"."</br>";
}
else{
	$sql2 = "UPDATE user SET username = '$username'
WHERE id = '$id'";
	$result = mysqli_query($conn,$sql2);
	mysqli_free_result($result);
	echo "You have changed your username to ".$username."</br>";
}

if($email == $email_old){
	echo "You did not change your email!"."</br>";
}
else{
	$sql3 = "UPDATE user SET email = '$email'
WHERE id = '$id'";
	$result = mysqli_query($conn,$sql3);
	mysqli_free_result($result);
	echo "You have changed your username to ".$email."</br>";
}

if($password1 == $password_old or $password1 != $password2){
	echo "You did not change your password!/ You did not enter the same password for confirmation!"."</br>";
}
else{
	$sql4 = "UPDATE user SET pwd = '$password1'
WHERE id = '$id'";
	$result = mysqli_query($conn,$sql4);
	mysqli_free_result($result);
	echo "You have changed your username to "."$password1"."</br>";
}

mysqli_close($conn);


?>