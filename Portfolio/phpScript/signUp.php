<?php

session_start();
// $isUserExist = false;
$conn = mysqli_connect("localhost","root","","user");

//Do this if connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if($_SERVER['REQUEST_METHOD'] == "POST"){
    //trim user
    $userTrim = trim($_POST["username"]);
    $userStrip = stripcslashes($userTrim);
    $finalUser = htmlspecialchars($userStrip);

    $userEmail = $_POST["email"];
    $userFullName = $_POST["fullname"];

    //trim password
    $passTrim = trim($_POST["password"]);
    $passStrip = stripcslashes($passTrim);
    $finalPass = htmlspecialchars($passStrip);

    
    if(empty($finalUser) ||  empty($userEmail) || empty($userFullName) || empty($finalUser)){
        echo "input pls";
    }
    else{
        $checkExist = $conn->prepare("SELECT * FROM user_table where username = ? AND email = ?");
        $checkExist->bind_param("ss", $finalUser, $userEmail);
        $checkExist->execute();
        $checkExist->store_result();


        if($checkExist->num_rows > 0){
            header("location: /Portfolio/signup.php");
        }
        else{
            $stmt = $conn->prepare("INSERT INTO user_table (email, fullname, username, password) VALUES (?, ?,?, ?)");
            $stmt->bind_param("ssss",$userEmail, $userFullName, $finalUser, $finalPass);
            if ($stmt->execute()) {
                header("location: /Portfolio/success.php");
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $checkExist->close();
    }
}
$conn->close();



// $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);


