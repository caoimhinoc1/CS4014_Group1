<?php

session_start();
include 'dbh.php';


$first = $_POST['first'];
$last = $_POST['last'];
$idnum = $_POST['idnum'];
$email = $_POST['email'];
$user_subject = $_POST['user_subject'];
$pwd = $_POST['pwd'];
$hashedPassword = password_hash($pwd,PASSWORD_BCRYPT);

$sql = "SELECT * FROM user1 WHERE email = '$email'";
$result = $conn->query($sql);

if($result->num_rows > 0) {//Check to see if a user is already registered with the email address.
echo("An account already exists for " . $email . ". Please register with another email address.");
echo "<br>";
echo "<br>";
echo("<button onclick=\"location.href='index1.php'\">REGISTER</button>");
}else{
$sql = "INSERT INTO user1 (first, last, idnum, email, user_subject, pwd) 
VALUES ('$first', '$last', '$idnum', '$email', '$user_subject', '$hashedPassword')";
$result = $conn->query($sql);

echo("You have successfully registered.");
echo "<br>";
echo "<br>";
echo("<button onclick=\"location.href='index1.php'\">NOW LOGIN</button>");   
}

//header("Location: index1.php");

?>	



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>

 
      <link rel="stylesheet" type="text/css" href="style1.css?<?php echo time();?>" />

</head>