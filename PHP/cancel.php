<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Plan</title>
</head>
<style>
    body{
        background-color:blue;
    }
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 40%;
        border-radius: 5px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    img {
        border-radius: 5px 5px 0 0;
    }

    .container {
        padding: 2px 16px;
    }
</style>
<body>
    <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "richpanel_assignment";
        $conn = mysqli_connect($host,$user,$password,$db);
        if(!$conn){
            echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'margin:50px 300px150px 0px 0px 50px'>";
            echo "Connection failed : ".mysqli_connect_error();
            die();
        }
        $email = $_SESSION['email'];

        $sql = "select * from payments where email = $email and CancelDetails not NULL'";
        $result = mysqli_query($conn,$sql);
        if($result){

        }
    ?>
    <div class="card">
        <h1 style="text-align: center">Cancel Account</h1>

    </div>
</body>
</html>