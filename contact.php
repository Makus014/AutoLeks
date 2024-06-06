<?php
    session_start();
    $mySession = $_SESSION["fName"] ?? '';
    $userEmail = $_SESSION["email"] ?? '';

    if(empty($mySession)){
        header("location: index.php");
    }

    // ob_start();

    // $conn = mysqli_connect("localhost","root","","user");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contactStyle.css">
    <link rel="stylesheet" href="css/popUplogin.css">
    <title>Contact Us</title>
</head>
<body>

<div class="navList">
        <a href="index.php">Home</a>
        <a href="index.php#ourServices">Services</a>
        <a href="contact.php">Contact</a> 
        <a href="index.php#aboutUs">About</a> 
        
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


    


    <div class="contactContainer">
        <h1>Send message</h1>
        <form action="phpScript\sendContact.php" method="post">
                <h3>Date Availability</h3>
                <input type="date" name="schedule" placeholder="Appoint schedule">
                <br>
                <h3>Your Message</h3>
                <textarea id="messageDesign" type="text" name="message" placeholder="your message..." style="height:200px"></textarea>
                <button type="submit">Submit</button>
            </form>
    </div>


    <div id="logInMode" class="logIncontainer">
        <div id="popUpMode" class="popUpLogin">
            <div class="popUpcontained">
                <div class="popUpLogin-text">
                    LOG IN FORM              
                </div>
                <form action="phpScript/login.php" method="post">
                    <input type="text" name="username" placeholder="your username">
                    <br>
                    <input type="password" name="password" placeholder="your password">
                    <br/>
                    <!-- should do recursion -->
                    <p id="incorrectP">
                        
                    <?php 
                    if(empty($onErrorSession)){
                        echo "";
                    }
                    else{
                        if(!empty($mySession)){
                            echo "";
                        }
                        else{
                            echo "Incorrect Input";
                        }
                    }
                    
                    ?>
                    </p>
                    <button type = "submit" value="Login">Log in</button>
                    <p>don't have an account? <a type="submit" href="signup.php">create one!</a></p>
                </form>
            </div>
        </div>
    </div>

    
<!-- footer here -->
<!-- <div class="footer">

</div> -->



        <script>
document.addEventListener('DOMContentLoaded', (event) => {
    <?php if (empty($mySession)): ?>
        document.getElementById('logInMode').style.visibility = 'visible';
    <?php else: ?>
        document.getElementById('logInMode').style.visibility = 'hidden';
        console.log("HELLO  <?php echo htmlspecialchars($mySession); ?>");
    <?php endif; ?>
});
</script>

    
</body>
</html>