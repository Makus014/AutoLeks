<?php
session_start();

$con = mysqli_connect("localhost","root","","user");


$userTrim = trim($_POST["username"]);
$userStrip = stripcslashes($userTrim);
$finalUser = htmlspecialchars($userStrip);


//WILL HASH THIS soon or later
$passTrim = trim($_POST["password"]);
$passStrip = stripcslashes($passTrim);
$finalPass = htmlspecialchars($passStrip);


$sql_request = "SELECT * FROM user_table where username = '$finalUser' AND password = '$finalPass'";

// $result = mysql_query($con, $sql_request);
$result = mysqli_query($con, $sql_request);

if(mysqli_num_rows($result) >= 1){
    $userData = $result->fetch_assoc();
    $_SESSION["fName"] = $userData['fullname'];
    $_SESSION["uName"] = $userData["username"];
    $_SESSION["email"] = $userData["email"];
    //idk about this one
    $_session["uPass"] =$userData["password"];

    header("Location: /Portfolio/index.php");
    die;
}
else{
    $_SESSION["error"] = "error";
    header("Location: /Portfolio/index.php");
}
