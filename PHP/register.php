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

    if(isset($_POST["register-btn"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $psw = $_POST["psw"];
        $SESSION['name'] = $name;
        $sql = "INSERT INTO userdetails(Name,Email,Password) values('$name','$email','$psw')";
        if(mysqli_query($conn,$sql)){
            header("Location:login.php");
        }else{
            echo "<script>alert('User not found in the database');</script>";
        }
    }
?>