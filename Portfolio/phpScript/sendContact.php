<?php
    session_start();
    $userEmail = $_SESSION["email"] ?? '';
    $userFname = $_SESSION["fName"] ?? '';
    $userName = $_SESSION['uName'] ??'';
    $userAppointment = $_POST["schedule"];
    $userMessage = $_POST["message"];


    // $subject = "Your appointment";
    
    // $send_request = "Name = ". $userFname . "\r\n Email = " . $userEmail .
    // "\r\n" . "Appointment = ". $userAppointment . "\r\n" . "Message = " . $userMessage;
    // $headers = "From: nikirai21400@gmail.com" . "\r\n" . 
    // "CC: somebodelse@example.com";

    $conn = mysqli_connect("localhost","root","", "user");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(empty($userAppointment) || empty($userMessage) ){
            $_SESSION["error"] = "error";
            header("location: /Portfolio/contact.php");
        }else{
            $stmt = $conn->prepare("INSERT INTO schedule_table (username, email, schedule, message) VALUES (?, ?,?, ?)");
            $stmt->bind_param("ssss", $userName,  $userEmail, $userAppointment, $userMessage);
            if ($stmt->execute()) {
                header("location: /Portfolio/sentContactpage.php");
                die;
            }else{
                echo "ERROR: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    




    // if($userEmail !=NULL){
        // header("Location: /Portfolio/sentContactpage.php");
        // mail($userEmail, $subject, $send_request, $headers);
        // echo"Sent";
    // }
    // echo"Thank you";
