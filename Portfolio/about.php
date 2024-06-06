<?php
    session_start();
    $mySession = $_SESSION["fName"] ?? '';
    $userEmail = $_SESSION["email"] ?? '';

    if(empty($mySession)){
        header("location: index.php");
    }

    // ob_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/aboutStyle.css">
    <title>About us</title>
</head>
<body>
    
<div class="navList">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a> 
        <a href="about.php">About </a>
        
        <div class="dropDown">
            <div class="moreInfo">
            </div>
        </div>
        <div class="dropDown">
            <button class="dropbtn"><?php 
            if(empty($mySession)){
                echo "Log in/SignUp";
            }else{
                echo htmlspecialchars($mySession); 
            }
            ?></button>
        <div class="moreInfo">
               <a href="phpScript/logout.php">Log out</a>
           </div>
        </div>
    </div>

    <p>AutoLeks has the dedication to automate solution and enhance business operation through 
        significantly decrease your daily task. AutoLeks will achieve efficiency and productivity.</p>
    
</body>
</html>