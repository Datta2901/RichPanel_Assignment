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
        $email = $_POST["email"];
        $psw = $_POST["psw"];
        $sql = "select * from userdetails where email = '".$email." 'AND Password = '".$psw."'limit 1";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)== 1){
            $_SESSION['email'] = $email;
            if(isset($_POST["rememberMe"])){
                setcookie('email_username',$_POST['email'],time() +( 60 * 60 * 24 * 31));
                setcookie('password',$_POST['psw'],time() +(60 * 60 * 24 * 31));
            }
            echo "<script>alert('User found in database');</script>";
        }else{
            echo "<script>alert('User not found in the database');</script>";
        }
    }
?>