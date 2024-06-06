<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/signupStyle.css">
    <title>Sign Up Page</title>
</head>
<body>
    <div class="signUpcontainer">
        <div class="Signup">
            <div class="Signup-text">
                SIGN UP FORM
            </div>
            <div class="popUpcontained">
                <form action="phpScript/signUp.php" method="post">
                    <input type="text" name="fullname" placeholder="Full name...">
                    <input type="email" name="email" placeholder="Email...">
                    <input type="text" name="username" placeholder="Username...">
                    <input type="password" name="password" placeholder="Password...">
                    <button type="submit" value="SignUp">Sign Up</button>
                    <p>Already have an account? <a href="index.php">Login!</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>