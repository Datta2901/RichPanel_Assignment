<?php 
    session_start();
    if(isset($_COOKIE['email']) && isset($_COOKIE['psw'])){
        $id = $_COOKIE['email'];
        $ps = $_COOKIE['psw'];

    }else{
        $id = "";
        $ps = "";
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./../CSS/login.css">
    <title>Richpanel_Assignment</title>
</head>

<body>
    <form action="./login_details.php" method = "POST">
        <div class="container">
            <h1 style="text-align: center">Login to your account</h1>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" value = "<?php echo $id?>"required />
            
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" value = "<?php echo $ps?>"required />

            <label>
                <input type = "checkbox" name = "rememberMe">Remember Me
            </label>
            <button type="submit" class="login-btn" name = "login-btn" >Login</button>
            <p style="text-align: center">
                New to MyApp <a href="./register.html">Sign Up</a>
            </p>
        </div>
    </form>
</body>

</html>
