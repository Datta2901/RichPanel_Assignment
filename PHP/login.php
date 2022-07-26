<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "richpanel_assignment";
    $conn = mysqli_connect($host,$user,$password,$db);
    if(!$conn){
        $conn_error = "There is a connection error!! Please try again!!";
        die();
    }

    if(isset($_POST["login-btn"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $psw = $_POST["psw"];
        $SESSION['name'] = $name;
        $sql = "select * from userdetails where email = '".$email." 'AND Password = '".$psw."'limit 1";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)== 1){
            echo "<script>alert('User found in database');</script>";
        }else{
            echo "<script>alert('User not found in the database');</script>";
        }
    }
?>