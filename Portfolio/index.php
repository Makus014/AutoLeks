<?php
    session_start();
    $mySession = $_SESSION["fName"] ?? '';
    $onErrorSession = $_SESSION['error'] ??'';

    // Output buffering to capture the script and run it at the correct place in the HTML
    ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/popUplogin.css">
    <title>AutoLeks</title>
</head>
<body>
<!-- NAVIGATION BAR -->
<div class="navList">
        <a href="#welcomeh1">Home</a>
        <a href="#ourServices">Services</a>
        <a href="contact.php">Contact</a> 
        <a href="#aboutUs">About</a>
        
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
    <!-- LOG IN MODE  -->
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
                    <p>Don't have an account? <a type="submit" href="signup.php">Register now!</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- contents -->
    <br><br><br><br><br><br><br>
    <h1 id="welcomeh1" >WELCOME TO AUTOLEKS</h1>
        <div class="contentContainer">
            <div class="subContentContainer">
                <img src="image\iconAutoLeks.png" class="imgContent">

                <p class="pcontentInformation">
                Welcome to AutoLeks, where we specialize in automating your repetitive tasks. We offer AutoLeks to enhance your 
                efficiency and productivity.
                For you to focus on your main goal! At AutoLeks, 
                we offer diverse range of automation services to fit your style and requirements.
                 If you are looking for business operation, simplifying daily routines and any solution to progress your workflow,
                  our expert team is here to assist you.     
                </p>
            </div>
        </div>

        <h1 id="ourServices">OUR SERVICES</h1>
        <br><br><br>
        <div class="services">
        <div class="subServices">
            <p>Automation tools</p>
            <img src="image\tool.png" style="width: 300px;"/>
            <p>
            Boost your productivity and reach your daily routine solutions with 
            our comprehensive automation tools services, including automated mail, 
            messenger, or any automated devices.
            </p>
        </div>
        <div class="subServices">
            <p>Automation App</p>
            <img src="image\app.png" style="width: 200px;"/>
            <p>Streamline your business processes with our cutting-edge automation app.
                 Increase efficiency, reduce manual errors, and save time with customized 
                 automation solutions tailored to your needs.</p>
        </div>
        <div class="subServices">
            <p>Full Automation</p>
            <img src="image\appTool.png" style="width: 400px;" />
            <p>Bring your brand to life with our full automation app solutions.
                 From using automation tools integrated to automation application, 
                 we help you make a lasting impression.</p>
        </div>
    </div>
    <br><br><br><br><br><br>
        <!-- contents -->
        <div class="contentOtherContainer">
            <div class="subcontentOtherContainer">
                <img src="image\toolImg.png" class="imgOtherContent">
                <div class="otherSubPcontainer">
                    <p class="PcontentOtherContainer">
                    Our services surround various aspects of automation,
                     we make sure that we can provide perfect solution for your innovative strategies.
                      We deliver a top-notch automation solution, not only that; we also significantly
                       improve accuracy and reliability of your tasks.  
                    </p>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <h1 id="aboutUs">ABOUT US</h1>
        <br><br><br><br>
        <div class="aboutSection">
        <div class="subAboutSection">
            <p>Faq</p>
            <p>
            Why Autoleks?
            AutoLeks has the dedication to automate solution
             and enhance business operation through significantly 
             decrease your daily task. AutoLeks will achieve efficiency and productivity.
            </p>
        </div>
        <div class="subAboutSection">
            <p>Terms</p>
            <p>Your access to and use of the services is conditioned on your acceptance
                and compliance with these Terms. We also apply these terms to apply to all
            visitors, users, and other who acces or use our service. </p>
        </div>
        <div class="subAboutSection">
            <p>Mission</p>
            <p>Our mission at Autoleks is to automate repetitive tasks and process,
                 that will allow our clients to fully focus on primary tasks. Our aim is to deliver customized solutions for automation and unique preferences for each client.
                 We ensure our clients will be satisfied with our automated tools.</p>
        </div>
    </div>
    <br><br><br><br><br><br>
        <div class="footer">
        <h1>CONTACT US</h1>
        <div class="footer-section">
            <h2>Contact Information</h2>
            <ul>
                <li>Email: <a href="mailto:Autoleks@gmail.com">Autoleks@gmail.com</a></li>
                <li>Phone: <a href="tel:+971235421277">+971 23 542 1277</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#welcomeh1">Home</a></li>
                <li><a href="#ourServices">Services</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
    </div>



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